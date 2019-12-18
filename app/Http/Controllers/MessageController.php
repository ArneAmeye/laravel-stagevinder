<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class Message extends Controller
{
    public function index()
    {
        $data['messages'] = \App\Message::get();

        return view('messages/index', $data);
    }
}
