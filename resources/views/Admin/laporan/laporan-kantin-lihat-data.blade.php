<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Kantin View</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
	<h5 align="center"><b>{{ $kantin_nama }}</b></h5>
	@for ($i = 1; $i <= $bulan; $i++)
	<hr>
	@php
		$laporan_kantin = $kantin->getLaporanKantin(month(zero_front_number($i)),$tahun,$kantin_nama);
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
			@foreach ($laporan_kantin as $key => $value)
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
			@endforeach
		</tbody>
	</table>
	<hr>
	@endfor
</body>
</html>