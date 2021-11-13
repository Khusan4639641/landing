<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/login','AuthController@login')->name('login');
Route::post('/auth','AuthController@auth');

Route::middleware(["auth", 'sendData'])->group(function () {
    Route::get('/', 'LandingController@index');
    Route::get('/post/{id}', 'LandingController@post');
    Route::get('/admin', 'HomeController@index');
    Route::get('/admin/activity/{id?}/{row?}', 'HomeController@activity');
    Route::get('/logout','AuthController@logout');
});

