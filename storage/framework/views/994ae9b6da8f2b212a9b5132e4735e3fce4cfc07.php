<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Kantin View</title>
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
	<style>
		td {
			font-size: 16px;
		}
	</style>
</head>
<body>
	<a href="<?php echo e(url()->previous()); ?>">
		<button class="btn btn-primary">
			Kembali
		</button>
	</a>
	<h5 align="center"><b><?php echo e($title); ?></b></h5>
	
	<?php $__currentLoopData = $get_kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
		$laporan_data_siswa = $kelas_siswa->getByIdKelas($tahun_ajaran,$element->id_kelas);
		$sum                = $kelas_siswa->countByIdKelas($tahun_ajaran,$element->id_kelas);
	?>
	
	<table class="table table-bordered table-hover" width="100%">
		<thead>
			<tr>
				<td colspan="8"><b><?php echo e($element->kelas); ?></b></td>
			</tr>
			<tr>
				<td>No.</td>
				<td>NISN</td>
				<td>Nama Siswa</td>
				<td>Jenis Kelamin</td>
				<td>Tanggal Lahir</td>
				<td>Asal Kelompok</td>
				<td>Asal Wilayah</td>
				<td>Wilayah</td>
			</tr>
		</thead>
		<tbody>
			<?php $__empty_1 = true; $__currentLoopData = $laporan_data_siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			
				<tr>
					<td><?php echo e($key+1); ?></td>
					<td><?php echo e($value->nisn); ?></td>
					<td><?php echo e($value->nama_siswa); ?></td>
					<td><?php echo e(unslug_str($value->jenis_kelamin)); ?></td>
					<td><?php echo e(human_date($value->tanggal_lahir)); ?></td>
					<td><?php echo e($value->asal_kelompok); ?></td>
					<td><?php echo e($value->asal_wilayah); ?></td>
					<td><?php echo e(unslug_str($value->wilayah)); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<tr>
					<td colspan="8" align="center">Tidak Ada Data</td>
				</tr>
			<?php endif; ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" align="center">Total Siswa : </td>
				<td colspan="6"><?php echo e($sum); ?></td>
			</tr>
		</tfoot>
	</table>
	
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH /var/www/web_keuangan__/resources/views/Admin/laporan/laporan-data-siswa-lihat-data.blade.php ENDPATH**/ ?>