<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {return view('welcome');});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', function () {return view('welcome');});
    Route::get('auth/facebook', 'Auth\AuthFacebookController@redirectToProvider');
    Route::get('auth/facebook/callback', 'Auth\AuthFacebookController@handleProviderCallback');

    Route::get('/profile', 'UserController@getProfile')->middleware('auth');
    Route::put('/settings', 'UserController@postSettings')->middleware('auth');
    Route::get('/settings', 'UserController@getSettings')->middleware('auth');
    Route::get('/settings/{id}', 'AdminController@getSettingsUser')->middleware('admin');

    Route::get('/map', 'HomeController@index')->middleware('auth');

    Route::get('/console', 'AdminController@getConsole')->middleware('admin');
    Route::get('/api/users','AdminController@getUsers')->middleware('admin');
    Route::get('/usersConsole/{id}','AdminController@deleteUsersConsole')->middleware('admin');
    Route::get('/feedbacksConsole','AdminController@getFeedbacksConsole')->middleware('admin');
    Route::get('/pointsValidateConsole','AdminController@getPointsValidateConsole')->middleware('admin');
    Route::get('/pointsConsole','AdminController@getPointsConsole')->middleware('admin');
    Route::get('/validatePointConsole/{id}','AdminController@putValidatePoint')->middleware('admin');
    Route::get('/deletePointConsole/{id}','AdminController@deletePoint')->middleware('admin');
});
