<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;

class StudentController extends Controller
{
    public static function handleRegister(Request $request, int $lastInsertedId)
    {
        $student = new \App\Student();
        $student->user_id = $lastInsertedId;
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->profile_picture = 'default.png';
        $student->background_picture = 'default.jpg';
        $student->save();

        return $student;
    }

    public static function handleLogin(Request $request, $data)
    {
        $data['student']['type'] = 'student';
        Session::put('user', $data['student']);
        $name = $data['student']->firstname.' '.$data['student']->lastname;

        return $name;
    }

    public function index()
    {
        $data['students'] = \App\Student::get();

        return view('students/index', $data);
    }

    public function show($student)
    {
        $data['student'] = \App\Student::find($student)->where('id', $student)->first();
        $data['user'] = \App\User::find($data['student']->user_id)->where('id', $data['student']->user_id)->first();
        $data['current'] = false;
        
        if (auth()->user() != null) {
            $data['current'] = auth()->user()->id;
        }

        if (!empty($_GET['edit']) && auth()->user() != null) {
            $id = session()->get('user')->id;
            if ($id != $student) {
                return redirect("/students/$student");
            }
            $data['edit'] = $_GET['edit'];
        } else {
            $data['edit'] = '';
        }

        return view('students/show', $data);
    }

    public function update($id, Request $request)
    {
        $user = session()->get('user');
        if ($user->id != $id) {
            return redirect("/students/$id");
        }

        if ($request->has('update_details')) {
            return $this->updateDetails($id, $request);
        }

        if ($request->has('update_bio')) {
            return $this->updateBio($id, $request);
        }

        if ($request->has('update_dribbble')){
            return $this->updateDribbble($id, $request);
        }

        return redirect("/students/$id")
                ->with('danger', 'Invalid request! Try again.');
    }

    private static function updateBio($id, Request $request)
    {
        $validation = Validator::make($request->all(), [
            'bio' => 'required|string',
        ]);

        if ($validation->fails()) {
            return redirect("/students/$id?edit=bio")
                ->withErrors($validation);
        }

        $student = \App\Student::where('id', $id)->first();

        $student->bio = $request->input('bio');

        $student->save();

        return redirect("/students/$id")
            ->with('success', 'Bio has been updated!');
    }

    private static function updateDribbble($id, Request $request)
    {
        //Authorize user, callback URL will be called after that, which then redirects to the DribbbleApiController.
        $dribble_client_id = env('DRIBBBLE_CLIENT_ID');
        return redirect('https://dribbble.com/oauth/authorize?client_id=' . $dribble_client_id);

    }

    private static function updateDetails($id, Request $request)
    {
        $student = \App\Student::with('user')->where('id', $id)->first();
        $validation = Validator::make($request->all(), [
            'username' => 'required|string',
            'profession' => 'required',
            'date' => 'required|before:'.date('Y-m-d').'|date',
            'linkedIn' => 'url|nullable',
            'website' => 'url|nullable',
            'email' => 'required|email|unique:users,email,'.$student->user_id,
        ]);
        if ($validation->fails()) {
            return redirect("/students/$id?edit=details")
                ->withErrors($validation)->withInput();
        }

        $user = \App\User::where('id', $student->user_id)->first();
        $username = explode(' ', $request->input('username'), 2);
        $student->firstname = $username[0];
        $student->lastname = $username[1];
        $student->birth_date = $request->input('date');
        $student->adress = $request->input('location');
        $student->mobile_number = $request->input('number');
        $student->linkedIn = $request->input('linkedIn');
        $student->skype = $request->input('skype');
        $student->website = $request->input('website');
        $student->field_study = $request->input('profession');
        $student->school = $request->input('school');
        $user->email = $request->input('email');
        $student->save();
        $user->save();

        return redirect("/students/$id")
            ->with('success', 'User detials has been updated!');
    }
}
