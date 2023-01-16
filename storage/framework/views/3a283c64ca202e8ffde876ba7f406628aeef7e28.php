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
                                <li class="breadcrumb-item active"><a href="#">Laporan Data Siswa</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Laporan Data Siswa</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>LAPORAN DATA SISWA</b></h4>
                        <form action="<?php echo e(url('/admin/laporan/cetak')); ?>">
                            <div class="row">
                            	<div class="col-md-6 offset-md-3">
                            		<select name="tahun_ajaran_input" class="form-control select2" required>
                            			<option value="" selected disabled>=== Pilih Tahun Ajaran ===</option>
                            			<?php $__currentLoopData = $tahun_ajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            			<option value="<?php echo e($element->id_tahun_ajaran); ?>"><?php echo e($element->tahun_ajaran); ?></option>
                            			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            		</select>
                            	</div>
                            </div>
                            <table class="table table-hover datatable table-bordered force-fullwidth">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kelas</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php for($i = 0; $i < 3; $i++): ?>
                                	<?php
                                		$no = $i+1;
                                	?>
                                	<tr>
                                		<td><?php echo e($no); ?></td>
                                		<td><?php echo e($kelas[$i]); ?></td>
                                		<td>
                                            <button class="btn btn-success" name="btn_cetak" value="laporan-data-siswa" id-kelas="<?php echo e($kelas[$i]); ?>">Cetak Laporan</button>
                                            <button class="btn btn-info info-siswa" type="button" id-kelas="<?php echo e($kelas[$i]); ?>">Lihat Data</button>
                                        </td>
                                	</tr>
                                	<?php endfor; ?>
                                </tbody>
                            </table>
                            <input type="hidden" name="kelas_siswa_input">
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
    // $(() => {
    //     $("#datepicker").datepicker({
    //         format: "yyyy",
    //         viewMode: "years", 
    //         minViewMode: "years",
    //         autoclose:true, //to close picker once year is selected
    //         orientation: 'bottom'
    //     });
    // })

    $('button[name="btn_cetak"]').click(function() {
        let attr = $(this).attr('id-kelas')
        $(`input[name="kelas_siswa_input"]`).val(attr)
    })
    $(document).on('click','.info-siswa',function(){
        let attr         = $(this).attr('id-kelas')
        let tahun_ajaran = $('select[name="tahun_ajaran_input"]').val()
        let url          = `${base_url}/admin/laporan-data-siswa/lihat-data?kelas=${attr}&id_tahun_ajaran=${tahun_ajaran}`

        window.open(url,'_blank')
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan__/resources/views/Admin/laporan/laporan-data-siswa.blade.php ENDPATH**/ ?>