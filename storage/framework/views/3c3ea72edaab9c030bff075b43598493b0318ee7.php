<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Kantin View</title>
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
	<style>
		td {
			font-size: 12px;
		}
	</style>
</head>
<body>
	<h6 align="center"><b>LAPORAN KANTIN <?php echo e(strtoupper($kantin_nama)); ?></b></h6>
	<?php for($i = 1; $i <= $bulan; $i++): ?>
	<?php
		$laporan_kantin = $kantin->getLaporanKantin(month(zero_front_number($i)),$tahun,$kantin_nama);
		$sum = 0;
	?>
	
	<table class="table table-bordered table-hover" width="100%">
		<thead>
			<tr>
				<td colspan="4"><b><?php echo e(month(zero_front_number($i))); ?></b></td>
			</tr>
			<tr>
				<td>No.</td>
				<td>Nama Siswa</td>
				<td>Nominal</td>
				<td>Keterangan</td>
			</tr>
		</thead>
		<tbody>
			<?php $__empty_1 = true; $__currentLoopData = $laporan_kantin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			<?php
				if ($value->nominal_spp != $value->sisa_bayar) {
					$sum = $sum + $value->bayar_spp;
				}
			?>
				<tr>
					<td><?php echo e($key+1); ?></td>
					<td><?php echo e($value->nama_siswa); ?></td>
					<?php if($value->nominal_spp == $value->sisa_bayar): ?>
					<td></td>
					<td><b>BELUM</b></td>
					<?php else: ?>
					<td><?php echo e(format_rupiah($value->bayar_spp)); ?></td>
					<td><b>SUDAH</b></td>
					<?php endif; ?>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<tr>
					<td colspan="4" align="center">Tidak Ada Data</td>
				</tr>
			<?php endif; ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" align="center">Total</td>
				<td><?php echo e(format_rupiah($sum)); ?></td>
				<td></td>
			</tr>
		</tfoot>
	</table>
	<?php endfor; ?>
</body>
</html><?php /**PATH /var/www/web_keuangan/resources/views/Admin/laporan/laporan-kantin-lihat-data.blade.php ENDPATH**/ ?>