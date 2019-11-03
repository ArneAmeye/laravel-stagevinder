<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class BehanceApiController extends Controller
{
    //Method to retrieve a users access token (oAuth)
    public function getAccessToken(){
        
        // 1. Retrieve the token from the URL ?code= param
        // 2. CLIENT_ID & CLIENT_SECRET from .env file
        // 3. POST req to: https://dribbble.com/oauth/token?client_id=CLIENT_ID&client_secret=CLIENT_SECRET&code=COPIED_CODE
        // 4. save the "access_token" from response to the student in DB

    }

    //Make Foursquare API request with Guzzle!
    public function getDribbblefolio() {

        //Get the student's Dribbble username and accessToken
        $student = \App\Student::where('id', $id)->first();
        $dribbbleUsername = $student->dribbble;
        $accessToken = $student->dribbble_access_token;

        //Base URL of API
        $base_url = "https://api.dribbble.com/v2/";

        //build the API url
        $api_dribble_user_url = $base_url . $dribbbleUsername . "/shots?" . $accessToken;

        //Setup Guzzle Client
        $client = new Client();

        //Do the actual API request over Guzzle
        $result = $client->request('GET', $api__user_projects_url, $params)->getBody();
        
        //Return $result in JSON format to ajax.js
        $result = json_decode($result);
        return response()->json($result);
        
     }
}
