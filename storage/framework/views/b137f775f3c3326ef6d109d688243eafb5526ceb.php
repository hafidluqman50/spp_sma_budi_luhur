<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Out</title>
    <style>
        @media  print {
            a {
                display: none;
            }
        }
    </style>
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<section>
    <a href="<?php echo e(url('/admin/spp/bulan-tahun/'.$id.'/lihat-spp/'.$id_bulan_tahun)); ?>">
        Kembali
    </a>
    <div class="form-group clearfix">
        <h5 class="text-center"> KWITANSI PEMBAYARAN SPP <br> SMA BUDI LUHUR SAMARINDA</h4>
        <div class="col-lg-12">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo e($spp_detail_row->nama_siswa); ?></td>
                </tr>
                <tr>
                    <td>Uang Sejumlah</td>
                    <td>:</td>
                    <td><?php echo e(format_rupiah($total_biaya)); ?></td>
                </tr>
                <tr>
                    <td>Untuk Pembayaran</td>
                    <td>:</td>
                    <td>SPP Bulan <?php echo e($spp_detail_row->bulan_tahun); ?></td>
                </tr>
                <tr>
                    <td>Terbilang Rp.</td>
                    <td>:</td>
                    <td><?php echo e(ucwords(terbilang($total_biaya))); ?></td>
                </tr>
            </table>
            <p class="text-right">Samarinda, <?php echo e(human_date($tanggal_bayar)); ?></p>
            <p class="text-right"><b>Bendahara</b></p><br><br>
            <p class="text-right"><b>Nuridina Sari</b></p>
        </div>
    </div>
</section>

<script>
    window.print();
</script>
</body>
</html><?php /**PATH /var/www/web_keuangan/resources/views/Admin/spp-detail/struk.blade.php ENDPATH**/ ?>