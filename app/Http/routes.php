<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'loginController@loginScreen');

// account stuff...
Route::get('login', 'loginController@loginScreen');
Route::post('login', 'loginController@requestSession');

Route::get('logout', 'loginController@logout');

Route::get('register', 'registerController@view');
Route::post('register', 'registerController@requestAccount');

// another pages...
Route::get('control-panel', 'PermissionController@controlPanelScreen');

Route::get('checkin', 'PermissionController@checkinScreen');
Route::post('checkin', 'PermissionController@checkinSubmit');

Route::get('checkout', 'PermissionController@checkoutScreen');
// TODO: checkout backend

// testing stuff...
Route::post('json-test', 'TestControl@askJson');
// Route::get('json-test', 'TestControl@askJson');
Route::get('yay', 'TestControl@got_session');
Route::get('spam', 'TestController@spamToSession');
Route::get('script', 'TestController@script');

Route::get('notify', 'NotificationController@expired');



Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
]);
