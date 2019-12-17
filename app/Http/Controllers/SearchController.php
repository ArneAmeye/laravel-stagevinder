<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Internship;

/*
use App\Students;
use App\Company;
use App\ReviewInternship;
use App\ReviewCompany;
*/

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['internships'] = Internship::get();

        return view('welcome', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function getSearchResults(Request $request)
    {
        $design = $request->get('design');
        $development = $request->get('development');
        $webdevelopment = $request->get('webdevelopment');
        $webdesign = $request->get('webdesign');

        $query = `{$design} & {$development} & {$webdevelopment} & {$webdesign}`;

        $client = new Client();

        $result = $client->request('GET', 'http://homestead.test/api/search?q=', $query)->getBody();

        $result = json_decode($result);

        return response()->json($result);
    }
}
