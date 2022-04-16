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
                                <li class="breadcrumb-item active"><a href="#">Data Perincian</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Perincian</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Perincian</h4>
                        
                        <form action="{{ url('/admin/data-perincian-rab/save') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama RAB</label>
                                <div class="col-7">
                                    <input type="text" name="bulan_perincian" class="form-control" placeholder="Isi Nama RAB; Ex: Mei 2022 Pengajuan Juni 2022" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Tanggal Perincian</label>
                                <div class="col-7">
                                    <input type="date" name="tanggal_perincian" class="form-control" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Uraian Rincian</label>
                                <div class="col-7">
                                    <input type="text" name="uraian_rincian" class="form-control" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Volume Rincian</label>
                                <div class="col-7">
                                    <input type="number" name="volume_rincian" class="form-control" placeholder="Isi Volume Rincian" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nominal Rincian</label>
                                <div class="col-7">
                                    <input type="number" name="nominal_rincian" class="form-control" placeholder="Isi Nominal Rincian" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Pendapatan</label>
                                <div class="col-7">
                                    <select name="id_kolom_spp" class="form-control selectize pendapatan">
                                        <option value="" selected disabled>=== Pilih Pendapatan ===</option>
                                        @foreach ($kolom_spp as $element)
                                        <option value="{{ $element->id_kolom_spp }}">{{ $element->nama_kolom_spp }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nominal Pendapatan</label>
                                <div class="col-7">
                                    <input type="number" name="nominal_pendapatan" class="form-control" placeholder="Isi Nominal Pendapatan" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Uraian RAB</label>
                                <div class="col-7">
                                    <input type="text" name="uraian_rab" class="form-control" placeholder="Isi Uraian RAB; Ex: PDAM Bulan Mei 2022">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Volume RAB</label>
                                <div class="col-7">
                                    <input type="number" name="volume_rab" class="form-control" placeholder="Isi Volume RAB">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nominal RAB</label>
                                <div class="col-7">
                                    <input type="number" name="nominal_rab" class="form-control" placeholder="Isi Nominal RAB">
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