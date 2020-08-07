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
    return view('auth/login');
});
Route::get('reset', function (){
    Artisan::call('storage:link');
});
Route::get('config', function (){
    Artisan::call('config:cache');
});
Route::get('pengaduan/create', ['as' => 'pengaduan.create', 'uses' => 'PengaduanController@create']);
Route::post('pengaduan', ['as' => 'pengaduan.store', 'uses' => 'PengaduanController@store']);
Route::get('/refresh_captcha', 'Auth\RegisterController@refreshCaptcha')->name('refresh');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/pelaporan-chart-ajax', 'HomeController@pelaporanchartAjax');
Route::get('/pengaduan-chart-ajax', 'HomeController@pengaduanchartAjax');

Route::get('/mail', 'PelaporanController@mail');

Route::group(['middleware' => 'auth'], function () {
	//User
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::put('user/aktivasi/{id}', ['as' => 'user.aktivasi', 'uses' => 'UserController@aktivasi']);
	//Pelaporan
	Route::resource('pelaporan', 'PelaporanController', ['except' => ['show', 'destroy']]);
	Route::get('pelaporan/json','PelaporanController@json');
	Route::get('pelaporan/menu', ['as' => 'pelaporan.menu', 'uses' => 'PelaporanController@menu']);
	Route::get('pelaporan/form-air', ['as' => 'pelaporan.form-air', 'uses' => 'PelaporanController@form_air']);
	Route::get('pelaporan/form-udara', ['as' => 'pelaporan.form-udara', 'uses' => 'PelaporanController@form_udara']);
	Route::get('pelaporan/form-limbah', ['as' => 'pelaporan.form-limbah', 'uses' => 'PelaporanController@form_limbah']);
	Route::get('pelaporan/form-lingkungan', ['as' => 'pelaporan.form-lingkungan', 'uses' => 'PelaporanController@form_lingkungan']);

	Route::get('pelaporan/export', ['as' => 'pelaporan.export', 'uses' => 'PelaporanController@export']);
	Route::get('pelaporan/tanggapi/{id}', ['as' => 'pelaporan.pelaporanreview', 'uses' => 'PelaporanController@pelaporanreview']);
	Route::put('pelaporan/', ['as' => 'pelaporan.review', 'uses' => 'PelaporanController@review']);
	Route::get('pelaporan/{id}', ['as'     => 'pelaporan.show', 'uses' => 'PelaporanController@show']);	
	Route::get('pelaporan/destroy/{id}', ['as' => 'pelaporan.destroy', 'uses' => 'PelaporanController@destroy']);
	//Review
	Route::get('tanggapan', ['as' => 'review.index', 'uses' => 'PelaporanController@indexreview']);
	Route::get('tanggapan/json','PelaporanController@jsonreview');
	Route::get('tanggapan/export', ['as' => 'review.export', 'uses' => 'PelaporanController@exportreview']);
	Route::get('tanggapan/{id}', ['as' => 'review.show', 'uses' => 'PelaporanController@showreview']);
	Route::get('tanggapan/email/{id}', ['as' => 'review.email', 'uses' => 'PelaporanController@emailreview']);
	//Pengaduan
	Route::resource('pengaduan', 'PengaduanController',  ['except' => ['create', 'store', 'show', 'destroy']]);
	Route::get('pengaduan/json','PengaduanController@json');
	Route::get('pengaduan/export', ['as' => 'pengaduan.export', 'uses' => 'PengaduanController@export']);
	Route::get('pengaduan/{id}', ['as'     => 'pengaduan.show', 'uses' => 'PengaduanController@show']);	
	Route::get('pengaduan/destroy/{id}', 'PengaduanController@destroy');


	//Profile
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::get('profile/edit-password', ['as' => 'profile.editpassword', 'uses' => 'ProfileController@editpassword']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

