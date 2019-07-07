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

Route::get('/', function () {
    return view('frontend.index');
});

// rgeistrasi
	Route::get('registrasi', function () {
	    return view('frontend.registrasi.index');
	})->name('frontend.registrasi');

	Route::get('registrasi/sop', function () {
	    return view('frontend.registrasi.sop');
	})->name('frontend.registrasi.sop');

	Route::get('registrasi/form-register', function () {
	    return view('frontend.registrasi.form');
	})->name('frontend.registrasi.form');

	Route::post('registrasi/save', [
		'uses'	=> 'Frontend\pendaftaran\pendaftaran_controller@save'
	])->name('frontend.registrasi.save');



Route::group(['middleware' => ['guest', 'web']], function(){
	Route::get('wpadmin', function(){
		return view('backend.login.index');
	})->name('wpadmin.auth.login');

	Route::post('wpadmin/login/authenticate', [
		'uses' => 'backend\auth\authenticate@authenticate'
	])->name('wpadmin.login.authenticate');
});

Route::group(['middleware' => 'auth'], function(){

	Route::get('wpadmin/dashboard', function(){
		return view('backend.dashboard');
	})->name('wpadmin.dashboard');

	Route::get('wpadmin/logout', [
		'uses' => 'backend\auth\authenticate@logout'
	])->name('wpadmin.auth.logout');

	Route::get('wpadmin/manajemen-pendaki/data-pendaftar', [
		'uses' => 'backend\pendaki\pendaki_controller@index'
	])->name('wpadmin.pendaki.index');
	
});
