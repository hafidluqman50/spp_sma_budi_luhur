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
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Kelas</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Kelas</h4>
                        
                        <form action="{{ url('/petugas/kelas/naik-kelas/save') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Dari Tahun Ajaran<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="dari_tahun_ajaran" class="form-control select2" required>
                                        <option value="" selected disabled>=== Pilih Tahun Ajaran ===</option>
                                        @foreach ($tahun_ajaran as $element)
                                        <option value="{{ $element->id_tahun_ajaran }}">{{ $element->tahun_ajaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Dari Kelas<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="dari_kelas" class="form-control select2" required>
                                        <option value="" selected disabled>=== Pilih Kelas ===</option>
                                        @foreach ($kelas as $element)
                                        <option value="{{ $element->id_kelas }}">{{ $element->kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Ke Kelas<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="ke_kelas" class="form-control select2" required>
                                        <option value="" selected disabled>=== Pilih Kelas ===</option>
                                        @foreach ($kelas as $element)
                                        <option value="{{ $element->id_kelas }}">{{ $element->kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Ke Tahun Ajaran<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="ke_tahun_ajaran" class="form-control select2" required>
                                        <option value="" selected disabled>=== Pilih Tahun Ajaran ===</option>
                                        @foreach ($tahun_ajaran as $element)
                                        <option value="{{ $element->id_tahun_ajaran }}">{{ $element->tahun_ajaran }}</option>
                                        @endforeach
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
                        </form>
                        <div class="visible-lg" style="height: 79px;"></div>
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection
