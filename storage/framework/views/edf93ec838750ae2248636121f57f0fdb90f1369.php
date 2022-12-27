<?php $__env->startSection('content'); ?>
    <div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Keuangan</a></li>
                            <li class="breadcrumb-item active"><a href="#">Data Pemasukan Kantin</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Pemasukan Kantin</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>DATA PEMASUKAN KANTIN</b></h4>
                    <div class="button-list" style="margin-bottom:1%;">
                        <a href="<?php echo e(url('/kepsek/spp/tunggakan/'.$id)); ?>">
                            <button class="btn btn-default">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </button>
                        </a>
                    </div>
                    <?php if(session()->has('message')): ?>
                    <div class="alert alert-success alert-dismissible">
                        <?php echo e(session('message')); ?> <button class="close">X</button>
                    </div>
                    <?php endif; ?>
                    <table>
                    	<tr>
                    		<td><b>NISN</b></td>
                    		<td><b> : </b></td>
                    		<td><b><?php echo e($data_spp->nisn); ?></b></td>
                    	</tr>
                    	<tr>
                    		<td><b>Nama Siswa</b></td>
                    		<td><b> : </b></td>
                    		<td><b><?php echo e($data_spp->nama_siswa); ?></b></td>
                    	</tr>
                    	<tr>
                    		<td><b>Kelas</b></td>
                    		<td><b> : </b></td>
                    		<td><b><?php echo e($data_spp->kelas); ?></b></td>
                    	</tr>
                    	<tr>
                    		<td><b>Tahun Ajaran</b></td>
                    		<td><b> : </b></td>
                    		<td><b><?php echo e($data_spp->tahun_ajaran); ?></b></td>
                    	</tr>
                    	<tr>
                    		<td><b>Bulan, Tahun</b></td>
                    		<td><b> : </b></td>
                    		<td><b><?php echo e($data_spp->bulan_tahun); ?></b></td>
                    	</tr>
                    </table>
                    <table class="table table-hover table-bordered data-pemasukan-kantin-kepsek force-fullwidth" id-spp-bulan-tahun="<?php echo e($id_bulan_tahun); ?>">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kantin</th>
                                <th>Nominal Harus Bayar</th>
                                <th>Nominal Pemasukan</th>
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
    var id_spp_bulan_tahun__ = $('.data-pemasukan-kantin-kepsek').attr('id-spp-bulan-tahun')
    var pemasukan_kantin_kepsek = $('.data-pemasukan-kantin-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/pemasukan-kantin/'+id_spp_bulan_tahun__,
        columns:[
            {data:'id_pemasukan_kantin',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nama_kantin',name:'nama_kantin'},
            {data:'nominal_harus_bayar',name:'nominal_harus_bayar'},
            {data:'nominal_pemasukan',name:'nominal_pemasukan'}
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
    pemasukan_kantin_kepsek.on( 'order.dt search.dt', function () {
        pemasukan_kantin_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Kepsek.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Kepsek/pemasukan-kantin/main.blade.php ENDPATH**/ ?>