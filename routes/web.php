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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('devices', 'devicesController')->middleware('verified');

Route::resource('deviceData', 'device_dataController')->middleware('verified');

Route::resource('deviceDataCategories', 'device_data_categoriesController')->middleware('verified');

Route::resource('deviceCommands', 'device_commandController')->middleware('verified');

Route::resource('botUsers', 'bot_usersController')->middleware('verified');

Route::resource('botUsersPairDevices', 'bot_users_pair_devicesController')->middleware('verified');

Route::resource('accountTypes', 'account_typesController')->middleware('verified');