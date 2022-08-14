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
                                <li class="breadcrumb-item active"><a href="#">Data Kepsek</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Kepsek</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Kepsek</h4>
                        
                        <form action="<?php echo e(url('/admin/data-kepsek/update',$id)); ?>" method="POST" oninput="re_type_password.setCustomValidity(re_type_password.value != password.value ? 'Passwords do not match.' : '')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nip Kepsek</label>
                                <div class="col-7">
                                    <input type="text" name="nip_kepsek" class="form-control" placeholder="Isi Nip Kepsek" required="required" value="<?php echo e(old('nip_kepsek') != '' ? old('nip_kepsek') : $row->nip_kepsek); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Nama Kepsek</label>
                                <div class="col-7">
                                    <input type="text" name="nama_kepsek" class="form-control" placeholder="Isi Nama Kepsek" required="required" value="<?php echo e(old('nama_kepsek') != '' ? old('nama_kepsek') : $row->nama_kepsek); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Username</label>
                                <div class="col-7">
                                    <input type="text" name="username" class="form-control" placeholder="Isi Username" value="<?php echo e(old('username') != '' ? old('username') : $row->username); ?>" disabled="disabled">
                                    <input type="checkbox" id="sip">Ubah Username
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Password</label>
                                <div class="col-7">
                                    <input type="password" name="password" class="form-control" placeholder="Isi Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Re-Type Password</label>
                                <div class="col-7">
                                    <input type="password" name="re_type_password" class="form-control" placeholder="Ketik Ulang Password">
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
        $('#sip').click(function(){
            if ($(this).is(':checked')) {
                $('input[name="username"]').removeAttr('disabled');
            }
            else {
                $('input[name="username"]').attr('disabled','disabled');
            }
        });
    })
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/kepsek/kepsek-edit.blade.php ENDPATH**/ ?>