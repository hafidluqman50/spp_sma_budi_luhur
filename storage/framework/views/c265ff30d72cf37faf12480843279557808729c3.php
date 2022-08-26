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
                                <li class="breadcrumb-item active"><a href="#">Laporan Tunggakan</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Laporan Tunggakan</h4>
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
                        <h4 class="m-t-0 header-title"><b>LAPORAN Tunggakan</b></h4>
                        <form action="<?php echo e(url('/admin/laporan/cetak')); ?>">
                            <div class="row">
                            	<div class="col-md-4 row">
                                    
                            		<select name="tahun_ajaran" class="form-control select2">
                            			<option value="" selected disabled>=== Pilih Tahun Ajaran ===</option>
                            			<?php $__currentLoopData = $tahun_ajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            			<option value="<?php echo e($element->tahun_ajaran); ?>"><?php echo e($element->tahun_ajaran); ?></option>
                            			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            		</select>
                                    
                            	</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <select name="bulan_awal" class="form-control select2">
                                            <option value="" selected disabled>=== Pilih Bulan Laporan ===</option>
                                            <?php for($i = 1; $i <= 12; $i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e(month(zero_front_number($i))); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        
                                            <input type="text" name="tahun_awal" class="form-control datepicker" placeholder="Pilih Tahun Laporan">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <select name="bulan_akhir" class="form-control select2">
                                            <option value="" selected disabled>=== Pilih Bulan Laporan ===</option>
                                            <?php for($i = 1; $i <= 12; $i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e(month(zero_front_number($i))); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        
                                            <input type="text" name="tahun_akhir" class="form-control datepicker" placeholder="Pilih Tahun Laporan">
                                        
                                    </div>
                                </div>
                            </div>
                            <hr>
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
                                        <td><?php echo e($i+1); ?></td>
                                        <td><?php echo e($kelas[$i]); ?></td>
                                        <td>
                                            <button class="btn btn-success" name="btn_cetak" value="laporan-tunggakan" id-kelas="<?php echo e($kelas[$i]); ?>">Cetak Laporan</button>
                                            <button class="btn btn-info info-tunggakan" id-kelas="<?php echo e($kelas[$i]); ?>" type="button">Lihat Data</button>
                                        </td>
                                    </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        <input type="hidden" name="kelas_siswa_input">
                        </form>
                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Total Harus Bayar</th>
                                        <th>#</th>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
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
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose:true, //to close picker once year is selected
            orientation: 'bottom'
        });

        $('button[name="btn_cetak"]').click(function() {
            let attr = $(this).attr('id-kelas')
            $(`input[name="kelas_siswa_input"]`).val(attr)
        })

        $('.info-tunggakan').click(function() {
            let attr         = $(this).attr('id-kelas')
            let tahun_ajaran = $('select[name="tahun_ajaran"]').val()
            let tahun_awal   = $('input[name="tahun_awal"]').val()
            let bulan_awal   = $('select[name="bulan_awal"]').val()
            let tahun_akhir  = $('input[name="tahun_akhir"]').val()
            let bulan_akhir  = $('select[name="bulan_akhir"]').val()
            // console.log({tahun_awal,tahun_akhir,bulan_awal,bulan_akhir})

            let url = `${base_url}/admin/laporan-tunggakan/lihat-data?kelas_siswa_input=${attr}&tahun_ajaran=${tahun_ajaran}&tahun_awal=${tahun_awal}&tahun_akhir=${tahun_akhir}&bulan_awal=${bulan_awal}&bulan_akhir=${bulan_akhir}`

            window.open(url,'_blank')
        })
    })

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/laporan/laporan-tunggakan.blade.php ENDPATH**/ ?>