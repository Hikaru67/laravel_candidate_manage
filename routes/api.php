<?php

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
    Route::resource('email-templates', 'EmailTemplateController');
    Route::resource('sources', 'SourceController');
    Route::resource('positions', 'PositionController');
    Route::resource('roles', 'RoleController')->except(['create', 'edit', 'delete']);
});
