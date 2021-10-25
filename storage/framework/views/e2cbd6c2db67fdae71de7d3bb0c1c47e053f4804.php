

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
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Kolom SPP</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Kolom SPP</h4>
                        
                        <form action="<?php echo e(url('/admin/kolom-spp/save')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row" id="input-kolom">
                                <label class="col-4 col-form-label">Nama Kolom SPP<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" name="nama_kolom_spp" class="form-control" placeholder="Isi Nama Kolom SPP; Ex: Pembayaran Gedung;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Keterangan</label>
                                <div class="col-7">
                                    <input type="text" name="keterangan" class="form-control" placeholder="Isi Keterangan; Ex: Lokasi Kantin Di Sebelah Ruang Guru;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
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
<script>
    $(() => {
        $('.pilih-kantin').click(() => {

        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web_keuangan\resources\views/Admin/kolom-spp/kolom-spp-tambah.blade.php ENDPATH**/ ?>