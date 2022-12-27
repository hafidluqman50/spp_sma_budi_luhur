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
                                <li class="breadcrumb-item active"><a href="#">Data Rincian Pengeluaran</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Rincian Penerimaan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Edit Rincian Penerimaan</a></li>
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
                        <h4 class="header-title m-t-0">Edit Data Rincian Penerimaan</h4>
                    </div>
                    <form action="<?php echo e(url('/admin/data-perincian-rab/rincian-penerimaan/'.$id.'/update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        <div class="card-box">
                            <div class="input-rincian-layout" id="input-rincian-layout">
                                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $no = $key+1;
                                ?>
                                <div class="input-rincian" id="input-rincian" id-input-rincian="<?php echo e($no); ?>">
                                	<div class="row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Pendapatan</label>
                                                    <select name="pendapatan[]" class="spp form-control selectize" id-spp="<?php echo e($no); ?>" id="spp" required>
                                                        <option value="" selected disabled>=== Pilih Pendapatan ===</option>
                                                        <?php $__currentLoopData = $pendapatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($element->id_rincian_pengeluaran_sekolah); ?>" <?php echo $element->id_rincian_pengeluaran_sekolah == $val->id_rincian_pengeluaran_sekolah ? 'selected="selected"' : ''; ?>><?php echo e($element->nama_kolom_spp); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Rencana</label>
                                                    <input type="number" name="rencana[]" class="rencana form-control" value="<?php echo e($val->rencana); ?>" id-rencana="<?php echo e($no); ?>" id="rencana" placeholder="Masukkan Nominal Rencana">
                                                    <label for="" class="rencana-label" id="rencana-label" id-rencana-label="<?php echo e($no); ?>"><?php echo e(format_rupiah($val->rencana)); ?></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Penerimaan</label>
                                                    <input type="number" name="penerimaan[]" class="penerimaan form-control" id="penerimaan" value="<?php echo e($val->penerimaan); ?>" id-penerimaan="<?php echo e($no); ?>" placeholder="Masukkan Nominal Penerimaan">
                                                    <label for="" class="penerimaan-label" id="penerimaan-label" id-penerimaan-label="<?php echo e($no); ?>"><?php echo e(format_rupiah($val->penerimaan)); ?></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Keterangan</label>
                                                    <input type="text" name="keterangan_penerimaan[]" class="keterangan-penerimaan form-control" id="keterangan-penerimaan" value="<?php echo e($val->perincian); ?>" id-keterangan="<?php echo e($no); ?>" placeholder="Input Keterangan; Ex: Penerimaan Uang Makan;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="hidden" name="id_rincian_penerimaan_detail[]" value="<?php echo e($val->id_rincian_penerimaan_detail); ?>">
                                                <button class="btn btn-danger btn-delete-rincian" id="btn-delete-rincian" style="margin-top:35%;" id-delete-rincian="<?php echo e($no); ?>">X</button>
                                            </div>
                                        </div>
                                	</div>
                                    <hr>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button class="btn btn-primary tambah-rincian" id="tambah-rincian" id-act="1" type="button">Tambah Input</button>
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal Bon Pengajuan</label>
                                        <input type="date" name="tanggal_bon_pengajuan" value="<?php echo e($row_penerimaan_rekap->tanggal_bon_pengajuan); ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bon Pengajuan</label>
                                        <input type="number" name="bon_pengajuan" class="form-control" value="<?php echo e($bon_pengajuan); ?>" readonly>
                                        <label for="" class="bon-pengajuan-label" id="bon-pengajuan-label"><?php echo e(format_rupiah($bon_pengajuan)); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal Realisasi Pengeluaran</label>
                                        <input type="date" name="tanggal_realisasi_pengeluaran" value="<?php echo e($row_penerimaan_rekap->tanggal_realisasi_pengeluaran); ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Realisasi Pengeluaran</label>
                                        <input type="number" name="realisasi_pengeluaran" class="form-control realisasi-pengeluaran" value="<?php echo e($realisasi_pengeluaran); ?>" readonly>
                                        <label for="" class="realisasi-pengeluaran-label" id="realisasi-pengeluaran-label"><?php echo e(format_rupiah($realisasi_pengeluaran)); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal Penerimaan Bulan Ini</label>
                                        <input type="date" name="tanggal_penerimaan_bulan_ini" value="<?php echo e($row_penerimaan_rekap->tanggal_penerimaan_bulan_ini); ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penerimaan Bulan Ini</label>
                                        <input type="number" name="penerimaan_bulan_ini" value="<?php echo e($row_penerimaan_rekap->sisa_penerimaan_bulan_ini); ?>" class="form-control penerimaan-bulan-ini" id="penerimaan-bulan-ini">
                                        <label for="" class="penerimaan-bulan-ini-label" id="penerimaan-bulan-ini-label"><?php echo e(format_rupiah($row_penerimaan_rekap->sisa_penerimaan_bulan_ini)); ?></label>
                                    </div>
                                    <input type="hidden" name="id_rincian_penerimaan_rekap" value="<?php echo e($row_penerimaan_rekap->id_rincian_penerimaan_rekap); ?>">  
                                </div>
                            </div>
                        </div>
                        <div class="card-box">
                        	<?php
                        		$explode_tahun_ajaran = explode('/', $tahun_ajaran);
                                $no = 0;
                        	?>
                        	<?php $__currentLoopData = $explode_tahun_ajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<?php for($i = 0; $i < count($bulan[$key]); $i++): ?>
                            <?php
                                $no = $no+1;
                                $get_penerimaan_tahun_ajaran = $row_penerimaan_tahun_ajaran->getRincian($id,$bulan[$key][$i],$value);
                            ?>
                        	<h5><?php echo e(month($bulan[$key][$i]).' '.$value); ?></h5>
                        	<div class="row">
                        		<div class="col-md-4">
	                        		<div class="form-group">
	                        			<label for="">Pemasukan</label>
	                        			<input type="number" name="pemasukan[]" class="form-control pemasukan" value="<?php echo e($get_penerimaan_tahun_ajaran->pemasukan); ?>" required placeholder="Isi Pemasukan" id-pemasukan="<?php echo e($no); ?>">
                                        <label for="" class="pemasukan-label" id-pemasukan-label="<?php echo e($no); ?>"><?php echo e(format_rupiah($get_penerimaan_tahun_ajaran->pemasukan)); ?></label>
	                        		</div>
                        		</div>
                        		<div class="col-md-4">
	                        		<div class="form-group">
	                        			<label for="">Realisasi Pengeluaran</label>
	                        			<input type="number" name="realisasi_pengeluaran_bulan[]" class="form-control realisasi-pengeluaran-bulan" value="<?php echo e($get_penerimaan_tahun_ajaran->realisasi_pengeluaran); ?>" required placeholder="Isi Realisasi Pengeluaran" id-realisasi-pengeluaran-bulan="<?php echo e($no); ?>">
                                        <label for="" class="realisasi-pengeluaran-bulan-label" id-realisasi-pengeluaran-bulan-label="<?php echo e($no); ?>"><?php echo e(format_rupiah($get_penerimaan_tahun_ajaran->realisasi_pengeluaran)); ?></label>
	                        		</div>
                        		</div>
                        		<div class="col-md-4">
	                        		<div class="form-group">
	                        			<label for="">Sisa Akhir Bulan</label>
	                        			<input type="number" name="sisa_akhir_bulan[]" class="form-control sisa-akhir-bulan" value="<?php echo e($get_penerimaan_tahun_ajaran->sisa_akhir_bulan); ?>" required placeholder="Isi Sisa Akhir Bulan" id-sisa-akhir-bulan="<?php echo e($no); ?>">
                                        <label for="" class="sisa-akhir-bulan-label" id-sisa-akhir-bulan-label="<?php echo e($no); ?>"><?php echo e(format_rupiah($get_penerimaan_tahun_ajaran->sisa_akhir_bulan)); ?></label>
	                        		</div>
                        		</div>
                                <input type="hidden" name="bulan_rincian[]" value="<?php echo e($bulan[$key][$i]); ?>">
                                <input type="hidden" name="tahun_rincian[]" value="<?php echo e($value); ?>">
                                <input type="hidden" name="id_rincian_penerimaan_tahun_ajaran[]" value="<?php echo e($get_penerimaan_tahun_ajaran->id_rincian_penerimaan_tahun_ajaran); ?>">
                        	</div>
                        	<hr>
                        	<?php endfor; ?>
                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="card-box">
                            <button class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(() => {
        var get_input_rincian   = $('.input-rincian:last').attr('id-input-rincian');
        var input_rincian       = $('.input-rincian:last').attr('id-input-rincian')+1;
        var hapus_input_rincian = get_input_rincian;
        var btn_delete_rincian  = $('.btn-delete-rincian:last').attr('id-delete-rincian')+1;

        var id_spp              = $(`.input-rincian:last`).find('select.spp:last').attr('id-spp')+1;
        var id_rencana          = $(`.input-rincian:last`).find('.rencana:last').attr('id-rencana')+1;
        var id_penerimaan       = $(`.input-rincian:last`).find('.penerimaan:last').attr('id-penerimaan')+1;
        var id_keterangan       = $(`.input-rincian:last`).find('.keterangan-penerimaan:last').attr('id-keterangan')+1;
        var id_rencana_label    = $(`.input-rincian:last`).find('.rencana-label:last').attr('id-rencana-label')+1;
        var id_penerimaan_label = $(`.input-rincian:last`).find('.penerimaan-label:last').attr('id-penerimaan-label')+1;

        $('.tambah-rincian').click(() => {
            $('.spp').each(function(){
                if ($(this)[0].selectize) {
                    var value = $(this).val();
                    $(this)[0].selectize.destroy();
                    $(this).val(value);
                }
            })
            $('#input-rincian').clone().appendTo('#input-rincian-layout')
            $('.input-rincian:last').attr('id-input-rincian',input_rincian)
            $('.tambah-rincian:last').attr('id-act',input_rincian)
            $('.spp').selectize({
                create:true,
                sortField:'text'
            })

            $('select.spp').each(function(index,element){
                console.log(index)
                let attr = $(this).attr('id-spp')
                $('.selectize-control').eq(index).attr('id-spp',attr)
            })

            $(`.input-rincian:last`).find('.btn-delete-rincian:last').removeClass('form-hide')

            $('.btn-delete-rincian:last').attr('id-delete-rincian',btn_delete_rincian++)
            
            $(`.input-rincian:last`).attr('id-input-rincian',input_rincian++)
             $(`.input-rincian:last`).find('select.spp:last').attr('id-spp',id_spp++)
            
            $(`.input-rincian:last`).find('.penerimaan:last').attr('id-penerimaan',id_penerimaan++)
            $(`.penerimaan:last`).val('')
            
            $(`.input-rincian:last`).find('.penerimaan-label:last').attr('id-penerimaan-label',id_penerimaan_label++)
            $(`.penerimaan-label:last`).html(rupiah_format(0))
            
            $(`.input-rincian:last`).find('.rencana:last').attr('id-rencana',id_rencana++)
            $(`.rencana:last`).val('')

            $(`.input-rincian:last`).find('.rencana-label:last').attr('id-rencana-label',id_rencana_label++)
            $(`.rencana-label:last`).html(rupiah_format(0))

            $(`.input-rincian:last`).find('.keterangan-penerimaan:last').attr('id-keterangan',id_keterangan++)

            $(`.keterangan-penerimaan:last`).val('')
            $(`input[name="id_rincian_penerimaan_detail[]"]:last`).val('')

            $('select.spp:last')[0].selectize.clear()

            input_rincian++
            hapus_input_rincian++
        })

        $(document).on('change','.spp',function(){
            let val           = $(this).val()
            let attr          = $(this).attr('id-spp')

            $.ajax({
                url: "<?php echo e(url('/ajax/get-penerimaan-rab')); ?>",
                data: {id_rincian_pengeluaran_detail:val},
            })
            .done(function(done) {
                $(`.penerimaan[id-penerimaan="${attr}"`).val(done)
                $(`.penerimaan-label[id-penerimaan-label="${attr}"`).html(rupiah_format(done))
            })
            .fail(function(fail) {
                console.log(fail)
            });
        })

        $(document).on('keyup','.pemasukan',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-pemasukan')

            if (val == '') {
                $(`.pemasukan-label[id-pemasukan-label="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.pemasukan-label[id-pemasukan-label="${attr}"]`).html(rupiah_format(val))   
            }
        })

        $(document).on('keyup','.penerimaan',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-penerimaan')

            if (val == '') {
                $(`.penerimaan-label[id-penerimaan-label="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.penerimaan-label[id-penerimaan-label="${attr}"]`).html(rupiah_format(val))   
            }
        })

        $(document).on('keyup','.rencana',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-rencana')

            if (val == '') {
                $(`.rencana-label[id-rencana-label="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.rencana-label[id-rencana-label="${attr}"]`).html(rupiah_format(val))   
            }
        })

        $(document).on('keyup','.penerimaan-bulan-ini',function(){
            let val  = $(this).val()

            if (val == '') {
                $(`.penerimaan-bulan-ini-label`).html(rupiah_format(0))
            }
            else {
                $(`.penerimaan-bulan-ini-label`).html(rupiah_format(val))   
            }
        })

        $(document).on('keyup','.realisasi-pengeluaran-bulan',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-realisasi-pengeluaran-bulan')

            if (val == '') {
                $(`.realisasi-pengeluaran-bulan-label[id-realisasi-pengeluaran-bulan-label="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.realisasi-pengeluaran-bulan-label[id-realisasi-pengeluaran-bulan-label="${attr}"]`).html(rupiah_format(val))   
            }
        })

        $(document).on('keyup','.sisa-akhir-bulan',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-sisa-akhir-bulan')

            if (val == '') {
                $(`.sisa-akhir-bulan-label[id-sisa-akhir-bulan-label="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.sisa-akhir-bulan-label[id-sisa-akhir-bulan-label="${attr}"]`).html(rupiah_format(val))   
            }
        })

        $(document).on('click','.btn-delete-rincian',function(){
            let attr = $(this).attr('id-delete-rincian');
            $(`.input-rincian[id-input-rincian="${attr}"]`).remove()
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout-app.layout-rab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/rincian-penerimaan/rincian-penerimaan-edit.blade.php ENDPATH**/ ?>