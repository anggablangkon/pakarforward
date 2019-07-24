<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Session;

class DataPenggunaController extends Controller
{
    public function index(){

    	#mengambil data dalam tabel
        $data       = DB::select('select * from t_users where isdelete = "0" and hakakses in ("1","2") ');
    	
    	return view('admin/datapengguna', compact('data'));

    }

    public function create(Request $request){

    	#mendefiniskan variabel
    	$nama 		= $request->nama;
    	$email 		= $request->email;
    	$username 	= $request->username;
    	$password	= Hash::make($request->password);
    	$hakakses	= '1';
    	$cby		= Session::get('id');
    	$mby		= '0';
    	$cdate 		= date('d-m-y H:i:s');
    	$mdate 		= date('d-m-y H:i:s');

    	#memasukan data
    	$simpan 	= DB::select('insert into t_users (id, nama, email, username, password, cby, mby, hakakses, cdate, mdate, isdelete) 
    				  values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array(null, $nama, $email, $username, $password, $cby, $mby, $hakakses, $cdate, $mdate, '0'));

    	return redirect('/datapengguna')->with('success', 'Data pengguna berhasil ditambahkan');
    
    }

    public function update(Request $request){

        #mendefiniskan variabel
        $id         = $request->id;
        $nama       = $request->nama;
        $email      = $request->email;
        $username   = $request->username;
        $password   = $request->password;
        $hakakses   = $request->hakakses;
        $cby        = Session::get('id');
        $mby        = Session::get('id');
        $mdate      = date('d-m-y H:i:s');

        #memasukan data
        $sql      = 'update t_users set nama = "'.$nama.'", email = "'.$email.'", username = "'.$username.'", hakakses = "'.$hakakses.'", mby = "'.$mby.'", mdate = "'.$mdate.'"';
        if($password == null){
        }else{
        $sql      .= ', password = "'.$password.'" ';          
        }
        $sql      .= 'where id = "'.$id.'" and isdelete = "0" and cby = "'.$cby.'"';

        $update    = DB::select($sql);

        #membuat kondisi berhasil
        if($update == true){
            return redirect('/datapengguna')->with('failed', 'Data pengguna tidak berhasil diperbarui');
        }else{
            return redirect('/datapengguna')->with('success', 'Data pengguna berhasil diperbarui');
        }

    }

    public function delete($id){

        #mendefinisikan variabel
        $mdate      = date('d-m-y H:i:s');

        #merubah isdelete menjadi 1 untuk data yang tidak digunakan
        $hapus      = DB::select('update t_users set isdelete = "1", mdate = "'.$mdate.'"  where id = "'.$id.'" ');

        return redirect('/datapengguna')->with('success', 'Data pengguna berhasil dihapus');
    }

}
