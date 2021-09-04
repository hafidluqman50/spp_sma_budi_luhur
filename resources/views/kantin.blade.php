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
                                <li class="breadcrumb-item active"><a href="#">Data Kantin</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Kantin</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA KANTIN</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>
                        
                        <div class="col-lg-12">
                            <div class="card-box">
                                <a href="" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Tambah</a>
                                <p> </p>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jumlah Siswa</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Bu Yusron</td>
                                        <td>57 Siswa</td>
                                        <td>
                                            <div class="button-list">
                                                <a href="#" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Bu Wandi</td>
                                        <td>17 Siswa</td>
                                        <td>
                                            <div class="button-list">
                                                <a href="#" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection

@section('js')
       
@endsection
