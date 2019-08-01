<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class DataMemberController extends Controller
{
    public function index(){

    	#menampilkan seluruh data pasien
    	$listpasien = DB::select('select * from t_pasien inner join t_users on t_users.id = t_pasien.iduser ');

    	return view('admin/datapasien', compact('listpasien'));
    }
}
