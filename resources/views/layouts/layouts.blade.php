{{-- @powered by Kokitindoneisa --}}
{{-- Designed By Angga Kurniawan --}}
@include('layouts/auth')
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
	<link type="text/css" href="assets/css/vendor-morris.css" rel="stylesheet">
	<link type="text/css" href="assets/css/vendor-bootstrap-switch.css" rel="stylesheet">
	<link type="text/css" href="assets/css/vendor-bootstrap-datepicker.css" rel="stylesheet">
	<link type="text/css" href="assets/vendor/simplebar.css" rel="stylesheet">
	<!-- Prevent the demo from appearing in search engines -->
	<meta name="robots" content="noindex">
	<!-- App CSS -->
	<link type="text/css" href="{{asset('/assets/css/app.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('/assets/css/app.rtl.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('/assets/css/matryk-style.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('/assets/css/kokitindo.css')}}" rel="stylesheet">
    <!-- vendor external -->

	<!-- Simplebar -->
	<link type="text/css" href="{{asset('/assets/vendor/simplebar.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('/assets/vendor/stylekokitindo.css')}}" rel="stylesheet">

	
	@yield('css')

</head>

<body>
	<div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-responsive-width="992px" data-has-scrolling-region>
		<div class="mdk-drawer-layout__content">
			<!-- header-layout -->
			<div class="mdk-header-layout js-mdk-header-layout  mdk-header--fixed  mdk-header-layout__content--scrollable">
				<!-- header -->
				@include('layouts/assets/header')
				

				<!-- content -->
				<div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
					<!-- main content -->
					<div class="container-fluid">
						@yield('content')
					</div>
				</div>


			</div>

		</div>

		<!-- Drawer -->
		@include('layouts/assets/maindrawer')
		@include('layouts/assets/footdrawer')
		<!-- // END drawer-layout__content -->

	</div>

	<!-- jQuery -->
	<script src="{{asset('/assets/vendor/jquery.min.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('/assets/vendor/popper.js')}}"></script>
	<script src="{{asset('/assets/vendor/bootstrap.min.js')}}"></script>
	<!-- Simplebar -->
	<!-- Used for adding a custom scrollbar to the drawer -->
	<script src="{{asset('/assets/vendor/simplebar.js')}}"></script>
	<!-- Vendor -->
	<script src="{{asset('/assets/vendor/Chart.min.js')}}"></script>
	<script src="{{asset('/assets/vendor/moment.min.js')}}"></script>
	<!-- APP -->
	<script src="{{asset('/assets/js/color_variables.js')}}"></script>
	<script src="{{asset('/assets/js/app.js')}}"></script>
	<script src="{{asset('/assets/vendor/dom-factory.js')}}"></script>
	<!-- DOM Factory -->
	<script src="{{asset('/assets/vendor/material-design-kit.js')}}"></script>
	<script src="{{asset('/assets/vendor/select2.full.min.js')}}"></script>

    <script>
        $('.select-2').select2({
            theme: 'bootstrap',
            placeholder: 'Select an option'
        });
    </script>
   
    <script src="{{asset('/assets/vendor/morris.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/raphael.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/assets/js/datepicker.js')}}"></script>
    <!-- sweetaleret -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- data table -->
    <script src="{{asset('/assets/vendor/jquery.dataTables.js')}}"></script>
	<script src="{{asset('/assets/vendor/dataTables.bootstrap4.js')}}"></script>
	

    @yield('js')
    <script>
        (function() {
            'use strict';
            // Self Initialize DOM Factory Components
            domFactory.handler.autoInit()


            // Connect button(s) to drawer(s)
            var sidebarToggle = document.querySelectorAll('[data-toggle="sidebar"]')

            sidebarToggle.forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
                    var drawer = document.querySelector(selector)
                    if (drawer) {
                        if (selector == '#default-drawer') {
                            $('.container-fluid').toggleClass('container--max');
                        }
                        drawer.mdkDrawer.toggle();
                    }
                })
            })
        })()
    </script>


    <script src="assets/vendor/bootstrap-switch.min.js"></script>

    <script>
        $("input[name='bootstrap-switch']").bootstrapSwitch();
    </script>

    @include('layouts/assets/jsall')

</body>

</html>