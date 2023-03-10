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
                                <li class="breadcrumb-item"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Detail SPP</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Detail SPP</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA DETAIL SPP</b></h4>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="<?php echo e(url('/admin/spp/tunggakan/'.$id)); ?>">
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </button>
                            </a>
                            <a href="<?php echo e(url('/admin/spp/tunggakan/'.$id.'/lihat-spp/'.$id_bulan_tahun.'/bayar-semua')); ?>">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus m-r-5"></i>Bayar Semua
                                </button>
                            </a>
                        </div>
                        <?php if(session()->has('message')): ?>
                        <div class="alert alert-success alert-dismissible">
                            <?php echo e(session('message')); ?> <button class="close">X</button>
                        </div>
                        <?php endif; ?>
                        <table>
                            <tr>
                                <td><b>NISN</b></td>
                                <td><b>:</b></td>
                                <td><b><?php echo e($siswa->nisn); ?></b></td>
                            </tr>
                            <tr>
                                <td><b>Nama Siswa</b></td>
                                <td><b>:</b></td>
                                <td><b><?php echo e($siswa->nama_siswa); ?></b></td>
                            </tr>
                            <tr>
                                <td><b>Kelas</b></td>
                                <td><b>:</b></td>
                                <td><b><?php echo e($siswa->kelas); ?></b></td>
                            </tr>
                            <tr>
                                <td><b>Tahun Ajaran</b></td>
                                <td><b>:</b></td>
                                <td><b><?php echo e($siswa->tahun_ajaran); ?></b></td>
                            </tr>
                            <tr>
                                <td><b>Bulan, Tahun</b></td>
                                <td><b>:</b></td>
                                <td><b><?php echo e($siswa->bulan_tahun); ?></b></td>
                            </tr>
                        </table>
                        <table class="table table-hover table-bordered data-spp-detail force-fullwidth" id-spp-bulan-tahun="<?php echo e($id_bulan_tahun); ?>">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pembayaran SPP</th>
                                <th>Nominal Bayar</th>
                                <th>Bayar</th>
                                <th>Sisa Bayar</th>
                                <th>Status Bayar</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan__/resources/views/Admin/spp-detail/main.blade.php ENDPATH**/ ?>