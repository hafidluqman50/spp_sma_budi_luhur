@extends('Ortu.layout-app.layout')

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
                                <li class="breadcrumb-item active"><a href="#">Data Bulan Tahun SPP</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Bulan Tahun SPP</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA SPP BULAN TAHUN</b></h4>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/ortu/dashboard/') }}">
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
                        <table class="table table-hover table-bordered datatable force-fullwidth" id-spp="{{$id}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan Tahun</th>
                                <th>Kantin</th>
                                <th>Status Pelunasan</th>
                                <th>Sisa Bayar</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($tahun as $key => $value)
                                @php
                                    $bulan = $spp_bulan_tahun->getBulan($id,$value->tahun);
                                @endphp
                                @foreach ($bulan as $element)
                                @php
                                    $array = [
                                        0 => ['class'=>'badge badge-danger','text'=>'Belum Lunas'],
                                        1 => ['class'=>'badge badge-success','text'=>'Sudah Lunas']
                                    ];
                                    $status_pelunasan = '<span class="'.$array[$spp_bulan_tahun->checkStatus($element->id_spp_bulan_tahun)]['class'].'">'.$array[$spp_bulan_tahun->checkStatus($element->id_spp_bulan_tahun)]['text'].'</span>';

                                    if ($element->nama_kantin == NULL || $element->nama_kantin == '') {
                                        $nama_kantin = '-';
                                    }
                                    else {
                                        $nama_kantin = $element->nama_kantin;
                                    }

                                    $kalkulasi = format_rupiah($spp_detail->where('id_spp_bulan_tahun',$element->id_spp_bulan_tahun)->sum('sisa_bayar'));
                                @endphp
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $element->bulan_tahun }}</td>
                                    <td>{{ $nama_kantin }}</td>
                                    <td>{!! $status_pelunasan !!}</td>
                                    <td>{{ $kalkulasi }}</td>
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
