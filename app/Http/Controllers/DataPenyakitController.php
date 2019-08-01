<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class DataPenyakitController extends Controller
{
    public function index(){

    	$datapenyakit   = DB::table('t_penyakit')->where('isdelete', 1)->get();

        $kdpenyakit 	= count($datapenyakit);

    	return view('admin/datapenyakit', compact('datapenyakit','kdpenyakit'));
    }

    public function create(Request $request){

    	#mendefiniskan variabel
        $kd_penyakit      = $request->kd_penyakit; 
        $nm_penyakit      = $request->nm_penyakit;
        $cby        	  = Session::get('id');
        $mby        	  = '0';
        $cdate      	  = date('Y-m-d H:i:s'); 
        $mdate      	  = date('Y-m-d H:i:s'); 

        #membuat validasi no duplikat
        $duplikat   = DB::table('t_penyakit')->where('kd_penyakit', $kd_penyakit)->first();

        if($duplikat != true ){
        
            #memasukan data kedalam tabel
            $simpan     = DB::select('insert into t_penyakit (id, kd_penyakit, nm_penyakit, cby, mby, cdate, mdate, isdelete) values (?, ?, ?, ?, ?, ?, ?, ?)', array(null, $kd_penyakit, $nm_penyakit, $cby, $mby, $cdate, $mdate, '0') );

            return redirect('/datapenyakit')->with('success', 'Data penyakit berhasil ditambahkan');
        
        }else{

            return redirect('/datapenyakit')->with('failed', 'Data penyakit telah digunakan oleh nama penyakit : "'.$duplikat->nm_keluhan.'" ');

        }

    }

    public function update(Request $request){

        #mendefiniskan variabel
        $id           = $request->id; 
        $kd_penyakit  = $request->kd_penyakit; 
        $nm_penyakit  = $request->nm_penyakit;
        $cby          = Session::get('id');
        $mby          = Session::get('id');
        $mdate        = date('d-m-y H:i:s');

        #memasukan data
        $update     = DB::select('update t_penyakit set kd_penyakit = "'.$kd_penyakit.'", nm_penyakit = "'.$nm_penyakit.'", mdate = "'.$mdate.'", mby = "'.$mby.'"  where id = "'.$id.'" and isdelete = "0" ');
        

        #membuat kondisi berhasil
        if($update == true){
            return redirect('/datapenyakit')->with('failed', 'Data jenis penyakit tidak berhasil diperbarui');
        }else{
            return redirect('/datapenyakit')->with('success', 'Data jenis penyakit berhasil diperbarui');
        }

    }

    public function delete($id){

        #mendefinisikan variabel
        $mdate      = date('d-m-y H:i:s');
        $mby        = Session::get('id');

        #merubah isdelete menjadi 1 untuk data yang tidak digunakan
        $hapus      = DB::select('update t_penyakit set kd_penyakit = "null", isdelete = "1", mdate = "'.$mdate.'", mby = "'.$mby.'"  where id = "'.$id.'" ');

        return redirect('/datapenyakit')->with('failed', 'Data penyakit berhasil dihapus');
    }
}
