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
            <form id="form-spp-bayar" action="<?php echo e(url('/admin/spp/tunggakan/'.$id.'/lihat-spp/'.$id_bulan_tahun.'/bayar-semua/save')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box">
                            <div class="button-list" style="margin-bottom:1%;">
                                <a href="<?php echo e(url()->previous()); ?>">
                                    <button class="btn btn-default" type="button">Kembali</button>
                                </a>
                            </div>
                            <h4 class="header-title m-t-0">Bayar SPP</h4>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Ajaran</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="<?php echo e($spp->tahun_ajaran); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kelas</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="<?php echo e($spp->kelas); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Siswa</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="<?php echo e($spp->nisn.' - '.$spp->nama_siswa); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bulan Tahun</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="<?php echo e($spp->bulan_tahun); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Total Biaya</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" name="total_biaya" id="total-biaya" value="0" readonly="readonly">
                                        <label for="" id="total-biaya-juga"><b>Rp. 0,00</b></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bayar Total</label>
                                    <div class="col-7">
                                        <input type="number" name="bayar_total" id="bayar-total" class="form-control">
                                        <label for="" id="bayar-total-label">Rp. 0,00</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kembalian</label>
                                    <div class="col-7">
                                        <input type="number" name="kembalian" id="kembalian" class="form-control" readonly="readonly">
                                        <label for="" id="kembalian-label">Rp. 0,00</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Keterangan</label>
                                    <div class="col-7">
                                        <input type="text" name="keterangan_spp" class="form-control keterangan-spp" required="" placeholder="Isi Keterangan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Jenis Bayar</label>
                                    <div class="col-7">
                                        <select name="jenis_bayar" class="form-control select2 jenis-bayar" required>
                                            <option value disabled selected>=== Pilih Jenis Bayar ===</option>
                                            <option value="cash">Cash</option>
                                            <option value="alumni">Alumni</option>
                                            <option value="transfer">Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-8 offset-4">
                                        <button type="submit" id="spp-submit" class="btn btn-primary waves-effect waves-light">
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
                                <div id="bayar-spp">
                                    <?php
                                        $no = 0;
                                    ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $spp_bayar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php
                                        $no = $key+1;
                                    ?>
                                    <div class="bayar-spp-layout" id-layout="<?php echo e($no); ?>">
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Kolom Spp</label>
                                            <div class="col-7">
                                                <input type="text" class="form-control" value="<?php echo e($value->nama_kolom_spp); ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Nominal Spp</label>
                                            <div class="col-7">
                                                <input type="text" class="form-control" value="<?php echo e(format_rupiah($value->sisa_bayar)); ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Bayar</label>
                                            <div class="col-7">
                                                <input type="number" name="bayar_spp[]" class="form-control bayar-spp" placeholder="Isi Jumlah Bayar" id-kolom-spp="<?php echo e($value->id_kolom_spp); ?>" bayar-spp-attr="<?php echo e($key+1); ?>" <?php echo e($key==0 ? 'autofocus' : ''); ?>>
                                                <input type="hidden" class="old-nominal" value="0" id-kolom-spp="<?php echo e($value->id_kolom_spp); ?>">
                                                <label for="" class="label-bayar-kolom-spp" id-kolom-spp="<?php echo e($value->id_kolom_spp); ?>"><b>Rp. 0,00</b></label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_detail[]" value="<?php echo e($value->id_spp_detail); ?>">
                                    </div>
                                    <hr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="form-group row">
                                        <label class="col-form-label">Data Kolom SPP Tidak ada</label>
                                    </div>
                                    <?php endif; ?>
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
        $('#form-spp-bayar').on('keydown','input,select,textarea',function(e){
            // var self = $(this),
            //     form = self.parents('form:eq(0)'),
            //     focusable,
            //     next
            //     ;
            if (e.keyCode == 13) {
                // focusable = form.find('input,a,select,button,textarea').filter(':visible');
                // console.log(focusable);
                // next = focusable.eq(focusable.index(this)+1);
                // if (next.length) {
                //     next.focus();
                // }
                // else {
                //     next.submit();
                // }
                // return false;
                e.preventDefault()
            }
        });

        var bayar_spp_attr = 1;
        $('.bayar-spp').keydown((e) => {
            if (e.key === 'Enter') {
                bayar_spp_attr = bayar_spp_attr+1;
                if ($(`.bayar-spp[bayar-spp-attr="${bayar_spp_attr}"]`).length) {
                    $(`.bayar-spp[bayar-spp-attr="${bayar_spp_attr}"]`).focus()
                }
                else {
                    $('#bayar-total').focus()
                }
            }
        })

        $('#bayar-total').keydown((e) => {
            if (e.key === 'Enter') {
                $('.keterangan-spp').focus()
            }
        })

        $('.keterangan-spp').keydown((e) => {
            if (e.key === 'Enter') {
                $('.jenis-bayar').focus()
            }
        })

        $('.jenis-bayar').change((e) => {
            setTimeout(() => {
                $('.select2-container-active').removeClass('select2-container-active');
                $(':focus').blur();
                $('#spp-submit').focus()
            }, 1);
        })

        $(document).on('keyup','input[name="bayar_spp[]"]',function(){
            var val  = $(this).val()
            var attr = $(this).attr('id-kolom-spp')
            if (val == '') {
                $(`.label-bayar-kolom-spp[id-kolom-spp="${attr}"]`).html(`<b>${rupiah_format(0)}</b>`)
            }
            else {
                $(`.label-bayar-kolom-spp[id-kolom-spp="${attr}"]`).html(`<b>${rupiah_format(val)}</b>`)   
            }
        })

        $(document).on('change','input[name="bayar_spp[]"]',function(){
            var val         = $(this).val()
            var total_biaya = parseInt($('#total-biaya').val())
            var attr        = $(this).attr('id-kolom-spp')
            var old_bayar   = parseInt($(`.old-nominal[id-kolom-spp="${attr}"]`).val())

            if (val == '') {
                val = 0
                total_biaya = total_biaya - old_bayar
                $(`.old-nominal[id-kolom-spp="${attr}"]`).val(val)
            }
            else {
                if (old_bayar == 0) {
                    $(`.old-nominal[id-kolom-spp="${attr}"]`).val(parseInt(val))
                }
                else {
                    total_biaya = total_biaya - old_bayar
                }
            }

            let kalkulasi  = total_biaya + parseInt(val)
            $('#total-biaya-juga').html(`<b>${rupiah_format(kalkulasi)}</b>`)
            $('#total-biaya').val(kalkulasi)
        })

        $('#bayar-total').keyup(function(){
            let val         = $(this).val()
            let total_biaya = $('#total-biaya').val()
            
            if (val != '') {
                $('#bayar-total-label').html(`<b>${rupiah_format(val)}</b>`)
            }

            if (parseInt(val) > parseInt(total_biaya)) {
                $('#kembalian').val(parseInt(val) - parseInt(total_biaya))
                $('#kembalian-label').html(`<b>${rupiah_format(parseInt(val) - parseInt(total_biaya))}</b>`)
            }
            
            if (parseInt(val) == parseInt(total_biaya)) {
                $('#kembalian').val(0)
                $('#kembalian-label').html(`<b>${rupiah_format(0)}</b>`)
            } 
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan__/resources/views/Admin/spp-detail/spp-detail-bayar-semua.blade.php ENDPATH**/ ?>