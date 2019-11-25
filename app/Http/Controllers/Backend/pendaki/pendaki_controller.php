<?php

namespace App\Http\Controllers\backend\pendaki;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\backend\tb_pendakian as pendakian;

use DB;
use PDF;
use Auth;
use Mail;
use QrCode;
use Session;

class pendaki_controller extends Controller
{
    protected function index(){

        if(!Auth::user()->can('read', 'data_pendaftar'))
            return Session::get('roles');

        $data = DB::table('tb_pendakian')->orderBy('pd_id','desc')->get();
        
        return view('backend.pendaki.index', compact('data'));
        return view('backend.dashboard', compact('data'));
    }

    protected function detail(Request $request){

        if(!Auth::user()->can('update', 'data_pendaftar'))
            return view('error.480');

        $data = pendakian::where('pd_id', $request->id)
                    ->leftJoin('tb_pos_pendakian as a', 'a.pp_id', '=', 'tb_pendakian.pd_pos_pendakian')
                    ->leftJoin('tb_pos_pendakian as b', 'b.pp_id', '=', 'tb_pendakian.pd_pos_turun')
                    ->leftJoin('provinces', 'provinces.id', 'pd_provinsi')
                    ->leftJoin('regencies', 'regencies.id', 'pd_kabupaten')
                    ->leftJoin('districts', 'districts.id', 'pd_kecamatan')
                    ->leftJoin('villages', 'villages.id', 'pd_desa')
                    ->leftJoin('user as naik', 'naik.user_id', '=', 'tb_pendakian.pd_acc_naik_by')
                    ->leftJoin('user as turun', 'turun.user_id', '=', 'tb_pendakian.pd_acc_turun_by')
                    ->leftJoin('user as acc', 'acc.user_id', '=', 'tb_pendakian.pd_acc_by')
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
                        'turun.nama as acc_turun_by',
                        'acc.nama as acc_by'
                    )->first();

        $qrcode = QrCode::format('png')->size(1000)
                            ->merge('/public/backend/img/LogoJawaTimur.png', .3)
                            ->generate(Route('wpadmin.pendaki.detail', 'id='.$request->id));
        $pos = DB::table('tb_pos_pendakian')->get();

        // return json_encode($data);
        return view('backend.pendaki.detail.index', compact('data', 'pos', 'qrcode'));
    }

    protected function edit(){
        return view('backend.pendaki.edit');
    }

    protected function update(Request $request){
        try {
            
            DB::beginTransaction();

            $cek = DB::table('tb_pendakian')->where('pd_id', $request->pd_id);

            if(!$cek->first()){
                return json_encode([
                    "status"    => 'error',
                    "message"   => 'Data tidak bisa ditemukan. coba muat ulang halaman'
                ]);
            }

            $id = $request->pd_id;
            $tgl_lahir = explode('/', $request->tgl_lahir_ketua)[2].'-'.explode('/', $request->tgl_lahir_ketua)[1].'-'.explode('/', $request->tgl_lahir_ketua)[0];
            $tgl_naik = explode('/', $request->tgl_naik)[2].'-'.explode('/', $request->tgl_naik)[1].'-'.explode('/', $request->tgl_naik)[0];
            $tgl_turun = explode('/', $request->tgl_turun)[2].'-'.explode('/', $request->tgl_turun)[1].'-'.explode('/', $request->tgl_turun)[0];

            $cek->update([
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
            ]);


            DB::table('tb_kontak_darurat')->where('kd_pendakian', $request->pd_id)->delete();

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


            DB::table('tb_anggota_pendakian')->where('ap_pendakian', $request->pd_id)->delete();

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
                        'ap_no_ktp'            => str_replace('-', '', $noKtp),
                        'ap_kewarganegaraan'   => $kewarganegaraan,
                        'ap_kelamin'           => $kelamin,
                    ]);

                    $num++;
                }
            }

            DB::table('tb_logistik')->where('lg_pendakian', $request->pd_id)->delete();

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


            DB::table('tb_peralatan')->where('pr_id', $request->pd_id)->delete();

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

            DB::commit();

            return json_encode([
                "status"    => 'success',
                "message"   => 'Data berhasil di update'
            ]);

        } catch (Exception $e) {
            DB::rollback();

            return json_encode([
                "status"    => 'error',
                "message"   => 'System mengalami masalah '.$e
            ]);
        }
    }

    protected function getData(Request $request){
        $data = pendakian::where('pd_id', $request->id)
                            ->with('anggota')
                            ->with('kontak')
                            ->with('peralatan')
                            ->with('logistik')
                            ->select(
                                'pd_id',
                                'pd_nama_ketua',
                                'pd_no_ktp',
                                'pd_tempat_lahir',
                                'pd_no_hp',
                                'pd_email',
                                'pd_alamat',
                                'pd_provinsi',
                                'pd_kabupaten',
                                'pd_kecamatan',
                                'pd_desa',
                                'pd_kewarganegaraan',
                                'pd_jenis_kelamin',
                                 DB::raw('DATE_FORMAT(pd_tgl_lahir, "%d/%m/%Y") as pd_tgl_lahir'),
                                 DB::raw('DATE_FORMAT(pd_tgl_naik, "%d/%m/%Y") as pd_tgl_naik'),
                                 DB::raw('DATE_FORMAT(pd_tgl_turun, "%d/%m/%Y") as pd_tgl_turun'),
                            )->first();

        return response()->json([
            'data'  => $data
        ]);
    }

    protected function konfirmasi(Request $request){
        // return json_encode($request->all());

        DB::beginTransaction();

        try {
            
            $context = DB::table('tb_pendakian')->where('pd_id', $request->id);

            if(!$context->first()){
                Session::flash('message', 'Data pendakian tidak bisa ditemukan');
                return redirect()->route('wpadmin.pendaki.index');
            }

            $context->update([
                'pd_status'     => $request->sts
            ]);

            if($request->sts == 'sudah naik'){
                $context->update([
                    'pd_pos_pendakian'  => $request->pos,
                    'pd_tgl_naik'       => date('Y-m-d'),
                    'pd_acc_naik_by'    => Auth::user()->user_id
                ]);
            }else if($request->sts == 'sudah turun'){
                $context->update([
                    'pd_pos_turun'      => $request->pos,
                    'pd_tgl_turun'      => date('Y-m-d'),
                    'pd_acc_turun_by'   => Auth::user()->user_id
                ]);
            }else if($request->sts == 'disetujui'){

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

                $email = $data->pd_email;
                
                $qrcode = QrCode::format('png')->size(1000)
                            ->merge('/public/backend/img/LogoJawaTimur.png', .3)
                            ->generate(Route('wpadmin.pendaki.detail', 'id='.$request->id));

                $pdf = PDF::loadView('backend.pdf.berkas', compact('data', 'qrcode'))->setPAPER('a4');

                Mail::send('addition.email.berkas', ['nama' => 'Dirga Ambara', 'pesan' => 'Halloo'], function ($message) use ($pdf, $qrcode, $request, $email){
                    $message->subject("Konfirmasi Pendaftaran");
                    // $message->from('noreply@tahuraradensoerjo.or.id', 'UPT Tahura Raden Soerjo');
                    $message->to($email);
                    $message->attachData($pdf->output(), "berkas-pendaftaran.pdf");
                    $message->attachData($qrcode, 'kode.png');
                });

                $context->update([
                    'pd_acc_by' => Auth::user()->user_id
                ]);
            }else if($request->sts == 'ditolak'){

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

                $email = $data->pd_email;
                
                // $qrcode = QrCode::format('png')->size(1000)
                //             ->merge('/public/backend/img/LogoJawaTimur.png', .3)
                //             ->generate(Route('wpadmin.pendaki.detail', 'id='.$request->id));

                $pdf = PDF::loadView('backend.pdf.berkas_tolak', compact('data'))->setPAPER('a4');

                Mail::send('addition.email.tolak', ['nama' => 'Dirga Ambara', 'pesan' => 'Halloo'], function ($message) use ($pdf, $request, $email){
                    $message->subject("Konfirmasi Pendaftaran");
                    // $message->from('noreply@tahuraradensoerjo.or.id', 'UPT Tahura Raden Soerjo');
                    $message->to($email);
                    $message->attachData($pdf->output(), "berkas-pendaftaran.pdf");
                });

                $context->update([
                    'pd_acc_by' => Auth::user()->user_id
                ]);
            }

            DB::commit();
            Session::flash('message', 'Status pendakian berhasil diubah menjadi '.$request->sts);
            return redirect()->route('wpadmin.pendaki.index');

        } catch (Exception $e) {
            DB::rollback();

            return json_encode([
                "status"    => 'error',
                "message"   => 'System mengalami masalah '.$e
            ]);
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

            $pdf = PDF::loadView('backend.pdf.berkas', compact('data', 'qrcode'))->setPAPER('a4');

            return $pdf->stream('Berkas_pendaftaran_'.$data->pd_nomor.'.pdf');

        } catch (Exception $e) {
            return json_encode([
                "status"    => 'error',
                "message"   => 'System mengalami masalah '.$e
            ]);
        }
    }

    protected function qr(Request $request){
        $qrcode = QrCode::format('png')->size(1000)
                            ->merge('/public/backend/img/LogoJawaTimur.png', .3)
                            ->generate(Route('wpadmin.pendaki.detail', 'id='.$request->id));

        return view('backend.pendaki.detail.qr', compact('qrcode'));
    }
}
