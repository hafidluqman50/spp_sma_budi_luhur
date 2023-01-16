<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Tunggakan View</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<style>
		td {
			font-size: 16px;
		}
	</style>
</head>
<body>
	<a href="{{ url()->previous() }}">
		<button class="btn btn-primary">
			Kembali
		</button>
	</a>
	<h5 align="center"><b>{{ $title }}</b></h5>
	@foreach ($explode_tahun_ajaran as $key => $value)
	@php
		if ($bulan_awal != '') {
			$sheet_bulan_tahun = $spp_bulan_tahun->getTunggakanBulanTahun($explode_tahun_ajaran[$key],$bulan_range[$key]['bulan_awal'],$bulan_range[$key]['bulan_akhir'],$kelas_siswa_input);
		}
		else {
			$sheet_bulan_tahun = $spp->getTunggakanBulanTahunRange($explode_tahun_ajaran[$key],$tahun_ajaran,$kelas_siswa_input);
		}
	@endphp
		@foreach ($sheet_bulan_tahun as $index => $val)
		@php
	        $kelas = $spp_bulan_tahun->getKelasDistinct($val->bulan_tahun,$kelas_siswa_input,$explode_tahun_ajaran[$key]);
		@endphp
		<hr>
		<h6 align="center">{{ strtoupper($val->bulan_tahun) }}</h6>
		<hr>
			@foreach ($kelas as $no => $data)
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<td colspan="2">{{ $data->kelas }}</td>
					</tr>
					<tr>
						<td>NO.</td>
						<td>NAMA</td>
						@php
							if ($tahun_ajaran != '') {
								$distinct_kolom_spp = $spp_detail->kolomSppTunggakanTahunAjaran($tahun_ajaran,$data->kelas,$val->bulan_tahun);
								$data_siswa_spp 	= $spp_bulan_tahun->getSiswaByTunggakan($val->bulan_tahun,$data->kelas,$tahun_ajaran);
							}
							else {
								$distinct_kolom_spp = $spp_detail->kolomSppTunggakanTahun($explode_tahun_ajaran[$key],$data->kelas,$val->bulan_tahun);
								$data_siswa_spp 	= $spp_bulan_tahun->getSiswaByTunggakan($val->bulan_tahun,$data->kelas,$explode_tahun_ajaran[$key]);
							}
						@endphp
						@foreach ($distinct_kolom_spp as $i => $j)
						<td>{{ strtoupper($kolom_spp->getNamaKolomSpp($j->id_kolom_spp)) }}</td>
						<td>{{ strtoupper('Bulan') }}</td>
						@endforeach
						<td>JUMLAH</td>
					</tr>
				</thead>
				<tbody>
					@php
						$sum = 0;
					@endphp
					@foreach ($data_siswa_spp as $id_siswa => $data_siswa_spp_)
					<tr>
						<td>{{ $id_siswa+1; }}</td>
						<td>{{ $data_siswa_spp_->nama_siswa }}</td>
						@foreach ($distinct_kolom_spp as $k => $z)
						@if ($spp_detail->getTunggakanKolomSpp($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun) == '-')
						<td>{{ $spp_detail->getTunggakanKolomSpp($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun) }}</td>
						@else
						<td>{{ format_rupiah($spp_detail->getTunggakanKolomSpp($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun)) }}</td>
						@endif
						<td>{{ $spp_detail->getTunggakanBulanTahun($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun) }}</td>
						@php
							if ($spp_detail->getTunggakanKolomSpp($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun) != '-') {
								$sum = $sum + $spp_detail->getTunggakanKolomSpp($distinct_kolom_spp[$k]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun);
							}
						@endphp
						@endforeach
						<td>{{ format_rupiah($sum) }}</td>
					</tr>
					@php
						$sum = 0;
					@endphp
					@endforeach
				</tbody>
			</table>
			@endforeach
		@endforeach
	@endforeach
	<hr>
	<h6 align="center">REKAP SPP</h6>
	<hr>
	@php
		$kelas_siswa_rekap = $spp_detail->getTunggakanKelasRekap($kelas_siswa_input);
	@endphp
	@foreach ($kelas_siswa_rekap as $key => $value)
	@php
		$kolom_rekap = $spp_detail->getKolomRekap($value->kelas);
	@endphp
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<td colspan="2">{{ $value->kelas }}</td>
			</tr>
			<tr>
				<td>NO.</td>
				<td>NAMA</td>
				@foreach ($kolom_rekap as $i => $j)
				<td>{{ strtoupper($kolom_spp->getNamaKolomSpp($j->id_kolom_spp)) }}</td>
				<td>{{ strtoupper('Bulan') }}</td>
				@endforeach
				<td>JUMLAH</td>
			</tr>
		</thead>
		<tbody>
			@php
				$data_siswa_rekap = $spp_detail->getSiswaRekap($value->kelas);
				$sum = 0;
			@endphp
			@foreach ($data_siswa_rekap as $id_siswa => $data_siswa_rekap_)
			<tr>
				<td>{{ $id_siswa+1; }}</td>
				<td>{{ $data_siswa_rekap_->nama_siswa }}</td>
				@foreach ($kolom_rekap as $k => $z)
				@if ($spp_detail->getTunggakanNominalRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa) == '-')
				<td>{{ $spp_detail->getTunggakanNominalRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa) }}</td>
				@else
				<td>{{ format_rupiah($spp_detail->getTunggakanNominalRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa)) }}</td>
				@endif
				<td>{{ $spp_detail->getTunggakanBulanRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa) }}</td>
				@php
					if ($spp_detail->getTunggakanNominalRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa) != '-') {
						$sum = $sum + $spp_detail->getTunggakanNominalRekap($kolom_rekap[$k]->id_kolom_spp,$data_siswa_rekap_->id_siswa);
					}
				@endphp
				@endforeach
				<td>{{ format_rupiah($sum) }}</td>
				@php
					$sum = 0;
				@endphp
			</tr>
			@endforeach
		</tbody>
	</table>
	@endforeach
</body>
</html>