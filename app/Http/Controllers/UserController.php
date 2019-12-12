<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use App\User;

class UserController extends Controller
{
    protected $redirectTo = 'index';

    public function register()
    {
        return view('/register');
    }

    public function handleRegister(Request $request)
    {
        $user = new User();

        //Checkbox
        //0 or false = student
        //1 or true = company
        $isCompany = $request->has('isCompany');

        //Validate
        $ifValidated = $this->handleValidation($user, $request, $isCompany);

        $email = $request->input('email');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $lastInsertedId = $user->id;

        //If not checked, it is a student.
        if (!$isCompany) {
            $student = StudentController::handleRegister($request, $lastInsertedId);
            $request->user_type = 'student';
            $this->handleLogin($request);
        }

        //If checked, it is a company.
        if ($isCompany) {
            $company = CompanyController::handleRegister($request, $lastInsertedId);
            $request->user_type = 'company';
            $this->handleLogin($request);
        }

        return redirect()->route('index');
    }

    public function login()
    {
        return view('/login');
    }

    public function handleLogin(Request $request)
    {
        $request->flashExcept('password');
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validation->fails()) {
            return redirect()->route('login')
                ->withErrors($validation)->withInput($request->except('password'));;
        }

        $creadentials = $request->only(['email', 'password']);

        if (\Auth::attempt($creadentials)) {
            $user = auth()->user();

            $data['student'] = User::find($user->id)->where('id', $user->id)->first()->student;
            $data['company'] = User::find($user->id)->where('id', $user->id)->first()->company;

            if ($data['student'] != null) {
                $name = StudentController::handleLogin($request, $data);
            }

            if ($data['company'] != null) {
                $name = CompanyController::handleLogin($request, $data);
            }

            return redirect()->route('index')->with('name', $name);
        }

        return redirect()->route('login')->withErrors('Your email or password was incorrect!');
    }

    public function handleValidation($user, $request, $isCompany){
        $validation = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'verificateEmail' => 'required|email|same:email',
            'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$.!%*#?&,;:+-]/',
        ]);

        if ($validation->fails()) {
            return redirect()->route('register')
                ->withErrors($validation)->withInput($request->except('password'));;
        }

        return true;
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/login');
    }
}
