<style type="text/css">
	table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 10px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 10px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 10px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>
<center>
  <h4>REKAM DATA HISTORY PAKAR</h4>
  Sistem Pakar Diagnosis Penyakit Menggunakan Metode Forward Chaining 
</center>
<hr/>
<table id="table" border="1" class="blueTable" style="width:100%">
  <thead style="font-size: 12px">
   <tr>
    <th>No </th>
    <th>Id Pasien</th>
    <th>Nama Pasien</th>
    <th>Tgl Lahir</th>
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
		<td></td>
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