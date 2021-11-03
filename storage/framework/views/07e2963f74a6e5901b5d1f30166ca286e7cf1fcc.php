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
                            <li class="breadcrumb-item active"><a href="#">Data Petugas</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Petugas</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>DATA PETUGAS</b></h4>
                    <div class="button-list" style="margin-bottom:1%;">
                        <a href="<?php echo e(url('/admin/data-petugas/tambah')); ?>">
                            <button class="btn btn-primary">
                                <i class="fa fa-plus m-r-5"></i> Tambah
                            </button>
                        </a>
                    </div>
                    <?php if(session()->has('message')): ?>
                    <div class="alert alert-success alert-dismissible">
                        <?php echo e(session('message')); ?> <button class="close">X</button>
                    </div>
                    <?php endif; ?>
                    <table class="table table-hover table-bordered data-petugas force-fullwidth">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Jabatan Petugas</th>
                                <th>Status Akun</th>
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

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/petugas/main.blade.php ENDPATH**/ ?>