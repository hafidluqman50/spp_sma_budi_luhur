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
                                <li class="breadcrumb-item active"><a href="#">Data Perincian</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Perincian</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Perincian</h4>
                        
                        <form action="<?php echo e(url('/admin/data-perincian-rab/save')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama RAB</label>
                                <div class="col-7">
                                    <input type="text" name="bulan_perincian" class="form-control" placeholder="Isi Nama RAB; Ex: Mei 2022 Pengajuan Juni 2022" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Tanggal Perincian</label>
                                <div class="col-7">
                                    <input type="date" name="tanggal_perincian" class="form-control" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Uraian Rincian</label>
                                <div class="col-7">
                                    <input type="text" name="uraian_rincian" class="form-control" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Volume Rincian</label>
                                <div class="col-7">
                                    <input type="number" name="volume_rincian" class="form-control" placeholder="Isi Volume Rincian" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nominal Rincian</label>
                                <div class="col-7">
                                    <input type="number" name="nominal_rincian" class="form-control" placeholder="Isi Nominal Rincian" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Pendapatan</label>
                                <div class="col-7">
                                    <select name="id_kolom_spp" class="form-control selectize pendapatan">
                                        <option value="" selected disabled>=== Pilih Pendapatan ===</option>
                                        <?php $__currentLoopData = $kolom_spp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($element->id_kolom_spp); ?>"><?php echo e($element->nama_kolom_spp); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nominal Pendapatan</label>
                                <div class="col-7">
                                    <input type="number" name="nominal_pendapatan" class="form-control" placeholder="Isi Nominal Pendapatan" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Uraian RAB</label>
                                <div class="col-7">
                                    <input type="text" name="uraian_rab" class="form-control" placeholder="Isi Uraian RAB; Ex: PDAM Bulan Mei 2022">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Volume RAB</label>
                                <div class="col-7">
                                    <input type="number" name="volume_rab" class="form-control" placeholder="Isi Volume RAB">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nominal RAB</label>
                                <div class="col-7">
                                    <input type="number" name="nominal_rab" class="form-control" placeholder="Isi Nominal RAB">
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
<?php echo $__env->make('Admin.layout-app.layout-rab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/rincian-pengeluaran/rincian-pengeluaran-tambah.blade.php ENDPATH**/ ?>