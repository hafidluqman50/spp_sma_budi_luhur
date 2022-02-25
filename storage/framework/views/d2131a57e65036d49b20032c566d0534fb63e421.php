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
                            <li class="breadcrumb-item active"><a href="#">Data Kepsek</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Kepsek</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>DATA KEPSEK</b></h4>
                    <div class="button-list" style="margin-bottom:1%;">
                        <a href="<?php echo e(url('/admin/data-kepsek/tambah')); ?>">
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
                    <table class="table table-hover table-bordered data-kepsek force-fullwidth">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nip Kepsek</th>
                                <th>Nama Kepsek</th>
                                <th>Username</th>
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

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/kepsek/main.blade.php ENDPATH**/ ?>