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
                            <li class="breadcrumb-item active"><a href="#">Data Users</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Users</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>DATA USERS</b></h4>
                    <div class="button-list" style="margin-bottom:1%;">
                        <a href="{{ url('/admin/data-users/tambah') }}">
                            <button class="btn btn-primary">
                                <i class="fa fa-plus m-r-5"></i> Tambah
                            </button>
                        </a>
                    </div>
                    @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session('message') }} <button class="close">X</button>
                    </div>
                    @endif
                    <table class="table table-hover table-bordered data-users force-fullwidth">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Jenis User</th>
                                <th>Status Akun</th>
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
