@extends('layouts.layouts')

@section('title','Form Halaman Data Pengguna')

@section('content')

	<!-- message -->
	@include('/layouts/assets/message')
	
    <div class="row">
	<div class="col-sm-4">


    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg">
          <span class="icon"><i class="material-icons">person_add</i></span>
          <h5>Tambah Data Pengguna</h5>
        </div>
        <div class="widget-content">
        	<form method="post" action="{{url('/createdatapengguna')}}">
        		{{csrf_field()}}
        		<div class="form-group">
        			<label class="form-control-label" for="formGroupExampleInput">Nama</label>
        			<input type="text" name="nama" autofocus class="form-control" autocomplete="off" required>
        		</div>
        		<div class="form-group">
        			<label class="form-control-label" for="formGroupExampleInput2">Email</label>
        			<input type="text" name="email" class="form-control" id="formGroupExampleInput2" required>
        		</div>
        		<div class="form-group">
        			<label class="form-control-label" for="formGroupExampleInput2">Username</label>
        			<input type="text" name="username" class="form-control" id="formGroupExampleInput2" required>
        		</div>
        		<div class="form-group">
        			<label class="form-control-label" for="formGroupExampleInput2">Password</label>
        			<input type="password" name="password" class="form-control" id="formGroupExampleInput2" required>
        		</div>
        		<div class="form-group">
        			<label class="form-control-label" for="formGroupExampleInput2">Hak Akses</label>
        			<select class="select-2" name="hakakses" required>
				        <option selected>-- Pilih Hak Akses --</option>
				        <option value="1"> Admin Pusat </option>
				        <option value="2"> Admin Biasa </option>
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
    <!-- end col-sm-4 -->

	<div class="col-sm-8">
		<div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg">
          <span class="icon"><i class="material-icons">view_list</i></span>
          <h5>List Data Pengguna</h5>
        </div>
        
        <div class="widget-content">
            <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Cari berdasarkan username">
            <br/>&nbsp;
        	<div class="table-responsive">
        		<table id="myTable" class="table table-striped table-bordered" style="width:100%">
        			<thead>
        				<tr>
        					<td>No</td>
                            <td>Username</td>
        					<td>Nama</td>
                            <td>Level</td>
        					<td>Aksi</td>
        				</tr>
        			</thead>
        			<tbody>
                        <?php $no = 1; ?>
                        @foreach($data as $key => $value)
        				<tr>
        					<td>{{$no++}}</td>
                            <td>{{$value->username}}</td>
                            <td>{{$value->nama}}</td>
        					<td>
                                @if($value->hakakses == 1)
                                Admin Pusat
                                @elseif($value->hakakses == 2)
                                Admin Biasa
                                @endif               
                            </td>
                            <td>
                                <a onclick="document.getElementById('id{{$value->id}}').style.display='block'" style="color: white" class="btn btn-primary btn-sm">Update</a>
                                <button onclick="hapus{{$value->id}}()" id="{{$value->id}}"  value="{{$value->id}}" class="btn btn-danger btn-sm">
                                     Hapus
                                </button>
                                <a onclick="document.getElementById('panel{{$value->id}}').style.display='block'" style="color: white" class="btn btn-warning btn-sm">Panel</a>
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

    </div>
    <!-- end col-sm-12 -->

    <!--modal update-->
    @foreach($data as $key => $value)
    <div id="id{{$value->id}}" class="w3-modal" style="margin-top: 20px;">
        <div class="w3-modal-content w3-card-4">
        <form method="post" action="{{url('/updatedatapengguna')}}">
          <header class="w3-container w3-grey"> 
            <span onclick="document.getElementById('id{{$value->id}}').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <!-- header modal -->
                &nbsp;
                <p>Perbarui data untuk : <b>{{$value->nama}}</b></p>
            </header>
            <div class="w3-container">
                <!-- modal content -->
                <div class="container">
                {{csrf_field()}}&nbsp;
                <div class="form-group">
                    <label class="form-control-label" for="formGroupExampleInput">Nama</label>
                    <input type="hidden" name="id" value="{{$value->id}}" autofocus class="form-control" autocomplete="off" required>
                    <input type="text" name="nama" value="{{$value->nama}}" autofocus class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="formGroupExampleInput2">Email</label>
                    <input type="text" name="email" value="{{$value->email}}" class="form-control" id="formGroupExampleInput2" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="formGroupExampleInput2">Username</label>
                    <input type="text" name="username" value="{{$value->username}}" class="form-control" id="formGroupExampleInput2" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="formGroupExampleInput2">Password</label>
                    <input type="password" name="password" class="form-control" id="formGroupExampleInput2">
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="formGroupExampleInput2">Hak Akses</label>
                    <select class="select-2" name="hakakses" required>
                        <option value="{{$value->hakakses}}">
                            @if($value->hakakses == 1)
                            Admin
                            @elseif($value->hakakses == 2)
                            Dokter
                            @elseif($value->hakakses == 3)
                            Perawat
                            @endif
                            -- Status Aktif --
                        </option>
                        <option value="1"> Admin Pusat </option>
                        <option value="2"> Admin Biasa </option>
                    </select>
                </div>
                </div>
            </div>
            <footer class="w3-container w3-grey">
                <!-- footer modal -->
                <br/>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm">Batal</button>
                </br></br>
            </footer>
            </form>
        </div>
    </div>
     <div id="panel{{$value->id}}" class="w3-modal" style="margin-top: 20px;">
        <div class="w3-modal-content w3-card-4">
        <form method="post" action="{{url('/createpaneluser')}}">
          <header class="w3-container w3-black"> 
            <span onclick="document.getElementById('panel{{$value->id}}').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <!-- header modal -->
                &nbsp;
                <p>Perbarui Panel : <b>{{$value->nama}}</b></p>
            </header>
            <div class="w3-container">
                <!-- modal content -->
                <div class="container">
                {{csrf_field()}}&nbsp;
                <!-- content -->
                    
                    <h5>Gunakan Panel Managemen Sesuai Dengan Tugas Users :</h5>
                    <h5>Panel Biasa</h5>
                    <table style="font-weight: bold;">
                        <input type="hidden" name="iduser" value="{{$value->id}}">

                        <tr>
                            <td>Pendaftaran Pasien Baru</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Pendaftaran Pasien Baru" data-off-text="No" @if(Session::get('Pendaftaran Pasien Baru') == 1) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td>Rekam Pembelian Cream</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Rekam Pembelian Cream" data-off-text="No" @if(Session::get('Rekam Pembelian Cream') == 1) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td>Pendaftaran Pasien Berobat</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Pendaftaran Pasien Berobat" data-off-text="No" @if(Session::get('Pendaftaran Pasien Berobat') == 1 ) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td>Antrian Pasien</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Antrian Pasien" data-off-text="No" @if(Session::get('Antrian Pasien') == 1 ) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td>Akses Sistem Pakar</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Akses Sistem Pakar" data-off-text="No" @if(Session::get('Akses Sistem Pakar') == 1 ) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <h4>Master Data</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Pengguna</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Data Pengguna" data-off-text="No" @if(Session::get('Data Pengguna') == 1) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Jenis Kulit</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Data Jenis Kulit" data-off-text="No" @if(Session::get('Data Jenis Kulit') == 1) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Kerusakan Kulit</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Data Kerusakan Kulit" data-off-text="No" @if(Session::get('Data Kerusakan Kulit') == 1) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Treatment</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Data Treatment" data-off-text="No" @if(Session::get('Data Treatment') == 1) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Cream</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Data Cream" data-off-text="No" @if(Session::get('Data Cream') == 1) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Pasien</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Data Pasien" data-off-text="No" @if(Session::get('Data Pasien') == 1) checked @endif>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Basis Pengetahuan</td>
                            <td>:</td>
                            <td>
                            <input type="checkbox" name="fiturpanel[]" value="Data Basis Pengetahuan" data-off-text="No" @if(Session::get('Data Basis Pengetahuan') == 1) checked @endif>
                            </td>
                        </tr>
                    </table>
                    &nbsp;

                </div>
            </div>
            <footer class="w3-container w3-black">
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

@endsection

@section('js')
    @foreach($data as $key => $id)
    <script>
        var id{{$id->id}} = document.getElementById("{{$id->id}}").value;
        function hapus{{$id->id}} (){
            Swal.fire({
              title: '<h4> Hapus data ? {{$id->nama}} </h4>',
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
                window.location = "{{url('/deletedatapengguna')}}/{{$id->id}}";
                });
              }
            })
        }
    </script>
    @endforeach
@endsection

