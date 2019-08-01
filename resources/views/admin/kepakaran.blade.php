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
    <form action="{{url('proseskapakaran')}}" method="post">
    <div>
      <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg">
          <h5>Pilih Data Pasien</h5>
        </div>
        <div class="widget-content">
        <!-- konten 1 -->

             <select class="form-control" required name="idpasien">
              @foreach($datapasien as $key => $values)
              <option value="{{$values->iduser}}">{{$values->nama}}</option>
              @endforeach
            </select>
       	
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
          <h5>Proses Kapakaran Sistem</h5>
        </div>

        <div class="widget-content">
        {{csrf_field()}}
        <!-- konten 1 -->
          <div class="widget-box">
            <div class="widget-content">
            <!-- konten 1 -->
              <h5>Silahkan masukan gejala yang anda alami untuk menemukan solusi :</h5>                   
            </div>
          </div>

            &nbsp;
            <select class="form-control select-2" required name="datakeluhan[]" multiple="multiple">
              @foreach($datakeluhan as $key => $values)
              <option value="{{$values->nm_keluhan}}">{{$values->kd_keluhan}}-{{$values->nm_keluhan}}</option>
              @endforeach
            </select>
            <br/>
            <button>Lakukan Pemrosesan Data</button>
        </div>

      </div>
    </div>

    </div>
    <!-- end col-sm-4 -->

    </div>
    </form>

   

@endsection

@section('js')
@section('js')
<script>
function myFunction1() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
@endsection