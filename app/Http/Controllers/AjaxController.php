<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AjaxController extends Controller
{
    //Make Foursquare API request with Guzzle!
    public function getCompanyDetails(Request $req) {

        //Get params back from the Axios get Request
        $location = $req->get('businessLocation');
        $companyName = $req->get('businessName');

        $categoryIds = array('4d4b7104d754a06370d81259','4d4b7105d754a06372d81259','4d4b7105d754a06373d81259','4d4b7105d754a06374d81259','4d4b7105d754a06376d81259','4d4b7105d754a06377d81259','4d4b7105d754a06375d81259','4e67e38e036454776db1fb3a','4d4b7105d754a06378d81259','4d4b7105d754a06379d81259');
    
        //Setup Guzzle Client and query params
        $client = new Client();
        $params = [
            'query' => [
                'client_id' => env('FOURSQUARE_CLIENT_ID'),
                'client_secret' => env('FOURSQUARE_SECRET_ID'),
                'v' => "20181009",
                'near' => $location,
                'query' => $companyName,
                'categoryId' => $categoryIds,
                'limit' => 1
            ]
        ];

        //Do the actual API request over Guzzle
        $result = $client->request('GET', 'https://api.foursquare.com/v2/venues/search', $params)->getBody();
        
        //Return $result in JSON format to ajax.js
        $result = json_decode($result);
        return response()->json($result);
        
     }
}
