<?php
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


Route::get('/login', function () {
    return view('login');
 
})->name('login');

Route::get('/terms',function() {
    return view('terms');
});

Route::get('/register', function () {
    return view('register');
})->name('register_page');

//Route::get('/register' , 'RegisterController@index');

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

//Route::get('/owner', 'OwnerController@index')->middleware('auth');
//Route::get('/ownerdetails', 'OwnerController@showDetails')->middleware('auth');
Route::get('/owner', 'OwnerController@index');
Route::get('/ownerdetails', 'OwnerController@showDetails');
Route::post('/createowner' , 'OwnerController@createowner');
Route::get('/getOwnerData' , 'OwnerController@getOwnerData');
Route::get('/deleteOwner','OwnerController@deleteOwner');//->middleware('auth');
Route::post('/searchOwner', 'OwnerController@searchOwner');
Route::get('/getCounties' , 'OwnerController@getCounties');
Route::post('/createOwnerContact','OwnerController@createOwnerContact');
Route::get('/deleteOwnerContact', 'OwnerController@deleteOwnerContact');
Route::get('/getOwnerContactData' , 'OwnerController@getOwnerContactData');

Route::post('/createOwnerDoc' , 'OwnerDocController@createOwnerDoc');
Route::get('viewfile','OwnerDocController@viewfile');
Route::get('/getOwnerDocData' , 'OwnerDocController@getOwnerDocData');
Route::get('/deleteOwnerDoc' , 'OwnerDocController@deleteOwnerDoc');

Route::post('/createOwnerNotes', 'OwnerNotesController@createOwnerNotes');
Route::get('/getOwnerNotesData' , 'OwnerNotesController@getOwnerNotesData');
Route::get('/deleteOwnerNotes' , 'OwnerNotesController@deleteOwnerNotes');

Route::post('/createOwnerTrack' , 'OwnerTrackController@createOwnerTrack');
Route::get('/deleteOwnerTrack' , 'OwnerTrackController@deleteOwnerTrack');
Route::get('/getOwnerTrackData' , 'OwnerTrackController@getOwnerTrackData');

Route::get('/county', 'CountyController@index');//->middleware('auth');
Route::post('/searchCounty' , 'CountyController@searchCounty');
Route::get('/getCountyDetails' , 'CountyController@getCountyDetails');
Route::post('/createCountyContact' , 'CountyController@createCountyContact');
Route::get('/getCountyContactData','CountyController@getCountyContactData');
Route::get('/deleteCountyContact' , 'CountyController@deleteCountyContact');
Route::post('/createCountyNotes', 'CountyController@createCountyNotes');
Route::get('/getCountyNotesData', 'CountyController@getCountyNotesData');
Route::get('/deleteCountyNotes','CountyController@deleteCountyNotes');
Route::post('/createCountyDoc', 'CountyController@createCountyDoc');
Route::get('/getCountyDocData','CountyController@getCountyDocData');
Route::get('/deleteCountyDoc','CountyController@deleteCountyDoc');

Route::get('/state', 'StateController@index');//->middleware('auth');
Route::post('/searchState' , 'StateController@searchState');
Route::get('/getStateDetails' , 'StateController@getStateDetails');
Route::post('/createStateNotes', 'StateController@createStateNotes');
Route::get('/getStateNotesData', 'StateController@getStateNotesData');
Route::get('/deleteStateNotes','StateController@deleteStateNotes');
Route::post('/createStateDoc', 'StateController@createStateDoc');
Route::get('/getStateDocData','StateController@getStateDocData');
Route::get('/deleteStateDoc','StateController@deleteStateDoc');

Route::get('/document' , 'DocumentController@index');//->middleware('auth');
Route::post('/searchDocument' , 'DocumentController@searchDocument');

Route::get('/admin' , 'AdminController@index')->middleware('auth');
Route::post('/create_sub_user' , 'AdminController@create_sub_user')->middleware('auth');

Route::get('autocomplete', 'AutocompleteController@states');






