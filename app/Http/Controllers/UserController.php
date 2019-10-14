<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller {
	
	public function register() {
		return view('/register');
	}

	public function handleRegister() {
		return view('/register');
	}

	public function login() {
		return view('/login');
	}

	public function handleLogin(Request $request) {
		$creadentials = $request->only(['email', 'password']);

		if (\Auth::attempt($creadentials)) {
			$user = auth()->user();
			$data['student'] = \App\User::find($user->id)->where('id', $user->id)->first()->student;
			$full_name = $data['student']->firstname." ".$data['student']->lastname;

			return redirect()->route('index')->with('full_name', $full_name);
		}
	}

	public function logout() {
		Auth::logout();
  		return redirect('/login');
	}
}