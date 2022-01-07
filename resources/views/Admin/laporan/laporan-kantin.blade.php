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
                                <li class="breadcrumb-item active"><a href="#">Laporan Kantin</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Laporan Kantin</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>LAPORAN KANTIN</b></h4>
                        <form action="{{ url('/admin/laporan/cetak') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" name="from" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" name="to" class="form-control" required>
                                </div>
                            </div>
                            <table class="table table-hover table-bordered laporan-kantin force-fullwidth">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kantin</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection
