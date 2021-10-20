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
                                <li class="breadcrumb-item active"><a href="#">Data Kolom SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Kolom SPP</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url()->previous() }}">
                                <button class="btn btn-default">Kembali</button>
                            </a>
                        </div>
                        <h4 class="header-title m-t-0">Tambah Data Kolom SPP</h4>
                        
                        <form action="{{ url('/admin/kolom-spp/update',$id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Kolom SPP<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" name="nama_kolom_spp" class="form-control" value="{{ $row->nama_kolom_spp }}" placeholder="Isi Nama Kolom SPP; Ex: Pembayaran Gedung;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Keterangan</label>
                                <div class="col-7">
                                    <input type="text" name="keterangan" class="form-control" value="{{ $row->keterangan }}" placeholder="Isi Keterangan; Ex: Lokasi Kantin Di Sebelah Ruang Guru;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-warning waves-effect waves-light">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="visible-lg" style="height: 79px;"></div>
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection
