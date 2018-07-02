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
Route::get('/servicecheck','SecurityController@check');
Route::get('/servicelogout','SecurityController@logout');
Route::group(['middleware' => 'auth_josso'], function() {
	Route::get('/', "IndexController@index");
	Route::get('/penilaian/{no_pendaftaran}', "PenilaianController@detail");
	Route::post('/penilaian', "PenilaianController@save");
	Route::post('/ubah-penilaian', "PenilaianController@update");
});