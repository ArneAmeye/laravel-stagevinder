<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Rules\Space;
use Auth;
use Session;

class InternshipController extends Controller{

    public function index(){
        $data['internships'] = \App\Internship::get();
        return view("internships/index", $data);
    }

    public function show($internship){
        $data['internship'] = \App\Internship::find($internship)->where('id', $internship)->first();

        $data['company'] = \App\Company::where('id', $data['internship']->company_id)->first();

        $data['current'] = auth()->user()->id;

        if (!empty($_GET['edit'])) {
            $id = session()->get("user")->id;
            if ($id != $internship) {
                return redirect("/internships/$internship");
            }
            $data['edit'] = $_GET['edit'];
        } else {
            $data['edit'] = '';
        }

        return view('internships/show', $data);
    }

    public function create($company, Request $request){
        $user = session()->get("user");

        $internship = new \App\Internship();
        $internship->title = $request->input('title');
        $internship->sector = $request->input('sector');
        $internship->description = $request->input('description');
        $internship->requirements = $request->input('requirements');
        if(!empty($request->input('background_picture'))){
            $internship->background_picture = $request->input('background_picture');
        }else{
            $internship->background_picture = "default.jpg";
        }
        
        $internship->company_id = $company;
        $internship->is_available = 1;

        $internship->save();

        return redirect("/internships/$internship->id")->with('success', "Internship has been added!");
    }

    public function update($id, Request $request){
    
        $internship = \App\Internship::where('id', $id)->first();

        $user = session()->get("user");
        if ($user->id != $internship->company_id) {
            return redirect("/internships/$internship");
        }

        $validation = Validator::make($request->all(), [
            'title' => 'required|string',
            'sector' => 'required',
            'description' => 'required',
            'requirements' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect("internshipss/$id?edit=details")->withErrors($validation);
        } else {
            $internship->title = $request->input('title');
            $internship->field_sector = $request->input('sector');
            $internship->description = $request->input('description');
            $internship->requirements = $request->input('requirements');
            $internship->save();

            return redirect("/internships/$id")->with('success', 'Internship details have been updated!');
        }


    }

}