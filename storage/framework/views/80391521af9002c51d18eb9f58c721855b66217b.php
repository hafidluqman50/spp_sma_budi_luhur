<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Tunggakan View</title>
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
	<style>
		td {
			font-size: 12px;
		}
	</style>
</head>
<body>
	<h6 align="center"><b><?php echo e($title); ?></b></h6>
	<?php $__currentLoopData = $explode_tahun_ajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
		if ($bulan_awal != '') {
			$sheet_bulan_tahun = $spp_bulan_tahun->getTunggakanBulanTahun($explode_tahun_ajaran[$key],$bulan_range[$key]['bulan_awal'],$bulan_range[$key]['bulan_akhir'],$kelas_siswa_input);
		}
		else {
			$sheet_bulan_tahun = $spp->getTunggakanBulanTahunRange($explode_tahun_ajaran[$key],$tahun_ajaran,$kelas_siswa_input);
		}
	?>
		<?php $__currentLoopData = $sheet_bulan_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
	        $kelas = $spp_bulan_tahun->getKelasDistinct($val->bulan_tahun,$kelas_siswa_input,$explode_tahun_ajaran[$key]);
		?>
		<hr>
		<h6 align="center"><?php echo e(strtoupper($val->bulan_tahun)); ?></h6>
		<hr>
			<?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<td colspan="2"><?php echo e($data->kelas); ?></td>
					</tr>
					<tr>
						<td>NO.</td>
						<td>NAMA</td>
						<?php
							if ($tahun_ajaran != '') {
								$distinct_kolom_spp = $spp_detail->kolomSppTunggakanTahunAjaran($tahun_ajaran,$data->kelas,$val->bulan_tahun);
								$data_siswa_spp 	= $spp_bulan_tahun->getSiswaByTunggakan($val->bulan_tahun,$data->kelas,$tahun_ajaran);
							}
							else {
								$distinct_kolom_spp = $spp_detail->kolomSppTunggakanTahun($explode_tahun_ajaran[$key],$data->kelas,$val->bulan_tahun);
								$data_siswa_spp 	= $spp_bulan_tahun->getSiswaByTunggakan($val->bulan_tahun,$data->kelas,$explode_tahun_ajaran[$key]);
							}
						?>
						<?php $__currentLoopData = $distinct_kolom_spp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<td><?php echo e(strtoupper($kolom_spp->getNamaKolomSpp($j->id_kolom_spp))); ?></td>
						<td><?php echo e(strtoupper('Bulan')); ?></td>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<td>JUMLAH</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$sum = 0;
					?>
					<?php $__currentLoopData = $data_siswa_spp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_siswa => $data_siswa_spp_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($id_siswa+1); ?></td>
						<td><?php echo e($data_siswa_spp_->nama_siswa); ?></td>
						<?php $__currentLoopData = $distinct_kolom_spp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $z): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($spp_detail->getTunggakanKolomSpp($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun) == '-'): ?>
						<td><?php echo e($spp_detail->getTunggakanKolomSpp($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun)); ?></td>
						<?php else: ?>
						<td><?php echo e(format_rupiah($spp_detail->getTunggakanKolomSpp($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun))); ?></td>
						<?php endif; ?>
						<td><?php echo e($spp_detail->getTunggakanBulanTahun($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun)); ?></td>
						<?php
							if ($spp_detail->getTunggakanKolomSpp($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun) != '-') {
								$sum = $sum + $spp_detail->getTunggakanKolomSpp($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun);
							}
						?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<td><?php echo e(format_rupiah($sum)); ?></td>
					</tr>
					<?php
						$sum = 0;
					?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<hr>
	<h6 align="center">REKAP SPP</h6>
	<hr>
	<?php
		$kelas_siswa_rekap = $spp_detail->getTunggakanKelasRekap($kelas_siswa_input);
	?>
	<?php $__currentLoopData = $kelas_siswa_rekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
		$kolom_rekap = $spp_detail->getKolomRekap($value->kelas);
	?>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<td colspan="2"><?php echo e($value->kelas); ?></td>
			</tr>
			<tr>
				<td>NO.</td>
				<td>NAMA</td>
				<?php $__currentLoopData = $kolom_rekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<td><?php echo e(strtoupper($kolom_spp->getNamaKolomSpp($j->id_kolom_spp))); ?></td>
				<td><?php echo e(strtoupper('Bulan')); ?></td>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<td>JUMLAH</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$data_siswa_rekap = $spp_detail->getSiswaRekap($value->kelas);
				$sum = 0;
			?>
			<?php $__currentLoopData = $data_siswa_rekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_siswa => $data_siswa_rekap_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($id_siswa+1); ?></td>
				<td><?php echo e($data_siswa_rekap_->nama_siswa); ?></td>
				<?php $__currentLoopData = $kolom_rekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $z): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($spp_detail->getTunggakanNominalRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa) == '-'): ?>
				<td><?php echo e($spp_detail->getTunggakanNominalRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa)); ?></td>
				<?php else: ?>
				<td><?php echo e(format_rupiah($spp_detail->getTunggakanNominalRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa))); ?></td>
				<?php endif; ?>
				<td><?php echo e($spp_detail->getTunggakanBulanRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa)); ?></td>
				<?php
					if ($spp_detail->getTunggakanNominalRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa) != '-') {
						$sum = $sum + $spp_detail->getTunggakanNominalRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa);
					}
				?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<td><?php echo e(format_rupiah($sum)); ?></td>
				<?php
					$sum = 0;
				?>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH /var/www/web_keuangan/resources/views/Admin/laporan/laporan-tunggakan-lihat-data.blade.php ENDPATH**/ ?>