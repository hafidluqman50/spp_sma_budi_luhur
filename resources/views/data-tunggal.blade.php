@extends('Admin.layout-app.layout')

@section('css')
    <!-- Custombox -->
    <link href="assets/plugins/custombox/css/custombox.css" rel="stylesheet">
@endsection

@section('content')

    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">Keuangan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Tunggal</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Tunggal</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-lg-12 col-xl-3">
                    <div class="card-box widget-box-1 bg-white">
                        <a href="#"><i class="fa fa-plus-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tambah Tahun Ajaran"></i></a>
                        <h4 class="text-dark font-18">Data Tahun Ajar</h4>
                        <h2 class="text-primary text-center"><span data-plugin="counterup">5</span></h2>
                        <p class="text-muted">Total Tahun Ajaran: 5 <span class="pull-right"></span></p>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-3">
                    <div class="card-box widget-box-1 bg-white">
                    <a href="#"><i class="fa fa-plus-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tambah Kelas"></i></a>
                        <h4 class="text-dark font-18">Data Kelas</h4>
                        <h2 class="text-pink text-center"><span data-plugin="counterup">12</span></h2>
                        <p class="text-muted">Total Kelas: 12 <span class="pull-right"></p>
                    </div>
                </div>

            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    
    

@endsection

@section('js')
    <!-- Modal-Effect -->
    <script src="assets/plugins/custombox/js/custombox.min.js"></script>
    <script src="assets/plugins/custombox/js/legacy.min.js"></script>
@endsection
