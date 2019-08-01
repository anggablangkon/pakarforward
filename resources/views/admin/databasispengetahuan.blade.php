@extends('layouts.layouts')

@section('title','Form Halaman Data Keluhan')

@section('css')
 <link type="text/css" href="assets/css/vendor-bootstrap-datatables.css" rel="stylesheet">
@endsection 

@section('content')
	
	<!-- message -->
    @include('/layouts/assets/message')


    <div class="row">
    <div class="col-sm-4">

    <!-- create data -->
    <div>
      <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg">
          <h5>Tambah data basis pengetahuan</h5>
        </div>
        <div class="widget-content">
        <!-- konten 1 -->
       	<form method="post" action="{{url('/createdatabasispengetahuan')}}">
        		{{csrf_field()}}
        		<div class="form-group">
        			<label class="form-control-label" for="formGroupExampleInput">Kode Basis Pengetahuan <font color="red">** Otomatis oleh sistem</font></label>
        			<input type="text" name="" autofocus class="form-control" value="KBP-{{$kbp+1}}" disabled  autocomplete="off" required>
        			<input type="hidden" name="kbp" autofocus class="form-control" value="KBP-{{$kbp+1}}"  autocomplete="off" required>
        		</div>
        		<div class="form-group">
        			<label class="form-control-label" for="formGroupExampleInput2">Masukan Data Keluhan</label>
                    <select class="form-control select-2" required name="datakeluhan[]" multiple="multiple">
                        @foreach($datakeluhan as $key => $values)
                        <option value="{{$values->nm_keluhan}}">{{$values->kd_keluhan}} | {{$values->nm_keluhan}}</option>
                        @endforeach
                    </select>
        		</div>
                <div class="form-group">
                    <label class="form-control-label" for="formGroupExampleInput2">Masukan Data Penyakit</label>
                    <select class="form-control select-2" required name="datapenyakit[]" multiple="multiple">
                        @foreach($datapenyakit as $key => $values)
                        <option value="{{$values->nm_penyakit}}">{{$values->kd_penyakit}} | {{$values->nm_penyakit}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="formGroupExampleInput2">Masukan Data Solusi</label>
                    <select class="form-control select-2" required name="datasolusi[]" multiple="multiple">
                        @foreach($datasolusi as $key => $values)
                        <option value="{{$values->nm_solusi}}">{{$values->kd_solusi}} | {{$values->nm_solusi}}</option>
                        @endforeach
                    </select>
                </div>
        		<div class="form-group">
        			<label class="form-control-label" for="formGroupExampleInput2"></label>
        			<button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
        			<button type="reset" class="btn btn-danger btn-sm">BATAL</button>
        		</div>
        	</form>

        </div>
      </div>
      </div>
    </div>

	</div>

	<div class="col-sm-8">    
    <!-- message -->

    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg">
          <h5>List Data Basis Pengetahuan</h5>
        </div>
        <div class="widget-content">
        <!-- konten 1 -->
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kd. Basis Pengetahuan</td>
                            <td>Detail Keluhan</td>
                            <td>Detail Penyakit</td>
                            <td>Detail Solusi</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($listdata as $key => $values)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$values->kd_basispengetahuan}}</td>
                            <td>{{$values->dt_keluhan}}</td>
                            <td>{{$values->dt_penyakit}}</td>
                            <td>{{$values->dt_solusi}}</td>
                            <td>
                                <button onclick="hapus{{$values->id}}()" id="{{$values->id}}"  value="{{$values->id}}" class="btn btn-danger btn-sm">Hapus</button>
                            </td>
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

    <!-- delete data -->
    <div style="padding-top: 500px;">
        @foreach($listdata as $key => $id)
        <script>
            var id{{$id->id}} = document.getElementById("{{$id->id}}").value;
            function hapus{{$id->id}} (){
                Swal.fire({
                    title: '<h4> Hapus data ? {{$id->kd_basispengetahuan}} </h4>',
                    html: '<font size="3px;">Data yang dihapus <br/>tidak akan ditampilkan kembali dalam sistem</font>',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: '<font size="3px;"> Hapus ? </hapus> '
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Hapus!',
                            'Data berhasil dihapus.',
                            'success'
                            ).then(function() {
                                window.location = "{{url('/deletebasispengetahuan')}}/{{$id->id}}";
                            });
                        }
                    })
            }
        </script>
        @endforeach
    </div>


@endsection

@section('js')
<script>
	$(document).ready(function() {
            $('#table').DataTable();
 });
</script>
@endsection