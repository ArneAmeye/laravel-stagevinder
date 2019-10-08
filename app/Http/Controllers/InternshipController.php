<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternshipController extends Controller{

    public function index(){
        return view("internships/index");
    }

    public function show(\App\Internship $company){
        $data['internship'] = \App\Internship::where('id', $company)->first();
        return view('internships/show', $data);
    }

}