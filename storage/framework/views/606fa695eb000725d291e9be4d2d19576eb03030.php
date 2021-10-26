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
            <form action="<?php echo e(url('/admin/spp/bulan-tahun/'.$id.'/lihat-spp/'.$id_bulan_tahun.'/bayar/'.$id_detail.'/save')); ?>" method="POST">
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
                                        <input type="text" name="keterangan_spp" class="form-control" required="" placeholder="Isi Keterangan">
                                    </div>
                                </div>
                            <div class="visible-lg" style="height: 79px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box">
                            <div id="layout-bayar-spp">
                                <div id="bayar-spp">
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label">Kolom Spp</label>
                                        <div class="col-7">
                                            <input type="text" class="form-control" value="<?php echo e($spp->nama_kolom_spp); ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label">Nominal Spp</label>
                                        <div class="col-7">
                                            <input type="text" class="form-control" value="<?php echo e(format_rupiah($spp->sisa_bayar)); ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label">Bayar</label>
                                        <div class="col-7">
                                            <input type="number" name="bayar_spp" class="form-control" placeholder="Isi Jumlah Bayar" required="required">
                                            <label for="" class="label-bayar-kolom-spp"><b>Rp. 0,00</b></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-8 offset-4">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
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
        $('#tambah-input').click(() => {
            $('#bayar-spp').clone().appendTo($('#layout-bayar-spp'));
            // $('#kolom-spp').select2('destroy');
            // $('#kolom-spp').select2();
        })

        // $('select[name="kelas"]').change(function() {
        //     let val          = $(this).val();
        //     let tahun_ajaran = $('select[name="tahun_ajaran"]').val();
        //     $.ajax({
        //         url: "<?php echo e(url('/ajax/get-siswa/')); ?>"+`/${val}/${tahun_ajaran}`
        //     })
        //     .done(function(done) {
        //         $('select[name="siswa"]').removeAttr('disabled')
        //         $('select[name="siswa"]').html(done)
        //     })
        //     .fail(function() {
        //         console.log("error");
        //     });
        // })

        $('input[name="bayar_spp"]').keyup(function(){
            var val  = $(this).val()
            console.log(val)
            if (val == '') {
                $(`.label-bayar-kolom-spp`).html(`<b>${rupiah_format(0)}</b>`)
            }
            else {
                $(`.label-bayar-kolom-spp`).html(`<b>${rupiah_format(val)}</b>`)   
            }
        })

        $('input[name="bayar_spp"]').change(function(){
            var val         = parseInt($(this).val())
            var total_biaya = parseInt($('#total-biaya').val())
            if (val == '') {
                val = 0
            }

            let kalkulasi  = total_biaya + val
            $('#total-biaya-juga').html(`<b>${rupiah_format(kalkulasi)}<b>`)
            $('#total-biaya').val(kalkulasi)
        })

        $('#bayar-total').keyup(function(){
            let val         = $(this).val()
            let total_biaya = $('#total-biaya').val()
            
            $('#bayar-total-label').html(`<b>${rupiah_format(val)}</b>`)
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

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/spp-detail/spp-detail-bayar.blade.php ENDPATH**/ ?>