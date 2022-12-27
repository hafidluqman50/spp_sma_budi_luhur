<?php $__env->startSection('content'); ?>
    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/kepsek/dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/kepsek/dashboard-rab')); ?>">Dashboard RAB</a></li>
                                <li class="breadcrumb-item active"><a href="<?php echo e(url('/kepsek/rincian-pengeluaran')); ?>">Rincian Pengeluaran</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Rincian Pengeluaran</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>RINCIAN PENGELUARAN SEKOLAH</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="<?php echo e(url('/kepsek/data-perincian-rab')); ?>">
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left m-r-5"></i>Kembali
                                </button>
                            </a>
                        </div>
                        <table class="table table-hover table-bordered data-rincian-pengeluaran-sekolah-kepsek force-fullwidth" id-rincian-pengeluaran="<?php echo e($id); ?>">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Uraian</th>
                                <th>Nama Uraian</th>
                                <th>Volume Uraian</th>
                                <th>Nominal Uraian</th>
                                <th>Total Nominal</th>
                                <th>Pendapatan</th>
                                <th>Nominal Pendapatan</th>
                                <th>Nama Rincian RAB</th>
                                <th>Volume Rincian RAB</th>
                                <th>Nominal Rincian RAB</th>
                                <th>Total Nominal RAB</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>RINCIAN PENGELUARAN UANG MAKAN</b></h4>
                        <table class="table table-hover table-bordered data-rincian-pengeluaran-uang-makan-kepsek force-fullwidth" id-rincian-pengeluaran="<?php echo e($id); ?>">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Uraian</th>
                                <th>Nama Uraian</th>
                                <th>Nama Kantin</th>
                                <th>Volume Uraian</th>
                                <th>Nominal Uraian</th>
                                <th>Total Nominal</th>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(() => {
        var id_rincian_pengeluaran = $('.data-rincian-pengeluaran-sekolah-kepsek').attr('id-rincian-pengeluaran')
        var rincian_pengeluaran_sekolah_kepsek = $('.data-rincian-pengeluaran-sekolah-kepsek').DataTable({
            processing:true,
            serverSide:true,
            ajax:base_url+'/datatables/data-rincian-pengeluaran-sekolah/'+id_rincian_pengeluaran,
            columns:[
                {data:'id_rincian_pengeluaran_sekolah',searchable:false,render:function(data,type,row,meta){
                    return meta.row + meta.settings._iDisplayStart+1;
                }},
                {data:'tanggal_rincian',name:'tanggal_rincian'},
                {data:'uraian_rincian',name:'uraian_rincian'},
                {data:'volume_rincian',name:'volume_rincian'},
                {data:'nominal_rincian',name:'nominal_rincian'},
                {data:'total_nominal_uraian',name:'total_nominal_uraian'},
                {data:'asal_pendapatan',name:'asal_pendapatan'},
                {data:'nominal_pendapatan_rincian',name:'nominal_pendapatan_rincian'},
                {data:'uraian_rab',name:'uraian_rab'},
                {data:'volume_rab',name:'volume_rab'},
                {data:'nominal_rab',name:'nominal_rab'},
                {data:'total_nominal_rab',name:'total_nominal_rab'},
                {data:'ket_rincian_pengeluaran_sekolah',name:'ket_rincian_pengeluaran_sekolah'}
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
        rincian_pengeluaran_sekolah_kepsek.on( 'order.dt search.dt', function () {
            rincian_pengeluaran_sekolah_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            });
        }).draw();

        var id_rincian_pengeluaran__ = $('.data-rincian-pengeluaran-uang-makan-kepsek').attr('id-rincian-pengeluaran')
        var rincian_pengeluaran_uang_makan_kepsek = $('.data-rincian-pengeluaran-uang-makan-kepsek').DataTable({
            processing:true,
            serverSide:true,
            ajax:base_url+'/datatables/data-rincian-pengeluaran-uang-makan/'+id_rincian_pengeluaran__,
            columns:[
                {data:'id_rincian_pengeluaran_uang_makan',searchable:false,render:function(data,type,row,meta){
                    return meta.row + meta.settings._iDisplayStart+1;
                }},
                {data:'tanggal_rincian',name:'tanggal_rincian'},
                {data:'uraian_rincian',name:'uraian_rincian'},
                {data:'nama_kantin',name:'nama_kantin'},
                {data:'volume_rincian',name:'volume_rincian'},
                {data:'nominal_rincian',name:'nominal_rincian'},
                {data:'total_nominal_uraian',name:'total_nominal_uraian'}
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
        rincian_pengeluaran_uang_makan_kepsek.on( 'order.dt search.dt', function () {
            rincian_pengeluaran_uang_makan_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            });
        }).draw();
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Kepsek.layout-app.layout-rab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Kepsek/rincian-pengeluaran/rincian-pengeluaran-detail.blade.php ENDPATH**/ ?>