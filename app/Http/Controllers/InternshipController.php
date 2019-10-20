<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternshipController extends Controller{

    public function index(){
        $data['internships'] = \App\Internship::get();
        return view("internships/index", $data);
    }

    public function show($internship){
        $data['internship'] = \App\Internship::find($internship)->where('id', $internship)->first();
        $data['company'] = \App\Company::where('id', $data['internship']->company_id)->first();
        return view('internships/show', $data);
    }

}