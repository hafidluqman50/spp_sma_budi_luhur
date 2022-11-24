@extends('Admin.layout-app.layout-rab')

@section('content')
    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard-rab') }}">Dashboard RAB</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/admin/rincian-pengeluaran') }}">Rincian Pengeluaran</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Rincian Pengeluaran</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>RINCIAN PENGELUARAN SEKOLAH</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/admin/data-perincian-rab') }}">
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left m-r-5"></i>Kembali
                                </button>
                            </a>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('message') }} <button class="close">X</button>
                        </div>
                        @endif
                        <table class="table table-hover table-bordered data-rincian-pengeluaran-sekolah force-fullwidth" id-rincian-pengeluaran="{{ $id }}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Uraian</th>
                                <th>Nama Uraian</th>
                                <th>Volume Uraian</th>
                                <th>Nominal Uraian</th>
                                <th>Total Nominal</th>
                                <th>Pendapatan</th>
                                <th>Nominal Pendapatan</th>
                                <th>Nama Rincian RAB</th>
                                <th>Volume Rincian RAB</th>
                                <th>Nominal Rincian RAB</th>
                                <th>Total Nominal RAB</th>
                                <th>Keterangan</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>RINCIAN PENGELUARAN UANG MAKAN</b></h4>
                        <table class="table table-hover table-bordered data-rincian-pengeluaran-uang-makan force-fullwidth" id-rincian-pengeluaran="{{ $id }}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Uraian</th>
                                <th>Nama Uraian</th>
                                <th>Nama Kantin</th>
                                <th>Volume Uraian</th>
                                <th>Nominal Uraian</th>
                                <th>Total Nominal</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection