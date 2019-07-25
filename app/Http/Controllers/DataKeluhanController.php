<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class DataKeluhanController extends Controller
{
    public function index(){
    	
        $datakeluhan   = DB::table('t_keluhan')->where('isdelete', 1)->get();

        $kdkeluhan 	   = count($datakeluhan);

    	return view('admin/datakeluhan', compact('datakeluhan','kdkeluhan'));

    }

    public function create(Request $request){

    	#mendefiniskan variabel
        $kd_keluhan       = $request->kd_keluhan; 
        $nm_keluhan       = $request->nm_keluhan;
        $cby        	  = Session::get('id');
        $mby        	  = '0';
        $cdate      	  = date('Y-m-d H:i:s'); 
        $mdate      	  = date('Y-m-d H:i:s'); 

        #membuat validasi no duplikat
        $duplikat   = DB::table('t_keluhan')->where('kd_keluhan', $kd_keluhan)->first();

        if($duplikat != true ){
        
            #memasukan data kedalam tabel
            $simpan     = DB::select('insert into t_keluhan (id, kd_keluhan, nm_keluhan, cby, mby, cdate, mdate, isdelete) values (?, ?, ?, ?, ?, ?, ?, ?)', array(null, $kd_keluhan, $nm_keluhan, $cby, $mby, $cdate, $mdate, '0') );

            return redirect('/datakeluhan')->with('success', 'Data jenis kulit berhasil ditambahkan');
        
        }else{

            return redirect('/datakeluhan')->with('failed', 'Data jenis kulit telah digunakan oleh nama jenis kulit : "'.$duplikat->nm_keluhan.'" ');

        }

    }

    public function delete($id){

        #mendefinisikan variabel
        $mdate      = date('d-m-y H:i:s');
        $mby        = Session::get('id');

        #merubah isdelete menjadi 1 untuk data yang tidak digunakan
        $hapus      = DB::select('update t_keluhan set kd_keluhan = "null", isdelete = "1", mdate = "'.$mdate.'", mby = "'.$mby.'"  where id = "'.$id.'" ');

        return redirect('/datakeluhan')->with('failed', 'Data kerusakan kulit berhasil dihapus');
    }

    public function update(Request $request){

        #mendefiniskan variabel
        $id         = $request->id; 
        $kdkeluhan  = $request->kd_keluhan; 
        $nmkeluhan  = $request->nm_keluhan;
        $cby        = Session::get('id');
        $mby        = Session::get('id');
        $mdate      = date('d-m-y H:i:s');

        #memasukan data
        $update     = DB::select('update t_keluhan set kd_keluhan = "'.$kdkeluhan.'", nm_keluhan = "'.$nmkeluhan.'", mdate = "'.$mdate.'", mby = "'.$mby.'"  where id = "'.$id.'" and isdelete = "0" ');
        

        #membuat kondisi berhasil
        if($update == true){
            return redirect('/datakeluhan')->with('failed', 'Data jenis keluhan tidak berhasil diperbarui');
        }else{
            return redirect('/datakeluhan')->with('success', 'Data jenis keluhan berhasil diperbarui');
        }

    }

}
