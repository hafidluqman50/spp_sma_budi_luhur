<?php $__env->startSection('css'); ?>
    <link href= "<?php echo e(asset('assets/plugins/custombox/css/custombox.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

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
                                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-info pull-left">
                            <i class="md md-attach-money text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter"><?php echo e(money_receipt($transaksi_hari_ini)); ?></b></h3>
                            <p class="text-muted mb-0">Transaksi Hari Ini</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-success pull-left">
                            <i class="fa fa-money text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter"><?php echo e(money_receipt($transaksi_bulan_ini)); ?></b></h3>
                            <p class="text-muted mb-0">Transaksi Bulan ini</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-purple pull-left">
                            <i class="fa fa-edit text-purple"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter"><?php echo e(money_receipt($total_uang_kantin)); ?></b></h3>
                            <p class="text-muted mb-0">Total Uang Kantin</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-danger pull-left">
                            <i class="md md-warning text-danger"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter"><?php echo e(money_receipt($total_tunggakan)); ?></b></h3>
                            <p class="text-muted mb-0">Total Tunggakan</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Vertical Steps Example -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>PEMBAYARAN</b></h4>
                        <p class="text-muted m-b-30 font-13">
                            Silahkan Lengkapi Data Berikut !
                        </p>

                        <form id="wizard-vertical">
                            <h3>Data Siswa</h3>
                            <section>
                                <div class="form-group clearfix">
                                    <label class="control-label " for="userName1">Kelas *</label>
                                    <div class="">
                                        <select class="form-control select2" name="kelas">
                                            <option selected selected>--- Pilih Kelas ---</option>
                                            <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($element->id_kelas); ?>"><?php echo e($element->kelas); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label " for="userName1">Tahun Ajaran *</label>
                                    <div class="">
                                        <select class="form-control select2" name="tahun_ajaran">
                                            <option selected selected>--- Pilih Tahun Ajaran ---</option>
                                            <?php $__currentLoopData = $tahun_ajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($element->id_tahun_ajaran); ?>"><?php echo e($element->tahun_ajaran); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label " for="userName1">Siswa *</label>
                                    <div class="">
                                        <select class="form-control select2" name="siswa" disabled="">
                                            <option selected selected>--- Pilih Siswa ---</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <label class="col-lg-12 control-label ">(*) Wajib Diisi</label>
                                </div>
                            </section>
                            <h3>Data Tunggakan</h3>
                            <section>
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title" id="tunggakan_an">Tunggakan An. </h4>
                                    <p class="text-muted font-14 m-b-20" id="info_siswa">
                                        - <br>
                                        -
                                    </p>

                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bulan, Tahun</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tunggakan-table">
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                            <h3>Print Out</h3>
                            <section>
                                <div class="form-group clearfix">
                                    
                                    <h5 class="text-center"> KWITANSI PEMBAYARAN SPP</h4>
                                    <div class="col-lg-12">
                                        <table id="kwitansi">
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td id="nama_siswa">-</td>
                                            </tr>
                                            <tr>
                                                <td>Uang Sejumlah</td>
                                                <td>:</td>
                                                <td id="total">-</td>
                                            </tr>
                                            <tr>
                                                <td>Untuk Pembayaran</td>
                                                <td>:</td>
                                                <td id="range_pembayaran">-</td>
                                            </tr>
                                            <tr>
                                                <td>Terbilang Rp.</td>
                                                <td>:</td>
                                                <td id="terbilang">-</td>
                                            </tr>
                                        </table>
                                        <p class="text-right" id="tanggal_spp">-</p>
                                        <p class="text-right"><b>Bendahara</b></p><br><br>
                                        <p class="text-right"><b>Nuridina Sari</b></p>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <!-- End #wizard-vertical -->
                    </div>
                </div>
            </div><!-- End row -->

            <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            DETAIL PEMBAYARAN
                        </div>
                        <form id="form-spp">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12" >
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Total Biaya</label>
                                            <div class="col-7">
                                                <input type="text" name="total_biaya" class="form-control" id="total-biaya" value="0" readonly="readonly">
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
                                        <input type="hidden" name="id_spp_bulan_tahun">
                                        <div class="visible-lg" style="height: 79px;"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card-box">
                                            <div id="layout-bayar-spp">
                                                <div id="bayar-spp">
                                                    
                                                </div>
                                            </div>
                                            <div class="visible-lg" style="height: 79px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" id="close-bayar" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light" id="act-simpan">Simpan</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>TRANSAKSI TERAKHIR</b></h4>

                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Wilayah</th>
                                <th>Total Pembayaran</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $transaksi_terakhir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(human_date($element->tanggal_bayar)); ?></td>
                                    <td><?php echo e($element->nama_siswa); ?></td>
                                    <td><?php echo e(unslug_str($element->wilayah)); ?></td>
                                    <td><?php echo e(format_rupiah($element->nominal_bayar)); ?></td>
                                    <td><a href="<?php echo e(url('/admin/spp/bulan-tahun/'.$element->id_spp.'/lihat-pembayaran/'.$element->id_spp_bulan_tahun)); ?>"><button class="btn btn-primary waves-light">Lihat</button></a></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <!-- Modal -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Modal title</h4>
        <div class="custom-modal-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    

    <!--Form Wizard-->
    <script src="<?php echo e(asset('assets/plugins/custombox/js/custombox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/custombox/js/legacy.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery.steps/js/jquery.steps.min.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')); ?>"></script>

    <!--wizard initialization-->
    <script src="<?php echo e(asset('assets/pages/jquery.wizard-init.js')); ?>" type="text/javascript"></script>
    <script>
        $(() => {
            $('table#datatable').DataTable();
            $('select[name="tahun_ajaran"]').change(function() {
                let tahun_ajaran = $(this).val()
                let kelas        = $('select[name="kelas"]').val()

                $.ajax({
                    url: "<?php echo e(url('/ajax/get-siswa-dashboard/')); ?>/"+kelas+'/'+tahun_ajaran
                })
                .done(function(done) {
                    $('select[name="siswa"]').removeAttr('disabled')
                    $('select[name="siswa"]').html(done)
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                
            })

            $('a[href="#next"]').click(function() {
                if ($(this).attr('keterangan') == null || $(this).attr('keterangan') == '') {
                    $(this).attr('keterangan','bayar-spp')
                    let kelas        = $('select[name="kelas"]').val()
                    let tahun_ajaran = $('select[name="tahun_ajaran"]').val()
                    let siswa        = $('select[name="siswa"]').val()

                    $('#tunggakan-table').html('<tr><td colspan="3">Loading...</td></tr>')
                    $.ajax({
                        url: "<?php echo e(url('/ajax/get-tunggakan/')); ?>/"+siswa+'/'+kelas+'/'+tahun_ajaran
                    })
                    .done(function(done) {
                        $('#tunggakan-table').html(done.table)
                        $('#tunggakan_an').html(`Tunggakan an. ${done.siswa['nama_siswa']}`)
                        $('#info_siswa').html(done.siswa['wilayah'])
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                }
                else if ($(this).attr('keterangan') == 'bayar-spp') {
                    // $(this).removeAttr('keterangan')
                    // $.ajax({
                    //     url: "<?php echo e(url('/ajax/get-bayar/')); ?>"
                    // })
                    // .done(function(done) {

                    // })
                    // .fail(function() {
                    //     console.log("error");
                    // })
                    // .always(function() {
                    //     console.log("complete");
                    // });
                }
                
            })

            $('a[href="#finish"]').click(function(){
                window.location.href="<?php echo e(url('/admin/dashboard/bayar-spp')); ?>"
            })

            $(document).on('click','.tombol-bayar',function(){
                let attr = $(this).attr('id-spp-bulan-tahun')
                $(this).html('Loading...')
                $.ajax({
                    url: "<?php echo e(url('/ajax/get-tunggakan-detail/')); ?>/"+attr
                })
                .done(function(done) {
                    $(`.tombol-bayar[id-spp-bulan-tahun="${attr}"]`).html('Bayar')
                    $('#full-width-modal').modal('show')
                    $('#bayar-spp').html(done.kolom_spp)
                    $('input[name="id_spp_bulan_tahun"]').val(done.id_spp_bulan_tahun)
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            })

            $('#close-bayar').click(function(){
                $('#form-spp').find('input').val('')
                // $('#form-spp').find('label').html(rupiah_format(0))
                $('#total-biaya-juga').html(rupiah_format(0))
                $('#bayar-total-label').html(rupiah_format(0))
                $('#kembalian-label').html(rupiah_format(0))

                $('#total-biaya').val(0)
                $('#bayar-spp').html('')
                $('#full-width-modal').modal('hide')
            })

            $('#form-spp').submit(function(e){
                e.preventDefault()
                let val = $(this).serialize()
                $('#act-simpan').html('Loading...')
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "<?php echo e(url('/ajax/get-bayar/')); ?>",
                    type: 'POST',
                    data: val,
                })
                .done(function(done) {
                    $('#act-simpan').html('Simpan')

                    $('#form-spp').find('input').val('')
                    $('#total-biaya-juga').html(rupiah_format(0))
                    $('#bayar-total-label').html(rupiah_format(0))
                    $('#kembalian-label').html(rupiah_format(0))

                    $('#total-biaya').val(0)
                    $('#bayar-spp').html('')
                    $('#full-width-modal').modal('hide')

                    $(`.tombol-bayar[id-spp-bulan-tahun="${done.id_spp_bulan_tahun}"]`).html('Sudah Bayar')
                    $(`.tombol-bayar[id-spp-bulan-tahun="${done.id_spp_bulan_tahun}"]`).attr('disabled','disabled')

                    $('#nama_siswa').html(done.nama_siswa)
                    $('#total').html(done.total_bayar_rupiah)
                    $('#range_pembayaran').html(done.untuk_pembayaran)
                    $('#terbilang').html(done.terbilang)
                    $('#tanggal_spp').html(`Samarinda, ${done.tanggal_spp_convert}`)
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                
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
                var val         = parseInt($(this).val())
                var total_biaya = parseInt($('#total-biaya').val())
                if (val == '') {
                    val = 0
                }

                let kalkulasi  = total_biaya + val
                $('#total-biaya-juga').html(`<b>${rupiah_format(kalkulasi)}</b>`)
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

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/dashboard.blade.php ENDPATH**/ ?>