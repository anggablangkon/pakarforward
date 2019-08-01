
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pendaftaran Pasien</title>


    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

    <!-- Simplebar -->
    <link type="text/css" href="assets/vendor/simplebar.css" rel="stylesheet">
</head>

<body style="background-color: black;">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-has-scrolling-region>
        <div class="mdk-drawer-layout__content mdk-header-layout__content--scrollable" style="overflow-y: auto;" data-simplebar data-simplebar-force-enabled="true">


            <div class="container h-vh d-flex justify-content-center align-items-center flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <h2 class="ml-2 text-bg mb-0" style="color: white;"><strong>
                        Pendafataran Pasien
                    </strong></h2>
                </div>
                <div class="row w-100 justify-content-center">
                    <div class="card card-signup mb-3">
                    <form action="{{url('/prosesregister')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nama Depan</label>
                                    <div class="input-group input-group--inline">
                                        <div class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </div>
                                        <input type="text" class="form-control" name="namadepan">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Nama Belakang</label>
                                    <div class="input-group input-group--inline">
                                        <div class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </div>
                                        <input type="text" class="form-control" name="namabelakang">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group left-icon">
                                <label>Username</label>
                                <div class="input-group input-group--inline">
                                    <div class="input-group-addon">
                                        <i class="material-icons">assignment_ind</i>
                                    </div>
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>
                            <div class="form-group left-icon">
                                <label>Password</label>
                                <div class="input-group input-group--inline">
                                    <div class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </div>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <div class="input-group input-group--inline">
                                        <div class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </div>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">No HP</label>
                                    <div class="input-group input-group--inline">
                                        <div class="input-group-addon">
                                            <i class="material-icons">phone</i>
                                        </div>
                                        <input type="text" class="form-control" name="nohp">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group left-icon">
                                <label>Alamat</label>
                                <div class="input-group input-group--inline">
                                    <textarea class="form-control" name="alamat"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Lakukan Pendafataran" class="btn btn-primary" name="submit">
                                <a href="{{url('/')}}" class="btn btn-success"> Kembali Kehalaman Login</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>


            </div>
        </div>

        <script>
            (function() {
                'use strict';

                // Self Initialize DOM Factory Components
                domFactory.handler.autoInit();
            });
        </script>
</body>

</html>