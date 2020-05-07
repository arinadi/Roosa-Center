<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('devices', 'devicesAPIController');

Route::resource('device_data', 'device_dataAPIController');

Route::resource('device_data_categories', 'device_data_categoriesAPIController');

Route::resource('device_commands', 'device_commandAPIController');

Route::resource('bot_users', 'bot_usersAPIController');

Route::resource('bot_users_pair_devices', 'bot_users_pair_devicesAPIController');

Route::resource('account_types', 'account_typesAPIController');