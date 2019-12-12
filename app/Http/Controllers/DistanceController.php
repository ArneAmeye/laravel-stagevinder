<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class DistanceController extends Controller
{
    public function getLocation()
    {
        $error = false;

        if (!\Auth::check()) {
            $message = $this->getError("User is not logged in!");
            $error = true;
        }

        if(Session::get('user')->type == 'company'){
            $message = $this->getError("The logged in user is a company!");

            $error = true;
        }

        if (Session::get('user')->adress == null) {
            $message = $this->getError("The adress is not filled in!");

            $error = true;
        }

        $internship = \App\Internship::where('id', $_GET["id"])->first();
        $company = \App\Company::where('id', $internship->company_id)->first();

        if ($company->street_and_number == null && $company->zip_code == null && $company->city == null) {
            $message = $this->getError("The adress is not filled in!");

            $error = true;
        }

        if ($error) {
            return response()->json($message);
        }

        $fromLocation = Session::get('user')->adress;
    	$toLocation = $company->street_and_number.", ".$company->zip_code." ".$company->city;

    	$message = [
    		"status" => "success",
    		"data" => [
    			"from" => $fromLocation."+BE",
    			"to" => $toLocation."+BE",
                "key" => env('MAPQUEST_KEY')
    		]
    	];
        return response()->json($message);
    }

    private function getError($message) {
        return $message = [
            "status" => "error",
            "data" => $message
        ];
    }
}