@extends('layouts.layouts')

@section('title','Form Halaman Data solusi')

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
          <h5>Tambah data solusi</h5>
        </div>
        <div class="widget-content">
        <!-- konten 1 -->
       	<form method="post" action="{{url('/createdatasolusi')}}">
        		{{csrf_field()}}
        		<div class="form-group">
        			<label class="form-control-label" for="formGroupExampleInput">Kode Keluhaan <font color="red">** Otomatis oleh sistem</font></label>
        			<input type="text" name="nama" autofocus class="form-control" value="KS-{{$kdsolusi+1}}" disabled  autocomplete="off" required>
        			<input type="hidden" name="kd_solusi" autofocus class="form-control" value="KS-{{$kdsolusi+1}}"  autocomplete="off" required>
        		</div>
        		<div class="form-group">
        			<label class="form-control-label" for="formGroupExampleInput2">Nama solusi</label>
        			<input type="text" name="nm_solusi" class="form-control" id="formGroupExampleInput2" required>
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
          <h5>List Data solusi</h5>
        </div>
        <div class="widget-content">
        <!-- konten 1 -->
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kd. solusi</td>
                            <td>Nm. solusi</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $no =1; ?>
                    	@foreach($datasolusi as  $key  => $values)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$values->kd_solusi}}</td>
                            <td>{{$values->nm_solusi}}</td>
                            <td>
                            	<a onclick="document.getElementById('id{{$values->id}}').style.display='block'" style="color: white" class="btn btn-primary btn-sm">Update</a>
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

    @foreach($datasolusi as $key => $value)
    <div id="id{{$value->id}}" class="w3-modal" style="margin-top: 20px;">
        <div class="w3-modal-content w3-card-4">
        <form method="post" action="{{url('/updatesolusi')}}">
          <header class="w3-container w3-grey"> 
            <span onclick="document.getElementById('id{{$value->id}}').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <!-- header modal -->
                &nbsp;
                <p>Perbarui data untuk nama jenis kulit : <b>{{$value->nm_solusi}}</b></p>
            </header>
            <div class="w3-container">
                <!-- modal content -->
                <div class="container">
                {{csrf_field()}}&nbsp;
                <div class="form-group">
                    <label class="form-control-label" for="formGroupExampleInput">Kd. Jenis Kulit</label>
                    <input type="hidden" name="id" value="{{$value->id}}" autofocus class="form-control" autocomplete="off" required>
                    <input type="text"  disabled value="{{$value->kd_solusi}}" autofocus class="form-control" autocomplete="off" required>
                    <input type="hidden" name="kd_solusi" value="{{$value->kd_solusi}}" autofocus class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="formGroupExampleInput">Nm. Jenis Kulit</label>
                    <input type="text" name="nm_solusi" value="{{$value->nm_solusi}}"  class="form-control" autocomplete="off" required>
                </div>
                </div>
            </div>
            <footer class="w3-container w3-greys">
                <!-- footer modal -->
                <br/>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm">Batal</button>
                </br></br>
            </footer>
            </form>
        </div>
    </div>
    @endforeach
    <!-- delete data -->
    <div style="padding-top: 500px;">
        @foreach($datasolusi as $key => $id)
        <script>
            var id{{$id->id}} = document.getElementById("{{$id->id}}").value;
            function hapus{{$id->id}} (){
                Swal.fire({
                    title: '<h4> Hapus data ? {{$id->nm_solusi}} </h4>',
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
                                window.location = "{{url('/deletedatasolusi')}}/{{$id->id}}";
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