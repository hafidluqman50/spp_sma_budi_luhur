<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Aplikasi Keuangan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Aplikasi Keuangan SMA Budi Luhur Samarinda" name="description" />
        <meta content="SMA Budi Luhur" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('assets/images/sma.png')}}">

        @yield('css')

        

        <!-- DataTables -->
        <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!--Form Wizard-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/jquery.steps/css/jquery.steps.css')}}" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
        <link href="{{asset('assets/plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">

        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{asset('assets/select2-4.1.0-rc.0/dist/css/select2.min.css')}}">

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        {{-- <link rel="stylesheet" href="{{asset('assets/selectize/dist/css/selectize.bootstrap4.css')}}"> --}}
        <link rel="stylesheet" href="{{asset('assets/selectize/dist/css/selectize.css')}}">
        <link rel="stylesheet" href="{{asset('assets/selectize/dist/css/selectize.bootstrap4.css')}}">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/Bootstrap-Datepicker/dist/css/bootstrap-datepicker.min.css')}}">

        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>

    </head>


    <body>


        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <a href="index.html" class="logo">
                            <img src="{{asset('assets/images/navbar-app-keuangan.png')}}" alt="" class="logo-lg">
                            <img src="{{asset('assets/images/sma.png')}}" alt="" height="24" class="logo-sm">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-inline float-right mb-0">

                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                            {{-- <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-document noti-icon"></i>
                                    @if (count_history_unread_navbar() > 0) 
                                    <span class="badge badge-pink noti-icon-badge"></span>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5>History SPP</h5>
                                    </div>

                                    @foreach (get_history_navbar() as $element)
                                    <a href="{{ url('/petugas/spp/history-spp/'.$element->id_history_proses_spp) }}" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="icon-docs"></i></div>
                                        <p class="notify-details">{{ Str::limit($element->text,20) }}<small class="text-muted">{{ time_elapsed_string($element->created_at) }}</small></p>
                                    </a>
                                    @endforeach
                                    <!-- item-->

                                    <!-- All-->
                                    <a href="{{ url('/petugas/spp/history-spp') }}" class="dropdown-item notify-item notify-all">
                                        View All
                                    </a>

                                </div>
                            </li> --}}

                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="{{asset('assets/sma.png')}}" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                    <!-- item-->
                                    <a href="{{ url('/petugas/settings') }}" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-account-circle"></i> <span>Settings</span>
                                    </a>

                                    <!-- item-->
                                    <a href="{{ url('/logout') }}" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="{{ url('/petugas/dashboard') }}"><i class="md md-dashboard"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="md md-account-circle"></i>Data Siswa</a>
                                <ul class="submenu">
                                    <li><a href="{{ url('/petugas/siswa') }}">Data Siswa</a></li>
                                    <li><a href="{{ url('/petugas/kelas') }}">Data Kelas</a></li>
                                    <li><a href="{{ url('/petugas/tahun-ajaran') }}">Data Tahun Ajaran</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="{{ url('/petugas/kantin') }}"><i class="fa fa-pencil-square-o"></i>Data Kantin</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-money"></i>Data SPP</a>
                                <ul class="submenu">
                                    <li><a href="{{ url('/petugas/spp') }}">Data SPP</a></li>
                                    <li><a href="{{ url('/petugas/kolom-spp') }}">Data Kolom SPP</a></li>
                                    {{-- <li><a href="{{ url('/petugas/tunggakan-spp') }}">Data Tunggakan SPP</a></li> --}}
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-file-excel-o"></i>Laporan</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ url('/petugas/laporan-data-siswa') }}">Laporan Data Siswa</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/petugas/laporan-kantin') }}">Laporan Kantin</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/petugas/laporan-tunggakan') }}">Laporan Tunggakan</a>
                                        {{-- <ul class="submenu">
                                            <li><a href="#">Kelas X</a></li>
                                            <li><a href="#">Kelas XI</a></li>
                                            <li><a href="#">Kelas XII</a></li>
                                        </ul> --}}
                                    </li>
                                    <li>
                                        <a href="{{ url('/petugas/laporan-pembukuan') }}">Laporan Pembukuan</a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ url('/petugas/laporan-rab') }}">Laporan RAB</a>
                                    </li> --}}
                                </ul>
                            </li>
                            {{-- <li class="has-submenu">
                                <a href="{{ url('/petugas/data-kepsek') }}"><i class="fa fa-users"></i>Data Kepsek</a>
                            </li> --}}
                            <li class="has-submenu">
                                <a href="{{ url('/petugas/data-perincian-rab') }}"><i class="fa fa-book"></i>Data RAB</a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->





