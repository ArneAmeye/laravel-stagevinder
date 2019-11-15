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

Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

Route::get('/privacy', 'PrivacyController@index');

Route::get('/login', 'UserController@login');
Route::get('login', ['as' => 'login', 'uses' => 'UserController@login']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'UserController@handleLogin']);

Route::get('/register', 'UserController@register');
Route::get('register', ['as' => 'register', 'uses' => 'UserController@register']);
Route::post('/register', ['as' => 'user.register', 'uses' => 'UserController@handleRegister']);

Route::get('/logout', ['as' => 'user.logout', 'uses' => 'UserController@logout']);

Route::get('/students', 'StudentController@index');
Route::patch('/students/{student}', ['as' => 'student.update', 'uses' => 'StudentController@update']);
Route::get('/students/{student}', 'StudentController@show');

Route::get('/companies', 'CompanyController@index');
Route::post('/getcompanydetails', 'FoursquareApiController@getCompanyDetails');
Route::get('/companies/add', 'CompanyController@getCompanyData'); //Route for a page where a company can be added via API lookup
Route::patch('/companies/{company}',  ['as' => 'company.update', 'uses' => 'CompanyController@update']);
Route::get('/companies/{company}', 'CompanyController@show');


Route::get('/internships', 'InternshipController@index');
Route::get('/internships/{internship}', 'InternshipController@show');
Route::post('/companies/{company}',  ['as' => 'internship.create', 'uses' => 'InternshipController@create']);
Route::patch('/internships/{internship}', ['as' => 'internship.update', 'uses' => 'InternshipController@update']);
Route::delete('/companies/{company}', ['as' => 'internship.delete', 'uses' => 'InternshipController@delete']);

Route::get('/upload', 'UploadController@index');
Route::get('upload', ['as' => 'upload', 'uses' => 'UploadController@index']);
Route::patch('/upload', ['as' => 'upload.one', 'uses' => 'UploadController@updateOne']);

//Socialite (Facebook) routes
Route::get('/fb-login', 'SocialAuthFacebookController@redirectToProvider');
Route::get('/callback', 'SocialAuthFacebookController@handleProviderCallback');

//Dribbble portfolio routes
Route::get('/dribbble-callback', 'DribbbleApiController@getAccessToken');
Route::get('/dribbble-get', 'DribbbleApiController@getDribbblePortfolio');