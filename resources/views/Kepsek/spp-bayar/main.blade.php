@extends('Kepsek.layout-app.layout')

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
                                <li class="breadcrumb-item active"><a href="#">Data Pembayaran SPP</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Pembayaran SPP</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA PEMBAYARAN SPP</b></h4>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/kepsek/spp/bulan-tahun/'.$id) }}">
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </button>
                            </a>
                        </div>
                        <h5>NISN : {{ $siswa->nisn }}</h5>
                        <h5>Nama Siswa : {{ $siswa->nama_siswa }}</h5>
                        <h5>Kelas : {{ $siswa->kelas }}</h5>
                        <h5>Tahun Ajaran : {{ $siswa->tahun_ajaran }}</h5>
                        <table class="table table-hover table-bordered data-spp-bayar-kepsek force-fullwidth" id-bulan-tahun="{{$id_bulan_tahun}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Total Biaya</th>
                                <th>Nominal Bayar</th>
                                <th>Kembalian</th>
                                <th>Keterangan</th>
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
