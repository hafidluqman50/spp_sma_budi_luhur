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
                                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-info pull-left">
                            <i class="md md-attach-money text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">12.000.000</b></h3>
                            <p class="text-muted mb-0">Transaksi Hari Ini</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-success pull-left">
                            <i class="fa fa-money text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">28.000.000</b></h3>
                            <p class="text-muted mb-0">Transaksi Bulan ini</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-purple pull-left">
                            <i class="fa fa-edit text-purple"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">99.000.000</b></h3>
                            <p class="text-muted mb-0">Total Uang Kantin</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-danger pull-left">
                            <i class="md md-warning text-danger"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">354.313.00</b></h3>
                            <p class="text-muted mb-0">Total Tunggakan</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Vertical Steps Example -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>PEMBAYARAN</b></h4>
                        <p class="text-muted m-b-30 font-13">
                            Silahkan Lengkapi Data Berikut !
                        </p>

                        <form id="wizard-vertical">
                            <h3>Data Siswa</h3>
                            <section>
                                <div class="form-group clearfix">
                                    <label class="control-label " for="userName1">Kelas *</label>
                                    <div class="">
                                        <select class="form-control">
                                            <option selected selected>--- Pilih Kelas ---</option>
                                            <option>Kelas X</option>
                                            <option>Kelas XI</option>
                                            <option>Kelas XII</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label " for="userName1">Nama Lengkap *</label>
                                    <div class="">
                                        <select class="form-control">
                                            <option selected selected>--- Pilih Nama Siswa ---</option>
                                            <option>Khoirulli Nurul Fatimah</option>
                                            <option>Hafiidz Luqmanul Hakim</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <label class="col-lg-12 control-label ">(*) Wajib Diisi</label>
                                </div>
                            </section>
                            <h3>Data Tunggakan</h3>
                            <section>
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Tunggakan An. Khoirulli Nurul Fatimah</h4>
                                    <p class="text-muted font-14 m-b-20">
                                        Siswa Luar Kota/Dalam Kota/Komplek <br>
                                        Makan di Pondok/Kantin Bu Mus/Bu Yusron/Bu Zahira/Bu Wandi/Bu Malik
                                    </p>

                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bulan, Tahun</th>
                                            <th>SPP</th>
                                            <th>Makan</th>
                                            <th>Tab Tes</th>
                                            <th>Asrama</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Januari 2021</td>
                                            <td>250.000</td>
                                            <td>600.000</td>
                                            <td>50.000</td>
                                            <td>100.000</td>
                                            <td><a href="" class="btn btn-danger btn-sm waves-effect waves-light">Bayar</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Februari 2021</td>
                                            <td>250.000</td>
                                            <td>600.000</td>
                                            <td>50.000</td>
                                            <td>100.000</td>
                                            <td><a href="" class="btn btn-danger btn-sm waves-effect waves-light">Bayar</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Maret 2021</td>
                                            <td>250.000</td>
                                            <td>600.000</td>
                                            <td>50.000</td>
                                            <td>100.000</td>
                                            <td><a href="" class="btn btn-danger btn-sm waves-effect waves-light">Bayar</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                            <h3>Print Out</h3>
                            <section>
                                <div class="form-group clearfix">
                                    <h5 class="text-center"> KWITANSI PEMBAYARAN SPP</h4>
                                    <div class="col-lg-12">
                                        <table>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>Khoirulli Nurul Fatimah</td>
                                            </tr>
                                            <tr>
                                                <td>Uang Sejumlah</td>
                                                <td>:</td>
                                                <td>Lima Juta Rupiah</td>
                                            </tr>
                                            <tr>
                                                <td>Untuk Pembayaran</td>
                                                <td>:</td>
                                                <td>SPP Bulan Oktober 2020 - Februari 2021</td>
                                            </tr>
                                            <tr>
                                                <td>Terbilang Rp.</td>
                                                <td>:</td>
                                                <td>5.000.000</td>
                                            </tr>
                                        </table>
                                        <p class="text-right">Samarinda, 9 September 2021</p>
                                        <p class="text-right"><b>Bendahara</b></p><br><br>
                                        <p class="text-right"><b>Nuridina Sari</b></p>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <!-- End #wizard-vertical -->
                    </div>
                </div>
            </div><!-- End row -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>TRANSAKSI TERAKHIR</b></h4>

                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Wilayah</th>
                                <th>Total Pembayaran</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>01 September 2021</td>
                                <td>Khoirulli Nurul Fatimah</td>
                                <td>Dalam Kota</td>
                                <td>10.000.000</td>
                                <td><a href="" class="btn btn-success btn-sm waves-effect waves-light">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>01 September 2021</td>
                                <td>M. Afnan</td>
                                <td>Luar Kota</td>
                                <td>15.000.000</td>
                                <td><a href="" class="btn btn-success btn-sm waves-effect waves-light">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>31 Agustus 2021</td>
                                <td>Mirza Ghozi</td>
                                <td>Komplek</td>
                                <td>400.000</td>
                                <td><a href="" class="btn btn-success btn-sm waves-effect waves-light">Lihat</a></td>
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
    
        <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

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

        <!--Form Wizard-->
        <script src="assets/plugins/jquery.steps/js/jquery.steps.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>

        <!--wizard initialization-->
        <script src="assets/pages/jquery.wizard-init.js" type="text/javascript"></script>
@endsection
