<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Auth;
use Session;

class dashboard extends Controller
{
    protected function index(){
    	if(Auth::user()->posisi == 'kantor'){
    		$data = $this->resource();

	    	$rangking = $data['rangking'];
	    	$pendakian = $data['totpendakian'];
	    	$registrasi = $data['registrasi'];
	    	$naik = $data['naik'];
	    	$turun = $data['turun'];
	    	$lpk = json_encode($data['doughnut']);
	    	$provinsi = json_encode($data['polar']);
	    	$line = json_encode($data['line']);

            $max = $max2 = 0;

            if(count($data['line']['tot1']) && count($data['line']['tot2']) && count($data['line']['tot3']) && $data['line']['tot4']){

                $ck = [max($data['line']['tot1']), max($data['line']['tot2']), max($data['line']['tot3']), max($data['line']['tot4'])];
                $max = max($ck);

            }

            if(count($data['polar']['tot']))
	    	  $max2 = max($data['polar']['tot']);

	    	// return $data['polar']['tot'];

	        return view('backend.dashboard', compact('rangking', 'line', 'max', 'pendakian', 'registrasi', 'naik', 'turun', 'provinsi', 'max2', 'lpk'));
    	}else{
    		$data = $this->resource2();

    		// return json_encode($data);
    		return view('backend.dashboard', compact('data'));
    	}
    }

    private function resource(){
    	$rangking = DB::table('tb_pos_pendakian')->select('pp_nama')
    					->leftJoin('tb_pendakian', 'tb_pendakian.pd_pos_pendakian', 'tb_pos_pendakian.pp_id')
    					->select('tb_pos_pendakian.pp_nama', DB::raw('count(tb_pendakian.pd_id) as tot'))
    					->groupBy('pp_nama')
    					->orderBy('tot', 'desc')
    					->limit('4')
    					->get();

    	$totpendakian = DB::table('tb_pendakian')->whereNotNull('pd_acc_naik_by')
    						->select(DB::raw('count(pd_id) as tot'))->first();

    	$registrasi = DB::table('tb_pendakian')
    						->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y'))
    						->select(DB::raw('count(pd_id) as tot'))->first();

    	$naik = DB::table('tb_pendakian')
    						->where('pd_status', 'sudah naik')
    						->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y'))
    						->select(DB::raw('count(pd_id) as tot'))->first();

    	$turun = DB::table('tb_pendakian')
    						->where('pd_status', 'sudah turun')
    						->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y'))
    						->select(DB::raw('count(pd_id) as tot'))->first();

    	$provinsi = DB::table('provinces')
    						->leftJoin('tb_pendakian', 'tb_pendakian.pd_provinsi', 'provinces.id')
                            // ->where('pd_pos_pendakian','!=','')
    						->select(DB::raw('count(pd_id) as tot'), 'name')
    						->groupBy('name')
    						->orderBy('tot', 'desc')
    						->limit(3)->get();

    	$l = DB::table('tb_pendakian')
				->where('pd_jenis_kelamin', 'L')
                ->where('pd_pos_pendakian','!=','')
				->select(DB::raw('count(pd_id) as tot'))->first();

		$l2 = DB::table('tb_anggota_pendakian')
                ->leftjoin('tb_pendakian','tb_pendakian.pd_id','tb_anggota_pendakian.ap_pendakian')
				->where('ap_kelamin', 'L')
                ->where('pd_pos_pendakian','!=','')
				->select(DB::raw('count(tb_anggota_pendakian.ap_pendakian) as tot'))->first();

		$p = DB::table('tb_pendakian')
                ->where('pd_jenis_kelamin', 'P')
                ->where('pd_pos_pendakian','!=','')
                ->select(DB::raw('count(pd_id) as tot'))->first();

		$p2 = DB::table('tb_anggota_pendakian')
                ->leftjoin('tb_pendakian','tb_pendakian.pd_id','tb_anggota_pendakian.ap_pendakian')
                ->where('ap_kelamin', 'P')
                ->where('pd_pos_pendakian','!=','')
                ->select(DB::raw('count(tb_anggota_pendakian.ap_pendakian) as tot'))->first();



    	$arr1 = $arr2 = [];

    	foreach ($provinsi as $key => $pr) {
    		array_push($arr1, $pr->name);
    		array_push($arr2, (float) $pr->tot);
    	}

    	$dateNow = date('Y-m-d');
        $loop = 5;
        $bulanChart = $tot1 = $tot2 = $tot3 = $tot4 = [];

        do{

        	$try = DB::table('tb_pos_pendakian')->select('pp_nama')
    					->leftJoin('tb_pendakian', 'tb_pendakian.pd_pos_pendakian', 'tb_pos_pendakian.pp_id')
    					->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y', strtotime('-'.$loop.' month', strtotime($dateNow))))
    					->where('pd_pos_pendakian', 1)
                        ->select(DB::raw('coalesce(count(pd_id), 0) as tot'))
    					->first();

    		$try2 = DB::table('tb_pos_pendakian')->select('pp_nama')
    					->leftJoin('tb_pendakian', 'tb_pendakian.pd_pos_pendakian', 'tb_pos_pendakian.pp_id')
    					->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y', strtotime('-'.$loop.' month', strtotime($dateNow))))
    					->where('pd_pos_pendakian', 2)
                        ->select(DB::raw('coalesce(count(pd_id), 0) as tot'))
    					->first();

    		$try3 = DB::table('tb_pos_pendakian')->select('pp_nama')
    					->leftJoin('tb_pendakian', 'tb_pendakian.pd_pos_pendakian', 'tb_pos_pendakian.pp_id')
    					->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y', strtotime('-'.$loop.' month', strtotime($dateNow))))
    					->where('pd_pos_pendakian', 3)
                        ->select(DB::raw('coalesce(count(pd_id), 0) as tot'))
    					->first();

    		$try4 = DB::table('tb_pos_pendakian')->select('pp_nama')
    					->leftJoin('tb_pendakian', 'tb_pendakian.pd_pos_pendakian', 'tb_pos_pendakian.pp_id')
    					->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y', strtotime('-'.$loop.' month', strtotime($dateNow))))
    					->where('pd_pos_pendakian', 4)
                        ->select(DB::raw('coalesce(count(pd_id), 0) as tot'))
    					->first();
            
            // return $try;

            array_push($bulanChart, date('M, Y', strtotime('-'.$loop.' month', strtotime($dateNow))));
            array_push($tot1, ($try->tot) ? (float) $try->tot : 0);
            array_push($tot2, ($try2->tot) ? (float) $try2->tot : 0);
            array_push($tot3, ($try3->tot) ? (float) $try3->tot : 0);
            array_push($tot4, ($try4->tot) ? (float) $try4->tot : 0);

            $loop--;

        }while($loop > 0);

    	return [
    		'rangking'		=> $rangking,
    		'registrasi'	=> ($registrasi) ? $registrasi->tot : 0,
    		'naik'			=> ($naik) ? $naik->tot : 0,
    		'turun'			=> ($turun) ? $turun->tot : 0,
    		'totpendakian'	=> ($totpendakian) ? $totpendakian->tot : 0,
    		'polar'		=> [
    			'province'	=> $arr1,
    			'tot'		=> $arr2
    		],
    		'doughnut'		=> [
    			'kelamin'	=> ['Laki-laki', 'Perempuan'],
    			'tot'		=> [
    				($l && $l2) ? $l->tot + $l2->tot : 0,
    				($p && $p2) ? $p->tot + $p2->tot : 0,
    			]
    		],
    		'line'			=> [
    			'bulan'	=> $bulanChart,
    			'tot1'	=> $tot1,
    			'tot2'	=> $tot2,
    			'tot3'	=> $tot3,
    			'tot4'	=> $tot4
    		]
    	];
    }

     private function resource2(){
     	
     	$totRegis = DB::table('tb_pendakian')
     					
	     				->select(DB::raw('count(pd_id) as tot'))->first();

     	$registrasi = DB::table('tb_pendakian')
	     				->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y'))
	     				
	     				->select(DB::raw('count(pd_id) as tot'))->first();

	    $totNaik = DB::table('tb_pendakian')
	    				->where('pd_status', 'sudah naik')
	     				->select(DB::raw('count(pd_id) as tot'))->first();

     	$naik = DB::table('tb_pendakian')
	     				->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y'))
	     				->where('pd_acc_naik_by', Auth::user()->user_id)
	     				->where('pd_status', 'sudah naik')
	     				->select(DB::raw('count(pd_id) as tot'))->first();

	    $totTurun = DB::table('tb_pendakian')
	    				->where('pd_status', 'sudah turun')
	     				->select(DB::raw('count(pd_id) as tot'))->first();

     	$turun = DB::table('tb_pendakian')
	     				->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y'))
	     				->where('pd_acc_naik_by', Auth::user()->user_id)
	     				->where('pd_status', 'sudah turun')
	     				->select(DB::raw('count(pd_id) as tot'))->first();

	    $totTolak = DB::table('tb_pendakian')
     					->where('pd_status', 'ditolak')
	     				->select(DB::raw('count(pd_id) as tot'))->first();

     	$tolak = DB::table('tb_pendakian')
	     				->where(DB::raw('concat(MONTH(pd_tgl_naik), "-", YEAR(pd_tgl_naik))'), date('n-Y'))
	     				->where('pd_status', 'ditolak')
	     				->select(DB::raw('count(pd_id) as tot'))->first();

     	return [
     		'totregis'		=> $totRegis->tot,
     		'registrasi'	=> $registrasi->tot,
     		'tottolak'		=> $totTolak->tot,
     		'tolak'			=> $tolak->tot,
     		'totnaik'		=> $totNaik->tot,
     		'naik'			=> $naik->tot,
     		'totturun'		=> $totTurun->tot,
     		'turun'			=> $turun->tot
     	];
     }
}
