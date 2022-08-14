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
                                <li class="breadcrumb-item active"><a href="#">Data Tunggakan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Tunggakan</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Tambah Data Tunggakan</h4>
                        <p class="text-muted font-14 m-b-20">
                            Isilah form dibawah ini dengan teliti dan benar!
                        </p>

                        <form role="form">
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Tunggakan<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" placeholder="Exp : Februari 2021" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="" id="" class="form-control">
                                        <option value="" selected>--- Pilih Tahun Ajaran ---</option>
                                        <option value="">2021/2022</option>
                                        <option value="">2023/2024</option>
                                        <option value="">2025/2026</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">File Tunggakan Bulan Ini<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="file" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <a href="" class="text-danger">Silahkan Download Format Tunggakan Excel Disini!</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Simpan
                                    </button>
                                    <a href="<?php echo e(url('tunggakansiswa')); ?>" type="reset"
                                            class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </a>
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

<?php echo $__env->make('layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/tunggakan/tunggakan-tambah.blade.php ENDPATH**/ ?>