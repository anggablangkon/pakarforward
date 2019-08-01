@extends('layouts.layouts')

@section('title','Form Halaman Data Keluhan')

@section('css')
 <link type="text/css" href="assets/css/vendor-bootstrap-datatables.css" rel="stylesheet">
@endsection 

@section('content')
	
	<!-- message -->
    @include('/layouts/assets/message')


    <div class="row">
    <div class="col-sm-2"></div>
	<div class="col-sm-8">    
    <!-- message -->

    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg">
        <center>
          <h5>Hasil Pemrosesan Kepakaran</h5>
        </center>
        </div>
        <div class="widget-content">
        <!-- konten 1 -->
        <form action="{{url('/savehistory')}}" method="post">
        @csrf
        <input type="hidden" name="ibp" value="{{$proseskepakaran->id}}">
        <input type="hidden" name="idpasien" value="{{$idpasien}}">
     	@if($proseskepakaran == true)
     	 <div class="widget-box">
	        <div class="widget-content">
	        <!-- konten 1 -->
	           <h5>Detail Keluhan Yang Anda Masukan :</h5>
	           <textarea class="form-control" disabled>{!! str_replace(',', ' dan ', $proseskepakaran->dt_keluhan) !!}
	           </textarea>
	        </div>
	      </div>

	      <div class="widget-box">
	        <div class="widget-content">
	        <!-- konten 1 -->
	           <h5>Ini Adalah Data Penyakit Yang Kami Amati Dari Keluhan Yang Anda Masukan :</h5>
	           <textarea class="form-control" disabled>{{ str_replace(',', ' dan ', $proseskepakaran->dt_penyakit) }}
	           </textarea>
	        </div>
	      </div>

	      <div class="widget-box">
	        <div class="widget-content">
	        <!-- konten 1 -->
	           <h5>Dan Inilah Hasil Solusi Yang Dapat Sistem Berikan :</h5>
	           <textarea class="form-control" disabled>{{ str_replace(',', ' dan ', $proseskepakaran->dt_solusi) }}
	           </textarea>
	        </div>
	      </div>

	      <div class="widget-box">
	        <div class="widget-content">
	        <!-- konten 1 -->
	           <button class="btn btn-primary">SIMPAN</button>
	           <a href="{{url('/aksessistempakar')}}" class="btn btn-warning"> KEMBALI</a>
	        </div>
	      </div>
	      </form>
	      @else
	      	<div class="widget-box">
	        <div class="widget-content">
	        <!-- konten 1 -->
	           <h5>Maap, Sistem Pakar Tidak Dapat Menemukan Solusi Dari Gejala Yang Anda Masukan</h5>
	        </div>
	      	</div>
	          <a href="{{url('/aksessistempakar')}}"> <button class="btn btn-warning">KEMBALI</button></a>
	      @endif





        </div>

      </div>
    </div>

    </div>
    <!-- end col-sm-4 -->

    </div>
    <!-- end col-sm-12 -->


@endsection
