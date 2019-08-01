@extends('layouts.layouts')

@section('title','Form Halaman Data penyakit')

@section('css')
 <link type="text/css" href="assets/css/vendor-bootstrap-datatables.css" rel="stylesheet">
@endsection 

@section('content')
	
	<!-- message -->
    @include('/layouts/assets/message')


    <div class="row">
	<div class="col-sm-12">    
    <!-- message -->

    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg">
          <h5>List Data Pasien Terdaftar</h5>
        </div>
        <div class="widget-content">
        <!-- konten 1 -->
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Id Pasien</td>
                            <td>Nama</td>
                            <td>Tanggal Lahir</td>
                            <td>Jenis Kelamin</td>
                            <td>Email</td>
                            <td>No HP</td>
                            <td>Alamat</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($listpasien as $key => $values)
                        <tr>
                            <td>{{$no++}}</td>
                            <td></td>
                            <td>{{$values->nama}}</td>
                            <td></td>
                            <td></td>
                            <td>{{$values->email}}</td>
                            <td>{{$values->nohp}}</td>
                            <td>{{$values->alamat}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
        </div>

      </div>
    </div>

    </div>
    <!-- end col-sm-4 -->

    </div>
    <!-- end col-sm-12 -->



@endsection

@section('js')
<script>
	$(document).ready(function() {
            $('#table').DataTable();
 });
</script>
@endsection