<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class UploadController extends Controller {

    public function index(){
        return view("upload");
    }

    public function updateOne(Request $request) {
    	$validation = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    	if ($validation->fails()) {
            return redirect()->route("upload")
                ->withErrors($validation);
        }
        
        if($request->hasFile('file')) {
	        $image = $request->file('file');
	        $name = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/images/students/profile_picture');
	        $image->move($destinationPath, $name);
	        $this->uploadUser($name);
	    }

        return redirect("/students/".session()->get('user')->id)->with('success','Image uploaded successfully.');
    }

    private static function uploadUser($name) {
    	$currentUser = session()->get('user');

    	$user = \App\Student::where('id', $currentUser->id)->first();
    	$user->profile_picture = $name;
    	$user->save();
    }

}