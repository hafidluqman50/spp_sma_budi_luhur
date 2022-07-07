@extends('Admin.layout-app.layout')

@section('content')

    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">Keuangan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Laporan Data Siswa</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Laporan Data Siswa</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="alert alert-warning">
                            <li style="color:black;">Untuk Cetak Laporan Harus Pilih Tahun Ajaran atau Pilih Range Bulan Dan Tahun</li>
                        </div>
                        <h4 class="m-t-0 header-title"><b>LAPORAN DATA SISWA</b></h4>
                        <form action="{{ url('/admin/laporan/cetak') }}">
                            <div class="row">
                            	<div class="col-md-4 row">
                                    {{-- <label for="" class="col-4 col-form-label">Tahun Ajaran : </label>
                                    <div class="col-md-8"> --}}
                            		<select name="tahun_ajaran" class="form-control select2">
                            			<option value="" selected disabled>=== Pilih Tahun Ajaran ===</option>
                            			@foreach ($tahun_ajaran as $element)
                            			<option value="{{ $element->tahun_ajaran }}">{{ $element->tahun_ajaran }}</option>
                            			@endforeach
                            		</select>
                                    {{-- </div> --}}
                            	</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <select name="bulan_awal" class="form-control select2">
                                            <option value="" selected disabled>=== Pilih Bulan Laporan ===</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ month(zero_front_number($i)) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- <div class="col-md-4"> --}}
                                            <input type="text" name="tahun_awal" class="form-control datepicker" placeholder="Pilih Tahun Laporan">
                                        {{-- </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <select name="bulan_akhir" class="form-control select2">
                                            <option value="" selected disabled>=== Pilih Bulan Laporan ===</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ month(zero_front_number($i)) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- <div class="col-md-4"> --}}
                                            <input type="text" name="tahun_akhir" class="form-control datepicker" placeholder="Pilih Tahun Laporan">
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <table class="table table-hover datatable table-bordered force-fullwidth">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kelas</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 3; $i++)
                                    @php
                                        $no = $i+1;
                                    @endphp
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $kelas[$i] }}</td>
                                        <td>
                                            <button class="btn btn-success" name="btn_cetak" value="laporan-tunggakan" id-kelas="{{ $kelas[$i] }}">Cetak Laporan</button>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        <input type="hidden" name="kelas_siswa_input">
                        </form>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection

@section('js')
<script>
    $(() => {
        $(".datepicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose:true, //to close picker once year is selected
            orientation: 'bottom'
        });
    })

    $('button[name="btn_cetak"]').click(function() {
        let attr = $(this).attr('id-kelas')
        $(`input[name="kelas_siswa_input"]`).val(attr)
    })
</script>
@endsection
