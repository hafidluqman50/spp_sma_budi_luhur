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
                                <li class="breadcrumb-item"><a href="#">Data SPP Pembayaran</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data SPP Detail</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data SPP Detail</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA SPP PEMBAYARAN DETAIL</b></h4>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/kepsek/spp/bulan-tahun/'.$id.'/lihat-pembayaran/'.$id_bulan_tahun) }}">
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </button>
                            </a>
                        </div>
                        <h5>NISN : {{ $siswa->nisn }}</h5>
                        <h5>Nama Siswa : {{ $siswa->nama_siswa }}</h5>
                        <h5>Kelas : {{ $siswa->kelas }}</h5>
                        <h5>Tahun Ajaran : {{ $siswa->tahun_ajaran }}</h5>
                        <table class="table table-hover table-bordered data-spp-detail-kepsek force-fullwidth" id-spp-bayar="{{$id_spp_bayar}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pembayaran SPP</th>
                                <th>Nominal Bayar</th>
                                <th>Tanggal Bayar</th>
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