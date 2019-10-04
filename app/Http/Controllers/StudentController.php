<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller{

    public function index(){
        
        return view("students/index");
    }

    public function show(\App\Students $student){
        $data['student'] = \App\Students::where('id', $student)->first();
        return view('students/show', $data);
    }

}