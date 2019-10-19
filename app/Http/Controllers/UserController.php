<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class UserController extends Controller
{
    protected $redirectTo = 'index';

    public function register()
    {
        return view('/register');
    }

    public function handleRegister(Request $request)
    {
        //dd($request);
        $user = new \App\User();

        $validation = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'verificateEmail' => 'required|email|same:email',
            'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
        ]);

        if ($validation->fails()) {
            return redirect()->route('register')
                ->withErrors($validation);
        }

        $email = $request->input('email');
        $emailVerified = $request->input('VerificateEmail');

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $lastInsertedId = $user->id;

        //Checkbox
        $ifStudent = $request->has('isStudent');

        if ($ifStudent) 
        {
            /*
                return student that is registered
                and make a session based on student
            */
            $student = StudentController::handleRegister($request, $lastInsertedId);
            //Session::put('user', $student);
            $request->user_type = 'student';
            $this->handleLogin($request);
        }

        if (!$ifStudent) 
        {
            //If not checked, it is a company.
            $company = CompanyController::handleRegister($request, $lastInsertedId);
            //Session::put('user', $company);
            $request->user_type = 'company';
            $this->handleLogin($request);
        }

        return view('/index');
    }

    public function login()
    {
        return view('/login');
    }

    public function handleLogin(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if ($validation->fails()) {
            return redirect()->route('login')
                ->withErrors($validation);
        }

        $creadentials = $request->only(['email', 'password']);

        if (\Auth::attempt($creadentials)) 
        {
            $user = auth()->user();

            $data['student'] = \App\User::find($user->id)->where('id', $user->id)->first()->student;
            $data['company'] = \App\User::find($user->id)->where('id', $user->id)->first()->company;

            if ($data['student'] != null) 
            {
                $name = StudentController::handleLogin($request, $data);
            }

            if ($data['company'] != null) 
            {
                $name = CompanyController::handleLogin($request, $data);
            }

            return redirect()->route('index')->with('name', $name);
        }
        
        return redirect()->route('login')->withErrors("Your email or password was incorrect!");
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
