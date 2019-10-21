<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    //Show a privacy page
    public function index(){
        return view('privacy');
    }
}
