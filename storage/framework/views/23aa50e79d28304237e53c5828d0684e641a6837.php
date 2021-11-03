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
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Petugas</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Petugas</h4>
                        
                        <form action="<?php echo e(url('/admin/data-petugas/save')); ?>" method="POST" oninput="re_type_password.setCustomValidity(re_type_password.value != password.value ? 'Passwords do not match.' : '')">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Petugas</label>
                                <div class="col-7">
                                    <input type="text" name="nama_petugas" class="form-control" placeholder="Isi Nama Petugas" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Username</label>
                                <div class="col-7">
                                    <input type="text" name="username" class="form-control" placeholder="Isi Username" required="required" value="<?php echo e(old('username') != '' ? old('username') : ''); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Password</label>
                                <div class="col-7">
                                    <input type="password" name="password" class="form-control" placeholder="Isi Password" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Re-Type Password</label>
                                <div class="col-7">
                                    <input type="text" name="re_type_password" class="form-control" placeholder="Ketik Ulang Password" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Jabatan Petugas</label>
                                <div class="col-7">
                                    <select name="jabatan_petugas" class="form-control select2">
                                        <option value="" selected disabled>=== Pilih Jabatan Petugas ===</option>
                                        <option value="bendahara-internal" <?php if(old('jabatan_petugas') != ''): ?>
                                            <?php echo old('jabatan_petugas') == 'bendahara-internal' ? 'selected="selected"' : ''; ?><?php endif; ?>>Bendahara Internal</option>
                                        <option value="bendahara-dana-BOS" <?php if(old('jabatan_petugas') != ''): ?>
                                            <?php echo old('jabatan_petugas') == 'bendahara-dana-BOS' ? 'selected="selected"' : ''; ?><?php endif; ?>>Bendahara Dana BOS</option>
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
<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/petugas/petugas-tambah.blade.php ENDPATH**/ ?>