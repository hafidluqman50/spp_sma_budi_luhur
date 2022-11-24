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
                                <li class="breadcrumb-item active"><a href="{{ url('/admin/data-perincian-rab') }}">Rincian Penerimaan</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Rincian Penerimaan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA PERINCIAN RAB</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/admin/data-perincian-rab/rincian-penerimaan/'.$id) }}">
                                <button class="btn btn-default" style="cursor:pointer;">
                                    <i class="fa fa-arrow-left m-r-5"></i>Kembali
                                </button>
                            </a>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('message') }} <button class="close">X</button>
                        </div>
                        @endif
                        <table class="table table-hover table-bordered data-rincian-penerimaan-detail force-fullwidth" id-rincian-penerimaan="{{$id_rincian_penerimaan}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Perincian</th>
                                <th>Rencana</th>
                                <th>Penerimaan</th>
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
                        <h4 class="m-t-0 header-title"><b>DATA RINCIAN PENERIMAAN REKAP</b></h4>
                        <table class="table table-hover table-bordered data-rincian-penerimaan-rekap force-fullwidth" id-rincian-penerimaan="{{$id_rincian_penerimaan}}">
                            <thead>
                            <tr>
                                <th>Tanggal Bon Pengajuan</th>
                                <th>Nominal Bon Pengajuan</th>
                                <th>Tanggal Realisasi Pengeluaran</th>
                                <th>Nominal Realisasi Pengeluaran</th>
                                <th>Sisa Realisasi Pengeluaran</th>
                                <th>Tanggal Penerimaan Bulan Ini</th>
                                <th>Sisa Penerimaan Bulan Ini</th>
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
                        <h4 class="m-t-0 header-title"><b>DATA RINCIAN PENERIMAAN REKAP TAHUN AJARAN</b></h4>
                        <table class="table table-hover table-bordered data-rincian-penerimaan-tahun-ajaran force-fullwidth" id-rincian-penerimaan="{{$id_rincian_penerimaan}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan, Tahun</th>
                                <th>Pemasukan</th>
                                <th>Realisasi Pengeluaran</th>
                                <th>Sisa Akhir Bulan</th>
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