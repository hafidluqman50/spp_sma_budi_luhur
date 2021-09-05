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
                                <li class="breadcrumb-item active"><a href="#">Data Tunggakan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Tunggakan</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Tambah Data Tunggakan</h4>
                        <p class="text-muted font-14 m-b-20">
                            Isilah form dibawah ini dengan teliti dan benar!
                        </p>

                        <form role="form">
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Siswa<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="" id="" class="form-control">
                                        <option value="" selected>--- Pilih Siswa ---</option>
                                        <option value="">12325476654 | Khoirulli Nurul Fatimah </option>
                                        <option value="">12325476754 | Marlina</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">SPP<span class="text-danger">*</span></label>
                                <div class="col-7">
                                <input type="number" class="form-control" placeholder="Exp : 250000" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Uang Makan<span class="text-danger">*</span></label>
                                <div class="col-7">
                                <input type="number" class="form-control" placeholder="Exp : 600000" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Tabungan Tes<span class="text-danger">*</span></label>
                                <div class="col-7">
                                <input type="number" class="form-control" placeholder="Exp : 50000" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Asrama<span class="text-danger">*</span></label>
                                <div class="col-7">
                                <input type="number" class="form-control" placeholder="Exp : 200000" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Total<span class="text-danger">*</span></label>
                                <div class="col-7">
                                <input type="number" class="form-control" placeholder="Otomatis" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                        Simpan
                                    </button>
                                    <a href="{{ url('detailtunggakan') }}" type="reset"
                                            class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </a>
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
