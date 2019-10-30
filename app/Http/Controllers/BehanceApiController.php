<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class BehanceApiController extends Controller
{
    //Make Foursquare API request with Guzzle!
    public function getBehancePortfolio(Request $req) {

        //Get params back from the Axios get Request
        $behanceUsername = $req->get('behanceUsername');
        $prm2 = $req->get('');

        //Setup Guzzle Client and query params
        $client = new Client();

        $base_url = "https://api.behance.net/v2/users/";
        $params = [
            'query' => [
                'client_id' => env(''),
                'sort' => 'published_date',
                'time' => 'all'
            ]
        ];

        //build the API url
        $api__user_projects_url = $base_url . $behanceUsername . "/projects" ;

        //Do the actual API request over Guzzle
        $result = $client->request('GET', $api__user_projects_url, $params)->getBody();
        
        //Return $result in JSON format to ajax.js
        $result = json_decode($result);
        return response()->json($result);
        
     }
}
