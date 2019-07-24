@extends('layouts.layouts')

@section('content')

<div class="alert alert-secondary alert-dismissable fade show" role="alert">
	Hallo  <strong>{{Session::get('username')}}</strong> !! Selamat Datang Di Sistem Pakar Kami
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>

@endsection


