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
                                <li class="breadcrumb-item active"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Import Data SPP</a></li>
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
                        <h4 class="header-title m-t-0">Import Data SPP</h4>
                        <p class="text-muted font-14 m-b-20">
                            Import File excel sesuai dengan format yang telah tersedia!
                        </p>
                        <?php if(session()->has('log')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('log')); ?> <button class="close">X</button>
                        </div>
                        <?php endif; ?>
                        <div class="alert alert-warning">
                            <li style="color:black;">Mohon Dicek Kembali <b>Nisn</b>, <b>Nama Siswa</b>, <b>Kelas</b>, <b>Tahun Ajaran</b>, <b>Nama Kantin</b>, <b>Serta Kolom Spp</b>. Pastikan data tersebut telah terdata di sistem !</li>
                            <br>
                            <li style="color:black;">Mohon Diperhatikan Kembali Data Pada Sheet <b>SPP</b>, <b>PEMBAYARAN</b>, dan <b>PEMASUKAN KANTIN</b>. Pastikan Data Tersebut Saling Sesuai !</li>
                            <br>
                            <li style="color:black;">Mohon Data Pada Sheet <b>PEMASUKAN KANTIN</b> Harus Diisi Agar Pemasukan Kantin Dapat Terdata, Pastikan <b>Data Kantin</b> Telah Terdata Di Sistem Dan Pastikan <b>Bulan Tahun SPP</b> Sesuai dengan Data Pada Sheet <b>SPP</b></li>
                        </div>
                        <div class="form-group row">
                            <div class="col-8 offset-4">
                                <a href="<?php echo e(url('/admin/spp/contoh-import')); ?>" class="text-danger">Silahkan Download Format Excel Disini!</a>
                            </div>
                        </div>
                        <form method="POST" action="<?php echo e(url('/admin/spp/import/save')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">File<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="file" name="file_import[]" class="form-control" required="required" multiple>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button class="btn btn-primary waves-effect waves-light">
                                        Import SPP
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        
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
<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan__/resources/views/Admin/spp/spp-import.blade.php ENDPATH**/ ?>