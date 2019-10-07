<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller{

    public function index(){
        $data['students'] = \App\Student::get();
        return view("students/index", $data);
    }

    public function show($student){
        $data['student'] = \App\Student::where('id', $student)->first();

        if (!empty($_GET["edit"])) {
        	$data['edit'] = $_GET["edit"];
        } else {
        	$data['edit'] = "";
        }

        return view('students/show', $data);
    }

    public function edit($student) {
    	/*$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email',
    		'webiste' => 'required|url'
    	]);*/
    	//$user = Auth::user();

    	$data['student'] = \App\Student::where('id', $student)->first();
    	array_push($data['edit'], $_GET["edit"]);
    	var_dump($data);
    	return view("students/edit", $data);
    }

}