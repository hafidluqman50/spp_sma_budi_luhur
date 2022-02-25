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
                                <li class="breadcrumb-item active"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data SPP</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <form action="<?php echo e(url('/admin/spp/bulan-tahun/'.$id.'/update/'.$id_bulan_tahun)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box">
                            <div class="button-list" style="margin-bottom:1%;">
                                <a href="<?php echo e(url()->previous()); ?>">
                                    <button class="btn btn-default" type="button">Kembali</button>
                                </a>
                            </div>
                            <h4 class="header-title m-t-0">Tambah Data SPP</h4>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="<?php echo e($row->tahun_ajaran); ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kelas<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="<?php echo e($row->kelas); ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Siswa<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="<?php echo e($row->nisn.' | '.$row->nama_siswa); ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bulan Tahun<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" name="bulan_tahun" class="form-control" readonly="readonly" value="<?php echo e($row->bulan_tahun); ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kantin<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" name="kantin" class="form-control" readonly="readonly" value="<?php echo e($row->nama_kantin); ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-8 offset-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            <div class="visible-lg" style="height: 79px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box">
                            <div id="layout-bayar-spp">
                                <span class="text-danger">Hanya Bisa Edit Pada Kolom SPP Yang Belum Dibayar</span>
                                <?php $__currentLoopData = $row_kolom_spp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $no = $key+1
                                ?>
                                <div id="bayar-spp" class="bayar-spp" id-spp="<?php echo e($no); ?>">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Kolom Spp<span class="text-danger">*</span></label>
                                                <div class="col-7">
                                                    <select name="kolom_spp[]" id="kolom-spp" class="form-control selectize kolom-spp" required="required" kolom-id="<?php echo e($no); ?>">
                                                        <option value="" selected="" disabled="">=== Pilih Kolom Spp ===</option>
                                                        <?php $__currentLoopData = $kolom_spp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value->id_kolom_spp); ?>" <?php echo $value->id_kolom_spp == $element->id_kolom_spp ? 'selected="selected"' : ''; ?>><?php echo e($value->nama_kolom_spp); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Nominal SPP<span class="text-danger">*</span></label>
                                                <div class="col-7">
                                                    <input type="number" name="nominal_spp[]" class="form-control nominal-spp" id="nominal-spp" required="required" placeholder="Isi Nominal SPP" value="<?php echo e($element->nominal_spp); ?>" nominal-id="<?php echo e($no); ?>">
                                                    <label for="" class="label-nominal-spp" nominal-id="<?php echo e($no); ?>"><b><?php echo e(format_rupiah($element->nominal_spp)); ?></b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <?php if($no > 1): ?>
                                                <button class="btn btn-danger hapus-input" type="button" id="hapus-input" btn-id="<?php echo e($no); ?>"><span class="dripicons-trash"></span></button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button class="btn btn-success" type="button" id="tambah-input">Tambah Input</button>
                                </div>
                            </div>
                            <div class="visible-lg" style="height: 79px;"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(() => {
        $('body').on('keydown','input,select,textarea',function(e){
            var self = $(this),
                form = self.parents('form:eq(0)'),
                focusable,
                next
                ;
            if (e.keyCode == 13) {
                focusable = form.find('input,a,select,button,textarea').filter(':visible');
                console.log(focusable);
                next = focusable.eq(focusable.index(this)+1);
                if (next.length) {
                    next.focus();
                }
                else {
                    next.submit();
                }
                return false;
            }
        });
        
        var kolom_attr   = 2;
        var nominal_attr = 2;
        $('#tambah-input').click(() => {
            $('.kolom-spp').each(function(){
                if ($(this)[0].selectize) { // requires [0] to select the proper object
                    var value = $(this).val(); // store the current value of the select/input
                    $(this)[0].selectize.destroy(); // destroys selectize()
                    $(this).val(value);  // set back the value of the select/input
                }
            })
            let clone = $('#bayar-spp').clone();
            $('#layout-bayar-spp').append(clone)
            $('#kolom-spp').attr('kolom-id',kolom_attr++)
            $('#nominal-spp').attr('nominal-id',nominal_attr++)
            $('.bayar-spp:last').find('input').val('')
            $('.bayar-spp:last').find('input').removeAttr('readonly')
            $('.kolom-spp').selectize({
                create:true,
                sortField:'text'
            })
        })

        // $('#hapus-input').click(function() {
        //     $('.bayar-spp').last().remove()
        // })

        $('select[name="kelas"]').change(function() {
            let val          = $(this).val();
            let tahun_ajaran = $('select[name="tahun_ajaran"]').val();
            $.ajax({
                url: "<?php echo e(url('/ajax/get-siswa/')); ?>"+`/${val}/${tahun_ajaran}`
            })
            .done(function(done) {
                $('select[name="siswa"]').removeAttr('disabled')
                $('select[name="siswa"]').html(done)
            })
            .fail(function() {
                console.log("error");
            });
        })

        $('input[name="nominal_spp[]"]').keyup(function(){
            var val  = $(this).val()
            var attr = $(this).attr('nominal-id')
            if (val == '') {
                $(`.label-nominal-spp[nominal-id="${attr}"]`).html(`<b>${rupiah_format(0)}</b>`)
            }
            else {
                $(`.label-nominal-spp[nominal-id="${attr}"]`).html(`<b>${rupiah_format(val)}</b>`)   
            }
        })

        $(document).on('click','.hapus-input',function() {
            let attr = $(this).attr('btn-id')
            console.log(attr)
            $(`.bayar-spp[id-spp="${attr}"]`).remove()
        })

        // $(document).on('change','.kolom-spp',function(){
        //     let attr = $(this).attr('kolom-id')
        //     let val = $('option:selected',this).attr('keterangan')
        //     console.log(val)
        //     if (val != '') {
        //         $(`.nominal-spp[nominal-id="${attr}"]`).val(val)
        //         $(`.nominal-spp[nominal-id="${attr}"]`).attr('readonly','readonly')
        //     }
        // })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/spp-bulan-tahun/spp-bulan-tahun-edit.blade.php ENDPATH**/ ?>