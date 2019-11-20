<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Internship;
/*
use App\Students;
use App\Company;
use App\ReviewInternship;
use App\ReviewCompany;
*/
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $error = ['error' => 'No results found, please try with different keywords.'];

        if ($request->has('q')) {
            $users = User::search($request->get('q'))->get();
            //$internships = Internship::search($request->get('q'))->get();
            /*$applications;*/

            /*$results = [
                'users' => '{$users}',
                /*'internships' => '{$internships}',*/
            /*"applications" => ...*/
            //];

            /*$arr = array();
            $arrUsers = ['users' => '{$users}'];
            $arr = array_push($arrUsers);
            $resultsUsers = $results['users'];
            array($resultsUsers, $users);*/

            return $users->count() ? $users : $error;
            //return sizeof($results, 1) ? $results : $error;
        }

        return $error;
    }
}
