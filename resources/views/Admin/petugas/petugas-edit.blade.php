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
                                <li class="breadcrumb-item active"><a href="#">Data Petugas</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Petugas</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Petugas</h4>
                        
                        <form action="{{ url('/admin/data-petugas/update',$id) }}" method="POST" oninput="re_type_password.setCustomValidity(re_type_password.value != password.value ? 'Passwords do not match.' : '')">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Petugas</label>
                                <div class="col-7">
                                    <input type="text" name="nama_petugas" class="form-control" placeholder="Isi Nama Petugas" required="required" value="{{ old('nama_petugas') != '' ? old('nama_petugas') : $row->nama_petugas }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Username</label>
                                <div class="col-7">
                                    <input type="text" name="username" class="form-control" placeholder="Isi Username" value="{{ old('username') != '' ? old('username') : $row->username }}" disabled="disabled">
                                    <input type="checkbox" id="sip">Ubah Username
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
                                    <input type="text" name="re_type_password" class="form-control" placeholder="Ketik Ulang Password" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Jabatan Petugas</label>
                                <div class="col-7">
                                    <select name="jabatan_petugas" class="form-control select2">
                                        <option value="" selected disabled>=== Pilih Jabatan Petugas ===</option>
                                        <option value="bendahara-internal" @if (old('jabatan_petugas') != '')
                                            {!! old('jabatan_petugas') == 'bendahara-internal' ? 'selected="selected"' : '' !!}
                                            @else
                                            {!! $row->jabatan_petugas == 'bendahara-internal' ? 'selected="selected"' : '' !!}
                                            @endif>Bendahara Internal</option>
                                        <option value="bendahara-dana-BOS" @if (old('jabatan_petugas') != '')
                                            {!! old('jabatan_petugas') == 'bendahara-dana-BOS' ? 'selected="selected"' : '' !!}
                                            @else
                                            {!! $row->jabatan_petugas == 'bendahara-dana-BOS' ? 'selected="selected"' : '' !!}
                                            @endif>Bendahara Dana BOS</option>
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

@section('js')
<script>
    $(() => {
        $('#sip').click(function(){
            if ($(this).is(':checked')) {
                $('input[name="username"]').removeAttr('disabled');
            }
            else {
                $('input[name="username"]').attr('disabled','disabled');
            }
        });
    })
</script>
@endsection 