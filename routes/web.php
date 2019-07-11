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

Route::get('tes-pdf', function(){
	$pdf = PDF::loadView('backend.pdf.tes');
	return $pdf->stream('invoice.pdf');
});

Route::get('send-email', function(){

	$pdf = PDF::loadView('backend.pdf.tes');
	$qrcode = QrCode::format('png')->size(1000);

	Mail::send('addition.email.tes', ['nama' => 'Dirga Ambara', 'pesan' => 'Halloo'], function ($message) use ($pdf, $qrcode){
        $message->subject("test mail gan");
        $message->from('donotreply@kiddy.com', 'Kiddy');
        $message->to('dirgaambaraloh@gmail.com');
        $message->attachData($pdf->output(), "invoice.pdf");
        $message->attachData($qrcode->generate('https://www.simplesoftware.io'), 'kode.png');
    });
});

Route::get('qrcode', function () {
    return QrCode::size(300)->generate('https://www.simplesoftware.io');
});

// registrasi
	Route::get('registrasi', function () {
	    return view('frontend.registrasi.index');
	})->name('frontend.registrasi');

	Route::get('registrasi/sop', function () {
	    return view('frontend.registrasi.sop');
	})->name('frontend.registrasi.sop');

	Route::get('registrasi/form-register', [
		'uses'	=> 'Frontend\pendaftaran\pendaftaran_controller@form'
	])->name('frontend.registrasi.form');

	Route::get('registrasi/form-register/resource', [
		'uses'	=> 'Frontend\pendaftaran\pendaftaran_controller@resource'
	])->name('frontend.registrasi.resource');

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

	Route::get('wpadmin/manajemen-pendaki/detail', [
		'uses' => 'backend\pendaki\pendaki_controller@detail'
	])->name('wpadmin.pendaki.detail');

	Route::get('wpadmin/manajemen-pendaki/konfirmasi', [
		'uses' => 'backend\pendaki\pendaki_controller@konfirmasi'
	])->name('wpadmin.pendaki.konfirmasi');

	// Master Jabatan
		Route::get('wpadmin/data-master/jabatan', [
			'uses' => 'backend\master\jabatan\jabatan_controller@index'
		])->name('wpadmin.jabatan.index');

		Route::get('wpadmin/data-master/jabatan/create', [
			'uses' => 'backend\master\jabatan\jabatan_controller@create'
		])->name('wpadmin.jabatan.create');

		Route::get('wpadmin/data-master/jabatan/resource', [
			'uses' => 'backend\master\jabatan\jabatan_controller@resource'
		])->name('wpadmin.jabatan.resource');

		Route::post('wpadmin/data-master/jabatan/save', [
			'uses' => 'backend\master\jabatan\jabatan_controller@save'
		])->name('wpadmin.jabatan.save');

		Route::post('wpadmin/data-master/jabatan/update', [
			'uses' => 'backend\master\jabatan\jabatan_controller@update'
		])->name('wpadmin.jabatan.update');	

		Route::post('wpadmin/data-master/jabatan/delete', [
			'uses' => 'backend\master\jabatan\jabatan_controller@delete'
		])->name('wpadmin.jabatan.delete');	
});
