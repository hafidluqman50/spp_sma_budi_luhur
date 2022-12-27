@extends('Petugas.layout-app.layout')

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
                                <li class="breadcrumb-item active"><a href="#">Data Kelas</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Kelas</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA KELAS</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/petugas/kelas/tambah') }}">
                                <button class="btn btn-primary">
                                    <i class="fa fa-plus m-r-5"></i>Tambah
                                </button>
                            </a>
                            <a href="{{ url('/petugas/kelas/naik-kelas') }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-arrow-up m-r-5"></i>Naik Kelas
                                </button>
                            </a>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('message') }} <button class="close">X</button>
                        </div>
                        @endif
                        <table class="table table-hover table-bordered data-kelas force-fullwidth">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kelas</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection
