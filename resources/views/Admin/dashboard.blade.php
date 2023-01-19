@extends('Admin.layout-app.layout')

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
                            @if ($pendapatan_spp >= $pendapatan_spp_old)
                            <span class="pull-right"><i class="fa fa-caret-up text-primary m-r-5"></i>{{ persentase_penerimaan($pendapatan_spp_old,$pendapatan_spp) }}%</span>
                            {{-- @elseif ($pendapatan_spp == $pendapatan_spp_old)
                            <span class="pull-right"><i class="fa text-primary m-r-5"></i>{{ persentase_penerimaan($pendapatan_spp,$pendapatan_spp_old) }}%</span> --}}
                            @elseif ($pendapatan_spp < $pendapatan_spp_old)
                            <span class="pull-right"><i class="fa fa-caret-down text-primary m-r-5"></i>{{ persentase_penerimaan($pendapatan_spp_old,$pendapatan_spp) }}%</span>
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
                            @if ($pendapatan_uang_makan >= $pendapatan_uang_makan_old)
                            <span class="pull-right"><i class="fa fa-caret-up text-danger m-r-5"></i>{{ persentase_penerimaan($pendapatan_uang_makan_old,$pendapatan_uang_makan) }}%</span>
                            {{-- @elseif (persentase_penerimaan($pendapatan_uang_makan,$pendapatan_uang_makan_old) == 0)
                            <span class="pull-right"><i class="fa text-danger m-r-5"></i>{{ persentase_penerimaan($pendapatan_uang_makan,$pendapatan_uang_makan_old) }}%</span> --}}
                            @elseif ($pendapatan_uang_makan < $pendapatan_uang_makan_old)
                            <span class="pull-right"><i class="fa fa-caret-down text-danger m-r-5"></i>{{ persentase_penerimaan($pendapatan_uang_makan_old,$pendapatan_uang_makan) }}%</span>
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
                            @if ($pendapatan_tab_tes >= $pendapatan_tab_tes_old)
                            <span class="pull-right"><i class="fa fa-caret-up text-primary m-r-5"></i>{{ persentase_penerimaan($pendapatan_tab_tes_old,$pendapatan_tab_tes) }}%</span>
                            {{-- @elseif (persentase_pendapatan($pendapatan_tab_tes,$pendapatan_tab_tes_old) == 0)
                            <span class="pull-right"><i class="fa text-primary m-r-5"></i>{{ persentase_pendapatan($pendapatan_tab_tes,$pendapatan_tab_tes_old) }}%</span> --}}
                            @elseif ($pendapatan_tab_tes < $pendapatan_tab_tes_old)
                            <span class="pull-right"><i class="fa fa-caret-down text-primary m-r-5"></i>{{ persentase_penerimaan($pendapatan_tab_tes_old,$pendapatan_tab_tes) }}%</span>
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
                            @if ($pendapatan_asrama >= $pendapatan_asrama_old)
                            <span class="pull-right"><i class="fa fa-caret-up text-danger m-r-5"></i>{{ persentase_penerimaan($pendapatan_asrama_old,$pendapatan_asrama) }}%</span>
                            {{-- @elseif (persentase_pendapatan($pendapatan_asrama,$pendapatan_asrama_old) == 0)
                            <span class="pull-right"><i class="fa text-danger m-r-5"></i>{{ persentase_penerimaan($pendapatan_asrama,$pendapatan_asrama_old) }}%</span> --}}
                            @elseif ($pendapatan_asrama < $pendapatan_asrama_old)
                            <span class="pull-right"><i class="fa fa-caret-down text-danger m-r-5"></i>{{ persentase_penerimaan($pendapatan_asrama_old,$pendapatan_asrama) }}%</span>
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
                                        <select class="form-control select2" name="kelas">
                                            <option selected selected>--- Pilih Kelas ---</option>
                                            @foreach ($kelas as $element)
                                            <option value="{{ $element->id_kelas }}">{{ $element->kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label " for="userName1">Tahun Ajaran *</label>
                                    <div class="">
                                        <select class="form-control select2" name="tahun_ajaran">
                                            <option selected selected>--- Pilih Tahun Ajaran ---</option>
                                            @foreach ($tahun_ajaran as $element)
                                            <option value="{{ $element->id_tahun_ajaran }}">{{ $element->tahun_ajaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label " for="userName1">Siswa *</label>
                                    <div class="">
                                        <select class="form-control select2" name="siswa" disabled="">
                                            <option selected selected>--- Pilih Siswa ---</option>
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
                                    <h4 class="m-t-0 header-title" id="tunggakan_an">Tunggakan An. </h4>
                                    <p class="text-muted font-14 m-b-20" id="info_siswa">
                                        - <br>
                                        -
                                    </p>

                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bulan, Tahun</th>
                                            <th>Sisa Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tunggakan-table">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                            <h3>Print Out</h3>
                            <section>
                                <div class="form-group">
                                    {{-- <a href="{{url('/struk')}}" class="btn btn-success">Cetak</a> --}}
                                    <h5 class="text-center"> KWITANSI PEMBAYARAN SPP</h4>
                                    <div class="col-lg-12">
                                        <table id="kwitansi">
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td id="nama_siswa">-</td>
                                            </tr>
                                            <tr>
                                                <td>Uang Sejumlah</td>
                                                <td>:</td>
                                                <td id="total">-</td>
                                            </tr>
                                            <tr>
                                                <td>Untuk Pembayaran</td>
                                                <td>:</td>
                                                <td id="range_pembayaran">-</td>
                                            </tr>
                                            <tr>
                                                <td>Terbilang Rp.</td>
                                                <td>:</td>
                                                <td id="terbilang">-</td>
                                            </tr>
                                        </table>
                                        <p class="text-right" id="tanggal_spp">-</p>
                                        <p class="text-right"><b>Bendahara</b></p><br><br>
                                        <p class="text-right"><b>{{ $bendahara }}</b></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-4 col-form-label">Total Biaya : </label>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control" id="total-biaya" readonly="readonly">
                                                        <label for="" id="total-biaya-juga"><b>Rp. 0,00</b></label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-4 col-form-label">Kembalian : </label>
                                                    <div class="col-7">
                                                        <input type="number" id="kembalian" class="form-control" readonly="readonly">
                                                        <label for="" id="kembalian-label">Rp. 0,00</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-4 col-form-label">Bayar Total : </label>
                                                    <div class="col-7">
                                                        <input type="number" id="bayar-total" class="form-control">
                                                        <label for="" id="bayar-total-label">Rp. 0,00</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-4 col-form-label">Keterangan : </label>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control" required="" id="keterangan-spp" placeholder="Isi Keterangan">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-4 col-form-label">Jenis Bayar</label>
                                                    <div class="col-7">
                                                        <select name="jenis_bayar" class="form-control select2 jenis-bayar" required>
                                                            <option value disabled selected>=== Pilih Jenis Bayar ===</option>
                                                            <option value="cash">Cash</option>
                                                            <option value="alumni">Alumni</option>
                                                            <option value="transfer">Transfer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <!-- End #wizard-vertical -->
                    </div>
                </div>
            </div><!-- End row -->
            <form action="{{ url('/admin/dashboard/bayar-tunggakan') }}" method="POST" id="form-dashboard">
                @csrf
                <input type="hidden" name="id_spp">
                <input type="hidden" name="total_biaya">
                <input type="hidden" name="bayar_total">
                <input type="hidden" name="kembalian">
                <input type="hidden" name="keterangan_spp">
            </form>
            <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            DETAIL PEMBAYARAN
                        </div>
                        <form id="form-spp">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Nama Siswa</label>
                                            <div class="col-7">
                                                <input type="text" name="nama_siswa" class="form-control" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Kelas</label>
                                            <div class="col-7">
                                                <input type="text" name="kelas" class="form-control" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Bulan, Tahun</label>
                                            <div class="col-7">
                                                <input type="text" name="bulan_tahun" class="form-control" readonly="readonly">
                                            </div>
                                        </div>
                                        <input type="hidden" name="total_biaya_hidden" value="0">
                                        <input type="hidden" name="id_spp_bulan_tahun">
                                        <div class="visible-lg" style="height: 79px;"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card-box">
                                            <div id="layout-bayar-spp">
                                                <div id="bayar-spp">
                                                    
                                                </div>
                                            </div>
                                            <div class="visible-lg" style="height: 79px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" id="close-bayar" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light" id="act-simpan">Simpan</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
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
                                <th>Bulan, Tahun</th>
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
    <script>
        $(() => {
            $('select[name="kelas"]').change(function() {
                let kelas        = $(this).val()
                let tahun_ajaran = $('select[name="tahun_ajaran"]').val()

                if (tahun_ajaran != '' && kelas != '') {
                    $.ajax({
                        url: "{{ url('/ajax/get-siswa-dashboard/') }}/"+kelas+'/'+tahun_ajaran
                    })
                    .done(function(done) {
                        $('select[name="siswa"]').removeAttr('disabled')
                        $('select[name="siswa"]').html(done)
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                }
                
            })

            $('select[name="tahun_ajaran"]').change(function() {
                let tahun_ajaran = $(this).val()
                let kelas        = $('select[name="kelas"]').val()

                if (tahun_ajaran != '' && kelas != '') {
                    $.ajax({
                        url: "{{ url('/ajax/get-siswa-dashboard/') }}/"+kelas+'/'+tahun_ajaran
                    })
                    .done(function(done) {
                        $('select[name="siswa"]').removeAttr('disabled')
                        $('select[name="siswa"]').html(done)
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                }

            })

            $('a[href="#next"]').click(function() {
                if ($(this).attr('keterangan') == null || $(this).attr('keterangan') == '') {
                    $('a[href="#previous"]').attr('keterangan','previous-spp')
                    $(this).attr('keterangan','bayar-spp')
                    let kelas        = $('select[name="kelas"]').val()
                    let tahun_ajaran = $('select[name="tahun_ajaran"]').val()
                    let siswa        = $('select[name="siswa"]').val()

                    $('#tunggakan-table').html('<tr><td colspan="3">Loading...</td></tr>')
                    $.ajax({
                        url: "{{ url('/ajax/get-tunggakan/') }}/"+siswa+'/'+kelas+'/'+tahun_ajaran
                    })
                    .done(function(done) {
                        console.log(done)
                        $('input[name="id_spp"]').val(done.id_spp)
                        $('#tunggakan-table').html(done.table)
                        $('#tunggakan_an').html(`Tunggakan an. ${done.siswa['nama_siswa']}`)
                        $('#info_siswa').html(done.siswa['wilayah'])
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                }
                else if ($(this).attr('keterangan') == 'bayar-spp') {
                    // $(this).removeAttr('keterangan')
                    // $.ajax({
                    //     url: "{{ url('/ajax/get-bayar/') }}"
                    // })
                    // .done(function(done) {

                    // })
                    // .fail(function() {
                    //     console.log("error");
                    // })
                    // .always(function() {
                    //     console.log("complete");
                    // });
                    $('a[href="#previous"]').attr('keterangan','previous-finish')
                }
                
            })

            $('a[href="#previous"]').click(function(){
                console.log($(this).attr('keterangan'))
                if ($(this).attr('keterangan') == 'previous-finish') {
                    $(this).attr('keterangan','previous-spp')
                }
                else if ($(this).attr('keterangan') == 'previous-spp') {
                    $('a[href="#next"]').attr('keterangan','')
                    $(this).attr('keterangan','')
                }
            })

            $(document).on('click','a[href="#finish"]',function(){
                let bayar_total = $('#bayar-total').val()
                if (bayar_total != '') {
                    $('#form-dashboard').submit();
                }
                else {
                    alert('Isi Input Bayar Total !');
                    $('#bayar-total').focus();
                }
            })

            $(document).on('click','.tombol-bayar',function(){
                let attr = $(this).attr('id-spp-bulan-tahun')
                $(this).html('Loading...')
                $.ajax({
                    url: "{{ url('/ajax/get-tunggakan-detail/') }}/"+attr
                })
                .done(function(done) {
                    $(`.tombol-bayar[id-spp-bulan-tahun="${attr}"]`).html('Bayar')
                    $('#full-width-modal').modal('show')
                    $('#bayar-spp').html(done.kolom_spp)
                    $('input[name="id_spp_bulan_tahun"]').val(done.id_spp_bulan_tahun)
                    $('input[name="nama_siswa"]').val(done.data_siswa.nama_siswa)
                    $('input[name="kelas"]').val(done.data_siswa.kelas)
                    $('input[name="bulan_tahun"]').val(done.data_siswa.bulan_tahun)

                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            })

            $('#close-bayar').click(function(){
                $('#form-spp').find('input').val('')
                // $('#form-spp').find('label').html(rupiah_format(0))
                // $('#total-biaya-juga').html(rupiah_format(0))
                // $('#bayar-total-label').html(rupiah_format(0))
                // $('#kembalian-label').html(rupiah_format(0))

                $('input[name="total_biaya_hidden"]').val(0)
                $('#bayar-spp').html('')
                $('#full-width-modal').modal('hide')
            })

            $('#form-spp').submit(function(e){
                e.preventDefault()
                let val = $(this).serialize()
                $('#act-simpan').html('Loading...')
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/ajax/get-bayar/') }}",
                    type: 'POST',
                    data: val,
                })
                .done(function(done) {
                    console.log(done)
                    $('#act-simpan').html('Simpan')

                    $('#form-spp').find('input').val('')
                    $('#total-biaya').val(parseInt(done.total_bayar))
                    $("#total-biaya-juga").html(rupiah_format(done.total_bayar))
                    // $('#total-biaya-juga').html(rupiah_format(0))
                    // $('#bayar-total-label').html(rupiah_format(0))
                    // $('#kembalian-label').html(rupiah_format(0))

                    $('input[name="total_biaya_hidden"]').val(0)
                    $('#bayar-spp').html('')
                    $('#full-width-modal').modal('hide')

                    $(`.tombol-bayar[id-spp-bulan-tahun="${done.id_spp_bulan_tahun}"]`).html('Sudah Bayar')
                    $(`.tombol-bayar[id-spp-bulan-tahun="${done.id_spp_bulan_tahun}"]`).attr('disabled','disabled')

                    $('#nama_siswa').html(done.nama_siswa)
                    $('#total').html(done.total_bayar_rupiah)
                    $('#range_pembayaran').html(done.untuk_pembayaran)
                    $('#terbilang').html(done.terbilang)
                    $('#tanggal_spp').html(`Samarinda, ${done.tanggal_spp_convert}`)
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                
            })

            $(document).on('keyup','input[name="bayar_spp[]"]',function(){
                var val  = $(this).val()
                var attr = $(this).attr('id-kolom-spp')
                if (val == '') {
                    $(`.label-bayar-kolom-spp[id-kolom-spp="${attr}"]`).html(`<b>${rupiah_format(0)}</b>`)
                }
                else {
                    $(`.label-bayar-kolom-spp[id-kolom-spp="${attr}"]`).html(`<b>${rupiah_format(val)}</b>`)   
                }
            })

            $(document).on('change','input[name="bayar_spp[]"]',function(){
                var val         = parseInt($(this).val())
                var total_biaya = parseInt($('input[name="total_biaya_hidden"]').val())
                if (val == '') {
                    val = 0
                }

                let kalkulasi  = total_biaya + val
                // $('#total-biaya-juga').html(`<b>${rupiah_format(kalkulasi)}</b>`)
                $('input[name="total_biaya_hidden"]').val(kalkulasi)
            })

            $('#bayar-total').keyup(function(){
                let val         = $(this).val()
                let total_biaya = $('#total-biaya').val()
                
                $('#bayar-total-label').html(`<b>${rupiah_format(val)}</b>`)
                if (parseInt(val) > parseInt(total_biaya)) {
                    $('#kembalian').val(parseInt(val) - parseInt(total_biaya))
                    $('#kembalian-label').html(`<b>${rupiah_format(parseInt(val) - parseInt(total_biaya))}</b>`)
                }
                if (parseInt(val) == parseInt(total_biaya)) {
                    $('#kembalian').val(0)
                    $('#kembalian-label').html(`<b>${rupiah_format(0)}</b>`)
                }

                $('input[name="total_biaya"]').val(total_biaya)
                $('input[name="bayar_total"]').val(val)
                $('input[name="kembalian"]').val($('#kembalian').val())
            })

            $('#keterangan-spp').keyup(function(){
                $('input[name="keterangan_spp"]').val($(this).val())
            })
        })
    </script>
@endsection
