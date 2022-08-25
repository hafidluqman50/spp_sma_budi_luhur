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
	<h6 align="center"><b>{{ $title }}</b></h6>
	{{-- @for ($i = 1; $i <= $bulan; $i++) --}}
	@foreach ($get_kelas as $element)
	@php
		$laporan_data_siswa = $kelas_siswa->getByIdKelas($tahun_ajaran,$element->id_kelas);
		$sum                = $kelas_siswa->countByIdKelas($tahun_ajaran,$element->id_kelas);
	@endphp
	{{-- <h6><b></b></h6> --}}
	<table class="table table-bordered table-hover" width="100%">
		<thead>
			<tr>
				<td colspan="8"><b>{{ $element->kelas }}</b></td>
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
			@forelse ($laporan_data_siswa as $key => $value)
			{{-- @php
				if ($value->nominal_spp != $value->sisa_bayar) {
					$sum = $sum + $value->bayar_spp;
				}
			@endphp --}}
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->nisn }}</td>
					<td>{{ $value->nama_siswa }}</td>
					<td>{{ unslug_str($value->jenis_kelamin) }}</td>
					<td>{{ human_date($value->tanggal_lahir) }}</td>
					<td>{{ $value->asal_kelompok }}</td>
					<td>{{ $value->asal_wilayah }}</td>
					<td>{{ unslug_str($value->wilayah) }}</td>
				</tr>
			@empty
				<tr>
					<td colspan="4" align="center">Tidak Ada Data</td>
				</tr>
			@endforelse
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" align="center">Total Siswa : </td>
				<td colspan="6">{{ $sum }}</td>
			</tr>
		</tfoot>
	</table>
	{{-- @endfor --}}
	@endforeach
</body>
</html>