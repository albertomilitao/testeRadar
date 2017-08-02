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

Route::get('activities/getstatus/{status}', 'ActivityController@getstatus');
Route::get('activities/getsituation/{situation}', 'ActivityController@getsituation');

Route::resource('activities', 'ActivityController');

Route::get('/', function () {
	return redirect()->route('activities.index');
});