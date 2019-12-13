<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;

class InternshipController extends Controller
{
    public function index()
    {
        $data['internships'] = \App\Internship::get();

        return view('internships/index', $data);
    }

    public function show($internship)
    {
        $data['internship'] = \App\Internship::find($internship)->where('id', $internship)->first();

        $data['company'] = \App\Company::where('id', $data['internship']->company_id)->first();

        $data['current'] = auth()->user()->id;

        if (!empty($_GET['edit'])) {
            $id = session()->get('user')->id;
            if ($id != $internship) {
                return redirect("/internships/$internship");
            }
            $data['edit'] = $_GET['edit'];
        } else {
            $data['edit'] = '';
        }

        $data["applied"] = $this->isApplied($internship);

        return view('internships/show', $data);
    }

    public function create($company, Request $request)
    {
        $user = session()->get('user');

        $internship = new \App\Internship();
        $internship->title = $request->input('title');
        $internship->field_sector = $request->input('sector');
        $internship->description = $request->input('description');
        $internship->requirements = $request->input('requirements');
        $internship->tags = $request->input("tags");
        if (!empty($request->input('background_picture'))) {
            $internship->background_picture = $request->input('background_picture');
        } else {
            $internship->background_picture = 'default.jpg';
        }

        $internship->company_id = $company;
        $internship->is_available = 1;

        $internship->save();

        return redirect("/internships/$internship->id")->with('success', 'Internship has been added!');
    }

    public function update($id, Request $request)
    {
        $internship = \App\Internship::where('id', $id)->first();

        $user = session()->get('user');
        if ($user->id != $internship->company_id) {
            return redirect("/companies/".$internship->company_id);
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

    public function delete($id){
        $internship = \App\Internship::where('id', $id)->first();

        $user = session()->get('user');
        if ($user->id != $internship->company_id) {
            return redirect("/companies/".$internship->company_id."?internship=list");
        }

        $company_id = $internship->company_id;
        $internship->delete();
            
        return redirect("/companies/$company_id?internship=list")->with('success', 'Internship successfully deleted!');
    }

    public function isApplied($id) {
        $apply = \App\StudentInternship::where([
            ['internship_id', $id],
            ['student_id', session()->get('user')->id]
        ])->first();

        if ($apply == null) {
            return false;
        }
        return true;
    }

    public function isStudent($user) {
        if ($user->type != "student") {
            return false;
        }
        return true;
    }

    public function apply($id) {
        $user = session()->get('user');
        if (!$this->isStudent($user)) {
            return redirect("/internships/$id")->with('error', "A company can't apply for an internship");
        }

        if ($this->isApplied($id)) {
            return redirect("/internships/$id")->with('error', 'You already applied for this internship!');
        }

        $internship = new \App\StudentInternship();
        $internship->student_id = $user->id;
        $internship->internship_id = $id;
        $internship->company_id = \App\Internship::where('id', $id)->first()->company_id;
        $internship->save();

        return redirect("/internships/$id")->with('success', 'Successfully applied for internship!');
    }

    public function removeApply($id) {
        $user = session()->get('user');
        if (!$this->isStudent($user)) {
            return redirect("/internships/$id")->with('error', "A company can't remove an apply for an internship");
        }

        if (!$this->isApplied($id)) {
            return redirect("/internships/$id")->with('error', "You didn't apply for this internship!");
        }

        $internship = \App\StudentInternship::where([
            ['internship_id', $id],
            ['student_id', session()->get('user')->id]
        ])->first();
        $internship->delete();

        return redirect("/internships/$id")->with('success', 'Successfully removed apply for internship!');
    }

    public function getTags(Request $request){

        $data = \App\Tag::select("name")->where("name","LIKE", '%'.$request->msg.'%')->get();
        
        

        if(!empty($request->tags)){
            $dataCount = 0;
            foreach($data as $tag){
                foreach($request->tags as $tagSelected ){
                    if($tag->name == $tagSelected){
                        $data->forget($dataCount);
                        
                        break;
                    }
                }
                $dataCount++;
            }
        }
        
        if(empty($request->msg)){
            $data = "";
        }
        return response()->json($data);
    public function status($id) {
        $student = $_GET["student"];
        $status = $_GET["status"];
        if (!empty($student) && !empty($status)) {
            $request = \App\StudentInternship::where([
                ['internship_id', $id],
                ['student_id', $student]
            ])->first();

            if ($status == "accept") {
                $state = 1;
                $status = $status."ed";
            } else {
                $state = 2;
                $status = $status."d";
            }

            $request->status = $state;
            $request->save();
            return redirect("/")->with('success', 'You successfully '.$status.' te request!');
        }
        return redirect("/")->with('error', 'Something went wrong!');
    }
}
