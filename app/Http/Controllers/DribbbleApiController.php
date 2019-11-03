<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Session;

class DribbbleApiController extends Controller
{
    //Method to retrieve a users access token (oAuth)
    public function getAccessToken(){
        
        //Retrieve the token from the URL ?code= param
        $code = $request->query('code');

        //Setup Guzzle Client and params
        $client = new Client();
        $params = [
            'query' => [
                'client_id' => env('DRIBBBLE_CLIENT_ID'),
                'client_secret' => env('DRIBBBLE_SECRET_ID'),
                'code' => $code
            ]
        ];

        //Do the actual Token request over Guzzle
        $result = $client->request('POST', "https://dribbble.com/oauth/token", $params)->getBody();

        //Save "access_token"
        $result = json_decode($result, true);
        Session::get('user')->id;
        $student = \App\Student::where('id', $id)->first();
        $student->dribbble_access_token = $result['access_token'];

        //Should also get the dribble authenticated user with Guzzle and save it, this ensures a right username in the API requests!
        $client2 = new Client();
        $result = $client2->request('GET', 'https://api.dribbble.com/v2/user')->getBody();
        $result = json_decode($result, true);
        Session::get('user')->id;
        $student = \App\Student::where('id', $id)->first();
        $student->dribbble = $result['login']; //login in the response is the actual username for login
        $student->save();


        //Redirect to retrieve the Dribbble portfolio the first time after this authorization
        redirect("/dribbble-get");

    }

    //Make Foursquare API request with Guzzle!
    public function getDribbblePortfolio() {

        //Get the student's Dribbble username and accessToken
        $student = \App\Student::where('id', $id)->first();
        $dribbbleUsername = $student->dribbble;
        $accessToken = $student->dribbble_access_token;

        //Base URL of API
        $base_url = "https://api.dribbble.com/v2/";

        //build the API url
        $api_dribble_user_url = $base_url . $dribbbleUsername . "/shots?access_token=" . $accessToken;

        //Setup Guzzle Client
        $client = new Client();

        //Do the actual API request over Guzzle
        $result = $client->request('GET', $api_dribble_user_url)->getBody();
        
        //Save the $result in JSON to the student in the DB
        $result = json_decode($result);
        $student->dribbble_api_result = json($result);
        $student->save();

        //Redirect back to the students profile
        redirect("/students" . "/" . $student->id);
        
     }
}
