<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Aplikasi Keuangan SMA Budi Luhur Samarinda">
        <meta name="author" content="SMA Budi Luhur">

        <link rel="shortcut icon" href="{{ asset('assets/images/sma.png')}}">

        <title>Aplikasi Keuangan</title>

        <link href=" {{ asset('assets/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css" />
        <link href=" {{ asset('assets/css/icons.css') }} " rel="stylesheet" type="text/css" />
        <link href=" {{ asset('assets/css/style.css') }} " rel="stylesheet" type="text/css" />

        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="card-box">
                <div class="panel-heading text-center">
                    <img src="{{ asset('assets/images/sma.png') }}" width="45%" alt="">
                    <h4> APLIKASI KEUANGAN <br> SMA BUDI LUHUR SAMARINDA</h4>
                </div>


                <div class="p-20">
                    @if (session()->has('log'))
                    <div class="alert alert-dismissible alert-danger">
                        {{session('log')}} <button class="close"></button>
                    </div>
                    @endif
                    <form class="form-horizontal m-t-20" action="{{ url('/login') }}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group ">
                            <div class="col-12">
                                <input class="form-control" type="text" name="username" required="" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <input class="form-control" type="password" name="password" required="" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Log In
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            
        </div>


        <!-- jQuery  -->
        <script src=" {{ asset('assets/js/jquery.min.js') }} "></script>
        <script src=" {{ asset('assets/js/tether.min.js') }} "></script><!-- Tether for Bootstrap -->
        <script src=" {{ asset('assets/js/bootstrap.min.js') }} "></script>
        <script src=" {{ asset('assets/js/waves.js') }} "></script>
        <script src=" {{ asset('assets/js/jquery.slimscroll.js') }} "></script>
        <script src=" {{ asset('assets/js/jquery.scrollTo.min.js') }} "></script>

        <!-- App js -->
        <script src=" {{ asset('assets/js/jquery.core.js') }} "></script>
        <script src=" {{ asset('assets/js/jquery.app.js') }} "></script>
	
	</body>
</html>