@extends('Admin.layout-app.layout')

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
                                <li class="breadcrumb-item active"><a href="#">Data SPP Pembayaran Detail</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data SPP Pembayaran Detail</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA SPP PEMBAYARAN DETAIL</b></h4>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/admin/spp/pembayaran/'.$id.'/lihat-pembayaran/'.$id_spp_bayar_data) }}">
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </button>
                            </a>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('message') }} <button class="close">X</button>
                        </div>
                        @endif
                        <table>
                            <tr>
                                <td><b>NISN</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->nisn }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Nama Siswa</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->nama_siswa }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Kelas</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->kelas }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Tahun Ajaran</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->tahun_ajaran }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Bulan, Tahun</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->bulan_tahun }}</b></td>
                            </tr>
                        </table>
                        <table class="table table-hover table-bordered data-spp-bayar-detail force-fullwidth" id-spp-bayar="{{$id_spp_bayar}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pembayaran SPP</th>
                                <th>Nominal Bayar</th>
                                <th>Tanggal Bayar</th>
                                <th>Ket.</th>
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
