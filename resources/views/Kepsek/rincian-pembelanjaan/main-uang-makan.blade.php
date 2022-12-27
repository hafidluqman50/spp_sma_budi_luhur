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
                                <li class="breadcrumb-item active"><a href="{{ url('/kepsek/data-perincian-rab') }}">Rincian Pengeluaran</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Rincian Pembelanjaan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA RINCIAN PEMBELANJAAN UANG MAKAN</b></h4>
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
                        <table class="table table-hover table-bordered data-rincian-pembelanjaan-kepsek force-fullwidth" id-rincian-pengeluaran="{{$id}}" ket-data="uang-makan">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori Rincian</th>
                                <th>Rincian</th>
                                <th>Volume</th>
                                <th>Nominal Rincian</th>
                                <th>Keterangan</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA RINCIAN PEMBELANJAAN UANG MAKAN TAHUN AJARAN REKAP</b></h4>
                        <table class="table table-hover table-bordered data-rincian-pembelanjaan-tahun-ajaran-kepsek force-fullwidth" id-rincian-pengeluaran="{{$id}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan, Tahun</th>
                                <th>Pemasukan</th>
                                <th>Realisasi Pengeluaran</th>
                                <th>Sisa Akhir Bulan</th>
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

@section('js')
<script>
    $(() => {


    var id_rincian = $('.data-rincian-pembelanjaan-kepsek').attr('id-rincian-pengeluaran')
    var ket_data   = $('.data-rincian-pembelanjaan-kepsek').attr('ket-data')
    var rincian_pembelanjaan_kepsek = $('.data-rincian-pembelanjaan-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:`${base_url}/datatables/data-rincian-pembelanjaan/${id_rincian}/${ket_data}`,
        columns:[
            {data:'id_rincian_pembelanjaan',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'kategori_rincian_pembelanjaan',name:'kategori_rincian_pembelanjaan'},
            {data:'uraian_rincian',name:'uraian_rincian'},
            {data:'volume_rincian',name:'volume_rincian'},
            {data:'nominal_rincian',name:'nominal_rincian'},
            {data:'keterangan_pembelanjaan',name:'keterangan_pembelanjaan'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 1, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    rincian_pembelanjaan_kepsek.on( 'order.dt search.dt', function () {
        rincian_pembelanjaan_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var rincian_pembelanjaan_id__ = $('.data-rincian-pembelanjaan-tahun-ajaran-kepsek').attr('id-rincian-pengeluaran')
    var rincian_pembelanjaan_tahun_ajaran_kepsek = $('.data-rincian-pembelanjaan-tahun-ajaran-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:`${base_url}/datatables/data-rincian-pembelanjaan-tahun-ajaran/${rincian_pembelanjaan_id__}`,
        columns:[
            {data:'id_rincian_pembelanjaan_tahun_ajaran',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'bulan_tahun',name:'bulan_tahun'},
            {data:'pemasukan',name:'pemasukan'},
            {data:'realisasi_pengeluaran',name:'realisasi_pengeluaran'},
            {data:'sisa_akhir_bulan',name:'sisa_akhir_bulan'},
            {data:'action',name:'action',searchable:false,orderable:false}
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
    rincian_pembelanjaan_tahun_ajaran_kepsek.on( 'order.dt search.dt', function () {
        rincian_pembelanjaan_tahun_ajaran_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();
    })
</script>
@endsection