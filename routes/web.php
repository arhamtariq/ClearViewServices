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

Route::get('/', function () {
    return view('login');
})->name('login_page');

Route::post('dologin','userController@dologin');
Route::get('forgotPasswordRequest','userController@forgotPasswordRequest');
Route::post('resetPasswordRequest','userController@resetPasswordRequest');
Route::get('resetPasswordLink','userController@resetPasswordLink');
Route::post('setNewPassword','userController@setNewPassword');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/welcome', 'WelcomeController@index');




