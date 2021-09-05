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
                                <li class="breadcrumb-item active"><a href="#">Data Tunggal</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Tahun Ajaran</a></li>
                                <li class="breadcrumb-item active"><a href="#">Edit Data Tahun Ajaran</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Edit Data Tahun Ajaran</h4>
                        <p class="text-muted font-14 m-b-20">
                            Jika ingin mengubah, Ubahlah form dibawah ini dengan teliti dan benar!
                        </p>

                        <form role="form">
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" placeholder="Tahun Ajaran. Exp: 2021/2022" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">
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
