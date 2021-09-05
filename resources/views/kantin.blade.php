@extends('layout-app.layout')

@section('css')
    <!-- Custombox -->
    <link href="assets/plugins/custombox/css/custombox.css" rel="stylesheet">
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
                                <a href="{{ url('tambahkantin') }}" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Tambah</a>
                                <p> </p>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jumlah Siswa</th>
                                        <th>Biaya Perbulan</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Bu Yusron</td>
                                        <td>57 Siswa</td>
                                        <td>Rp. 550.000</td>
                                        <td>
                                            <div class="button-list">
                                                <a href="{{ url('editkantin') }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i></a>
                                                <!--  Modal content for the above example -->
                                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title mt-0">Detail Kantin</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>Nama Kantin</td>
                                                                        <td>:</td>  
                                                                        <td>Bu Yusron</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Lokasi Kantin</td>
                                                                        <td>:</td>  
                                                                        <td>Samping Rumah Pak Sudarisman</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jumlah Siswa</td>
                                                                        <td>:</td>  
                                                                        <td>57 Siswa</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Biaya Perbulan Rp.</td>
                                                                        <td>:</td>  
                                                                        <td>550.000</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Bu Wandi</td>
                                        <td>17 Siswa</td>
                                        <td>Rp. 550.000</td>
                                        <td>
                                            <div class="button-list">
                                                <a href="{{ url('editkantin') }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i></a>
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
    <!-- Modal-Effect -->
    <script src="assets/plugins/custombox/js/custombox.min.js"></script>
    <script src="assets/plugins/custombox/js/legacy.min.js"></script>
@endsection
