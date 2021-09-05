@extends('layout-app.layout')

@section('css')
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
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
                                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="#">Persentase</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Grafik Keuangan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-lg-12 col-xl-3">
                    <div class="card-box widget-box-1 bg-white">
                        <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bulanan"></i>
                        <h4 class="text-dark font-18">Pendapatan SPP</h4>
                        <h2 class="text-primary text-center">Rp.<span data-plugin="counterup">89.000.000</span></h2>
                        <p class="text-muted">Dari: Rp.100.000.000 <span class="pull-right"><i class="fa fa-caret-up text-primary m-r-5"></i>87.25%</span></p>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-3">
                    <div class="card-box widget-box-1 bg-white">
                        <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bulanan"></i>
                        <h4 class="text-dark font-18">Pendapatan Uang Makan</h4>
                        <h2 class="text-pink text-center">Rp.<span data-plugin="counterup">50.000.000</span></h2>
                        <p class="text-muted">Dari: Rp.100.000.000 <span class="pull-right"><i class="fa fa-caret-down text-danger m-r-5"></i>50%</span></p>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-3">
                    <div class="card-box widget-box-1 bg-white">
                        <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                        <h4 class="text-dark font-18">Pendapatan Tabungan Tes</h4>
                        <h2 class="text-success text-center">Rp.<span data-plugin="counterup">20.000.000</span></h2>
                        <p class="text-muted">Dari: Rp.100.000.000 <span class="pull-right"><i class="fa fa-caret-up text-primary m-r-5"></i>20%</span></p>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-3">
                    <div class="card-box widget-box-1 bg-white">
                        <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                        <h4 class="text-dark font-18">Pendapatan Asrama</h4>
                        <h2 class="text-warning text-center">Rp.<span data-plugin="counterup">10.000.000</span></h2>
                        <p class="text-muted">Dari: Rp.100.000.000 <span class="pull-right"><i class="fa fa-caret-down text-danger m-r-5"></i>10%</span></p>
                    </div>
                </div>

            </div>

            <!-- BAR Chart -->
            <div class="row">
                <div class="col-lg-12 col-xl-6">
                    <div class="portlet">
                        <!-- /primary heading -->
                        <div class="portlet-heading">
                            <h3 class="portlet-title text-dark"> Grafik Tunggakan </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default1"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default1" class="panel-collapse collapse show">
                            <div class="portlet-body">
                                <div class="text-center">
                                    <ul class="list-inline chart-detail-list">
                                        <li class="list-inline-item">
                                            <h5><i class="fa fa-circle m-r-5" style="color: #3ac9d6;"></i>Komplek</h5>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5><i class="fa fa-circle m-r-5" style="color: #f9c851;"></i>Dalam Kota</h5>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5><i class="fa fa-circle m-r-5" style="color: #ebeff2;"></i>Luar Kota</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div id="morris-bar-example" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /Portlet -->
                </div>
                <!-- col -->
                <div class="col-lg-12 col-xl-6">
                    <div class="portlet">
                        <!-- /primary heading -->
                        <div class="portlet-heading">
                            <h3 class="portlet-title text-dark"> Grafik Pendapatan Pertahun </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default" class="panel-collapse collapse show">
                            <div class="portlet-body">
                                <div class="text-center">
                                    <ul class="list-inline chart-detail-list">
                                        <li class="list-inline-item">
                                            <h5><i class="fa fa-circle m-r-5" style="color: #4793f5;"></i>Komplek</h5>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5><i class="fa fa-circle m-r-5" style="color: #ff3f4e;"></i>Dalam Kota</h5>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5><i class="fa fa-circle m-r-5" style="color: #bbbbbb;"></i>Luar Kota</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div id="morris-area-example" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /Portlet -->
                </div>
                <!-- col -->
            </div>
            <!-- End row-->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection

@section('js')
    <!-- Counterup  -->
    <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/raphael/raphael-min.js"></script>

    <script src="assets/pages/jquery.dashboard_4.js"></script>
@endsection
