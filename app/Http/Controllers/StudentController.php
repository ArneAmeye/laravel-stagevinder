<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class StudentController extends Controller {

    public function index(){
        $data['students'] = \App\Student::get();
        return view("students/index", $data);
    }

    public function show($student){
        //$data['student'] = \App\User::with('student')->find($student)->where('id', $student)->first();
        $data['student'] = \App\User::find($student)->where('id', $student)->first()->student;
        //$data['user'] = \App\User::find($student)->where('id', $student)->first();

        if (!empty($_GET["edit"])) {
        	$data['edit'] = $_GET["edit"];
        } else {
        	$data['edit'] = "";
        }

        return view('students/show', $data);
    }

    public function update($id, Request $request) {

        if ($request->has('update_details')) {
            return $this->updateDetails($id, $request);
        }

        if ($request->has('update_bio')) {
            return $this->updateBio($id, $request);
        }

        return redirect("/students/$id")
                ->with('danger', 'Invalid request! Try again.');
    }

    private static function updateBio($id, Request $request) {
        $validation = Validator::make($request->all(), [
            'bio' => 'required|string'
        ]);

        if ($validation->fails()) {
            return redirect("/students/$id?edit=bio")
                ->withErrors($validation);
        } else {

            $student = \App\Student::where('id', $id)->first();

            $student->bio = $request->input('bio');

            $student->save();

            return redirect("/students/$id")
                ->with('success', 'Bio has been updated!');
        }
    }

    private static function updateDetails($id, Request $request) {
        $validation = Validator::make($request->all(), [
            'username' => 'required|string',
            'profession' => 'required',
            'date' => 'required|before:'.date('Y-m-d').'|date',
            'linkedIn' => 'url|nullable',
            'website' => 'url|nullable',
            'email' => 'required|email|unique:students,email,'.$id
        ]);

        if ($validation->fails()) {
            return redirect("/students/$id?edit=details")
                ->withErrors($validation);
        } else {

            $student = \App\Student::where('id', $id)->first();

            $username = explode(' ', $request->input('username'), 2);

            $student->firstname = $username[0];
            $student->lastname = $username[1];
            $student->birth_date = $request->input('date');
            $student->adress = $request->input('location');
            $student->mobile_number = $request->input('number');
            $student->linkedIn = $request->input('linkedIn');
            $student->skype = $request->input('skype');
            $student->website = $request->input('website');
            $student->email = $request->input('email');
            $student->field_study = $request->input('profession');
            $student->school = $request->input('school');

            $student->save();

            return redirect("/students/$id")
                ->with('success', 'User detials has been updated!');
        }
    }

}