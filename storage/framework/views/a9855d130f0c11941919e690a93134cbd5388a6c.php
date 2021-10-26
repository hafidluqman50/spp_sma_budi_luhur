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
                                    <h4 class="m-t-0 header-title">Tunggakan An. Khoirulli Nurul Fatimah</h4>
                                    <p class="text-muted font-14 m-b-20">
                                        Siswa Luar Kota/Dalam Kota/Komplek <br>
                                        Makan di Pondok/Kantin Bu Mus/Bu Yusron/Bu Zahira/Bu Wandi/Bu Malik
                                    </p>

                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bulan, Tahun</th>
                                            <th>SPP</th>
                                            <th>Makan</th>
                                            <th>Tab Tes</th>
                                            <th>Asrama</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Januari 2021</td>
                                            <td>250.000</td>
                                            <td>600.000</td>
                                            <td>50.000</td>
                                            <td>100.000</td>
                                            <td><a href="" class="btn btn-danger btn-sm waves-effect waves-light">Bayar</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Februari 2021</td>
                                            <td>250.000</td>
                                            <td>600.000</td>
                                            <td>50.000</td>
                                            <td>100.000</td>
                                            <td><a href="" class="btn btn-danger btn-sm waves-effect waves-light">Bayar</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Maret 2021</td>
                                            <td>250.000</td>
                                            <td>600.000</td>
                                            <td>50.000</td>
                                            <td>100.000</td>
                                            <td><a href="" class="btn btn-danger btn-sm waves-effect waves-light">Bayar</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                            <h3>Print Out</h3>
                            <section>
                                <div class="form-group clearfix">
                                    <h5 class="text-center"> KWITANSI PEMBAYARAN SPP</h4>
                                    <div class="col-lg-12">
                                        <table>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>Khoirulli Nurul Fatimah</td>
                                            </tr>
                                            <tr>
                                                <td>Uang Sejumlah</td>
                                                <td>:</td>
                                                <td>Lima Juta Rupiah</td>
                                            </tr>
                                            <tr>
                                                <td>Untuk Pembayaran</td>
                                                <td>:</td>
                                                <td>SPP Bulan Oktober 2020 - Februari 2021</td>
                                            </tr>
                                            <tr>
                                                <td>Terbilang Rp.</td>
                                                <td>:</td>
                                                <td>5.000.000</td>
                                            </tr>
                                        </table>
                                        <p class="text-right">Samarinda, 9 September 2021</p>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                // buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            // table.buttons().container()
            //         .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );

    </script>

    <!--Form Wizard-->
    <script src="<?php echo e(asset('assets/plugins/jquery.steps/js/jquery.steps.min.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')); ?>"></script>

    <!--wizard initialization-->
    <script src="<?php echo e(asset('assets/pages/jquery.wizard-init.js')); ?>" type="text/javascript"></script>
    <script>
        $(() => {
            $('select[name="tahun_ajaran"]').change(function() {
                let tahun_ajaran = $(this).val()
                let kelas        = $('select[name="kelas"]').val()

                $.ajax({
                    url: "<?php echo e(url('/ajax/get-siswa/')); ?>/"+kelas+'/'+tahun_ajaran
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
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/dashboard.blade.php ENDPATH**/ ?>