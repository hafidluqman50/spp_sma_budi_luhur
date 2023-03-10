@extends('layout-app.layout')

@section('css')

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                                <li class="breadcrumb-item active"><a href="#">Data Kelas</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Detail Kelas</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Kelas Detail</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>DETAIL KELAS</b></h4>

                            <div class="button-list">
                                <a href="{{ url('datakelas') }}" class="btn btn-secondary"><i class="fa  fa-arrow-left m-r-5"></i>Kembali</a>
                                <a href="{{ url('tambahkelas') }}" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Tambah</a>
                            </div>
                            <p></p>
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>12345678912</td>
                                    <td>Khoirulli Nurul Fatimah</td>
                                    <td>XII IPS 2</td>
                                    <td>2021/2022</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{ url('editkelas') }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    
    

@endsection

@section('js')

    <!-- Required datatable js -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );

    </script>
@endsection
