<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller{

    public function index(){
        return view("companies/index");
    }

    public function show(\App\Company $company){
    	// belangrijk voor lars
        $data['company'] = \App\Company::where('id', $company)->first();
        return view('companies/show', $data);
    }

}