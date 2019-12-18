<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class Conversation extends Controller
{
    public function index()
    {
        $data['Conversations'] = \App\Conversation::get();

        return view('conversations/index', $data);
    }

    public function show($conversation)
    {
        $data['conversation'] = \App\Conversation::find($conversation)->where('id', $conversation)->first();

        $data['current'] = auth()->user()->id;

        if (auth()->user() != null) {
            return redirect("/conversations/show", $data);
        }
    }
}
