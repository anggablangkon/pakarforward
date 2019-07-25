<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class DataSolusiController extends Controller
{
    public function index(){


        $datasolusi   = DB::table('t_solusi')->where('isdelete', 1)->get();

        $kdsolusi 	   = count($datasolusi);

    	return view('admin/datasolusi', compact('datasolusi','kdsolusi'));

    }

    public function create(Request $request){

    	#mendefiniskan variabel
        $kd_solusi        = $request->kd_solusi; 
        $nm_solusi        = $request->nm_solusi;
        $cby        	  = Session::get('id');
        $mby        	  = '0';
        $cdate      	  = date('Y-m-d H:i:s'); 
        $mdate      	  = date('Y-m-d H:i:s'); 

        #membuat validasi no duplikat
        $duplikat   = DB::table('t_solusi')->where('kd_solusi', $kd_solusi)->first();

        if($duplikat != true ){
        
            #memasukan data kedalam tabel
            $simpan     = DB::select('insert into t_solusi (id, kd_solusi, nm_solusi, cby, mby, cdate, mdate, isdelete) values (?, ?, ?, ?, ?, ?, ?, ?)', array(null, $kd_solusi, $nm_solusi, $cby, $mby, $cdate, $mdate, '0') );

            return redirect('/datasolusi')->with('success', 'Data solusi berhasil ditambahkan');
        
        }else{

            return redirect('/datasolusi')->with('failed', 'Data solusi telah digunakan oleh nama solusi : "'.$duplikat->nm_keluhan.'" ');

        }

    }

    public function delete($id){

        #mendefinisikan variabel
        $mdate      = date('d-m-y H:i:s');
        $mby        = Session::get('id');

        #merubah isdelete menjadi 1 untuk data yang tidak digunakan
        $hapus      = DB::select('update t_solusi set kd_solusi = "null", isdelete = "1", mdate = "'.$mdate.'", mby = "'.$mby.'"  where id = "'.$id.'" ');

        return redirect('/datasolusi')->with('failed', 'Data kerusakan kulit berhasil dihapus');
    }

    public function update(Request $request){

        #mendefiniskan variabel
        $id         = $request->id; 
        $kd_solusi  = $request->kd_solusi; 
        $nm_solusi  = $request->nm_solusi;
        $cby        = Session::get('id');
        $mby        = Session::get('id');
        $mdate      = date('d-m-y H:i:s');

        #memasukan data
        $update     = DB::select('update t_solusi set kd_solusi = "'.$kd_solusi.'", nm_solusi = "'.$nm_solusi.'", mdate = "'.$mdate.'", mby = "'.$mby.'"  where id = "'.$id.'" and isdelete = "0" ');
        

        #membuat kondisi berhasil
        if($update == true){
            return redirect('/datasolusi')->with('failed', 'Data jenis keluhan tidak berhasil diperbarui');
        }else{
            return redirect('/datasolusi')->with('success', 'Data jenis keluhan berhasil diperbarui');
        }

    }
}
