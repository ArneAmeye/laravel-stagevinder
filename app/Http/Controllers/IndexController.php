<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['internships'] = \App\Internship::get();
        
        //add applied internships to data for homepage
        if(Session::has('user') and Session::get('user')->type == 'company'){
            $currentUserId = auth()->user()->id;
            $company = \App\Company::where('user_id', $currentUserId)->first();
            $data['applications'] = \App\StudentInternship::where('company_id', $company->id)->get();

        }elseif(Session::has('user') and Session::get('user')->type == 'student'){
            $currentUserId = auth()->user()->id;
            $student = \App\Student::where('user_id', $currentUserId)->first();
        
            $internships = collect();
            $tags = explode(" ", $student->tags);

            if($tags !== null){

                foreach($tags as $tag){
                    $internshipsByTag = \App\Internship::where('tags', 'LIKE', '%'.$tag.'%')->get();
                    foreach($internshipsByTag as $internship){
                        $internships->push($internship);
                    }
                
                }
                $data['internships'] = $internships->unique('id');
            }else{
                $data['internships'] = \App\Internship::all();
            }

            

           
            
            

            $data['applications'] = \App\StudentInternship::where('student_id', $student->id)->get();
        }


        //Add current company's internships (all) to data for company homepage
        if(Session::has('user') and Session::get('user')->type == 'company'){
            $currentUserId = auth()->user()->id;
            $company = \App\Company::where('user_id', $currentUserId)->first();
            $data['companyInternships'] = \App\Internship::where('company_id', $company->id)->get();
        }
        
        return View('index', $data);
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
}
