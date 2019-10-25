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

Route::get('/','SiteController@home');
Route::get('/dataSiswa','SiteController@dataSiswa');
//profiles pages
Route::get('/profile/sejarah-singkat','ProfilesController@sejarah');
Route::get('/profile/visi-misi','ProfilesController@visi');
Route::get('/profile/kepala-sekolah','ProfilesController@kepala');
Route::get('/profile/struktur-organisasi','ProfilesController@organisasi');
Route::get('/profile/prestasi-sekolah','ProfilesController@prestasi');
//Jurusan Pages
Route::get('/keahlian/rekayasa-perankat-lunak','JurusanController@rpl');
Route::get('/keahlian/geologi-pertambangan','JurusanController@gp');
Route::get('/keahlian/teknik-komputer-jaringan','JurusanController@tkj');
Route::get('/keahlian/pengelolaan-migas-petrokmia','JurusanController@tpmp');
Route::get('/keahlian/teknik-kendaraan-ringan','JurusanController@tkr');
Route::get('/keahlian/usaha-perjalanan-wisata','JurusanController@upw');
Route::get('/keahlian/multimedia','JurusanController@mm');
Route::get('/keahlian/teknik-elektronika-industri','JurusanController@tein');

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware'=>'auth'], function(){
	Route::get('/dashboard','DashboardController@index');
	Route::get('/siswa','SiswaController@index');
	Route::post('/siswa/create','SiswaController@create');
	Route::get('/siswa/{id}/edit','SiswaController@edit');
	Route::post('/siswa/{id}/update','SiswaController@update');
	Route::get('/siswa/{id}/delete','SiswaController@delete');
	Route::get('/siswa/{id}/profile','SiswaController@profile');
});
	
