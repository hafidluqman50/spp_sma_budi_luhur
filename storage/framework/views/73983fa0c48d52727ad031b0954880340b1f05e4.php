<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

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
                                <li class="breadcrumb-item active"><a href="#">Data Siswa</a></li>
                                <li class="breadcrumb-item active"><a href="#">Import Data Siswa</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="<?php echo e(url()->previous()); ?>">
                                <button class="btn btn-default">Kembali</button>
                            </a>
                        </div>
                        <h4 class="header-title m-t-0">Import Data Siswa</h4>
                        <p class="text-muted font-14 m-b-20">
                            Import File excel sesuai dengan format yang telah tersedia!
                        </p>
                        <div class="alert alert-warning">
                            <li style="color:black;">Mohon perhatikan nama siswa, kelas, tahun ajaran, serta sheet keluarga</li>
                            <li style="color:black;">Mohon cek kembali kelas dan tahun ajaran, kelas dan tahun ajaran harus terdata terlebih dahulu sebelum import siswa</li>
                        </div>
                        <div class="form-group row">
                            <div class="col-8 offset-4">
                                <a href="<?php echo e(url('/admin/siswa/contoh-import')); ?>" class="text-danger">Silahkan Download Format Excel Disini!</a>
                            </div>
                        </div>
                        <form method="POST" action="<?php echo e(url('/admin/siswa/import/save')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">File<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="file" name="file_import" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button class="btn btn-primary waves-effect waves-light">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="visible-lg" style="height: 79px;"></div>
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/siswa/siswa-import.blade.php ENDPATH**/ ?>