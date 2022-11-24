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
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard-rab') }}">Dashboard RAB</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/admin/data-perincian-rab') }}">Sapras</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Sapras</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA SAPRAS</b></h4>
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/admin/data-perincian-rab/') }}">
                                <button class="btn btn-default" style="cursor:pointer;">
                                    <i class="fa fa-arrow-left m-r-5"></i>Kembali
                                </button>
                            </a>
                            <a href="{{ url('/admin/data-perincian-rab/sapras/'.$id.'/tambah') }}">
                                <button class="btn btn-primary" style="cursor:pointer;">
                                    <i class="fa fa-plus m-r-5"></i>Tambah
                                </button>
                            </a>
                            <a href="{{ url('/admin/data-perincian-rab/sapras/'.$id.'/edit') }}">
                                <button class="btn btn-warning" style="cursor:pointer;">
                                    <i class="fa fa-pencil m-r-5"></i>Edit
                                </button>
                            </a>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('message') }} <button class="close">X</button>
                        </div>
                        @endif
                        <table class="table table-hover table-bordered data-sapras force-fullwidth" id-rincian-pengeluaran="{{$id}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori Barang</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Ket</th>
                                <th>Harga Barang</th>
                                <th>Jumlah</th>
                                <th>Pemohon</th>
                                <th>Keterangan Pemohon</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection