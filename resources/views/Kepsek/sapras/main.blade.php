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
                                <li class="breadcrumb-item active"><a href="{{ url('/kepsek/data-perincian-rab') }}">Sapras</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Sapras</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA SAPRAS</b></h4>
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url('/kepsek/data-perincian-rab/') }}">
                                <button class="btn btn-default" style="cursor:pointer;">
                                    <i class="fa fa-arrow-left m-r-5"></i>Kembali
                                </button>
                            </a>
                        </div>
                        <table class="table table-hover table-bordered data-sapras-kepsek force-fullwidth" id-rincian-pengeluaran="{{$id}}">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Rincian</th>
                                <th>Volume</th>
                                <th>Ket</th>
                                <th>Satuan</th>
                                <th>Total</th>
                                <th>Pemohon</th>
                                <th>Keterangan Pemohon</th>
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
    var id_rincian__= $('.data-sapras-kepsek').attr('id-rincian-pengeluaran')
    var sapras_kepsek = $('.data-sapras-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:`${base_url}/datatables/data-sapras/${id_rincian__}`,
        columns:[
            {data:'id_sapras',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'kategori_sapras',name:'kategori_sapras'},
            {data:'nama_barang',name:'nama_barang'},
            {data:'qty',name:'qty'},
            {data:'ket',name:'ket'},
            {data:'harga_barang',name:'harga_barang'},
            {data:'jumlah',name:'jumlah'},
            {data:'pemohon',name:'pemohon'},
            {data:'keterangan_pemohon',name:'keterangan_pemohon'}
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
    sapras_kepsek.on( 'order.dt search.dt', function () {
        sapras_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();
    })
</script>
@endsection