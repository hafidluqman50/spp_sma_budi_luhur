@extends('layout-app.layout')

@section('css')
    
@endsection

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
                                <li class="breadcrumb-item active"><a href="#">Data Siswa</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Siswa</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Tambah Data Siswa</h4>
                        <p class="text-muted font-14 m-b-20">
                            Isilah form dibawah ini dengan teliti dan benar!
                        </p>

                        <form role="form">
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Kelas<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="" id="" class="form-control">
                                        <option value="" selected>--- Pilih Kelas Siswa ---</option>
                                        <option value="">X IPA I</option>
                                        <option value="">XI IPS II</option>
                                        <option value="">XII MIPA I</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Wilayah<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="" id="" class="form-control">
                                        <option value="" selected>--- Pilih Wilayah Siswa ---</option>
                                        <option value="">Komplek</option>
                                        <option value="">Dalam Kota</option>
                                        <option value="">Luar Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Kantin<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="" id="" class="form-control">
                                        <option value="" selected>--- Pilih Kantin ---</option>
                                        <option value="">Pondok</option>
                                        <option value="">Bu Yusron</option>
                                        <option value="">Bu Malik</option>
                                        <option value="">Bu Wandi</option>
                                        <option value="">Bu Mus</option>
                                        <option value="">Bu Rista</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">No WA Aktif<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="number" class="form-control" placeholder="Nomor WhatsApp Ortu Aktif">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Simpan
                                    </button>
                                    <button type="reset"
                                            class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
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

@section('js')
@endsection
