@extends('Admin.layout-app.layout')

@section('css')
    <link href="assets/plugins/bootstrap-table/css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
@endsection

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
                                <li class="breadcrumb-item active"><a href="#">Data Siswa</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Siswa</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA SISWA</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>

                        <div class="button-list">
                            <button id="demo-delete-row" class="btn btn-danger" disabled><i class="fa fa-times m-r-5"></i>Delete</button>
                            <a href="" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Tambah</a>
                        </div>
                        
                        <table id="demo-custom-toolbar"  data-toggle="table"
                                data-toolbar=".button-list"
                                data-search="true"
                                data-show-refresh="true"
                                data-show-toggle="true"
                                data-show-columns="true"
                                data-sort-name="id"
                                data-page-list="[5, 10, 20]"
                                data-page-size="5"
                                data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="id" data-sortable="true">Kelas</th>
                                <th data-field="date" data-sortable="true">No HP Ortu</th>
                                <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Kantin</th>
                                <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Wilayah</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td></td>
                                <td>Khoirulli Nurul Fatimah</td>
                                <td>X IPA I</td>
                                <td>085252678541</td>
                                <td>Pondok</td>
                                <td>Komplek</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Marlina</td>
                                <td>XII MIPA II</td>
                                <td>085252678541</td>
                                <td>Bu Yusron</td>
                                <td>Luar Kota</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Nuridina Sari</td>
                                <td>XI IPS</td>
                                <td>085252678541</td>
                                <td>Bu Mus</td>
                                <td>Dalam Kota</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection

@section('js')
        <script src="assets/plugins/bootstrap-table/js/bootstrap-table.js"></script>
        <script src="assets/pages/jquery.bs-table.js"></script>
@endsection
