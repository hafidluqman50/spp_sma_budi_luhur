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
                                <li class="breadcrumb-item active"><a href="#">Data Kolom SPP</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Kolom SPP</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA KOLOM SPP</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="<?php echo e(url('/petugas/kolom-spp/tambah')); ?>">
                                <button class="btn btn-primary">
                                    <i class="fa fa-plus m-r-5"></i>Tambah
                                </button>
                            </a>
                        </div>
                        <?php if(session()->has('message')): ?>
                        <div class="alert alert-success alert-dismissible">
                            <?php echo e(session('message')); ?> <button class="close">X</button>
                        </div>
                        <?php endif; ?>
                        <table class="table table-hover table-bordered data-kolom-spp force-fullwidth">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kolom SPP</th>
                                <th>Keterangan Kolom</th>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Petugas.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Petugas/kolom-spp/main.blade.php ENDPATH**/ ?>