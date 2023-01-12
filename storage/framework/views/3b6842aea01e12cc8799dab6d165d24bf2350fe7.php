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
                                <li class="breadcrumb-item active"><a href="<?php echo e(url('/admin/rincian-pengeluaran')); ?>">Rincian Pengeluaran</a></li>
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
                            <a href="<?php echo e(url('/admin/data-perincian-rab')); ?>">
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left m-r-5"></i>Kembali
                                </button>
                            </a>
                        </div>
                        <?php if(session()->has('message')): ?>
                        <div class="alert alert-success alert-dismissible">
                            <?php echo e(session('message')); ?> <button class="close">X</button>
                        </div>
                        <?php endif; ?>
                        <table class="table table-hover table-bordered data-rincian-pengeluaran-sekolah force-fullwidth" id-rincian-pengeluaran="<?php echo e($id); ?>">
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
                        <h4 class="m-t-0 header-title"><b>RINCIAN PENGELUARAN UANG MAKAN</b></h4>
                        <table class="table table-hover table-bordered data-rincian-pengeluaran-uang-makan force-fullwidth" id-rincian-pengeluaran="<?php echo e($id); ?>">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Uraian</th>
                                <th>Nama Uraian</th>
                                <th>Nama Kantin</th>
                                <th>Volume Uraian</th>
                                <th>Nominal Uraian</th>
                                <th>Total Nominal</th>
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
<?php echo $__env->make('Admin.layout-app.layout-rab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan__/resources/views/Admin/rincian-pengeluaran/rincian-pengeluaran-detail.blade.php ENDPATH**/ ?>