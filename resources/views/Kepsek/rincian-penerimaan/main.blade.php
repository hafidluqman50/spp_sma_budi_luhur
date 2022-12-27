@extends('Kepsek.layout-app.layout-rab')

@section('content')
    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/kepsek/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/kepsek/dashboard-rab') }}">Dashboard RAB</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/kepsek/data-perincian-rab') }}">Rincian Penerimaan</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Rincian Penerimaan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA RINCIAN PENERIMAAN RAB</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/kepsek/data-perincian-rab/') }}">
                                <button class="btn btn-default" style="cursor:pointer;">
                                    <i class="fa fa-arrow-left m-r-5"></i>Kembali
                                </button>
                            </a>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('message') }} <button class="close">X</button>
                        </div>
                        @endif
                        <table class="table table-hover table-bordered data-rincian-penerimaan-detail-kepsek force-fullwidth" id-rincian-pengeluaran="{{$id}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Perincian</th>
                                <th>Rencana</th>
                                <th>Penerimaan</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA RINCIAN PENERIMAAN REKAP</b></h4>
                        <table class="table table-hover table-bordered data-rincian-penerimaan-rekap-kepsek force-fullwidth" id-rincian-pengeluaran="{{$id}}">
                            <thead>
                            <tr>
                                <th>Tanggal Bon Pengajuan</th>
                                <th>Nominal Bon Pengajuan</th>
                                <th>Tanggal Realisasi Pengeluaran</th>
                                <th>Nominal Realisasi Pengeluaran</th>
                                <th>Sisa Realisasi Pengeluaran</th>
                                <th>Tanggal Penerimaan Bulan Ini</th>
                                <th>Sisa Penerimaan Bulan Ini</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA RINCIAN PENERIMAAN REKAP TAHUN AJARAN</b></h4>
                        <table class="table table-hover table-bordered data-rincian-penerimaan-tahun-ajaran-kepsek force-fullwidth" id-rincian-pengeluaran="{{$id}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan, Tahun</th>
                                <th>Pemasukan</th>
                                <th>Realisasi Pengeluaran</th>
                                <th>Sisa Akhir Bulan</th>
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
<script>
    $(() => {


    var rincian_penerimaan_id = $('.data-rincian-penerimaan-detail-kepsek').attr('id-rincian-pengeluaran')
    var rincian_penerimaan_detail_kepsek = $('.data-rincian-penerimaan-detail-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:`${base_url}/datatables/data-rincian-penerimaan-detail/${rincian_penerimaan_id}`,
        columns:[
            {data:'id_rincian_penerimaan_detail',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'perincian',name:'perincian'},
            {data:'rencana',name:'rencana'},
            {data:'penerimaan',name:'penerimaan'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        // order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    rincian_penerimaan_detail_kepsek.on( 'order.dt search.dt', function () {
        rincian_penerimaan_detail_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var rincian_penerimaan_id_ = $('.data-rincian-penerimaan-rekap-kepsek').attr('id-rincian-pengeluaran')
    var rincian_penerimaan_rekap_kepsek = $('.data-rincian-penerimaan-rekap-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:`${base_url}/datatables/data-rincian-penerimaan-rekap/${rincian_penerimaan_id_}`,
        columns:[
            {data:'tanggal_bon_pengajuan',name:'tanggal_bon_pengajuan'},
            {data:'nominal_bon_pengajuan',name:'nominal_bon_pengajuan'},
            {data:'tanggal_realisasi_pengeluaran',name:'tanggal_realisasi_pengeluaran'},
            {data:'nominal_realisasi_pengeluaran',name:'nominal_realisasi_pengeluaran'},
            {data:'sisa_realisasi_pengeluaran',name:'sisa_realisasi_pengeluaran'},
            {data:'tanggal_penerimaan_bulan_ini',name:'tanggal_penerimaan_bulan_ini'},
            {data:'sisa_penerimaan_bulan_ini',name:'sisa_penerimaan_bulan_ini'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        // order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });

    var rincian_penerimaan_id__ = $('.data-rincian-penerimaan-tahun-ajaran-kepsek').attr('id-rincian-pengeluaran')
    var rincian_penerimaan_tahun_ajaran_kepsek = $('.data-rincian-penerimaan-tahun-ajaran-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:`${base_url}/datatables/data-rincian-penerimaan-tahun-ajaran/${rincian_penerimaan_id__}`,
        columns:[
            {data:'id_rincian_penerimaan_tahun_ajaran',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'bulan_tahun',name:'bulan_tahun'},
            {data:'pemasukan',name:'pemasukan'},
            {data:'realisasi_pengeluaran',name:'realisasi_pengeluaran'},
            {data:'sisa_akhir_bulan',name:'sisa_akhir_bulan'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        // order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    rincian_penerimaan_tahun_ajaran_kepsek.on( 'order.dt search.dt', function () {
        rincian_penerimaan_tahun_ajaran_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();
    })
</script>
@endsection