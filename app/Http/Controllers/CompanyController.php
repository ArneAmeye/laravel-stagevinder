<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Auth;

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
            $data['edit'] = $_GET['edit'];
        } else {
            $data['edit'] = '';
        }

        return view('companies/show', $data);
    }

    public function getCompanyData()
    {
        //Start new Guzzle client -> Used for fetching API data
        $client = new Client();

        //parameters from frontend needed for Foursquare API request
        $location = 'Brussels, BE'; //replace with user input from frontend!
        $companyName = 'panos'; //replace with user input from frontend!

        //start up API GET request for a company near the given location
        $result = $client->request('GET', 'https://api.foursquare.com/v2/venues/search', [
            'query' => [
                'client_id' => env('FOURSQUARE_CLIENT_ID'),
                'client_secret' => env('FOURSQUARE_SECRET_ID'),
                'v' => '20191009',
                'near' => $location,
                'query' => $companyName,
                'limit' => 1,
            ],
        ]);
        if ($result->getStatusCode() == 200) {
            //Response from API is succesful, proceed with data!
            $data['body'] = (array) $result->getBody();

            return view('companies/add', $data);
        } else {
            //Response from API has ERROR, show error output!
            $data['errorCode'] = (string) $result->getStatusCode();
            $data['ErrorPhrase'] = (string) $result->getReasonPhrase();

            return view('companies/add', $data);
        }
    }

    public function update($id, Request $request)
    {
        $company = \App\Company::where('id', $id)->first();
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'sector' => 'required',
            'ceo' => 'required',
            'street' => 'required',
            'city' => 'required',
            'email' => 'required|email|unique:users,email,'.$company->user_id,
            'manager' => 'string',
            'linkedIn' => 'url|nullable',
            'website' => 'url',
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
            $company->zip_code = $city[0];
            $company->city = $city[1];
            $company->manager_firstname = $manager_name[0];
            $company->manager_lastname = $manager_name[1];
            $company->mobile_number = $request->input('number');
            $company->website = $request->input('website');
            $company->linkedIn = $request->input('linkedIn');
            // $company->profile_picture = $request->input('profile_picture');
            // $company->background_picture = $request->input('background_picture');
            $company->bio = $request->input('bio');
            $user->email = $request->input('email');
            $company->save();
            $user->save();

            return redirect("/companies/$id")->with('success', 'Company detials has been updated!');
        }
    }
}
