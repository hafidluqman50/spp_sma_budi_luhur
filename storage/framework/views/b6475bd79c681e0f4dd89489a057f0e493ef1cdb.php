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
                                <li class="breadcrumb-item active"><a href="#">Data Rincian Pembelanjaan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Rincian Pembelanjaan <?php echo e($jenis_rincian == 'operasional' ? '' : unslug_str($jenis_rincian)); ?></a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data <?php echo e($jenis_rincian == 'operasional' ? '' : unslug_str($jenis_rincian)); ?></h4>
                    </div>
                    <form action="<?php echo e(url('/admin/data-perincian-rab/rincian-pembelanjaan/'.$id.'/save')); ?>" method="POST">
                        <div id="input-kategori-rincian-layout">
                            <div class="card-box input-kategori-rincian" id="input-kategori-rincian" id-input-kategori="1">
                                <div class="form-group">
                                    <label class="col-form-label">Kategori Rincian</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control kategori-rincian" placeholder="Isi Kategori Rincian; Ex: Belanja Pegawai" id-kategori-rincian="1">
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-danger form-hide btn-delete-kategori-rincian" id-delete-kategori="1">X</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="input-rincian" id="input-rincian" id-layout-input-rincian="1">
                                    <div class="input-rincian-layout row" id="input-rincian-layout" id-layout-rincian="1" id-layout-input-rincian="1">
                                        <input type="hidden" name="kategori_rincian[]" value="">
                                        <div class="col-md-10 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Rincian</label>
                                                    <select name="rincian[]" class="form-control rincian selectize" id-rincian="1">
                                                        <option value="" selected disabled>=== Pilih Rincian ===</option>
                                                        <?php $__currentLoopData = $rincian_pengeluaran_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($data->id_rincian_pengeluaran_detail); ?>"><?php echo e($data->uraian_rincian); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Volume</label>
                                                    <input type="text" class="volume form-control" id-volume="1" readonly>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Uang Masuk</label>
                                                    <input type="text" class="uang-masuk form-control" id-uang-masuk="1" readonly>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Uang Keluar</label>
                                                    <input type="text" class="uang-keluar form-control" id-uang-keluar="1" readonly>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button class="btn btn-danger form-hide btn-delete-rincian" style="margin-top:19%;" id-delete-rincian="1">X</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success tambah-input-rincian" id-act="1">Tambah Input Rincian</button>
                                <hr>
                            </div>
                        </div>
                        <div class="card-box">
                            <button class="btn btn-primary tambah-input">Tambah Input</button>
                        </div>
                        <div class="card-box">
                            <button class="btn btn-primary">Simpan Data</button>
                        </div>
                        <input type="hidden" name="jenis_rincian" value="operasional">
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
        var input_kategori_rincian = 2;
        var btn_delete_rincian     = 2;


        $('.tambah-input').click(() => {
            $('.rincian').each(function(){
                if ($(this)[0].selectize) {
                    var value = $(this).val();
                    $(this)[0].selectize.destroy();
                    $(this).val(value);
                }
            })
            $('#input-kategori-rincian').clone().appendTo('#input-kategori-rincian-layout')
            $('.input-kategori-rincian:last').attr('id-input-kategori',input_kategori_rincian)
            $('.input-kategori-rincian:last').find('.kategori-rincian:last').attr('id-kategori-rincian',input_kategori_rincian)
            $('.input-rincian:last').attr('id-layout-input-rincian',input_kategori_rincian)
            $('.input-rincian-layout:last').attr('id-layout-input-rincian',input_kategori_rincian)
            $('.tambah-input-rincian:last').attr('id-act',input_kategori_rincian)
            $('.rincian').selectize({
                create:true,
                sortField:'text'
            })
            $('.btn-delete-kategori-rincian:last').removeClass('form-hide')
            $('.btn-delete-rincian:last').removeClass('form-hide')
            $('.btn-delete-kategori-rincian:last').attr('id-delete-kategori',input_kategori_rincian)
            $('.btn-delete-rincian:last').attr('id-delete-rincian',btn_delete_rincian)
            input_kategori_rincian++
        })

        var id_rincian     = 2;
        var id_volume      = 2;
        var id_uang_masuk  = 2;
        var id_uang_keluar = 2;

        $(document).on('click','.tambah-input-rincian',function() {
            let attr = $(this).attr('id-act')
            console.log(attr)
            $('.rincian').each(function(){
                if ($(this)[0].selectize) {
                    var value = $(this).val();
                    $(this)[0].selectize.destroy();
                    $(this).val(value);
                }
            })
            $(`.input-rincian-layout[id-layout-input-rincian="${attr}"]:last`).clone().appendTo(`.input-rincian[id-layout-input-rincian="${attr}"]`)
            $('.rincian').selectize({
                create:true,
                sortField:'text'
            })
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.btn-delete-rincian:last').removeClass('form-hide')
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.rincian:last').attr('id-rincian',id_rincian++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.volume:last').attr('id-volume',id_volume++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-masuk:last').attr('id-uang-masuk',id_uang_masuk++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-keluar:last').attr('id-uang-keluar',id_uang_keluar++)
        })

        $(document).on('keyup','.kategori-rincian',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-kategori-rincian')
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('input[name="kategori_rincian[]"]').val(val)
        })

        $(document).on('change','select[name="rincian[]"]',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-rincian')
            $.ajax({
                url: `${base_url}/ajax/get-rincian`,
                data: {id_rincian: val},
            })
            .done(function(done) {
                $(`.volume[id-volume="${attr}"]`).val(done.volume)
                $(`.uang-masuk[id-uang-masuk="${attr}"`).val(done.uang_masuk)
            })
            .fail(function(fail) {

            });
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout-rab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/rincian-pembelanjaan/rincian-pembelanjaan-tambah.blade.php ENDPATH**/ ?>