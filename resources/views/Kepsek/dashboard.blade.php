@extends('Kepsek.layout-app.layout')

@section('css')
    <link href= "{{asset('assets/plugins/custombox/css/custombox.css')}}" rel="stylesheet">
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
                        {{-- <div class="pull-left"> --}}
                            <i class="fa fa-money text-info" style="font-size:25px;"></i>
                        {{-- </div> --}}
                        {{-- <div class="text-right"> --}}
                            <h3 class="text-dark"><b class="counter">{{ money_receipt($transaksi_hari_ini) }}</b></h3>
                            <p class="text-muted mb-0">Transaksi Hari Ini</p>
                        {{-- </div> --}}
                        {{-- <div class="clearfix"></div> --}}
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        {{-- <div class=""> --}}
                            <i class="fa fa-money text-success" style="font-size:25px;"></i>
                        {{-- </div> --}}
                        {{-- <div class="text-right"> --}}
                            <h3 class="text-dark"><b class="counter">{{ money_receipt($transaksi_bulan_ini) }}</b></h3>
                            <p class="text-muted mb-0">Transaksi Bulan ini</p>
                        {{-- </div> --}}
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        {{-- <div class="bg-icon bg-icon-purple pull-left"> --}}
                            <i class="fa fa-money text-purple" style="font-size:25px;"></i>
                        {{-- </div> --}}
                        {{-- <div class="text-right"> --}}
                            <h3 class="text-dark"><b class="counter">{{ money_receipt($total_uang_kantin) }}</b></h3>
                            <p class="text-muted mb-0">Total Uang Kantin</p>
                        {{-- </div> --}}
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        {{-- <div class="bg-icon bg-icon-danger pull-left"> --}}
                            <i class="fa fa-money text-danger" style="font-size:25px;"></i>
                        {{-- </div> --}}
                        {{-- <div class="text-right"> --}}
                            <h3 class="text-dark"><b class="counter">{{ money_receipt($total_tunggakan) }}</b></h3>
                            <p class="text-muted mb-0">Total Tunggakan</p>
                        {{-- </div> --}}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-12 col-xl-3">
                    <div class="card-box widget-box-1 bg-white">
                        <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bulanan"></i>
                        <h4 class="text-dark font-18">Pendapatan SPP</h4>
                        <h2 class="text-primary text-center">Rp.<span data-plugin="counterup">{{ money_receipt($pendapatan_spp) }}</span></h2>
                        <p class="text-muted">Dari: Rp.{{ money_receipt($pendapatan_spp_old) }} 
                            @if (persentase_pendapatan($pendapatan_spp,$pendapatan_spp_old) > 0)
                            <span class="pull-right"><i class="fa fa-caret-up text-primary m-r-5"></i>{{ persentase_pendapatan($pendapatan_spp,$pendapatan_spp_old) }}%</span>
                            @elseif (persentase_pendapatan($pendapatan_spp,$pendapatan_spp_old) == 0)
                            <span class="pull-right"><i class="fa text-primary m-r-5"></i>{{ persentase_pendapatan($pendapatan_spp,$pendapatan_spp_old) }}%</span>
                            @elseif (persentase_pendapatan($pendapatan_spp,$pendapatan_spp_old) < 0)
                            <span class="pull-right"><i class="fa fa-caret-down text-primary m-r-5"></i>{{ persentase_pendapatan($pendapatan_spp,$pendapatan_spp_old) }}%</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-3">
                    <div class="card-box widget-box-1 bg-white">
                        <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bulanan"></i>
                        <h4 class="text-dark font-18">Pendapatan Uang Makan</h4>
                        <h2 class="text-pink text-center">Rp.<span data-plugin="counterup">{{ money_receipt($pendapatan_uang_makan) }}</span></h2>
                        <p class="text-muted">Dari: Rp.{{ money_receipt($pendapatan_uang_makan_old) }}
                            @if (persentase_pendapatan($pendapatan_uang_makan,$pendapatan_uang_makan_old) > 0)
                            <span class="pull-right"><i class="fa fa-caret-up text-danger m-r-5"></i>{{ persentase_pendapatan($pendapatan_uang_makan,$pendapatan_uang_makan_old) }}%</span>
                            @elseif (persentase_pendapatan($pendapatan_uang_makan,$pendapatan_uang_makan_old) == 0)
                            <span class="pull-right"><i class="fa text-danger m-r-5"></i>{{ persentase_pendapatan($pendapatan_uang_makan,$pendapatan_uang_makan_old) }}%</span>
                            @elseif (persentase_pendapatan($pendapatan_uang_makan,$pendapatan_uang_makan_old) < 0)
                            <span class="pull-right"><i class="fa fa-caret-down text-danger m-r-5"></i>{{ persentase_pendapatan($pendapatan_uang_makan,$pendapatan_uang_makan_old) }}%</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-3">
                    <div class="card-box widget-box-1 bg-white">
                        <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bulanan"></i>
                        <h4 class="text-dark font-18">Pendapatan Tabungan Tes</h4>
                        <h2 class="text-success text-center">Rp.<span data-plugin="counterup">{{ money_receipt($pendapatan_tab_tes) }}</span></h2>
                        <p class="text-muted">Dari: Rp.{{ money_receipt($pendapatan_tab_tes_old) }} 
                            @if (persentase_pendapatan($pendapatan_tab_tes,$pendapatan_tab_tes_old) > 0)
                            <span class="pull-right"><i class="fa fa-caret-up text-primary m-r-5"></i>{{ persentase_pendapatan($pendapatan_tab_tes,$pendapatan_tab_tes_old) }}%</span>
                            @elseif (persentase_pendapatan($pendapatan_tab_tes,$pendapatan_tab_tes_old) == 0)
                            <span class="pull-right"><i class="fa text-primary m-r-5"></i>{{ persentase_pendapatan($pendapatan_tab_tes,$pendapatan_tab_tes_old) }}%</span>
                            @elseif (persentase_pendapatan($pendapatan_tab_tes,$pendapatan_tab_tes_old) < 0)
                            <span class="pull-right"><i class="fa fa-caret-down text-primary m-r-5"></i>{{ persentase_pendapatan($pendapatan_tab_tes,$pendapatan_tab_tes_old) }}%</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-3">
                    <div class="card-box widget-box-1 bg-white">
                        <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bulanan"></i>
                        <h4 class="text-dark font-18">Pendapatan Asrama</h4>
                        <h2 class="text-warning text-center">Rp.<span data-plugin="counterup">{{ money_receipt($pendapatan_asrama) }}</span></h2>
                        <p class="text-muted">Dari: {{ money_receipt($pendapatan_asrama_old) }} 
                            @if (persentase_pendapatan($pendapatan_asrama,$pendapatan_asrama_old) > 0)
                            <span class="pull-right"><i class="fa fa-caret-up text-danger m-r-5"></i>{{ persentase_pendapatan($pendapatan_asrama,$pendapatan_asrama_old) }}%</span>
                            @elseif (persentase_pendapatan($pendapatan_asrama,$pendapatan_asrama_old) == 0)
                            <span class="pull-right"><i class="fa text-danger m-r-5"></i>{{ persentase_pendapatan($pendapatan_asrama,$pendapatan_asrama_old) }}%</span>
                            @elseif (persentase_pendapatan($pendapatan_asrama,$pendapatan_asrama_old) < 0)
                            <span class="pull-right"><i class="fa fa-caret-down text-danger m-r-5"></i>{{ persentase_pendapatan($pendapatan_asrama,$pendapatan_asrama_old) }}%</span>
                            @endif
                        </p>
                    </div>
                </div>

            </div>
            <!-- Vertical Steps Example -->
            
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

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>TRANSAKSI TERAKHIR</b></h4>
                        <table id="transaksi-terakhir-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Wilayah</th>
                                <th>Total Pembayaran</th>
                                <th>Action</th>
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

@section('js')
    {{-- <script src="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script> --}}

    <!--Form Wizard-->
    <script src="{{asset('assets/plugins/custombox/js/custombox.min.js')}}"></script>
    <script src="{{asset('assets/plugins/custombox/js/legacy.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery.steps/js/jquery.steps.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>

    <!--wizard initialization-->
    <script src="{{asset('assets/pages/jquery.wizard-init.js')}}" type="text/javascript"></script>
    <script>
        !function($) {
    "use strict";

    var Dashboard4 = function() {};


    //creates area chart
    Dashboard4.prototype.createAreaChart = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 0,
            lineWidth: 0,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true,
            gridLineColor: '#eef0f2',
            lineColors: lineColors
        });
    },

    //creates Bar chart
    Dashboard4.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barColors: lineColors
        });
    },

    Dashboard4.prototype.init = function() {

        //creating area chart
        // var $areaData = [
        //         { y: '2009', a: 0, b: 30, c:30 },
        //         { y: '2010', a: 75, b: 65, c:30 },
        //         { y: '2011', a: 50, b: 40, c:30 },
        //         { y: '2012', a: 75, b: 65, c:30 },
        //         { y: '2013', a: 50, b: 40, c:30 },
        //         { y: '2014', a: 75, b: 65, c:30 },
        //         { y: '2015', a: 90, b: 60, c:30 }
        //     ];
        var $areaData = {!!json_encode($grafik_pendapatan)!!}
        this.createAreaChart('morris-area-example', 0, 0, $areaData, 'y', ['a', 'b','c'], ['Komplek', 'Dalam Kota', 'Luar Kota'], ['#4793f5', '#ff3f4e', '#bbbbbb']);

        //creating bar chart
        // var $barData  = [
        //     { y: '2009', a: 100, b: 90 , c: 40 },
        //     { y: '2010', a: 75,  b: 65 , c: 20 },
        //     { y: '2011', a: 50,  b: 40 , c: 50 },
        //     { y: '2012', a: 75,  b: 65 , c: 95 },
        //     { y: '2013', a: 50,  b: 40 , c: 22 },
        //     { y: '2014', a: 75,  b: 65 , c: 56 },
        //     { y: '2015', a: 100, b: 90 , c: 60 }
        // ];
        var $barData = {!!json_encode($grafik_tunggakan)!!}
        this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b', 'c'], ['Komplek', 'Dalam Kota', 'Luar Kota'], ['#3ac9d6', '#f9c851', '#ebeff2']);

    },
    //init
    $.Dashboard4 = new Dashboard4, $.Dashboard4.Constructor = Dashboard4
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.Dashboard4.init();
}(window.jQuery);
    </script>
@endsection
