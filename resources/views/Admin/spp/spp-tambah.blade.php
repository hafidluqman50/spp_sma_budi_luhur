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
                                <li class="breadcrumb-item active"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data SPP</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <form action="{{ url('/admin/spp/save') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box">
                            <div class="button-list" style="margin-bottom:1%;">
                                <a href="{{ url()->previous() }}">
                                    <button class="btn btn-default" type="button">Kembali</button>
                                </a>
                            </div>
                            <h4 class="header-title m-t-0">Tambah Data Kelas</h4>
                            
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <select name="tahun_ajaran" class="form-control select2" required="required">
                                            <option value="" selected="" disabled="">=== Pilih Tahun Ajaran ===</option>
                                            @foreach ($tahun_ajaran as $value)
                                            <option value="{{ $value->id_tahun_ajaran }}">{{ $value->tahun_ajaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kelas<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <select name="kelas" class="form-control select2" required="required" disabled="disabled">
                                            <option value="" selected="" disabled="">=== Pilih Kelas ===</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Siswa<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <select name="siswa" class="form-control select2" required="required" disabled="disabled">
                                            <option value="" selected="" disabled="">=== Pilih Siswa ===</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-8 offset-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            <div class="visible-lg" style="height: 79px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box">
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Kolom Spp<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="kolom_spp[]" class="form-control select2" required="required">
                                        <option value="" selected="" disabled="">=== Pilih Kolom Spp ===</option>
                                        @foreach ($kolom_spp as $value)
                                        <option value="{{ $value->id_kolom_spp }}">{{ $value->nama_kolom_spp }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nominal Bayar<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="number" name="nominal_bayar[]" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button class="btn btn-success" type="button">Tambah Input</button>
                                    <button class="btn btn-danger" type="button">Hapus Input</button>
                                </div>
                            </div>
                            <div class="visible-lg" style="height: 79px;"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection
