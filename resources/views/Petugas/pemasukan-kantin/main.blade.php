@extends('Petugas.layout-app.layout')

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
                            <li class="breadcrumb-item active"><a href="#">Data Pemasukan Kantin</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Pemasukan Kantin</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>DATA PEMASUKAN KANTIN</b></h4>
                    <div class="button-list" style="margin-bottom:1%;">
                        <a href="{{ url('/petugas/spp/tunggakan/'.$id) }}">
                            <button class="btn btn-default">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </button>
                        </a>
                    </div>
                    @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session('message') }} <button class="close">X</button>
                    </div>
                    @endif
                    <table>
                    	<tr>
                    		<td><b>NISN</b></td>
                    		<td><b> : </b></td>
                    		<td><b>{{ $data_spp->nisn }}</b></td>
                    	</tr>
                    	<tr>
                    		<td><b>Nama Siswa</b></td>
                    		<td><b> : </b></td>
                    		<td><b>{{ $data_spp->nama_siswa }}</b></td>
                    	</tr>
                    	<tr>
                    		<td><b>Kelas</b></td>
                    		<td><b> : </b></td>
                    		<td><b>{{ $data_spp->kelas }}</b></td>
                    	</tr>
                    	<tr>
                    		<td><b>Tahun Ajaran</b></td>
                    		<td><b> : </b></td>
                    		<td><b>{{ $data_spp->tahun_ajaran }}</b></td>
                    	</tr>
                    	<tr>
                    		<td><b>Bulan, Tahun</b></td>
                    		<td><b> : </b></td>
                    		<td><b>{{ $data_spp->bulan_tahun }}</b></td>
                    	</tr>
                    </table>
                    <table class="table table-hover table-bordered data-pemasukan-kantin force-fullwidth" id-spp-bulan-tahun="{{ $id_bulan_tahun }}">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kantin</th>
                                <th>Nominal Harus Bayar</th>
                                <th>Nominal Pemasukan</th>
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