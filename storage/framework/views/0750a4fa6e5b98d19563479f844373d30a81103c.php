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
                                <li class="breadcrumb-item active"><a href="#">Data Kantin</a></li>
                                <li class="breadcrumb-item active"><a href="#">Edit Data Kantin</a></li>
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
                            <a href="<?php echo e(url('/admin/kantin')); ?>">
                                <button class="btn btn-default">Kembali</button>
                            </a>
                        </div>
                        <h4 class="header-title m-t-0">Edit Data Kantin</h4>
                        <p class="text-muted font-14 m-b-20">
                            Isilah form dibawah ini dengan teliti dan benar!
                        </p>

                        <form action="<?php echo e(url('/admin/kantin/update/'.$id)); ?>" method="POST">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Kantin<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" name="nama_kantin" class="form-control" value="<?php echo e($row->nama_kantin); ?>" placeholder="Isi Nama Kantin" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Lokasi Kantin<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <textarea class="form-control" name="lokasi_kantin" placeholder="Isi Lokasi Kantin; Ex: Disamping Rumah Pak Mamat;"><?php echo e($row->lokasi_kantin); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Biaya Perbulan Rp.<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input class="form-control" type="number" name="biaya_perbulan" placeholder="Isi Biaya Perbulan" value="<?php echo e($row->biaya_perbulan); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-warning waves-effect waves-light">
                                        Edit
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
<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/kantin/kantin-edit.blade.php ENDPATH**/ ?>