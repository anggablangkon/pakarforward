<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class DataBasisController extends Controller
{
    public function index(){

    	#mengambil data keluhan
    	$datakeluhan 	= DB::select('select * from t_keluhan where isdelete = "0" ');

    	#mengambil data solusi
    	$datasolusi 	= DB::select('select * from t_solusi where isdelete = "0" ');

        #mengambil data penyakit
        $datapenyakit   = DB::select('select * from t_penyakit where isdelete = "0" ');


    	$listdata 		= DB::select('select * from t_basispengetahuan where isdelete = "0" ');
    	$kbp 	 	    = count($listdata);

    	return view('admin/databasispengetahuan', compact('datakeluhan','datasolusi','datapenyakit','listdata','kbp'));

    }

    public function create(Request $request){

    	#mendefinisikan variabel
    	$id 		= null;
    	$kbp		= $request->kbp;
    	$dt_keluhan = implode(",", $request->datakeluhan);
        $dt_solusi  = implode(",", $request->datasolusi);
    	$dt_penyakit= implode(",", $request->datapenyakit);
    	$cby 		= Session::get('id');
    	$mby 		= Session::get('id');
    	$cdate 		= date('Y-m-d H:i:s');
    	$mdate 		= date('Y-m-d H:i:s');
    	$isdelete	= 0;


    	#menyimpan kedalam tabel
    	$simpan    = DB::select('insert into t_basispengetahuan (id, kd_basispengetahuan, dt_keluhan, dt_penyakit, dt_solusi, 
                                cby, mby, cdate, mdate, isdelete) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array($id, $kbp, $dt_keluhan, $dt_penyakit, $dt_solusi, $cby, $mby, $cdate, $mdate, '0') );

    	return redirect('/databasispengetahuan')->with('success','Data basis pengetahuan berhasil ditambahkan');

    }

    public function delete($id){
        
        #melakukan proses penghapusan data
        $remak     = DB::select('update t_basispengetahuan set isdelete = "1", kd_basispengetahuan = "remak" where id = "'.$id.'" ');

        return redirect('databasispengetahuan')->with('failed','Data berhasil dihapus');
    }
}
