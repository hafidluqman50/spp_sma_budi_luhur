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
                                <li class="breadcrumb-item"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data SPP</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data SPP</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA SPP</b></h4>
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="<?php echo e(url('/ortu/dashboard')); ?>">
                                <button class="btn btn-default" type="button">Kembali</button>
                            </a>
                        </div>
                        <table class="table table-hover table-bordered spp-ortu force-fullwidth" id-siswa="<?php echo e($id); ?>">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan Tahun</th>
                                <th>Nama Kantin</th>
                                <th>Status Pelunasan</th>
                                <th>Sisa Bayar</th>
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

<?php echo $__env->make('Ortu.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Ortu/spp.blade.php ENDPATH**/ ?>