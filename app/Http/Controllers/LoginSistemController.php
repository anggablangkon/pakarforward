<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class LoginSistemController extends Controller
{
    

	// public function __construct(){
	// 	if(Session::get('id') == false){
	// 		return redirect('/');
	// 	}
	// }

    public function index(Request $request)
    {
    	$username 		= $request->username;
    	$password 		= $request->password;

    	#membuat proses login kedalam sistem
        $iduser         = DB::table('t_users')->where('username', $username)->where('password', $password)->first();
    	$datausers 		= DB::select('select * from t_users where username = "'.$username.'" and password = "'.$password.'" ');
    	#kondisi proses login 
    	if(count($datausers) <= 0 ){
    		return redirect('/')->with('failed','Maaf username dan password yang anda masukan tidak sesuai');
    	}elseif(count($datausers) == 1){
    		#membuat session untuk seluruh data dalam tabel t_users
    		foreach ($datausers as $key ) {
    			Session::put('id', $key->id);
    			Session::put('nama', $key->nama);
    			Session::put('email', $key->email);
    			Session::put('username', $key->username);
    			Session::put('password', $key->password);
    			Session::put('hakakses', $key->hakakses);
    			Session::put('cdate', $key->cdate);
    		}

            #membuat session untuk panel user
            // $paneluser  = DB::select('select * from t_paneluser where iduser = "'.$iduser->id.'" ');
            // foreach ($paneluser as $key => $value) {
            //     Session::put($value->nama_fitur, $value->status);
            // }

              return redirect('/dashboard');
            
            if(Session::get('hakakses') == 1){
    		  return redirect('/dashboard');
            }elseif(Session::get('hakakses') == 2){
              return redirect('/dashboard');
            }else{
              return redirect('/dashboardmember');
            }
    		
    	}

    }



    public function logout(){
    	#membuang session login
    	Session::flush();
    	return redirect('/')->with('logout','Anda berhasil keluar dari sistem');
    }
}
