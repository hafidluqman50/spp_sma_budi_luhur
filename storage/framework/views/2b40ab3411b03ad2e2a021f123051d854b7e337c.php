<?php $__env->startSection('content'); ?>
    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="<?php echo e(url('/admin/data-perincian-rab')); ?>">Panduan Notifikasi</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Panduan Notifikasi</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Panduan Notifikasi</b></h4>
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="<?php echo e(url()->previous()); ?>">
                                <button class="btn btn-info" style="cursor:pointer;">
                                    Kembali
                                </button>
                            </a>
                        </div>
                        <ol>
                            <li>
                                Silahkan Akses Url Berikut : <a href="https://t.me/spp_sma_budi_luhur_bot" target="_blank">https://t.me/spp_sma_budi_luhur_bot</a>
                                <img src="<?php echo e(asset('assets/panduan_notifikasi_1.png')); ?>" style="margin-top:2%;width: 100%;height: auto;" alt="">
                            </li>
                            <br>
                            <hr>
                            <li>
                                Klik Tulisan /start Pada Bot Telegram Ini
                                <img src="<?php echo e(asset('assets/panduan_notifikasi_2.png')); ?>" style="margin-top:2%;width: 100%;height: auto;" alt="">
                            </li>
                            <br>
                            <hr>
                            <li>
                                Masukkan Nomor Telepon Orang Tua yang telah terdata di sistem SPP !
                                <img src="<?php echo e(asset('assets/panduan_notifikasi_3.png')); ?>" style="margin-top:2%;width: 100%;height: auto;" alt="">
                            </li>
                            <br>
                            <hr>
                            <li>
                                Setelah Masukkan Nomor Telepon Ortu, Maka akan mendapatkan notifikasi seperti ini, jika mendapatkan notifikasi ini maka sudah berhasil didaftarkan untuk mendapatkan pemberitahuan bulanan mengenai tunggakan SPP
                                <img src="<?php echo e(asset('assets/panduan_notifikasi_4.png')); ?>" style="margin-top:2%;width: 100%;height: auto;" alt="">
                            </li>
                            <br>
                            <hr>
                            <li>
                                Berikut adalah daftar perintah pada bot telegram SPP, ada /info_tunggakan untuk mengetahui informasi mengenai tunggakan, dan lain - lain.
                                <img src="<?php echo e(asset('assets/panduan_notifikasi_5.png')); ?>" style="margin-top:2%;width: 100%;height: auto;" alt="">
                            </li>
                            <br>
                            <hr>
                            <li>
                                Jika Ingin Melihat Informasi tunggakan maka ketik saja perintah /info_tunggakan, maka informasi mengenai siswa dan jumlah tunggakan akan terlihat
                                <img src="<?php echo e(asset('assets/panduan_notifikasi_6.png')); ?>" style="margin-top:2%;width: 100%;height: auto;" alt="">
                            </li>
                            <br>
                            <hr>
                            <li>
                                Nomor Hp Ortu yang telah terdaftar untuk pemberitahuan via telegram tadi, akan mendapatkan informasi mengenai tunggakan tiap bulannya secara otomatis
                                <img src="<?php echo e(asset('assets/panduan_notifikasi_7.png')); ?>" style="margin-top:2%;width: 100%;height: auto;" alt="">
                            </li>
                            <br>
                            <hr>
                            <li>
                                Jika tidak ingin mendapatkan dan memerlukan pemberitahuan otomatis mengenai tunggakan via telegram, dapat mengetik perintah /hapus
                                <img src="<?php echo e(asset('assets/panduan_notifikasi_8.png')); ?>" style="margin-top:2%;width: 100%;height: auto;" alt="">
                            </li>
                            <br>
                            <hr>
                            <li>
                                Berikut adalah pesan pemberitahuan jika nomor berhasil dihapus, nomor yang dihapus tidak akan mendapatkan pemberitahuan mengenai tunggakan, baik itu secara otomatis maupun dengan mengetik /info_tunggakan. Jika ingin mendapatkan kembali informasi tunggakan via telegram, maka ulangi dari Langkah ke 1
                                <img src="<?php echo e(asset('assets/panduan_notifikasi_9.png')); ?>" style="margin-top:2%;width: 100%;height: auto;" alt="">
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Ortu.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan__/resources/views/Ortu/panduan-notifikasi.blade.php ENDPATH**/ ?>