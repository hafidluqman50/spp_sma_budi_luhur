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
                                <li class="breadcrumb-item"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Bulan Tahun SPP</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Bulan Tahun SPP</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA SPP BULAN TAHUN</b></h4>
                        
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="<?php echo e(url('/admin/spp/')); ?>">
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </button>
                            </a>
                        </div>
                        <?php if(session()->has('message')): ?>
                        <div class="alert alert-success alert-dismissible">
                            <?php echo e(session('message')); ?> <button class="close">X</button>
                        </div>
                        <?php endif; ?>
                        <table>
                            <tr>
                                <td><b>NISN</b></td>
                                <td><b>:</b></td>
                                <td><b><?php echo e($siswa->nisn); ?></b></td>
                            </tr>
                            <tr>
                                <td><b>Nama Siswa</b></td>
                                <td><b>:</b></td>
                                <td><b><?php echo e($siswa->nama_siswa); ?></b></td>
                            </tr>
                            <tr>
                                <td><b>Kelas</b></td>
                                <td><b>:</b></td>
                                <td><b><?php echo e($siswa->kelas); ?></b></td>
                            </tr>
                            <tr>
                                <td><b>Tahun Ajaran</b></td>
                                <td><b>:</b></td>
                                <td><b><?php echo e($siswa->tahun_ajaran); ?></b></td>
                            </tr>
                        </table>
                        <table class="table table-hover table-bordered datatable force-fullwidth" id-spp="<?php echo e($id); ?>">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan Tahun</th>
                                <th>Kantin</th>
                                <th>Status Pelunasan</th>
                                <th>Sisa Bayar</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $bulan = $spp_bulan_tahun->getBulan($id,$value->tahun);
                                ?>
                                <?php $__currentLoopData = $bulan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $array = [
                                        0 => ['class'=>'badge badge-danger','text'=>'Belum Lunas'],
                                        1 => ['class'=>'badge badge-success','text'=>'Sudah Lunas']
                                    ];
                                    $status_pelunasan = '<span class="'.$array[$spp_bulan_tahun->checkStatus($element->id_spp_bulan_tahun)]['class'].'">'.$array[$spp_bulan_tahun->checkStatus($element->id_spp_bulan_tahun)]['text'].'</span>';

                                    if ($element->nama_kantin == NULL || $element->nama_kantin == '') {
                                        $nama_kantin = '-';
                                    }
                                    else {
                                        $nama_kantin = $element->nama_kantin;
                                    }

                                    $kalkulasi = format_rupiah($spp_detail->where('id_spp_bulan_tahun',$element->id_spp_bulan_tahun)->sum('sisa_bayar'));
                                ?>
                                <tr>
                                    <td><?php echo e($element->bulan_tahun); ?></td>
                                    <td><?php echo e($nama_kantin); ?></td>
                                    <td><?php echo $status_pelunasan; ?></td>
                                    <td><?php echo e($kalkulasi); ?></td>
                                    <td>    
                                        <div class="d-flex">
                                            <a href="<?php echo e(url("/admin/spp/tunggakan/$id/lihat-pemasukan-kantin/$element->id_spp_bulan_tahun")); ?>" style="margin-right:1%;">
                                              <button class="btn btn-success"> Lihat Pemasukan Kantin </button>
                                           </a>
                                            <a href="<?php echo e(url("/admin/spp/tunggakan/$id/lihat-spp/$element->id_spp_bulan_tahun")); ?>" style="margin-right:1%;">
                                              <button class="btn btn-info"> Lihat SPP </button>
                                           </a>
                                            <a href="<?php echo e(url("/admin/spp/tunggakan/$id/edit/$element->id_spp_bulan_tahun")); ?>" style="margin-right:1%;">
                                              <button class="btn btn-warning"> Edit </button>
                                           </a>
                                           <form action="<?php echo e(url("/admin/spp/tunggakan/$id/delete/$element->id_spp_bulan_tahun")); ?>" method="POST" style="margin-right:1%;">
                                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                                           </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/spp-bulan-tahun/main.blade.php ENDPATH**/ ?>