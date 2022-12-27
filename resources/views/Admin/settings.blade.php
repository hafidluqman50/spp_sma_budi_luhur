@extends('Admin.layout-app.layout')

@section('content')
    <div class="wrapper">
        <div class="container">


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Settings</h4>
                        
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('message') }} <button class="close">X</button>
                        </div>
                        @elseif ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            {{ $errors->first() }} <button class="close">X</button>
                        </div>
                        @endif
                        <form action="{{ url('/admin/settings/save') }}" method="POST" oninput="re_type_password.setCustomValidity(re_type_password.value != password.value ? 'Passwords do not match.' : '')">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama</label>
                                <div class="col-7">
                                    <input type="text" name="nama" class="form-control" value="{{ auth()->user()->name }}" placeholder="Isi Nama" required="required" value="{{ old('nama') != '' ? old('nama') : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Username</label>
                                <div class="col-7">
                                    <input type="text" name="username" class="form-control" value="{{ auth()->user()->username }}" placeholder="Isi Username" required="required" value="{{ old('username') != '' ? old('username') : '' }}" disabled>
                                    <input type="checkbox" id="sip">Ubah Username
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Password</label>
                                <div class="col-7">
                                    <input type="password" name="password" class="form-control" placeholder="Isi Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Re-Type Password</label>
                                <div class="col-7">
                                    <input type="password" name="re_type_password" class="form-control" placeholder="Ketik Ulang Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Kepala Sekolah SMA Budi Luhur</label>
                                <div class="col-7">
                                    <input type="text" name="nama_kepsek" class="form-control" value="{{ $profile_instansi->nama_kepsek }}" placeholder="Isi Nama Kepala Sekolah SMA Budi Luhur" required="required" value="{{ old('nama_kepsek') != '' ? old('nama_kepsek') : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Pengurus Yayasan Insani HUD</label>
                                <div class="col-7">
                                    <input type="text" name="nama_pengurus_yayasan" class="form-control" value="{{ $profile_instansi->nama_pengurus_yayasan }}" placeholder="Isi Nama Pengurus Yayasan Insani HUD" required="required" value="{{ old('nama_pengurus_yayasan') != '' ? old('nama_pengurus_yayasan') : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Pembina Yayasan Insani HUD</label>
                                <div class="col-7">
                                    <input type="text" name="nama_pembina_yayasan" class="form-control" value="{{ $profile_instansi->nama_pembina_yayasan }}" placeholder="Isi Nama Pembina Yayasan Insani HUD" required="required" value="{{ old('nama_pembina_yayasan') != '' ? old('nama_pembina_yayasan') : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Bendahara</label>
                                <div class="col-7">
                                    <input type="text" name="nama_bendahara" class="form-control" value="{{ $profile_instansi->nama_bendahara }}" placeholder="Isi Nama Bendahara" required="required" value="{{ old('nama_bendahara') != '' ? old('nama_bendahara') : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Bendahara Yayasan Insani HUD</label>
                                <div class="col-7">
                                    <input type="text" name="nama_bendahara_yayasan" class="form-control" value="{{ $profile_instansi->nama_bendahara_yayasan }}" placeholder="Isi Nama Bendahara Yayasan Insani HUD" required="required" value="{{ old('nama_bendahara_yayasan') != '' ? old('nama_bendahara_yayasan') : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Wali Pembina Yayasan Insani HUD</label>
                                <div class="col-7">
                                    <input type="text" name="nama_wali_pembina" class="form-control" value="{{ $profile_instansi->nama_wali_pembina }}" placeholder="Isi Nama Wali Pembina Yayasan Insani HUD" required="required" value="{{ old('nama_wali_pembina') != '' ? old('nama_wali_pembina') : '' }}">
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