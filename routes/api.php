<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group([

    'middleware' => 'api'

], function ($router) {

    Route::post('login', 'AuthAPIController@login');
    Route::post('logout', 'AuthAPIController@logout');
    Route::post('refresh', 'AuthAPIController@refresh');
    Route::post('me', 'AuthAPIController@me');


});

Route::group(['middleware' => 'jwt.auth'],function(){

	Route::get('cek', 'AbsensiAPIController@cekLokasi');

	Route::get('absenCek', 'AbsensiAPIController@cekAbsen');

	//Tidak ada
	Route::post('createAbsen', 'AbsensiAPIController@createAbsen');

	Route::get('getUpdate', 'AbsensiAPIController@getUpdate');

    Route::resource('karyawans', 'KaryawanAPIController');

    Route::resource('absensis', 'AbsensiAPIController');

	Route::resource('agamas', 'AgamaAPIController');

	

	

	Route::resource('levels', 'LevelAPIController');

	Route::resource('name_positions', 'NamePositionAPIController');

	Route::resource('sektors', 'SektorAPIController');

	Route::resource('statuses', 'StatusAPIController');

	Route::resource('units', 'UnitAPIController');

	Route::resource('users', 'UserAPIController');

	

	

    Route::post('recognition', 'AbsensiAPIController@faceRecognition');

    Route::get('jamAbsen', 'AbsensiAPIController@jadwalAbsen');
});



