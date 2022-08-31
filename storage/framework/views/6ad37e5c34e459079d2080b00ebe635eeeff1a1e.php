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
                                <li class="breadcrumb-item active"><a href="#">Data Perincian</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Perincian</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <form action="<?php echo e(url('/admin/data-perincian-rab/save')); ?>" method="POST">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="button-list" style="margin-bottom:1%;">
                                <a href="<?php echo e(url()->previous()); ?>">
                                    <button class="btn btn-default" type="button">Kembali</button>
                                </a>
                            </div>
                            <h4 class="header-title m-t-0">Tambah Data Perincian</h4>
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Saldo Awal</label>
                                    <div class="col-7">
                                        <input type="number" name="saldo_awal" class="form-control" placeholder="Isi Saldo Awal" required>
                                        <label for="" class="saldo-awal-label">Rp 0,00</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Ajaran</label>
                                    <div class="col-7">
                                        <select name="tahun_ajaran" class="form-control select2" required>
                                            <option value="" selected disabled>=== Pilih Tahun Ajaran ===</option>
                                            <?php $__currentLoopData = $tahun_ajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id_tahun_ajaran); ?>"><?php echo e($value->tahun_ajaran); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bulan Laporan</label>
                                    <div class="col-7">
                                        <select name="bulan_laporan" class="form-control select2" required>
                                            <option value="" selected disabled>=== Pilih Bulan Laporan ===</option>
                                            <?php for($i = 1; $i <= 12; $i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e(month(zero_front_number($i))); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Laporan</label>
                                    <div class="col-7">
                                        <input type="text" name="tahun_laporan" class="form-control" placeholder="Isi Tahun Laporan; Ex: 2022;" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bulan Pengajuan</label>
                                    <div class="col-7">
                                        <select name="bulan_pengajuan" class="form-control select2" required>
                                            <option value="" selected disabled>=== Pilih Bulan Pengajuan ===</option>
                                            <?php for($i = 1; $i <= 12; $i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e(month(zero_front_number($i))); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Pengajuan</label>
                                    <div class="col-7">
                                        <input type="text" name="tahun_pengajuan" class="form-control" placeholder="Isi Tahun Pengajuan; Ex: 2022;" required>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="layout-input-perincian" id="layout-input-perincian">
                                <div class="input-perincian" id="input-perincian">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Tanggal Perincian</label>
                                                <div>
                                                    <input type="date" name="tanggal_perincian[]" class="form-control" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Nominal Rincian</label>
                                                <div>
                                                    <input type="number" name="nominal_rincian[]" class="form-control nominal-rincian" placeholder="Isi Nominal Rincian" required="required" nominal-rincian-id="1">
                                                    <label for="" class="nominal-rincian-label" nominal-rincian-id="1">Rp 0,00</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Uraian RAB</label>
                                                <div>
                                                    <input type="text" name="uraian_rab[]" class="form-control" placeholder="Isi Uraian RAB; Ex: PDAM Bulan Mei 2022">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Uraian Rincian</label>
                                                <div>
                                                    <input type="text" name="uraian_rincian[]" class="form-control" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Pendapatan</label>
                                                <div>
                                                    <select name="id_kolom_spp[]" class="form-control selectize pendapatan">
                                                        <option value="" selected disabled>=== Pilih Pendapatan ===</option>
                                                        <?php $__currentLoopData = $kolom_spp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($element->id_kolom_spp); ?>"><?php echo e($element->nama_kolom_spp); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Nominal RAB</label>
                                                <div>
                                                    <input type="number" name="nominal_rab[]" class="form-control nominal-rab" placeholder="Isi Nominal RAB" nominal-rab-id="1">
                                                    <label for="" class="nominal-rab-label" nominal-rab-id="1">Rp 0,00</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Volume Rincian</label>
                                                <div>
                                                    <input type="number" name="volume_rincian[]" class="form-control" placeholder="Isi Volume Rincian" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Volume RAB</label>
                                                <div>
                                                    <input type="number" name="volume_rab[]" class="form-control" placeholder="Isi Volume RAB">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success" id="input-act-perincian">Tambah Input</button>
                                <button type="button" class="btn btn-danger form-hide" id="hapus-act-perincian">Hapus Input</button>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                            
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
        $('input[name="saldo_awal"]').keyup(function(){
            let val = $(this).val()
            if (val == 0) {
                $('.saldo-awal-label').html(rupiah_format(0))
            }
            else {
                $('.saldo-awal-label').html(rupiah_format(val))
            }
        })

        var nominal_rincian_input    = 2;
        // var nominal_pendapatan_input = 2;
        var nominal_rab_input        = 2;
        var nominal_rincian_label    = 2;
        // var nominal_pendapatan_label = 2;
        var nominal_rab_label        = 2;

        $('#input-act-perincian').click(() => {
            $('.pendapatan').each(function(){
                if ($(this)[0].selectize) { // requires [0] to select the proper object
                    var value = $(this).val(); // store the current value of the select/input
                    $(this)[0].selectize.destroy(); // destroys selectize()
                    $(this).val(value);  // set back the value of the select/input
                }
            })
            $('#input-perincian').clone().appendTo('#layout-input-perincian')
            $('.pendapatan').selectize({
                create:true,
                sortField:'text'
            })

            $('.nominal-rincian:last').attr('nominal-rincian-id',nominal_rincian_input++)
            // $('.nominal-pendapatan:last').attr('nominal-pendapatan-id',nominal_pendapatan_input++)
            $('.nominal-rab:last').attr('nominal-rab-id',nominal_rab_input++)

            $('.nominal-rincian-label:last').attr('nominal-rincian-id',nominal_rincian_label++)
            // $('.nominal-pendapatan-label:last').attr('nominal-pendapatan-id',nominal_pendapatan_label++)
            $('.nominal-rab-label:last').attr('nominal-rab-id',nominal_rab_label++)

            $('.input-perincian:last').find('input').val('')
            $('.nominal-rincian-label:last').html(`${rupiah_format(0)}`)
            $('.nominal-rab-label:last').html(`${rupiah_format(0)}`)

            $('#hapus-act-perincian').removeClass('form-hide')
        })
        $(document).on('keyup','.nominal-rincian',function() {
            let val  = $(this).val()
            let attr = $(this).attr('nominal-rincian-id')
            if (val == 0) {
                $(`.nominal-rincian-label[nominal-rincian-id="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.nominal-rincian-label[nominal-rincian-id="${attr}"]`).html(rupiah_format(val))
            }
        })
        $(document).on('keyup','.nominal-pendapatan',function() {
            let val  = $(this).val()
            let attr = $(this).attr('nominal-pendapatan-id')
            if (val == 0) {
                $(`.nominal-pendapatan-label[nominal-pendapatan-id="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.nominal-pendapatan-label[nominal-pendapatan-id="${attr}"]`).html(rupiah_format(val))
            }
        })
        $(document).on('keyup','.nominal-rab',function() {
            let val  = $(this).val()
            let attr = $(this).attr('nominal-rab-id')
            if (val == 0) {
                $(`.nominal-rab-label[nominal-rab-id="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.nominal-rab-label[nominal-rab-id="${attr}"]`).html(rupiah_format(val))
            }
        })
        $('#hapus-act-perincian').click(() => {
            $('.input-perincian').last().remove()
            if ($('.input-perincian').length == 1) {
                $('#hapus-act-perincian').addClass('form-hide')
            }
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout-app.layout-rab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/rincian-pengeluaran/rincian-pengeluaran-tambah.blade.php ENDPATH**/ ?>