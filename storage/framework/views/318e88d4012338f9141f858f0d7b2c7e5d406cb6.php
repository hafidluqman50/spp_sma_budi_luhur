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
                                <li class="breadcrumb-item active"><a href="#">Laporan Kantin</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Laporan Kantin</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>LAPORAN KANTIN</b></h4>
                        <form action="<?php echo e(url('/admin/laporan/cetak')); ?>">
                            <div class="row">
                                <div class="col-md-4 offset-md-2">
                                    <select name="bulan_laporan" class="form-control select2" required>
                                        <option value="" selected disabled>=== Pilih Bulan Laporan ===</option>
                                        <?php for($i = 1; $i <= 12; $i++): ?>
                                        <option value="<?php echo e($i); ?>"><?php echo e(month(zero_front_number($i))); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="tahun_laporan" class="form-control" id="datepicker" required>
                                </div>
                            </div>
                            <table class="table table-hover table-bordered laporan-kantin force-fullwidth">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kantin</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <input type="hidden" name="kantin_nama">
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
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose:true, //to close picker once year is selected
            orientation: 'bottom'
        });
    })

    $(document).on('click','button[name="btn_cetak"]',function() {
        let attr = $(this).attr('id-kantin')
        $(`input[name="kantin_nama"]`).val(attr)
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/laporan/laporan-kantin.blade.php ENDPATH**/ ?>