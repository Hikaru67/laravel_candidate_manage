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
    Route::get('candidates', 'CandidateController@index');
    Route::get('candidates/{id}', 'CandidateController@show');
    Route::post('candidates', 'CandidateController@store');
    Route::put('candidates/{id}', 'CandidateController@update');
    Route::delete('candidates/{id}', 'CandidateController@delete');
});
