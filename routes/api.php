<?php

use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::get('candidates-profiles', 'CandidateProfileController@index');
    Route::get('candidates-profiles/{id}', 'CandidateProfileController@show');
    Route::post('candidates-profiles', 'CandidateProfileController@store');
    Route::put('candidates-profiles/{id}', 'CandidateProfileController@update');
    Route::delete('candidates-profiles/{id}', 'CandidateProfileController@delete');
});

Route::middleware('api')->group(function (){
    Route::apiResource('email-templates', 'EmailTemplateController')->except(['delete']);
    Route::delete('email-templates/{id}', 'EmailTemplateController@delete');
    Route::resource('sources', 'SourceController');
    Route::resource('positions', 'PositionController');
    Route::resource('roles', 'RoleController')->except(['create', 'edit', 'delete']);
});

/*Route::group(['prefix' => 'api', 'as' => 'api.', 'middleware' => 'cors'], function () {
    Route::get('api/email-templates', 'EmailTemplateController@index');
});*/

Route::group(['middleware' => 'jwt.auth', 'prefix' => 'auth'], function () {
    Route::get('api/email-templates', 'EmailTemplateController@index');
    Route::get('logout', 'AuthController@logout');
});

Route::group(['namespace' => '\App\Http\Controllers',  ], function(){
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout');

    Route::get('user', 'AuthController@user');
    Route::get('/send-mail', function () {
        Mail::to('shinigamii.hikaru@gmail.com')->send(new EmailNotification());
        return 'A message has been sent to by ngocthanh06!';
    });
});

