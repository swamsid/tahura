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

        if(!Auth::user()->can('read', 'manajemen_pendaki'))
            return view('error.480');

    	$data = DB::table('tb_pendakian')->get();
    	return view('backend.pendaki.index', compact('data'));
    }

    protected function detail(Request $request){

        if(!Auth::user()->can('update', 'manajemen_pendaki'))
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

    	$pos = DB::table('tb_pos_pendakian')->get();

        // return json_encode($data);
    	return view('backend.pendaki.detail.index', compact('data', 'pos'));
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
    			'pd_status'		=> $request->sts
    		]);

    		if($request->sts == 'sudah naik'){
    			$context->update([
	    			'pd_pos_pendakian'	=> $request->pos,
	    			'pd_tgl_naik'		=> date('Y-m-d'),
                    'pd_acc_naik_by'    => Auth::user()->user_id
	    		]);
    		}else if($request->sts == 'sudah turun'){
    			$context->update([
	    			'pd_pos_turun'		=> $request->pos,
	    			'pd_tgl_turun'		=> date('Y-m-d'),
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
                $pdf = PDF::loadView('backend.pdf.berkas', compact('data'));
                $qrcode = QrCode::format('png')->size(1000);

                Mail::send('addition.email.berkas', ['nama' => 'Dirga Ambara', 'pesan' => 'Halloo'], function ($message) use ($pdf, $qrcode, $request, $email){
                    $message->subject("Konfirmasi Pendaftaran");
                    $message->from('noreply@dishut.com', 'UPT Tahura Raden Soerjo');
                    $message->to($email);
                    $message->attachData($pdf->output(), "berkas-pendaftaran.pdf");
                    $message->attachData($qrcode->generate(Route('wpadmin.pendaki.detail', 'id='.$request->id)), 'kode.png');
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
                $pdf = PDF::loadView('backend.pdf.berkas', compact('data'));

                Mail::send('addition.email.tolak', ['nama' => 'Dirga Ambara', 'pesan' => 'Halloo'], function ($message) use ($pdf, $request, $email){
                    $message->subject("Konfirmasi Pendaftaran");
                    $message->from('noreply@dishut.com', 'UPT Tahura Raden Soerjo');
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
    			"status"	=> 'error',
    			"message"	=> 'System mengalami masalah '.$e
    		]);
    	}
    }
}
