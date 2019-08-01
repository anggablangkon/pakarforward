@extends('layouts.layouts')

@section('title','Form Halaman Data solusi')

@section('css')
 <link type="text/css" href="assets/css/vendor-bootstrap-datatables.css" rel="stylesheet">
@endsection 

@section('content')
	
	<!-- message -->
    @include('/layouts/assets/message')


    <div class="row">
    <div class="col-sm-12">

    <!-- create data -->
    <a href="{{url('/laporanpasienperid')}}" target="_blank" class="btn btn-success">Download History </a>
    <div>
      <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg">
          <h5>List History Kepakaran Anda</h5>
        </div>
        <div class="widget-content">
        <!-- konten 1 -->
        <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Lahir</th>
                    <th>Detail Keluhan</th>
                    <th>Nama Penyakit</th>
                    <th>Detail Solusi</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?> 
              @foreach($listdata as $key => $values)
              <tr>
                  <td>{{$no++}}</td>
                  <td>{{$no++}}</td>
                  <td>{{$values->nama}}</td>
                  <td></td>
                  <td>{{$values->dt_keluhan}}</td>
                  <td>{{$values->dt_penyakit}}</td>
                  <td>{{$values->dt_solusi}}</td>
                  <td>{{$values->alamat}}</td>
              </tr>
              @endforeach
            </tbody>
        </table>     
        </div>

        </div>
      </div>
      </div>
    </div>

	</div>


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