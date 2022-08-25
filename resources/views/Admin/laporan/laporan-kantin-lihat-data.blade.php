<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Kantin View</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<style>
		td {
			font-size: 12px;
		}
	</style>
</head>
<body>
	<h6 align="center"><b>LAPORAN KANTIN {{ strtoupper($kantin_nama) }}</b></h6>
	@for ($i = 1; $i <= $bulan; $i++)
	@php
		$laporan_kantin = $kantin->getLaporanKantin(month(zero_front_number($i)),$tahun,$kantin_nama);
		$sum = 0;
	@endphp
	{{-- <h6><b></b></h6> --}}
	<table class="table table-bordered table-hover" width="100%">
		<thead>
			<tr>
				<td colspan="4"><b>{{ month(zero_front_number($i)) }}</b></td>
			</tr>
			<tr>
				<td>No.</td>
				<td>Nama Siswa</td>
				<td>Nominal</td>
				<td>Keterangan</td>
			</tr>
		</thead>
		<tbody>
			@forelse ($laporan_kantin as $key => $value)
			@php
				if ($value->nominal_spp != $value->sisa_bayar) {
					$sum = $sum + $value->bayar_spp;
				}
			@endphp
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->nama_siswa }}</td>
					@if ($value->nominal_spp == $value->sisa_bayar)
					<td></td>
					<td><b>BELUM</b></td>
					@else
					<td>{{ format_rupiah($value->bayar_spp) }}</td>
					<td><b>SUDAH</b></td>
					@endif
				</tr>
			@empty
				<tr>
					<td colspan="4" align="center">Tidak Ada Data</td>
				</tr>
			@endforelse
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" align="center">Total</td>
				<td>{{ format_rupiah($sum) }}</td>
				<td></td>
			</tr>
		</tfoot>
	</table>
	@endfor
</body>
</html>