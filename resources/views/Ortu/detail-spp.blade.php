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
                                <li class="breadcrumb-item active"><a href="#">Data Detail SPP</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Detail SPP</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA DETAIL SPP</b></h4>
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/ortu/spp/'.$id) }}">
                                <button class="btn btn-default" type="button">Kembali</button>
                            </a>
                        </div>
                        <table class="table table-hover table-bordered spp-ortu-detail force-fullwidth" id-spp-bulan-tahun="{{$id_detail}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pembayaran SPP</th>
                                <th>Nominal Bayar</th>
                                <th>Tanggal Bayar</th>
                                <th>Bayar</th>
                                <th>Status Bayar</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection
