<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\StudentCompany;

class DistanceController extends Controller
{
    public function getLocation()
    {
        $distance = $this->checkDatabase($_GET["id"]);
        if ($distance != false) {
            $message = [
                "status" => "success",
                "data" => [
                    "distance" => $distance,
                    "saved" => true
                ]
            ];
            return response()->json($message);
        }

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

        $company = \App\Company::where('id', $_GET["id"])->first();

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
                "key" => env('MAPQUEST_KEY'),
                "saved" => false
    		]
    	];
        return response()->json($message);
    }

    public function addLocation(Request $request) {
        $studentCompany = \App\StudentCompany::where([
            ['company_id', $request->id],
            ['student_id', Session::get('user')->id]
        ])->first();

        if ($studentCompany != null) {
            $message = [
                "status" => "error",
            ];
            return response()->json($message);
        }

        $studentCompany = new StudentCompany();
        $studentCompany->student_id = Session::get('user')->id;
        $studentCompany->company_id = $request->id;
        $studentCompany->distance = $request->data;
        $studentCompany->save();

        $message = [
            "status" => "success",
        ];
        return response()->json($message);
    }

    private function checkDatabase($id) {
        $studentCompany = \App\StudentCompany::where('company_id', $id)->first();

        if ($studentCompany == null) {
            return false;
        }
        return $studentCompany->distance;
    }

    private function getError($message) {
        return $message = [
            "status" => "error",
            "data" => $message
        ];
    }
}