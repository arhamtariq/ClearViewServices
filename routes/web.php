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

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus'));

Route::post('dologin','userController@dologin')->middleware('unsubribePackageCheck');
Route::get('logout','userController@logout');
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
Route::get('/owner', 'OwnerController@index')->middleware('auth');
Route::get('/ownerdetails', 'OwnerController@showDetails')->middleware('auth');
Route::post('/createowner' , 'OwnerController@createowner')->middleware('auth');
Route::get('/getOwnerData' , 'OwnerController@getOwnerData')->middleware('auth');
Route::get('/deleteOwner','OwnerController@deleteOwner')->middleware('auth');
Route::post('/searchOwner', 'OwnerController@searchOwner')->middleware('auth');
Route::get('/getCounties' , 'OwnerController@getCounties')->middleware('auth');
Route::post('/createOwnerContact','OwnerController@createOwnerContact')->middleware('auth');
Route::get('/deleteOwnerContact', 'OwnerController@deleteOwnerContact')->middleware('auth');
Route::get('/getOwnerContactData' , 'OwnerController@getOwnerContactData')->middleware('auth');

Route::post('/createOwnerDoc' , 'OwnerDocController@createOwnerDoc')->middleware('auth');
Route::get('viewfile','OwnerDocController@viewfile')->middleware('auth');
Route::get('/getOwnerDocData' , 'OwnerDocController@getOwnerDocData')->middleware('auth');
Route::get('/deleteOwnerDoc' , 'OwnerDocController@deleteOwnerDoc')->middleware('auth');

Route::post('/createOwnerNotes', 'OwnerNotesController@createOwnerNotes')->middleware('auth');
Route::get('/getOwnerNotesData' , 'OwnerNotesController@getOwnerNotesData')->middleware('auth');
Route::get('/deleteOwnerNotes' , 'OwnerNotesController@deleteOwnerNotes')->middleware('auth');

Route::post('/createOwnerTrack' , 'OwnerTrackController@createOwnerTrack')->middleware('auth');
Route::get('/deleteOwnerTrack' , 'OwnerTrackController@deleteOwnerTrack')->middleware('auth');
Route::get('/getOwnerTrackData' , 'OwnerTrackController@getOwnerTrackData')->middleware('auth');

Route::get('/county', 'CountyController@index')->middleware('auth');
Route::post('/searchCounty' , 'CountyController@searchCounty')->middleware('auth');
Route::get('/getCountyDetails' , 'CountyController@getCountyDetails')->middleware('auth');
Route::post('/createCountyContact' , 'CountyController@createCountyContact')->middleware('auth');
Route::get('/getCountyContactData','CountyController@getCountyContactData')->middleware('auth');
Route::get('/deleteCountyContact' , 'CountyController@deleteCountyContact')->middleware('auth');
Route::post('/createCountyNotes', 'CountyController@createCountyNotes')->middleware('auth');
Route::get('/getCountyNotesData', 'CountyController@getCountyNotesData')->middleware('auth');
Route::get('/deleteCountyNotes','CountyController@deleteCountyNotes')->middleware('auth');
Route::post('/createCountyDoc', 'CountyController@createCountyDoc')->middleware('auth');
Route::get('/getCountyDocData','CountyController@getCountyDocData')->middleware('auth');
Route::get('/deleteCountyDoc','CountyController@deleteCountyDoc')->middleware('auth');

Route::get('/state', 'StateController@index')->middleware('auth');
Route::post('/searchState' , 'StateController@searchState')->middleware('auth');
Route::get('/getStateDetails' , 'StateController@getStateDetails')->middleware('auth');
Route::post('/createStateNotes', 'StateController@createStateNotes')->middleware('auth');
Route::get('/getStateNotesData', 'StateController@getStateNotesData')->middleware('auth');
Route::get('/deleteStateNotes','StateController@deleteStateNotes')->middleware('auth');
Route::post('/createStateDoc', 'StateController@createStateDoc')->middleware('auth');
Route::get('/getStateDocData','StateController@getStateDocData')->middleware('auth');
Route::get('/deleteStateDoc','StateController@deleteStateDoc')->middleware('auth');
Route::get('/getWorkableDetails' , 'StateController@getWorkableDetails')->middleware('auth');

Route::get('/document' , 'DocumentController@index')->middleware('auth');
Route::post('/searchDocument' , 'DocumentController@searchDocument')->middleware('auth');

Route::get('/admin' , 'AdminController@index')->middleware('auth')->middleware('auth');
Route::post('/create_sub_user' , 'AdminController@create_sub_user')->middleware('auth')->middleware('auth');

Route::get('autocomplete', 'AutocompleteController@states')->middleware('auth');

Route::get('removeUser', 'AdminController@removeUser')->middleware('auth');
Route::get('adminUsers', 'AdminController@adminUsers')->middleware('auth');
Route::post('update_sub_user', 'AdminController@update_sub_user')->middleware('auth');
Route::get('profile', 'userController@profile')->middleware('auth');
Route::post('updatePackageStatus', 'userController@updatePackageStatus')->middleware('auth');








