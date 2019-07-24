@if ($message = Session::get('failed'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button> 
	<strong style="font-size: 12px; text-align: center;">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('logout'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button> 
	<strong style="font-size: 12px; text-align: center;">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button> 
	<strong style="font-size: 12px; text-align: center;">{{ $message }}</strong>
</div>
@endif