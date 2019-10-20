<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Session;
use App\Services\SocialFacebookAccountService;

class SocialAuthFacebookController extends Controller
{

    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function handleProviderCallback(SocialFacebookAccountService $service, Request $request)
    {

        //check if request denied or does not contain valid login info, then redirect back to login
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/login');
        }

        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());

        $data['student'] = \App\User::find($user->id)->where('id', $user->id)->first()->student;
        $data['student']['type'] = 'student';
        Session::put('user', $data['student']);

        Auth::login($user, true);
        return redirect()->to('/');
    }
}
