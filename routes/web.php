<?php

use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/send-mail2', 'EmailTemplateController@send_mail');


Route::get('/send-mail', function () {
    $order = 3;
    Mail::to('shinigamii.hikaru@gmail.com')->send(new EmailNotification());
    return 'A message has been sent to by ngocthanh06!';
});
