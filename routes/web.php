<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/students', 'StudentController@index');
Route::patch('/students/{student}',  ['as' => 'student.update', 'uses' => 'StudentController@update']);
Route::get('/students/{student}', 'StudentController@show');

Route::get('/companies', 'CompanyController@index');
Route::get('/companies/{company}', 'CompanyController@show');

Route::get('/internships', 'InternshipController@index');
Route::get('/internships/{intership}', 'InternshipController@show');

//Socialite (Facebook) routes
Route::get('/fb-login', 'SocialAuthFacebookController@redirectToProvider');
Route::get('/callback', 'SocialAuthFacebookController@handleProviderCallback');
