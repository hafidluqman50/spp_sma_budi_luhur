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
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Users</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Users</h4>
                        
                        <form action="{{ url('/admin/data-users/save') }}" method="POST" oninput="re_type_password.setCustomValidity(re_type_password.value != password.value ? 'Passwords do not match.' : '')">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Users</label>
                                <div class="col-7">
                                    <input type="text" name="nama_users" class="form-control" placeholder="Isi Nama Users" required="required" value="{{ old('nama_users') != '' ? old('nama_users') : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Username</label>
                                <div class="col-7">
                                    <input type="text" name="username" class="form-control" placeholder="Isi Username" required="required" value="{{ old('username') != '' ? old('username') : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Password</label>
                                <div class="col-7">
                                    <input type="password" name="password" class="form-control" placeholder="Isi Password" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Re-Type Password</label>
                                <div class="col-7">
                                    <input type="password" name="re_type_password" class="form-control" placeholder="Ketik Ulang Password" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Jenis Users</label>
                                <div class="col-7">
                                    <select name="jenis_users" class="form-control select2">
                                        <option value="" selected disabled>=== Pilih Jenis Users ===</option>
                                        <option value="2" @if (old('jenis_users') != '')
                                            {!! old('jenis_users') == 2 ? 'selected="selected"' : '' !!}@endif>Petugas SPP</option>
                                        <option value="1" @if (old('jenis_users') != '')
                                            {!! old('jenis_users') == 1 ? 'selected="selected"' : '' !!}@endif>Kepsek</option>
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