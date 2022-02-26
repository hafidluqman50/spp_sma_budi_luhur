@extends('Kepsek.layout-app.layout')

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
                        <h4 class="m-t-0 header-title"><b>LAPORAN DATA SISWA</b></h4>
                        <form action="{{ url('/kepsek/laporan/cetak') }}">
                            <div class="row">
                            	<div class="col-md-6 offset-md-3">
                            		<select name="tahun_ajaran" class="form-control select2" required>
                            			<option value="" selected disabled>=== Pilih Tahun Ajaran ===</option>
                            			@foreach ($tahun_ajaran as $element)
                            			<option value="{{ $element->tahun_ajaran }}">{{ $element->tahun_ajaran }}</option>
                            			@endforeach
                            		</select>
                            	</div>
                            </div>
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
                                		<td>{{ $no }}</td>
                                		<td>{{ $kelas[$i] }}</td>
                                		<td>
                                            <button class="btn btn-success" name="btn_cetak" value="laporan-data-siswa" id-kelas="{{ $kelas[$i] }}">Cetak Laporan</button>
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
    // $(() => {
    //     $("#datepicker").datepicker({
    //         format: "yyyy",
    //         viewMode: "years", 
    //         minViewMode: "years",
    //         autoclose:true, //to close picker once year is selected
    //         orientation: 'bottom'
    //     });
    // })

    $('button[name="btn_cetak"]').click(function() {
        let attr = $(this).attr('id-kelas')
        $(`input[name="kelas_siswa_input"]`).val(attr)
    })
</script>
@endsection
