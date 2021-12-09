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
                                <li class="breadcrumb-item"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Detail SPP</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Detail SPP</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA DETAIL SPP</b></h4>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/petugas/spp/bulan-tahun/'.$id) }}">
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </button>
                            </a>
                            <a href="{{ url('/petugas/spp/bulan-tahun/'.$id.'/lihat-spp/'.$id_bulan_tahun.'/bayar-semua') }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus m-r-5"></i>Bayar Semua
                                </button>
                            </a>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('message') }} <button class="close">X</button>
                        </div>
                        @endif
                        <h5>NISN : {{ $siswa->nisn }}</h5>
                        <h5>Nama Siswa : {{ $siswa->nama_siswa }}</h5>
                        <h5>Kelas : {{ $siswa->kelas }}</h5>
                        <h5>Tahun Ajaran : {{ $siswa->tahun_ajaran }}</h5>
                        <table class="table table-hover table-bordered data-spp-detail force-fullwidth" id-spp-bulan-tahun="{{$id_bulan_tahun}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pembayaran SPP</th>
                                <th>Nominal Bayar</th>
                                <th>Bayar</th>
                                <th>Sisa Bayar</th>
                                <th>Status Bayar</th>
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
