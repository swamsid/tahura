<?php

namespace App\Http\Controllers\Frontend\pendaftaran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class pendaftaran_controller extends Controller
{

    protected function form(){
        return view('frontend.registrasi.form');
    }

    protected function resource(){

        $provinsi = DB::table('provinces')->select('id as id', 'name as text')->get();
        $kota = DB::table('regencies')->select('id as id', 'province_id', 'name as text')->get();
        $kecamatan = DB::table('districts')->select('id as id', 'regency_id', 'name as text')->get();
        $kelurahan = DB::table('villages')->select('id as id', 'district_id', 'name as text')->get();

        return json_encode([
            'provinsi'      => $provinsi,
            'kota'          => $kota,
            'kecamatan'     => $kecamatan,
            'kelurahan'     => $kelurahan
        ]);
    }

    protected function save(Request $request){
    	// return json_encode($request->all());

        return json_encode([
            "status"    => 'success',
            "message"   => 'Data berhasil di simpan'
        ]);
        
    	try {
    		
    		do {

    			$nomor = 'PD-'.rand(100000, 1000000);
    			$cek = DB::table('tb_pendakian')->where('pd_nomor', $nomor)->first();

    		} while ($cek);

    		$id = DB::table('tb_pendakian')->max('pd_id') + 1;
    		$tgl_lahir = explode('/', $request->tgl_lahir_ketua)[2].'-'.explode('/', $request->tgl_lahir_ketua)[1].'-'.explode('/', $request->tgl_lahir_ketua)[0];
    		$tgl_naik = explode('/', $request->tgl_naik)[2].'-'.explode('/', $request->tgl_naik)[1].'-'.explode('/', $request->tgl_naik)[0];
    		$tgl_turun = explode('/', $request->tgl_turun)[2].'-'.explode('/', $request->tgl_turun)[1].'-'.explode('/', $request->tgl_turun)[0];

    		DB::table('tb_pendakian')->insert([
    			'pd_id'					=> $id,
    			'pd_nomor'				=> $nomor,
    			'pd_nama_ketua' 		=> $request->nama_ketua,
    			'pd_no_ktp'				=> $request->no_ktp_ketua,
    			'pd_tempat_lahir'		=> $request->tempat_lahir_ketua,
    			'pd_tgl_lahir'			=> $tgl_lahir,
    			'pd_no_hp'				=> $request->no_hp_ketua,
    			'pd_email'				=> $request->email_ketua,
    			'pd_tgl_naik'			=> $tgl_naik,
    			'pd_tgl_turun'			=> $tgl_turun,
    			'pd_alamat'				=> $request->alamat_ketua,
    			'pd_provinsi'			=> $request->provinsi_ketua,
    			'pd_kabupaten'			=> $request->kabupaten_ketua,
    			'pd_kecamatan'			=> $request->kecamatan_ketua,
    			'pd_desa'				=> $request->desa_ketua,
    			'pd_kewarganegaraan'	=> $request->kewarganegaraan_ketua,
    			'pd_jenis_kelamin'		=> $request->kelamin_ketua,
    			'pd_status'				=> 'registered'

    		]);

    		$num = 1;
    		foreach($request->nama_kontak_darurat as $key => $kontak){

    			$noTelp 	= $request->no_kontak_darurat[$key];
    			$email 		= $request->email_kontak_darurat[$key];
    			$hubungan 	= $request->hubungan_kontak_darurat[$key];

    			if(!is_null($kontak) && !is_null($noTelp) && !is_null($email) && !is_null($hubungan)){
    				DB::table('tb_kontak_darurat')->insert([
	    				'kd_pendakian'		=> $id,
	    				'kd_nomor'			=> $num,
	    				'kd_nama'			=> $kontak,
	    				'kd_no_telp'		=> $noTelp,
	    				'kd_email'			=> $email,
	    				'kd_hubungan'		=> $hubungan
	    			]);

	    			$num++;
    			}
    		}

    		$num = 1;
    		foreach($request->nama_anggota as $key => $anggota){

    			$noKtp 		= $request->no_ktp_anggota[$key];
    			$kelamin 	= $request->kelamin_anggota[$key];

    			if(!is_null($anggota) && !is_null($noKtp) && !is_null($kelamin)){
    				DB::table('tb_anggota_pendakian')->insert([
	    				'ap_pendakian'		=> $id,
	    				'ap_nomor'			=> $num,
	    				'ap_nama'			=> $anggota,
	    				'ap_no_ktp'			=> $noKtp,
	    				'ap_kelamin'		=> $kelamin,
	    			]);

	    			$num++;
    			}
    		}

    		$ids = DB::table('tb_peralatan')->max('pr_id') + 1;
    		DB::table('tb_peralatan')->insert([
    			'pr_id' 				=> $ids,
    			'pr_pendakian'			=> $id,
    			'pr_tenda'				=> ($request->tenda) ? $request->tenda : 0,
    			'pr_sleeping_bag'		=> ($request->sleeping_bag) ? $request->sleeping_bag : 0,
    			'pr_peralatan_masak'	=> ($request->peralatan_masak) ? $request->peralatan_masak : 0,
    			'pr_bahan_bakar'		=> ($request->bahan_bakar) ? $request->bahan_bakar : 0,
    			'pr_ponco' 				=> ($request->jas_hujan) ? $request->jas_hujan : 0,
    			'pr_senter' 			=> ($request->senter) ? $request->senter : 0,
    			'pr_obat'				=> ($request->obat) ? $request->obat : 0,
    			'pr_matras' 			=> ($request->matras) ? $request->matras : 0,
    			'pr_kantong_sampah'		=> ($request->kantong_sampah) ? $request->kantong_sampah : 0,
    			'pr_jaket' 				=> ($request->jaket) ? $request->jaket : 0
    		]);

    		$num = 1;
    		foreach($request->nama_logistik as $key => $logistik){

    			$jumlah = $request->jumlah_logistik[$key];

    			if(!is_null($logistik) && !is_null($jumlah)){
    				DB::table('tb_logistik')->insert([
	    				'lg_pendakian'		=> $id,
	    				'lg_nomor'			=> $num,
	    				'lg_nama'			=> $logistik,
	    				'lg_jumlah'			=> $jumlah,
	    			]);

	    			$num++;
    			}
    		}

    		DB::commit();

    		return json_encode([
    			"status"	=> 'success',
    			"message"	=> 'Data berhasil di simpan'
    		]);

    	} catch (Exception $e) {
    		DB::rollback();

    		return json_encode([
    			"status"	=> 'error',
    			"message"	=> 'System mengalami masalah '.$e
    		]);
    	}
    }
}
