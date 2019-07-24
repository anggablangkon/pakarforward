
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Sistem Pakar Forward Chaining</title>


    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <!-- App CSS -->
    <link type="text/css" href="{{asset('/assets/css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('/assets/css/app.rtl.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('/assets/css/styleberl.css')}}" rel="stylesheet">
    <!-- Simplebar -->
    <link type="text/css" href="{{asset('/assets/vendor/simplebar.css')}}" rel="stylesheet">

</head>

<body style="background-color: black;">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-has-scrolling-region>
        <div class="mdk-drawer-layout__content mdk-header-layout__content--scrollable" style="overflow-y: auto;" data-simplebar data-simplebar-force-enabled="true">


            <div class="container d-flex justify-content-center align-items-center flex-column" style="padding-top: 100px;">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    {{-- <img src="assets/image/login.png" style="width: 100px"> --}}
                </div>
                
                <div class="row w-100 justify-content-center">
                    <div class="col-sm-5">
                        <div class="card-body">
                        <!-- message -->
                        @include('layouts/assets/message');


                        <form action="{{url('/login')}}" method="post" >
                            {{csrf_field()}}
                            <input type="hidden" name="action" value="login">
                                <div class="form-group">
                                    <div class="input-group input-group--inline">
                                        <div class="input-group-addon">
                                            <i class="material-icons">account_circle</i>
                                        </div>
                                        <input type="text" autofocus autocomplete class="form-control font-tebal" name="username" placeholder="Masukan Username Anda">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group--inline">
                                        <div class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </div>
                                        <input type="password" autocomplete="off" class="form-control font-tebal" name="password" placeholder="Masukan Password Anda">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="submit" class="btn btn-primary btn-full font-tebal" value="Masuk">
                                    &nbsp;
                                    <input type="reset" name="reset" class="btn btn-danger btn-full font-tebal"  value="Lupa Password">
                                    &nbsp;
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>
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
    <!-- MDK -->

    <script>
        (function() {
            'use strict';

            // Self Initialize DOM Factory Components
            domFactory.handler.autoInit();
        });
    </script>
</body>


</html>