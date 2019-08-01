<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use PDF;

class PenggunaController extends Controller
{
    public function register(){

    	return view('register');
    }

    public function prosesregister(Request $request){

    	#mendefinisikan varibael
    	$nama 	 			=  $request->namadepan.' '.$request->namabelakang;
    	$email 		 		=  $request->email;
    	$nohp 		 		=  $request->nohp;
    	$username 	 		=  $request->username;
    	$password 	 		=  $request->password;
    	$gender 	 		=  $request->gender;
    	$alamat 	 		=  $request->alamat;
    	$hakakses			=  '3';
    	$cby				=  '0';
    	$mby				=  '0';
    	$cdate 				=  date('d-m-y H:i:s');
    	$mdate 				=  date('d-m-y H:i:s');

    	#memasukan data kedalam tabel
    	DB::select('insert into t_users (id, nama, email, username, password, cby, mby, hakakses, cdate, mdate, isdelete) 
    				  values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array(null, $nama, $email, $username, $password, $cby, $mby, $hakakses, $cdate, $mdate, '0'));

    	$buatidpasien = collect(\DB::select('select id from t_users order by id desc'))->first();

    	#memasukan data kedalam pasien
    	DB::select('insert into t_pasien (id, nama, iduser, nohp, alamat) 
    				  values (?, ?, ?, ?, ?)', array(null, $nama, $buatidpasien->id, $nohp, $alamat));
    	

    	return redirect('/')->with('success','Data Anda Berhasil Dibuat, Silahkan Login Dengan Username dan Password Yang Telah Dibuat');

    }

    public function prosespakar(){

        #mendefinisikan variabel
        $iduser         = Session::get('id');
        
        $datakeluhan    = DB::select('select * from t_keluhan where isdelete = "0"  ');
        $detaildata     = DB::select('select * from t_pasien where iduser = "'.$iduser.'" ');


        return view('pasien/kepakaran', compact('detaildata','datakeluhan'));
    }

    public function listhistory(){

        #mendefinisikan variabel
        $idpasien   = Session::get('id');

        #menampilkan seluruh data pasien pengguna sistem pakar
        $listdata = DB::select(
                                'select tb1.idpasien, tb2.id, tb2.nama, tb1.idbasispengetahuan, 
                                tb3.dt_keluhan, tb3.dt_solusi, tb3.dt_penyakit, tb2.alamat
                                from t_historypasien tb1 
                                inner join t_pasien tb2 on tb1.idpasien = tb2.iduser
                                inner join t_basispengetahuan tb3 on tb1.idbasispengetahuan = tb3.id  
                                where tb1.isdelete = "0" and tb1.idpasien = "'.$idpasien.'"
                              ');

        return view('pasien/listhistorypakar',compact('listdata'));
    }

    public function laporanpasienperid(){

        #mendefinisikan variabel
        $idpasien   = Session::get('id');

        #menampilkan seluruh data pasien pengguna sistem pakar
        $listdata = DB::select(
                                'select tb1.idpasien, tb2.id, tb2.nama, tb1.idbasispengetahuan, 
                                tb3.dt_keluhan, tb3.dt_solusi, tb3.dt_penyakit, tb2.alamat
                                from t_historypasien tb1 
                                inner join t_pasien tb2 on tb1.idpasien = tb2.iduser
                                inner join t_basispengetahuan tb3 on tb1.idbasispengetahuan = tb3.id  
                                where tb1.isdelete = "0" and tb1.idpasien = "'.$idpasien.'"
                              ');

       $pdf = PDF::loadView('laporan.historiperpasien', compact('listdata'));
       return $pdf->stream('invoice.pdf');
    }
}
