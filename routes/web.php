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

Route::get('/login', function () {
    return view('login');
 
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register_page');
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus'));

Route::post('dologin','userController@dologin');
Route::get('forgotPasswordRequest','userController@forgotPasswordRequest');
Route::post('resetPasswordRequest','userController@resetPasswordRequest');
Route::get('resetPasswordLink','userController@resetPasswordLink');
Route::post('setNewPassword','userController@setNewPassword');
Route::get('resetPasswordLink','userController@resetPasswordLink');
Route::get('ActiveUser','userController@ActiveUser');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/welcome', 'WelcomeController@index')->middleware('auth')->name('welcome');
Route::get('/getUsersForAssigning', 'WelcomeController@getUsersForAssigning');

Route::post('/create','userController@create');




