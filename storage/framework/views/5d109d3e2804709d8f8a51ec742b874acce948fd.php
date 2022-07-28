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
                                <li class="breadcrumb-item active"><a href="#">Laporan Pembukuan</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Laporan Pembukuan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="alert alert-warning">
                            <li style="color:black;">Untuk Cetak Laporan Harus Pilih Tahun Ajaran atau Pilih Range Bulan Dan Tahun</li>
                        </div>
                        <h4 class="m-t-0 header-title"><b>LAPORAN PEMBUKUAN</b></h4>
                        <form action="<?php echo e(url('/admin/laporan/cetak')); ?>">
                            <div class="row">
                                <div class="col-md-5 row">
                                    <div class="col-md-12">
                                        
                                            <input type="date" name="tanggal_awal" class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="col-md-5 row">
                                    <div class="col-md-12">
                                        
                                            <input type="date" name="tanggal_akhir" class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary" name="btn_cetak" value="laporan-pembukuan">Cetak</button>
                                </div>
                            </div>
                            <hr>
                        
                        </form>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(() => {
        $(".datepicker").datepicker({
            // format: "yyyy",
            // viewMode: "years", 
            // minViewMode: "years",
            autoclose:true, //to close picker once year is selected
            orientation: 'bottom'
        });
    })

    $('button[name="btn_cetak"]').click(function() {
        let attr = $(this).attr('id-kelas')
        $(`input[name="kelas_siswa_input"]`).val(attr)
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/laporan/laporan-pembukuan.blade.php ENDPATH**/ ?>