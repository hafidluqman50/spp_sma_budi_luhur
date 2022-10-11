<?php $__env->startSection('content'); ?>
    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard-rab')); ?>">Dashboard RAB</a></li>
                                <li class="breadcrumb-item active"><a href="<?php echo e(url('/admin/data-perincian-rab')); ?>">Rincian Penerimaan</a></li>
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
                        <h4 class="m-t-0 header-title"><b>DATA PERINCIAN RAB</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="<?php echo e(url('/admin/data-perincian-rab/')); ?>">
                                <button class="btn btn-default" style="cursor:pointer;">
                                    <i class="fa fa-arrow-left m-r-5"></i>Kembali
                                </button>
                            </a>
                            <?php if($check == 0): ?>
                            <a href="<?php echo e(url('/admin/data-perincian-rab/rincian-penerimaan/'.$id.'/tambah')); ?>">
                                <button class="btn btn-primary" style="cursor:pointer;">
                                	<i class="fa fa-plus m-r-5"></i>Tambah
                                </button>
                            </a>
                            <?php endif; ?>
                            <?php if($check != 0): ?>
                            <a href="<?php echo e(url('/admin/data-perincian-rab/rincian-penerimaan/'.$id.'/edit')); ?>">
                                <button class="btn btn-warning" style="cursor:pointer;">
                                	<i class="fa fa-pencil m-r-5"></i>Edit
                                </button>
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php if(session()->has('message')): ?>
                        <div class="alert alert-success alert-dismissible">
                            <?php echo e(session('message')); ?> <button class="close">X</button>
                        </div>
                        <?php endif; ?>
                        <table class="table table-hover table-bordered data-rincian-penerimaan force-fullwidth" id-rincian-pengeluaran="<?php echo e($id); ?>">
                            <thead>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>Bulan Perincian</th>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout-app.layout-rab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/rincian-penerimaan/main.blade.php ENDPATH**/ ?>