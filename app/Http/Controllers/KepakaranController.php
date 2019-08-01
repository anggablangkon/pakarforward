<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class KepakaranController extends Controller
{
    public function index(){

        $datakeluhan = DB::select('select * from t_keluhan where isdelete = "0"  ');
    	$datapasien  = DB::select('select * from t_pasien ');

    	return view('admin/kepakaran', compact('datakeluhan','datapasien'));
    }

    public function proses(Request $request){

    	#mendefinisikan varibael
        $datakeluhan         = implode(",", $request->datakeluhan);
        $idpasien            = $request->idpasien;

    	#menyelleksi data keluhan
    	$proseskepakaran 	 = collect(\DB::select('select * from t_basispengetahuan where dt_keluhan = "'.$datakeluhan.'" and isdelete = "0" '))->first();



    	return view('admin/viewkepakaran', compact('proseskepakaran','idpasien'));
    }

    public function save(Request $request){

        #mendefinisikan variabel
        $id                  = null;
        $idpasien            = $request->idpasien;
        $idbasispengetahuan  = $request->ibp;
        $cby                 = Session::get('id');
        $mby                 = Session::get('id');
        $cdate               = date('Y-m-d H:i:s');
        $mdate               = date('Y-m-d H:i:s');
        $isdelete            = 0;

        #melakukan proses pemasukan data kedalam tabel
        $simpan     = DB::select('insert into t_historypasien (id, idpasien, idbasispengetahuan, cby, mby, cdate, mdate, isdelete) values (?, ?, ?, ?, ?, ?, ?, ?)', array(null, $idpasien, $idbasispengetahuan, $cby, $mby, $cdate, $mdate, '0') );

        if(Session::get('hakakses') != 3){
            return redirect('/aksessistempakar')->with('success', 'Data Kepakaran berhasil Disimpan Berdasarkan History Pengguna');
        }else{
            return redirect('/kepakaranpasien')->with('success', 'Data Kepakaran berhasil Disimpan Berdasarkan History Pengguna');
        }

    }

    public function listhistory(){

        #menampilkan seluruh data pasien pengguna sistem pakar
        $listdata = DB::select(
                                'select tb1.idpasien, tb2.id, tb2.nama, tb1.idbasispengetahuan, 
                                tb3.dt_keluhan, tb3.dt_solusi, tb3.dt_penyakit, tb2.alamat
                                from t_historypasien tb1 
                                inner join t_pasien tb2 on tb1.idpasien = tb2.iduser 
                                inner join t_basispengetahuan tb3 on tb1.idbasispengetahuan = tb3.id  
                                where tb1.isdelete = "0" 
                              ');

        return view('admin/listhistorypakar', compact('listdata'));
    }
}
