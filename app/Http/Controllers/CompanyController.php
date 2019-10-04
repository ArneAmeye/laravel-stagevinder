<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller{

    public function index(){
        return view("companies/index");
    }

    public function show(\App\Companies $company){
        $data['company'] = \App\Companies::where('id', $company)->first();
        return view('companies/show', $data);
    }

}