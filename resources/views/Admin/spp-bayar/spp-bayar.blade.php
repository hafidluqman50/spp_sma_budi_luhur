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
                                <li class="breadcrumb-item"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Pembayaran SPP Bulan Tahun</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Pembayaran SPP Bulan Tahun</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA PEMBAYARAN SPP BULAN TAHUN</b></h4>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/admin/spp/pembayaran/'.$id) }}">
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
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->nisn }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Nama Siswa</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->nama_siswa }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Kelas</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->kelas }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Tahun Ajaran</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->tahun_ajaran }}</b></td>
                            </tr>
                        </table>
                        <table class="table table-hover table-bordered datatable force-fullwidth" id-bulan-tahun="{{$id_spp_bayar_data}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan, Tahun</th>
                                <th>Total Nominal</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($tahun as $key => $value)
                                @php
                                    $bulan = $spp_bayar->getBulan($id_spp_bayar_data,$value->tahun);
                                @endphp
                                @foreach ($bulan as $element)
                                @php
                                    $kalkulasi = format_rupiah($spp_bayar_detail->where('id_spp_bayar',$element->id_spp_bayar)
                                                    ->sum('nominal_bayar'));
                                @endphp
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $element->bulan_tahun }}</td>
                                    <td>{{ $kalkulasi }}</td>
                                    <td>    
                                        <div class="d-flex">
                                            <a href="{{url("/admin/spp/pembayaran/$id/lihat-pembayaran/$element->id_spp_bayar_data/retur-bayar/$element->id_spp_bayar")}}" style="margin-right:1%;">
                                              <button class="btn btn-warning" onclick="return confirm('Yakin Retur Pembayaran ?');"> Retur Bayar </button>
                                           </a>
                                            <a href="{{url("/admin/spp/pembayaran/$id/lihat-pembayaran/$element->id_spp_bayar_data/detail/$element->id_spp_bayar")}}" style="margin-right:1%;">
                                              <button class="btn btn-info"> Lihat Detail Bayar </button>
                                           </a>
                                           <form action="{{url("/admin/spp/pembayaran/$element->id_spp/lihat-pembayaran/$element->id_spp_bayar_data/delete/$element->id_spp_bayar")}}" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger" onclick="return confirm('Delete ?');"> Delete </button>
                                           </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection
