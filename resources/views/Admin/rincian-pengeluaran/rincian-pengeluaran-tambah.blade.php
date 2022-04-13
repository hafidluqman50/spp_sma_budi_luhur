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
                                <li class="breadcrumb-item"><a href="#">Keuangan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Kelas Siswa</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Kelas Siswa</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Kelas Siswa</h4>
                        
                        <form action="{{ url('/admin/kelas/siswa/'.$id.'/save') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Siswa<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="siswa[]" class="form-control select2" required="required" multiple="multiple">
                                        @foreach ($siswa as $element)
                                        <option value="{{ $element->id_siswa }}">{{ $element->nisn.' | '.$element->nama_siswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Kelas<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" readonly="readonly" value="{{ $kelas->kelas }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="tahun_ajaran" class="form-control select2" required="required">
                                        <option value="" selected="" disabled="">=== Pilih Tahun Ajaran ===</option>
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
