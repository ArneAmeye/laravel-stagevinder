<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class UserController extends Controller
{
    public function register()
    {
        return view('/register');
    }

    public function handleRegister(Request $request)
    {
        $user = new \App\User();

        $email = $request->input('email');
        $emailVerified = $request->input('VerificateEmail');

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $currentUser = Auth::user();

        //Checkbox
        $ifStudent = $request->has('isStudent');

        if ($ifStudent) {
            StudentController::handleRegister($request);
            $this->handleLoginStudent($request, $user);
        }

        if (!$ifStudent) {
            //If not checked, it is a company.
            CompanyController::handleRegister($request);
            $this->handleLoginStudent($request, $user);
        }
    }

    public function login()
    {
        return view('/login');
    }

    public function handleLogin(Request $request)
    {
        $creadentials = $request->only(['email', 'password']);

        if (\Auth::attempt($creadentials)) {
            $user = auth()->user();

            if ($request->user_type == 'student') {
                $data = $this->handleLoginStudent($request, $user);
            }

            if ($request->user_type == 'company') {
                $data = $this->handleLoginCompany($request, $user);
            }

            if ($data == false) {
                return redirect()->route('login')->with('error', 'Your account is not a '.$request->user_type.'!');
            } else {
                return redirect()->route('index')->with('full_name', $data);
            }
        }

        return redirect()->route('login')->with('error', 'Your email or password was incorrect!');
    }

    private static function handleLoginStudent(Request $request, $user)
    {
        $data['student'] = \App\User::find($user->id)->where('id', $user->id)->first()->student;

        if ($data['student'] != null) {
            $data['student']['type'] = 'student';
            Session::put('user', $data['student']);

            return $full_name = $data['student']->firstname.' '.$data['student']->lastname;
        }

        return false;
    }

    private static function handleLoginCompany(Request $request, $user)
    {
        $data['company'] = \App\User::find($user->id)->where('id', $user->id)->first()->company;

        if ($data['company'] != null) {
            $data['company']['type'] = 'company';
            Session::put('user', $data['company']);

            return $data['company']->name;
        }

        return false;
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
