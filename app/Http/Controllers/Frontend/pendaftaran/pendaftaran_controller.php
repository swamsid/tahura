<?php

namespace App\Http\Controllers\Frontend\pendaftaran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\backend\tb_pendakian as pendakian;

use DB;
use PDF;
use Auth;
use Mail;
use QrCode;
use Session;

class pendaftaran_controller extends Controller
{

    protected function form(){
        return view('frontend.registrasi.form');
    }

    protected function resource(){

        $provinsi = DB::table('provinces')->select('id as id', 'name as text')->get();

        $kota = DB::table('regencies')->select('id as id', 'province_id', 'name as text')
                    ->where('province_id', $provinsi[0]->id)
                    ->get();

        $kecamatan = DB::table('districts')->select('id as id', 'regency_id', 'name as text')
                        ->where('regency_id', $kota[0]->id)
                        ->get();

        $kelurahan = DB::table('villages')->select('id as id', 'district_id', 'name as text')
                        ->where('district_id', $kecamatan[0]->id)
                        ->get();

        // return json_encode($provinsi[0]->id);

        $data = [
            'provinsi'      => $provinsi,
            'kota'          => $kota,
            'kecamatan'     => $kecamatan,
            'kelurahan'     => $kelurahan
        ];

        return response()->json($data);
    }

    protected function save(Request $request){
        // return json_encode($request->all());
        
        try {
            
            DB::beginTransaction();

            do {

                $nomor = 'PD-'.rand(100000, 1000000);
                $cek = DB::table('tb_pendakian')->where('pd_nomor', $nomor)->first();

            } while ($cek);

            $id = DB::table('tb_pendakian')->max('pd_id') + 1;
            $tgl_lahir = explode('/', $request->tgl_lahir_ketua)[2].'-'.explode('/', $request->tgl_lahir_ketua)[1].'-'.explode('/', $request->tgl_lahir_ketua)[0];
            $tgl_naik = explode('/', $request->tgl_naik)[2].'-'.explode('/', $request->tgl_naik)[1].'-'.explode('/', $request->tgl_naik)[0];
            $tgl_turun = explode('/', $request->tgl_turun)[2].'-'.explode('/', $request->tgl_turun)[1].'-'.explode('/', $request->tgl_turun)[0];

            if($request->tujuan == 'arjuno'){
                // return json_encode('o');
                DB::table('tb_pendakian')->insert([
                    'pd_id'                 => $id,
                    'pd_nomor'              => $nomor,
                    'pd_nama_ketua'         => $request->nama_ketua,
                    'pd_no_ktp'             => str_replace('.', '', $request->no_ktp_ketua),
                    'pd_tempat_lahir'       => $request->tempat_lahir_ketua,
                    'pd_tgl_lahir'          => $tgl_lahir,
                    'pd_no_hp'              => str_replace('-', '', $request->no_hp_ketua),
                    'pd_email'              => $request->email_ketua,
                    'pd_tgl_naik'           => $tgl_naik,
                    'pd_tgl_turun'          => $tgl_turun,
                    'pd_alamat'             => $request->alamat_ketua,
                    'pd_provinsi'           => $request->provinsi_ketua,
                    'pd_kabupaten'          => $request->kabupaten_ketua,
                    'pd_kecamatan'          => $request->kecamatan_ketua,
                    'pd_desa'               => $request->desa_ketua,
                    'pd_kewarganegaraan'    => $request->kewarganegaraan_ketua,
                    'pd_jenis_kelamin'      => $request->kelamin_ketua,
                    'pd_status'             => 'belum disetujui',
                    'keterangan'            => 'arjuno'
    
                ]);
            }elseif($request->tujuan == 'jengger'){
                // return json_encode('a');
                DB::table('tb_pendakian')->insert([
                    'pd_id'                 => $id,
                    'pd_nomor'              => $nomor,
                    'pd_nama_ketua'         => $request->nama_ketua,
                    'pd_no_ktp'             => str_replace('.', '', $request->no_ktp_ketua),
                    'pd_tempat_lahir'       => $request->tempat_lahir_ketua,
                    'pd_tgl_lahir'          => $tgl_lahir,
                    'pd_no_hp'              => str_replace('-', '', $request->no_hp_ketua),
                    'pd_email'              => $request->email_ketua,
                    'pd_tgl_naik'           => $tgl_naik,
                    'pd_tgl_turun'          => $tgl_turun,
                    'pd_alamat'             => $request->alamat_ketua,
                    'pd_provinsi'           => $request->provinsi_ketua,
                    'pd_kabupaten'          => $request->kabupaten_ketua,
                    'pd_kecamatan'          => $request->kecamatan_ketua,
                    'pd_desa'               => $request->desa_ketua,
                    'pd_kewarganegaraan'    => $request->kewarganegaraan_ketua,
                    'pd_jenis_kelamin'      => $request->kelamin_ketua,
                    'pd_status'             => 'disetujui',
                    'keterangan'            => 'jengger'
    
                ]);
            }else{
                // return json_encode('a');
                DB::table('tb_pendakian')->insert([
                    'pd_id'                 => $id,
                    'pd_nomor'              => $nomor,
                    'pd_nama_ketua'         => $request->nama_ketua,
                    'pd_no_ktp'             => str_replace('.', '', $request->no_ktp_ketua),
                    'pd_tempat_lahir'       => $request->tempat_lahir_ketua,
                    'pd_tgl_lahir'          => $tgl_lahir,
                    'pd_no_hp'              => str_replace('-', '', $request->no_hp_ketua),
                    'pd_email'              => $request->email_ketua,
                    'pd_tgl_naik'           => $tgl_naik,
                    'pd_tgl_turun'          => $tgl_turun,
                    'pd_alamat'             => $request->alamat_ketua,
                    'pd_provinsi'           => $request->provinsi_ketua,
                    'pd_kabupaten'          => $request->kabupaten_ketua,
                    'pd_kecamatan'          => $request->kecamatan_ketua,
                    'pd_desa'               => $request->desa_ketua,
                    'pd_kewarganegaraan'    => $request->kewarganegaraan_ketua,
                    'pd_jenis_kelamin'      => $request->kelamin_ketua,
                    'pd_status'             => 'disetujui',
                    'keterangan'            => 'pundak'
    
                ]);
            }

            if ($request->tujuan == 'arjuno'){
                $num = 1;
                foreach($request->nama_kontak_darurat as $key => $kontak){
                    $noTelp     = $request->no_kontak_darurat[$key];
                    $alamat     = $request->alamat_kontak_darurat[$key];
                    $hubungan   = $request->hubungan_kontak_darurat[$key];

                    if(!is_null($kontak) && !is_null($noTelp) && !is_null($alamat) && !is_null($hubungan)){
                        DB::table('tb_kontak_darurat')->insert([
                            'kd_pendakian'      => $id,
                            'kd_nomor'          => $num,
                            'kd_nama'           => $kontak,
                            'kd_no_telp'        => str_replace('-', '', $noTelp),
                            'kd_email'          => $alamat,
                            'kd_hubungan'       => $hubungan
                        ]);

                        $num++;
                    }
                }

                $ids = DB::table('tb_peralatan')->max('pr_id') + 1;
                DB::table('tb_peralatan')->insert([
                    'pr_id'                 => $ids,
                    'pr_pendakian'          => $id,
                    'pr_tenda'              => ($request->tenda) ? $request->tenda : 0,
                    'pr_sleeping_bag'       => ($request->sleeping_bag) ? $request->sleeping_bag : 0,
                    'pr_peralatan_masak'    => ($request->peralatan_masak) ? $request->peralatan_masak : 0,
                    'pr_bahan_bakar'        => ($request->bahan_bakar) ? $request->bahan_bakar : 0,
                    'pr_ponco'              => ($request->jas_hujan) ? $request->jas_hujan : 0,
                    'pr_senter'             => ($request->senter) ? $request->senter : 0,
                    'pr_obat'               => ($request->obat) ? $request->obat : 0,
                    'pr_matras'             => ($request->matras) ? $request->matras : 0,
                    'pr_kantong_sampah'     => ($request->kantong_sampah) ? $request->kantong_sampah : 0,
                    'pr_jaket'              => ($request->jaket) ? $request->jaket : 0
                ]);

                $num = 1;
                foreach($request->nama_logistik as $key => $logistik){

                    $jumlah = $request->jumlah_logistik[$key];

                    if(!is_null($logistik) && !is_null($jumlah)){
                        DB::table('tb_logistik')->insert([
                            'lg_pendakian'      => $id,
                            'lg_nomor'          => $num,
                            'lg_nama'           => $logistik,
                            'lg_jumlah'         => $jumlah,
                        ]);

                        $num++;
                    }
                }
                
            }


            $num = 1;
            foreach($request->nama_anggota as $key => $anggota){

                $noTelp            = $request->no_telp_anggota[$key];
                $noKtp             = $request->no_ktp_anggota[$key];
                $kewarganegaraan   = $request->kewarganegaraan_anggota[$key];
                $kelamin           = $request->kelamin_anggota[$key];

                if(!is_null($anggota) && !is_null($kewarganegaraan) && !is_null($kelamin)){
                    DB::table('tb_anggota_pendakian')->insert([
                        'ap_pendakian'         => $id,
                        'ap_nomor'             => $num,
                        'ap_nama'              => $anggota,
                        'ap_no_telp'           => str_replace('-', '', $noTelp),
                        'ap_no_ktp'            => str_replace('.', '', $noKtp),
                        'ap_kewarganegaraan'   => $kewarganegaraan,
                        'ap_kelamin'           => $kelamin,
                    ]);

                    $num++;
                }
            }

            if($request->tujuan == 'arjuno'){
                 // return 'c';
                Mail::send('addition.email.daftar', ['kode' => $nomor], function ($message) use ($request){
                    $message->subject("Pendaftaran Pendakian");
                    // $message->from('noreply@tahuraradensoerjo.or.id', 'UPT Tahura Raden Soerjo');
                    $message->to($request->email_ketua);
                });
            }else{
                 // return 'b';
                $data = pendakian::where('pd_id', $id)
                    ->leftJoin('tb_pos_pendakian as a', 'a.pp_id', '=', 'tb_pendakian.pd_pos_pendakian')
                    ->leftJoin('tb_pos_pendakian as b', 'b.pp_id', '=', 'tb_pendakian.pd_pos_turun')
                    ->leftJoin('provinces', 'provinces.id', 'pd_provinsi')
                    ->leftJoin('regencies', 'regencies.id', 'pd_kabupaten')
                    ->leftJoin('districts', 'districts.id', 'pd_kecamatan')
                    ->leftJoin('villages', 'villages.id', 'pd_desa')
                    ->with('kontak')
                    ->with('anggota')
                    ->with('peralatan')
                    ->with('logistik')
                    ->select(
                        'tb_pendakian.*',
                        'a.pp_nama as pos_naik',
                        'b.pp_nama as pos_turun',
                        'provinces.name as provinsi',
                        'regencies.name as kabupaten',
                        'districts.name as kecamatan',
                        'villages.name as kelurahan'
                    )->first();

                // return json_encode($data);

                $qrcode = QrCode::format('png')->size(1000)
                            ->merge('/public/backend/img/LogoJawaTimur.png', .3)
                            ->generate(Route('wpadmin.pendaki.detail', 'id='.$id));
                            
                if ($request->tujuan == 'pundak') {
                    $pdf = PDF::loadView('backend.pdf.berkas_pundak', compact('data', 'qrcode'))->setPAPER('a4');    
                }
                elseif($request->tujuan == 'jengger'){
                    $pdf = PDF::loadView('backend.pdf.berkas_jengger', compact('data', 'qrcode'))->setPAPER('a4');
                }
                
                $email = $request->email_ketua;

                Mail::send('addition.email.berkas', ['nama' => 'Dirga Ambara', 'pesan' => 'Halloo'], function ($message) use ($pdf, $qrcode, $request, $email){
                    $message->subject("Konfirmasi Pendaftaran");
                    // $message->from('noreply@tahuraradensoerjo.or.id', 'UPT Tahura Raden Soerjo');
                    $message->to($request->email_ketua);
                    $message->attachData($pdf->output(), "berkas-pendaftaran.pdf");
                    $message->attachData($qrcode, 'kode.png');
                });

                // $userkey = '5fjezh';
                // $passkey = '5fjezh';
                // $telepon = $data->pd_no_hp;
                // $message = "Registrasi ".$nomor." telah kami verifikasi. Silahkan unduh Berkas Perizinan di menu cek pendakian atau melalui link tersebut TinyURL.com/y5362lsf";
                // $url = 'https://gsm.zenziva.net/api/sendWA/';
                // $curlHandle = curl_init();
                // curl_setopt($curlHandle, CURLOPT_URL, $url);
                // curl_setopt($curlHandle, CURLOPT_HEADER, 0);
                // curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
                // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
                // curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
                // curl_setopt($curlHandle, CURLOPT_POST, 1);
                // curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
                //     'userkey' => $userkey,
                //     'passkey' => $passkey,
                //     'nohp' => $telepon,
                //     'pesan' => $message
                // ));
                // $results = json_decode(curl_exec($curlHandle), true);
                // curl_close($curlHandle);
            }

            DB::commit();

            return json_encode([
                "status"    => 'success',
                "message"   => 'Data berhasil di simpan'
            ]);

        } catch (Exception $e) {
            DB::rollback();

            return json_encode([
                "status"    => 'error',
                "message"   => 'System mengalami masalah '.$e
            ]);
        }
    }

    protected function cek_pendakian(Request $request){
        // return json_encode($request->all());

        $data = pendakian::where('pd_nomor', 'PD-'.$request->kode_pendakian)
                    ->leftJoin('tb_pos_pendakian as a', 'a.pp_id', '=', 'tb_pendakian.pd_pos_pendakian')
                    ->leftJoin('tb_pos_pendakian as b', 'b.pp_id', '=', 'tb_pendakian.pd_pos_turun')
                    ->leftJoin('provinces', 'provinces.id', 'pd_provinsi')
                    ->leftJoin('regencies', 'regencies.id', 'pd_kabupaten')
                    ->leftJoin('districts', 'districts.id', 'pd_kecamatan')
                    ->leftJoin('villages', 'villages.id', 'pd_desa')
                    ->leftJoin('user as naik', 'naik.user_id', '=', 'tb_pendakian.pd_acc_naik_by')
                    ->leftJoin('user as turun', 'turun.user_id', '=', 'tb_pendakian.pd_acc_turun_by')
                    ->with('kontak')
                    ->with('anggota')
                    ->with('peralatan')
                    ->with('logistik')
                    ->select(
                        'tb_pendakian.*',
                        'a.pp_nama as pos_naik',
                        'b.pp_nama as pos_turun',
                        'provinces.name as provinsi',
                        'regencies.name as kabupaten',
                        'districts.name as kecamatan',
                        'villages.name as kelurahan',
                        'naik.nama as acc_naik_by',
                        'turun.nama as acc_turun_by'
                    )->first();

        // return json_encode($data);

        if($data){
            return view('frontend.cek_pendakian.result', compact('data'));
        }else{
            Session::flash('message', 'Kode pendaftaran tidak ditemukan');
            return redirect()->back();
        }
    }

    protected function pdf(Request $request){
        try {
            
            $data = pendakian::where('pd_id', $request->id)
                    ->leftJoin('tb_pos_pendakian as a', 'a.pp_id', '=', 'tb_pendakian.pd_pos_pendakian')
                    ->leftJoin('tb_pos_pendakian as b', 'b.pp_id', '=', 'tb_pendakian.pd_pos_turun')
                    ->leftJoin('provinces', 'provinces.id', 'pd_provinsi')
                    ->leftJoin('regencies', 'regencies.id', 'pd_kabupaten')
                    ->leftJoin('districts', 'districts.id', 'pd_kecamatan')
                    ->leftJoin('villages', 'villages.id', 'pd_desa')
                    ->with('kontak')
                    ->with('anggota')
                    ->with('peralatan')
                    ->with('logistik')
                    ->select(
                        'tb_pendakian.*',
                        'a.pp_nama as pos_naik',
                        'b.pp_nama as pos_turun',
                        'provinces.name as provinsi',
                        'regencies.name as kabupaten',
                        'districts.name as kecamatan',
                        'villages.name as kelurahan'
                    )->first();

            $qrcode = QrCode::format('png')->size(1000)
                            ->merge('/public/backend/img/LogoJawaTimur.png', .3)
                            ->generate(Route('wpadmin.pendaki.detail', 'id='.$request->id));

            if ($data->keterangan == 'pundak') {
                $pdf = PDF::loadView('backend.pdf.berkas_pundak', compact('data', 'qrcode'))->setPAPER('a4');
            }
            elseif ($data->keterangan == 'jengger') {
                $pdf = PDF::loadView('backend.pdf.berkas_jengger', compact('data', 'qrcode'))->setPAPER('a4');
            }
            else{
                $pdf = PDF::loadView('backend.pdf.berkas', compact('data', 'qrcode'))->setPAPER('a4');
            }
            return $pdf->stream('Berkas_pendaftaran_'.$data->pd_nomor.'.pdf');

        } catch (Exception $e) {
            return json_encode([
                "status"    => 'error',
                "message"   => 'System mengalami masalah '.$e
            ]);
        }
    }

    protected function byprovinsi(Request $request){
        $kota = DB::table('regencies')->select('id as id', 'province_id', 'name as text')
                    ->where('province_id', $request->id)
                    ->get();

        $kecamatan = DB::table('districts')->select('id as id', 'regency_id', 'name as text')
                        ->where('regency_id', $kota[0]->id)
                        ->get();

        $kelurahan = DB::table('villages')->select('id as id', 'district_id', 'name as text')
                        ->where('district_id', $kecamatan[0]->id)
                        ->get();

        // return json_encode($provinsi[0]->id);

        $data = [
            'kota'          => $kota,
            'kecamatan'     => $kecamatan,
            'kelurahan'     => $kelurahan
        ];

        return response()->json($data);
    }

    protected function bykabupaten(Request $request){
        $kecamatan = DB::table('districts')->select('id as id', 'regency_id', 'name as text')
                        ->where('regency_id', $request->id)
                        ->get();

        $kelurahan = DB::table('villages')->select('id as id', 'district_id', 'name as text')
                        ->where('district_id', $kecamatan[0]->id)
                        ->get();

        // return json_encode($provinsi[0]->id);

        $data = [
            'kecamatan'     => $kecamatan,
            'kelurahan'     => $kelurahan
        ];

        return response()->json($data);
    }

    protected function bykecamatan(Request $request){
        $kelurahan = DB::table('villages')->select('id as id', 'district_id', 'name as text')
                        ->where('district_id', $request->id)
                        ->get();

        // return json_encode($provinsi[0]->id);

        $data = [
            'kelurahan'     => $kelurahan
        ];

        return response()->json($data);
    }
}