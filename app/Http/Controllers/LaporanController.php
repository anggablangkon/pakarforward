<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class LaporanController extends Controller
{
    public function alllaporan(){

    	#menampilkan seluruh data pasien pengguna sistem pakar
        $listdata = DB::select(
                                'select tb1.idpasien, tb2.id, tb2.nama, tb1.idbasispengetahuan, 
                                tb3.dt_keluhan, tb3.dt_solusi, tb3.dt_penyakit, tb2.alamat
                                from t_historypasien tb1 
                                inner join t_pasien tb2 on tb1.idpasien = tb2.iduser 
                                inner join t_basispengetahuan tb3 on tb1.idbasispengetahuan = tb3.id  
                                where tb1.isdelete = "0" 
                              ');

       $pdf = PDF::loadView('laporan.semuahistoripasien', compact('listdata'));
       return $pdf->stream('invoice.pdf');
    }
}
