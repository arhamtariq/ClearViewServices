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

Route::any('/task', 'WelcomeController@index')->middleware('auth')->name('task');
Route::get('/getUsersForAssigning', 'WelcomeController@getUsersForAssigning');

Route::post('/create','userController@create');

Route::post('/createTask','TasksController@createTask')->middleware('auth');
Route::get('/deleteTask','TasksController@deleteTask')->middleware('auth');
Route::get('/getTaskData','TasksController@getTaskData')->middleware('auth');
Route::get('/getAssigneeName','TasksController@getAssigneeName')->middleware('auth');
Route::post('/updateTask','TasksController@updateTask')->middleware('auth');

Route::get('/getTrailStatus','userController@getTrailStatus')->middleware('auth');
Route::get('/owner', 'OwnerController@index');
Route::get('/ownerdetails', 'OwnerController@showDetails');
Route::get('/county', 'CountyController@index');
Route::get('/document' , 'DocumentController@index');
Route::get('/admin' , 'AdminController@index');





