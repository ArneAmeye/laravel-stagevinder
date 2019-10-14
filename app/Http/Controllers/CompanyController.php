<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Auth;

class CompanyController extends Controller
{
    public static function handleRegister(Request $request)
    {
        $company = new \App\Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->password = Hash::make($request->input('password'));
        $company->save();
    }

    public static function handleLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect('index');
        }
    }

    public function index()
    {
        return view('companies/index');
    }

    public function show(\App\Company $company)
    {
        // belangrijk voor lars
        $data['company'] = \App\Company::where('id', $company)->first();

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
}
