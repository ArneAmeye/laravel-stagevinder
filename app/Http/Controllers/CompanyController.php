<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use App\Rules\Space;
use Auth;
use Session;

class CompanyController extends Controller
{
    public static function handleRegister(Request $request, int $lastInsertedId)
    {
        $company = new \App\Company();
        $company->user_id = $lastInsertedId;
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->password = $request->input('password');
        $company->save();

        return $company;
    }

    public static function handleLogin(Request $request, $data) {
        $data['company']['type'] = 'company';
        Session::put('user', $data['company']);
        $name = $data['company']->name;

        return $name;
    }

    public function index()
    {
        $data['companies'] = \App\Company::get();

        return view('companies/index', $data);
    }

    public function show($company)
    {
        $data['company'] = \App\Company::find($company)->where('id', $company)->first();
        $data['user'] = \App\User::find($data['company']->user_id)->where('id', $data['company']->user_id)->first();
        $data['current'] = auth()->user()->id;

        if (!empty($_GET['edit'])) {
            $id = session()->get("user")->id;
            if ($id != $company) {
                return redirect("/companies/$company");
            }
            $data['edit'] = $_GET['edit'];
        } else {
            $data['edit'] = '';
        }

        return view('companies/show', $data);
    }

    public function update($id, Request $request)
    {
        $company = \App\Company::where('id', $id)->first();
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'sector' => 'required',
            'ceo' => ['required', new Space],
            'street' => 'required',
            'city' => 'required',
            'postal' => 'required',
            'email' => 'required|email|unique:users,email,'.$company->user_id,
            'manager' => ['string', new Space],
            'linkedIn' => 'url|nullable',
            'website' => 'url|nullable',
            'bio' => 'string',
        ]);

        if ($validation->fails()) {
            return redirect("companies/$id?edit=details")->withErrors($validation);
        } else {
            $user = \App\User::where('id', $company->user_id)->first();
            $ceo_name = explode(' ', $request->input('ceo'), 2);
            $manager_name = explode(' ', $request->input('manager'), 2);
            $city = explode(' ', $request->input('city'), 2);
            $company->name = $request->input('name');
            $company->field_sector = $request->input('sector');
            $company->CEO_firstname = $ceo_name[0];
            $company->CEO_lastname = $ceo_name[1];
            $company->street_and_number = $request->input('street');
            $company->zip_code = $request->input('postal');
            $company->city = $request->input('city');
            $company->manager_firstname = $manager_name[0];
            $company->manager_lastname = $manager_name[1];
            $company->mobile_number = $request->input('number');
            $company->website = $request->input('website');
            $company->linkedIn = $request->input('linkedIn');
            $company->bio = $request->input('bio');
            $user->email = $request->input('email');
            $company->save();
            $user->save();

            return redirect("/companies/$id")->with('success', 'Company detials has been updated!');
        }
    }
}
