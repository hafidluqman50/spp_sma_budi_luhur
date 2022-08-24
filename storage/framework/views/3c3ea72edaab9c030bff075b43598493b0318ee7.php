<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Kantin View</title>
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
</head>
<body>
	<h5 align="center"><b><?php echo e($kantin_nama); ?></b></h5>
	<?php for($i = 1; $i <= $bulan; $i++): ?>
	<hr>
	<?php
		$laporan_kantin = $kantin->getLaporanKantin(month(zero_front_number($i)),$tahun,$kantin_nama);
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
			<?php $__currentLoopData = $laporan_kantin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<hr>
	<?php endfor; ?>
</body>
</html><?php /**PATH /var/www/web_keuangan/resources/views/Admin/laporan/laporan-kantin-lihat-data.blade.php ENDPATH**/ ?>