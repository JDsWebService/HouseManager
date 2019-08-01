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

Route::get('/', 'PagesController@index')->name('index');

Auth::routes(['verify' => true]);

Route::middleware('verified', 'userdata', 'auth')->group(function () {

	Route::resource('houses', 'HousesController')->except('create', 'index');

	Route::resource('occupants', 'OccupantsController');

	Route::resource('rent', 'RentController')->except('show');

	Route::prefix('user')->name('user.')->group(function () {
		Route::get('/logs', 'User\LogsController@index')->name('logs');
		Route::get('/dashboard', 'User\DashboardController@index')->name('dashboard');
	});
	
});


