

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
                                <li class="breadcrumb-item active"><a href="#">Data Kelas Siswa</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Kelas Siswa</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Kelas Siswa</h4>
                        
                        <form action="<?php echo e(url('/admin/kelas/siswa/'.$id.'/save')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Siswa<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="siswa[]" class="form-control select2" required="required" multiple="multiple">
                                        <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($element->id_siswa); ?>"><?php echo e($element->nisn.' | '.$element->nama_siswa); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Kelas<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" readonly="readonly" value="<?php echo e($kelas->kelas); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="tahun_ajaran" class="form-control select2" required="required">
                                        <option value="" selected="" disabled="">=== Pilih Tahun Ajaran ===</option>
                                        <?php $__currentLoopData = $tahun_ajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($element->id_tahun_ajaran); ?>"><?php echo e($element->tahun_ajaran); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web_keuangan\resources\views/Admin/kelas-siswa/kelas-siswa-tambah.blade.php ENDPATH**/ ?>