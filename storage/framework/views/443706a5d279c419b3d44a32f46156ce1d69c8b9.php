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
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Siswa</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Siswa</h4>
                        <p class="text-muted font-14 m-b-20">
                            Isilah form dibawah ini dengan teliti dan benar!
                        </p>

                        <form action="<?php echo e(url('/admin/siswa/save')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group row">
                                <label class="col-4 col-form-label">NISN<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" name="nisn" class="form-control" placeholder="Isi NISN">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Lengkap Siswa<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" name="nama_siswa" class="form-control" placeholder="Isi Nama Lengkap Siswa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="jenis_kelamin" class="form-control" required="">
                                        <option value="" selected="" disabled="">=== Pilih Jenis Kelamin ===</option>
                                        <option value="laki-laki">Laki - Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-7">
                                    <input type="date" name="tanggal_lahir" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Asal Kelompok</label>
                                <div class="col-7">
                                    <input type="text" name="asal_kelompok" class="form-control" required="required" placeholder="Isi Asal Kelompok">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Asal Wilayah</label>
                                <div class="col-7">
                                    <input type="text" name="asal_wilayah" class="form-control" required="required" placeholder="Isi Asal Wilayah. Exp: Sangata/Samarinda/Tenggarong">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Wilayah<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="wilayah" id="" class="form-control" required="">
                                        <option value="" selected="" disabled="">=== Pilih Wilayah Siswa ===</option>
                                        <option value="komplek">Komplek</option>
                                        <option value="dalam-kota">Dalam Kota</option>
                                        <option value="luar-kota">Luar Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Ayah</label>
                                <div class="col-7">
                                    <input type="text" name="nama_ayah" class="form-control" required="required" placeholder="Isi Nama Ayah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Ibu</label>
                                <div class="col-7">
                                    <input type="text" name="nama_ibu" class="form-control" required="required" placeholder="Isi Nama Ibu">
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label class="col-4 col-form-label">No WA Ortu<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="number" name="nomor_wa_ortu" class="form-control" placeholder="Nomor WhatsApp Ortu Aktif" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Keluarga</label>
                                <div class="col-7">
                                    <select name="keluarga[]" class="form-control select2" multiple="multiple">
                                        
                                        <?php $__currentLoopData = $keluarga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($element->id_siswa); ?>"><?php echo e($element->nama_siswa.' | '.$element->nisn); ?></option>
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

<?php $__env->startSection('js'); ?>
<script>
    $(() => {
    //     $('#input-ortu-act').click(() => {
    //         $('#input-ortu').removeClass('form-hide')
    //         $('#input-ortu-act').addClass('form-hide')
    //         $('#pilih-ortu').addClass('form-hide')
    //         $('#pilih-ortu-act').removeClass('form-hide')
    //     })

    //     $('#pilih-ortu-act').click(() => {
    //         $('#pilih-ortu').removeClass('form-hide')
    //         $('#pilih-ortu-act').addClass('form-hide')
    //         $('#input-ortu').addClass('form-hide')
    //         $('#input-ortu-act').removeClass('form-hide')
    //     })
        $('select[name="keluarga[]"]').select2({
            placeholder:"=== Pilih Keluarga ==="
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/siswa/siswa-tambah.blade.php ENDPATH**/ ?>