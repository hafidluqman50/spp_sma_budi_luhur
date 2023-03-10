@extends('Ortu.layout-app.layout')

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
                                <li class="breadcrumb-item"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Pembayaran SPP</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Pembayaran SPP</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA PEMBAYARAN SPP</b></h4>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/ortu/dashboard/') }}">
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </button>
                            </a>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('message') }} <button class="close">X</button>
                        </div>
                        @endif
                        <table>
                            <tr>
                                <td><b>NISN</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->nisn }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Nama Siswa</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->nama_siswa }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Kelas</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->kelas }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Tahun Ajaran</b></td>
                                <td><b>:</b></td>
                                <td><b>{{ $siswa->tahun_ajaran }}</b></td>
                            </tr>
                        </table>
                        <table class="table table-hover table-bordered data-spp-bayar-ortu force-fullwidth" id-spp="{{$id}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Bayar</th>
                                <th>Keterangan Bayar</th>
                                <th>Nominal Bayar</th>
                                <th>Total Bayar</th>
                                <th>Kembalian</th>
                                <th>Input By</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

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
<script>
    $(() => {


    var id_spp_bulan_tahun_ortu = $('.data-spp-bayar-ortu').attr('id-spp')
    var spp_bayar_ortu = $('.data-spp-bayar-ortu').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/bayar/'+id_spp_bulan_tahun_ortu,
        columns:[
            {data:'id_spp_bayar',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'tanggal_bayar',name:'tanggal_bayar'},
            {data:'keterangan_bayar_spp',name:'keterangan_bayar_spp'},
            {data:'total_biaya',name:'total_biaya'},
            {data:'nominal_bayar',name:'nominal_bayar'},
            {data:'kembalian',name:'kembalian'},
            {data:'name',name:'name'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_bayar_ortu.on( 'order.dt search.dt', function () {
        spp_bayar_ortu.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();
    })
</script>
@endsection