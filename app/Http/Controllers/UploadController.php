<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function updateOne(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validation->fails()) {
            return redirect()->route('upload')
                ->withErrors($validation);
        }

        $dirs = [
            'students' => [
                'profile' => '/images/students/profile_picture',
                'background' => '/images/students/background_picture',
            ],
            'companies' => [
                'profile' => '/images/companies/profile_picture',
                'background' => '/images/companies/background_picture',
            ],
        ];

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($dirs[$request->q][$request->edit]);
            $image->move($destinationPath, $name);
            $this->uploadUser($name, $request);
        }

        return redirect('/'.$request->q.'/'.session()->get('user')->id)->with('success', 'Image uploaded successfully.');
    }

    private static function uploadUser($name, $request)
    {
        $currentUser = session()->get('user');

        if ($request->q == 'students') {
            $user = \App\Student::where('id', $currentUser->id)->first();
        }

        if ($request->q == 'companies') {
            $user = \App\Company::where('id', $currentUser->id)->first();
        }

        $field = $request->edit.'_picture';
        $user->$field = $name;
        $user->save();
    }
}
