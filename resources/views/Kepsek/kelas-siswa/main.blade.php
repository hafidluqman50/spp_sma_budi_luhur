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
                                <li class="breadcrumb-item"><a href="{{ url('/kepsek/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/kepsek/kelas-siswa') }}">Data Kelas Siswa</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Kelas Siswa</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="button-list" style="margin-bottom:0.1%;">
                            <a href="{{ url('/kepsek/kelas/') }}">
                                <button class="btn btn-default">Kembali</button>
                            </a>
                        </div>
                        <h4 class="m-t-0 header-title"><b>DATA KELAS SISWA</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>
                        <table class="table table-hover table-bordered data-kelas-siswa-kepsek force-fullwidth" id-kelas="{{$id}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>NISN</th>
                                <th>Nama Lengkap</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
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