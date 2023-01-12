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
                                <li class="breadcrumb-item active"><a href="#">Data Rincian Pembelanjaan Uang Makan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Edit Rincian Pembelanjaan Uang Makan</a></li>
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
                        <h4 class="header-title m-t-0">Edit Data</h4>
                    </div>
                    <form action="<?php echo e(url('/admin/data-perincian-rab/rincian-pengajuan/'.$id.'/update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div id="input-kategori-rincian-layout">
                            <?php
                                $no__ = 0;
                            ?>
                            <?php $__currentLoopData = $kategori_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $no = $key+1;
                            ?>
                            <div class="card-box input-kategori-rincian" id="input-kategori-rincian" id-input-kategori="<?php echo e($no); ?>">
                                <div class="form-group">
                                    <label class="col-form-label">Kategori Rincian</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control kategori-rincian" value="<?php echo e($value->kategori_rincian_pengajuan); ?>" placeholder="Isi Kategori Rincian; Ex: Belanja Pegawai" id-kategori-rincian="<?php echo e($no); ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-danger btn-delete-kategori-rincian" type="button" id-delete-kategori="<?php echo e($no); ?>">X</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="input-rincian" id="input-rincian" id-layout-input-rincian="<?php echo e($no); ?>">
                                    <?php
                                        $get_rincian_pengajuan = $rincian_pengajuan->getRincianByKategori($value->kategori_rincian_pengajuan);
                                    ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $get_rincian_pengajuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php
                                        $no__ = $no__+1;
                                    ?>
                                    <div class="input-rincian-layout row" id="input-rincian-layout" id-layout-rincian="<?php echo e($no__); ?>" id-layout-input-rincian="<?php echo e($no); ?>">
                                        <input type="hidden" name="kategori_rincian[]" value="<?php echo e($value->kategori_rincian_pengajuan); ?>">
                                        <div class="col-md-10 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Rincian</label>
                                                    <select name="rincian[]" class="form-control rincian selectize" id-rincian="<?php echo e($no__); ?>">
                                                        <option value="" selected disabled>=== Pilih Rincian ===</option>
                                                        <?php $__currentLoopData = $rincian_pengeluaran_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($data->id_rincian_pengeluaran_sekolah); ?>" <?php echo $val->id_rincian_pengeluaran_sekolah == $data->id_rincian_pengeluaran_sekolah ? 'selected="selected"' : ''; ?>><?php echo e($data->uraian_rab); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Volume</label>
                                                    <input type="text" class="volume form-control" value="<?php echo e($val->volume_rab); ?>" id-volume="<?php echo e($no__); ?>" readonly>
                                                </div>  
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Nominal RAB</label>
                                                    <input type="text" class="uang-keluar form-control" value="<?php echo e($val->nominal_rab); ?>" id-uang-keluar="<?php echo e($no__); ?>" readonly>
                                                    <label for="" class="uang-keluar-label" id="uang-keluar-label" id-uang-keluar-label="<?php echo e($no__); ?>"><?php echo e(format_rupiah($val->nominal_rab)); ?></label>
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Keterangan</label>
                                                    <input type="text" name="keterangan_pengajuan[]" value="<?php echo e($val->keterangan_pengajuan); ?>" class="form-control keterangan-pembelanjaan">
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button class="btn btn-danger btn-delete-rincian" type="button" style="margin-top:19%;" id-delete-rincian="<?php echo e($no__); ?>">X</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_rincian_pengajuan[]" value="<?php echo e($val->id_rincian_pengajuan); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="input-rincian-layout row" id="input-rincian-layout" id-layout-rincian="<?php echo e($no__); ?>" id-layout-input-rincian="<?php echo e($no); ?>">
                                        <input type="hidden" name="kategori_rincian[]" value="<?php echo e($value->kategori_rincian_pengajuan); ?>">
                                        <div class="col-md-10 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Rincian</label>
                                                    <select name="rincian[]" class="form-control rincian selectize" id-rincian="<?php echo e($no__); ?>">
                                                        <option value="" selected disabled>=== Pilih Rincian ===</option>
                                                        <?php $__currentLoopData = $rincian_pengeluaran_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($data->id_rincian_pengeluaran_sekolah); ?>"><?php echo e($data->uraian_rab); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Volume</label>
                                                    <input type="text" class="volume form-control" value="" id-volume="<?php echo e($no__); ?>" readonly>
                                                </div>  
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Nominal RAB</label>
                                                    <input type="text" class="uang-keluar form-control" value="" id-uang-keluar="<?php echo e($no__); ?>" readonly>
                                                    <label for="" class="uang-keluar-label" id="uang-keluar-label" id-uang-keluar-label="<?php echo e($no__); ?>"><?php echo e(format_rupiah(0)); ?></label>
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Keterangan</label>
                                                    <input type="text" name="keterangan_pengajuan[]" value="" class="form-control keterangan-pembelanjaan">
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button class="btn btn-danger btn-delete-rincian" type="button" style="margin-top:19%;" id-delete-rincian="<?php echo e($no__); ?>">X</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_rincian_pengajuan[]" value="">
                                    <?php endif; ?>
                                </div>
                                <button class="btn btn-success tambah-input-rincian" type="button" id-act="<?php echo e($no); ?>">Tambah Input Rincian</button>
                                <hr>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="card-box">
                            <button class="btn btn-primary tambah-input" type="button">Tambah Input</button>
                        </div>
                        <div class="card-box">
                            <button class="btn btn-warning">Edit Data</button>
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
        var get_id_input_kategori_rincian = parseInt($('.input-kategori-rincian:last').attr('id-input-kategori'));

        var input_kategori_rincian        = parseInt($('.input-kategori-rincian:last').attr('id-input-kategori'))+1;

        var hapus_input_kategori_rincian  = get_id_input_kategori_rincian;

        var btn_delete_rincian            = parseInt($('.btn-delete-rincian:last').attr('id-delete-rincian'))+1;

        var id_layout_rincian             = parseInt($(`.input-rincian-layout[id-layout-input-rincian="${get_id_input_kategori_rincian}"]:last`).attr('id-layout-rincian'))+1;

        var id_rincian                    = parseInt($(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('select.rincian:last').attr('id-rincian'))+1;
        
        var id_volume                     = parseInt($(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('.volume:last').attr('id-volume'))+1;
        
        var id_spp                        = parseInt($(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('.spp:last').attr('id-spp'))+1;

        var id_uang_masuk                 = parseInt($(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('.uang-masuk:last').attr('id-uang-masuk'))+1;

        var id_uang_keluar                = $(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('.uang-keluar:last').attr('id-uang-keluar');

        var id_uang_masuk_label           = parseInt($(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('.uang-masuk-label:last').attr('id-uang-masuk-label'))+1;

        var id_uang_keluar_label          = parseInt($(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-keluar-label:last').attr('id-uang-keluar-label'))+1;

        $('.tambah-input').click(() => {
            $('.rincian').each(function(){
                if ($(this)[0].selectize) {
                    var value = $(this).val();
                    $(this)[0].selectize.destroy();
                    $(this).val(value);
                }
            })
            $('.input-kategori-rincian:last').clone().appendTo('#input-kategori-rincian-layout')
            $('.input-kategori-rincian:last').attr('id-input-kategori',input_kategori_rincian)
            $('.input-kategori-rincian:last').find('.kategori-rincian:last').attr('id-kategori-rincian',input_kategori_rincian)
            $('.input-kategori-rincian:last').find('.kategori-rincian:last').val('')
            $('.input-rincian:last').attr('id-layout-input-rincian',input_kategori_rincian)
            $('.input-rincian-layout:last').attr('id-layout-input-rincian',input_kategori_rincian)
            $('.tambah-input-rincian:last').attr('id-act',input_kategori_rincian)
            $('.rincian').selectize({
                create:true,
                sortField:'text'
            })
            $('.btn-delete-kategori-rincian:last').removeClass('form-hide')
            $('.btn-delete-kategori-rincian:last').attr('id-delete-kategori',input_kategori_rincian)
            
            $(`.input-kategori-rincian[id-input-kategori="${input_kategori_rincian}"]`).find(`.input-rincian-layout[id-layout-input-rincian="${hapus_input_kategori_rincian}"]`).remove();

            $('.btn-delete-rincian:last').attr('id-delete-rincian',btn_delete_rincian++)

            if (!$('.btn-delete-rincian:last').hasClass('form-hide')) {
                $('.btn-delete-rincian:last').addClass('form-hide')
            }
            
            $(`.input-rincian-layout[id-layout-input-rincian="${input_kategori_rincian}"]:last`).attr('id-layout-rincian',id_layout_rincian++)
             $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('select.rincian:last').attr('id-rincian',id_rincian++)
             $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('select.rincian:last')[0].selectize.clear()
            
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.spp:last').attr('id-spp',id_spp++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.spp:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.volume:last').attr('id-volume',id_volume++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.volume:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-masuk:last').attr('id-uang-masuk',id_uang_masuk++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-masuk:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-masuk-label:last').attr('id-uang-masuk-label',id_uang_masuk_label++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-masuk-label:last').html(rupiah_format(0))
            
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-keluar:last').attr('id-uang-keluar',id_uang_keluar++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-keluar:last').val('')

            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-keluar-label:last').attr('id-uang-keluar-label',id_uang_keluar_label++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-keluar-label:last').html(rupiah_format(0))

            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.keterangan-pembelanjaan:last').val('')
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('input[name="id_rincian_pengajuan[]"]').val('')
            input_kategori_rincian++
            hapus_input_kategori_rincian++
        })

        $(document).on('click','.tambah-input-rincian',function() {
            let attr = $(this).attr('id-act')
            $('.rincian').each(function(){
                if ($(this)[0].selectize) {
                    var value = $(this).val();
                    $(this)[0].selectize.destroy();
                    $(this).val(value);
                }
            })
            $(`.input-rincian-layout[id-layout-input-rincian="${attr}"]:last`).clone().appendTo(`.input-rincian[id-layout-input-rincian="${attr}"]`)
            $(`.input-rincian-layout[id-layout-input-rincian="${attr}"]:last`).attr('id-layout-rincian',id_layout_rincian++)
            $('.rincian').selectize({
                create:true,
                sortField:'text'
            })
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.btn-delete-rincian:last').removeClass('form-hide')
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.btn-delete-rincian:last').attr('id-delete-rincian',btn_delete_rincian++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('select.rincian:last').attr('id-rincian',id_rincian++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('select.rincian:last')[0].selectize.clear()
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.spp:last').attr('id-spp',id_spp++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.spp:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.volume:last').attr('id-volume',id_volume++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.volume:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-masuk:last').attr('id-uang-masuk',id_uang_masuk++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-masuk:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-masuk-label:last').attr('id-uang-masuk-label',id_uang_masuk_label++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-masuk-label:last').html(rupiah_format(0))
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-keluar:last').attr('id-uang-keluar',id_uang_keluar++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-keluar:last').val('')

            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-keluar-label:last').attr('id-uang-keluar-label',id_uang_keluar_label++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-keluar-label:last').html(rupiah_format(0))

            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.keterangan-pembelanjaan:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('input[name="id_rincian_pengajuan[]"]').val('')
        })

        $(document).on('keyup','.kategori-rincian',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-kategori-rincian')
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('input[name="kategori_rincian[]"]').val(val)
        })

        $(document).on('change','select[name="rincian[]"]',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-rincian')
            if (val != '') {
                $.ajax({
                    url: "<?php echo e(url('/ajax/get-rab')); ?>",
                    data: {id_rincian: val},
                })
                .done(function(done) {
                    $(`.spp[id-spp="${attr}"]`).val(done.spp)
                    $(`.volume[id-volume="${attr}"]`).val(done.volume)
                    $(`.uang-masuk[id-uang-masuk="${attr}"`).val(done.uang_masuk)
                    $(`.uang-masuk-label[id-uang-masuk-label="${attr}"`).html(rupiah_format(done.uang_masuk))
                    $(`.uang-keluar[id-uang-keluar="${attr}"`).val(done.uang_keluar)
                    $(`.uang-keluar-label[id-uang-keluar-label="${attr}"`).html(rupiah_format(done.uang_keluar))
                })
                .fail(function(fail) {

                });
            }
        })

        $(document).on('click','.btn-delete-kategori-rincian',function(){
            let attr = $(this).attr('id-delete-kategori');
            $(`.input-kategori-rincian[id-input-kategori="${attr}"]`).remove()
        })

        $(document).on('click','.btn-delete-rincian',function(){
            let attr = $(this).attr('id-delete-rincian');
            $(`.input-rincian-layout[id-layout-rincian="${attr}"]`).remove()
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout-app.layout-rab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan__/resources/views/Admin/rincian-pengajuan/rincian-pengajuan-edit.blade.php ENDPATH**/ ?>