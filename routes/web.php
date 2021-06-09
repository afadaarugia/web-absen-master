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

/*Route::get('/', function () {
    return view('');
});*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/about', function(){
	return View::make('about');
});
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login');
Route::post('/logout','Auth\LoginController@logout');

//absensi Route
Route::get('/rekap', 'AbsensiController@Rekap')->name('absensis.rekap');
Route::resource('absensis', 'AbsensiController');
Route::get('/export', 'AbsensiController@export')->name('absensis.export');

Route::group(['middleware' => 'auth'],function(){

	Route::get('/home', 'HomeController@index')->name('home');

	//karyawan Route
	Route::get('/person', 'KaryawanController@Person')->name('karyawans.person');

	Route::get('/download', 'KaryawanController@export_image')->name('karyawans.export_image');


	Route::group(['middleware' => 'akses'],function(){

			Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');

			Route::post('/register','Auth\RegisterController@register');

			Route::resource('levels', 'LevelController');

			Route::resource('namePositions', 'NamePositionController');

			Route::resource('units', 'UnitController');

			Route::resource('sektors', 'SektorController');

			Route::resource('statuses', 'StatusController');
			
			Route::resource('agamas', 'AgamaController');	

			Route::resource('users', 'UserController');

			Route::resource('karyawans', 'KaryawanController');
			Route::get('/exportkaryawan', 'App\Http\Controllers\KaryawanController@export')->name('karyawans.export');


			Route::get('/dbkaryawan', 'KaryawanController@export')->name('karyawans.export');
			Route::post('/import', 'KaryawanController@import')->name('karyawans.import');

			Route::post('/usersimport', 'UserController@import')->name('users.import');

			Route::resource('namePositions', 'NamePositionController');
			
			Route::get('/dowdatagaji', 'PenggajianController@export')->name('penggajians.export');
			Route::post('/penggajianImport', 'PenggajianController@import')->name('penggajian.import');

            Route::resource('fotoRecognitions', 'FotoRecognitionController');

            Route::resource('jamKerjas', 'JamKerjaController');
    });

});
