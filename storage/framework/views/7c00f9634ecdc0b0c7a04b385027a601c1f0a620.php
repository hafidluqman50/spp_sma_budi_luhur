<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Pembukuan View</title>
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
	<style>
		td {
			font-size: 12px;
		}
	</style>
</head>
<body>
	<h6 align="center"><b><?php echo e($title); ?></b></h6>
	<?php $__currentLoopData = $bulan_tahun_sheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
		$explode_created_at = explode(' ',$value->created_at);
		$explode_tanggal    = explode('-',$explode_created_at[0]);
		$title_sheets       = strtoupper(bulan_tahun_excel_numeric($explode_tanggal[1],$explode_tanggal[0]));
		$kolom_spp_bayar    = $spp_bayar_detail->getKolomSppBayar($explode_tanggal[1],$explode_tanggal[0]);
	?>
	<hr>
	<h6 align="center"><?php echo e($title_sheets); ?></h6>
	<hr>
	<table class="table table-bordered tabl-hover" width="100%">
		<thead>
			<tr>
				<td>No.</td>
				<td>Tanggal Bayar</td>
				<td>Uraian</td>
				<td>Debit</td>
				<?php $__currentLoopData = $kolom_spp_bayar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $urai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<td><?php echo e($kolom_spp->getNamaKolomSpp($urai->id_kolom_spp)); ?></td>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<td>Jumlah</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$siswa_bayar = $spp_bayar_data->getSiswaBayar($explode_tanggal[1],$explode_tanggal[0]);
			?>
			<?php $__currentLoopData = $siswa_bayar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($no+1); ?></td>
				<td><?php echo e(date_excel($val->tanggal_bayar)); ?></td>
				<td><?php echo e($val->nama_siswa.' '.$val->keterangan_bayar_spp); ?></td>
				<td><?php echo e(format_rupiah($val->nominal_bayar)); ?></td>
				<?php $__currentLoopData = $kolom_spp_bayar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j => $kolom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<td><?php echo e(format_rupiah($spp_bayar_detail->getNominalBayar($kolom->id_kolom_spp,$val->id_siswa,$val->id_spp_bayar_data))); ?></td>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<td><?php echo e(format_rupiah($spp_bayar_detail->sumBayar($val->id_siswa,$val->id_spp_bayar_data))); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH /var/www/web_keuangan/resources/views/Admin/laporan/laporan-pembukuan-lihat-data.blade.php ENDPATH**/ ?>