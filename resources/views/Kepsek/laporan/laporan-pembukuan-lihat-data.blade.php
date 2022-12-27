<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Pembukuan View</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<style>
		td {
			font-size: 12px;
		}
	</style>
</head>
<body>
	<h6 align="center"><b>{{ $title }}</b></h6>
	@foreach ($bulan_tahun_sheets as $key => $value)
	@php
		$explode_created_at = explode(' ',$value->created_at);
		$explode_tanggal    = explode('-',$explode_created_at[0]);
		$title_sheets       = strtoupper(bulan_tahun_excel_numeric($explode_tanggal[1],$explode_tanggal[0]));
		$kolom_spp_bayar    = $spp_bayar_detail->getKolomSppBayar($explode_tanggal[1],$explode_tanggal[0]);
	@endphp
	<hr>
	<h6 align="center">{{ $title_sheets }}</h6>
	<hr>
	<table class="table table-bordered tabl-hover" width="100%">
		<thead>
			<tr>
				<td>No.</td>
				<td>Tanggal Bayar</td>
				<td>Uraian</td>
				<td>Debit</td>
				@foreach ($kolom_spp_bayar as $i => $urai)
				<td>{{ $kolom_spp->getNamaKolomSpp($urai->id_kolom_spp) }}</td>
				@endforeach
				<td>Jumlah</td>
			</tr>
		</thead>
		<tbody>
			@php
				$siswa_bayar = $spp_bayar_data->getSiswaBayar($explode_tanggal[1],$explode_tanggal[0]);
			@endphp
			@foreach ($siswa_bayar as $no => $val)
			<tr>
				<td>{{ $no+1 }}</td>
				<td>{{ date_excel($val->tanggal_bayar) }}</td>
				<td>{{ $val->nama_siswa.' '.$val->keterangan_bayar_spp }}</td>
				<td>{{ format_rupiah($val->nominal_bayar) }}</td>
				@foreach ($kolom_spp_bayar as $j => $kolom)
				<td>{{ format_rupiah($spp_bayar_detail->getNominalBayar($kolom->id_kolom_spp,$val->id_siswa,$val->id_spp_bayar_data)) }}</td>
				@endforeach
				<td>{{ format_rupiah($spp_bayar_detail->sumBayar($val->id_siswa,$val->id_spp_bayar_data)) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endforeach
</body>
</html>