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
    return view('frontend.registrasi.index');
});

Route::get('tes-pdf', function(){

	// $data = App\Model\backend\tb_pendakian::where('pd_id', 1)
 //                    ->leftJoin('tb_pos_pendakian as a', 'a.pp_id', '=', 'tb_pendakian.pd_pos_pendakian')
 //                    ->leftJoin('tb_pos_pendakian as b', 'b.pp_id', '=', 'tb_pendakian.pd_pos_turun')
 //                    ->leftJoin('provinces', 'provinces.id', 'pd_provinsi')
 //                    ->leftJoin('regencies', 'regencies.id', 'pd_kabupaten')
 //                    ->leftJoin('districts', 'districts.id', 'pd_kecamatan')
 //                    ->leftJoin('villages', 'villages.id', 'pd_desa')
 //                    ->with('kontak')
 //                    ->with('anggota')
 //                    ->with('peralatan')
 //                    ->with('logistik')
 //                    ->select(
 //                        'tb_pendakian.*',
 //                        'a.pp_nama as pos_naik',
 //                        'b.pp_nama as pos_turun',
 //                        'provinces.name as provinsi',
 //                        'regencies.name as kabupaten',
 //                        'districts.name as kecamatan',
 //                        'villages.name as kelurahan',
 //                    )->first();

	// $qrcode = QrCode::format('png')->size(1000)->generate('https://www.simplesoftware.io');
	// $pdf = PDF::loadView('backend.pdf.berkas', compact('data'));
	// return $pdf->stream('berkas.pdf');
});

Route::get('send-email', function(){

	$pdf = PDF::loadView('backend.pdf.tes');
	$qrcode = QrCode::format('png')->size(1000);

	Mail::send('addition.email.tes', ['nama' => 'Dirga Ambara', 'pesan' => 'Halloo'], function ($message) use ($pdf, $qrcode){
        $message->subject("test mail gan");
        $message->from('donotreply@kiddy.com', 'Kiddy');
        $message->to('dirgaambaraloh@gmail.com');
    });

    return 'email terkirim';
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

// cek-pendakian
	Route::get('cek-pendakian', function () {
	    return view('frontend.cek_pendakian.index');
	})->name('frontend.cek_pendakian');

	Route::get('cek-pendakian/send', [
	    'uses'	=> 'Frontend\pendaftaran\pendaftaran_controller@cek_pendakian'
	])->name('frontend.cek_pendakian.send');


Route::group(['middleware' => ['guest', 'web']], function(){
	Route::get('wpadmin', function(){
		return view('backend.login.index');
	})->name('wpadmin.auth.login');

	Route::post('wpadmin/login/authenticate', [
		'uses' => 'Backend\auth\authenticate@authenticate'
	])->name('wpadmin.login.authenticate');
});

Route::group(['middleware' => 'auth'], function(){

	Route::get('wpadmin/dashboard', function(){

		if(!Auth::user()->can('read', 'dashboard'))
            return view('error.480');

		return view('backend.dashboard');
	})->name('wpadmin.dashboard');

	Route::get('wpadmin/logout', [
		'uses' => 'Backend\auth\authenticate@logout'
	])->name('wpadmin.auth.logout');

	Route::get('wpadmin/manajemen-pendaki/data-pendaftar', [
		'uses' => 'Backend\pendaki\pendaki_controller@index'
	])->name('wpadmin.pendaki.index');

	Route::get('wpadmin/manajemen-pendaki/detail', [
		'uses' => 'Backend\pendaki\pendaki_controller@detail'
	])->name('wpadmin.pendaki.detail');

	Route::get('wpadmin/manajemen-pendaki/konfirmasi', [
		'uses' => 'Backend\pendaki\pendaki_controller@konfirmasi'
	])->name('wpadmin.pendaki.konfirmasi');

	// Master Jabatan
		Route::get('wpadmin/data-master/jabatan', [
			'uses' => 'Backend\master\jabatan\jabatan_controller@index'
		])->name('wpadmin.jabatan.index');

		Route::get('wpadmin/data-master/jabatan/create', [
			'uses' => 'Backend\master\jabatan\jabatan_controller@create'
		])->name('wpadmin.jabatan.create');

		Route::get('wpadmin/data-master/jabatan/resource', [
			'uses' => 'Backend\master\jabatan\jabatan_controller@resource'
		])->name('wpadmin.jabatan.resource');

		Route::post('wpadmin/data-master/jabatan/save', [
			'uses' => 'Backend\master\jabatan\jabatan_controller@save'
		])->name('wpadmin.jabatan.save');

		Route::post('wpadmin/data-master/jabatan/update', [
			'uses' => 'Backend\master\jabatan\jabatan_controller@update'
		])->name('wpadmin.jabatan.update');	

		Route::post('wpadmin/data-master/jabatan/delete', [
			'uses' => 'Backend\master\jabatan\jabatan_controller@delete'
		])->name('wpadmin.jabatan.delete');

	// Master Pegawai
		Route::get('wpadmin/data-master/pegawai', [
			'uses' => 'Backend\master\pegawai\pegawai_controller@index'
		])->name('wpadmin.pegawai.index');

		Route::get('wpadmin/data-master/pegawai/create', [
			'uses' => 'Backend\master\pegawai\pegawai_controller@create'
		])->name('wpadmin.pegawai.create');

		Route::get('wpadmin/data-master/pegawai/resource', [
			'uses' => 'Backend\master\pegawai\pegawai_controller@resource'
		])->name('wpadmin.pegawai.resource');

		Route::post('wpadmin/data-master/pegawai/save', [
			'uses' => 'Backend\master\pegawai\pegawai_controller@save'
		])->name('wpadmin.pegawai.save');

		Route::post('wpadmin/data-master/pegawai/update', [
			'uses' => 'Backend\master\pegawai\pegawai_controller@update'
		])->name('wpadmin.pegawai.update');	

		Route::post('wpadmin/data-master/pegawai/delete', [
			'uses' => 'Backend\master\pegawai\pegawai_controller@delete'
		])->name('wpadmin.pegawai.delete');

	// Laporan
		Route::get('wpadmin/data-laporan/pendaki-masuk', [
			'uses' => 'Backend\laporan\pendaki_masuk\pendaki_masuk_controller@index'
		])->name('wpadmin.laporan.pendaki_masuk.index');

		Route::get('wpadmin/data-laporan/pendaki-masuk/resource', [
			'uses' => 'Backend\laporan\pendaki_masuk\pendaki_masuk_controller@resource'
		])->name('wpadmin.laporan.pendaki_masuk.resource');

		Route::get('wpadmin/data-laporan/pendaki-masuk/result', [
			'uses' => 'Backend\laporan\pendaki_masuk\pendaki_masuk_controller@result'
		])->name('wpadmin.laporan.pendaki_masuk.result');
});

Route::get('/clear-cache',function(){
	Artisan::call('cache:clear');
	return "Cache is cleared";
});