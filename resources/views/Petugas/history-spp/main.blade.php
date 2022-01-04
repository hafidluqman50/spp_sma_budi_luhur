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
                            <li class="breadcrumb-item active"><a href="#">History SPP</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data History SPP</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>DATA HISTORY SPP</b></h4>
                    <table class="table table-hover table-bordered data-history-spp force-fullwidth">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Text</th>
                                <th>Tanggal Input</th>
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
