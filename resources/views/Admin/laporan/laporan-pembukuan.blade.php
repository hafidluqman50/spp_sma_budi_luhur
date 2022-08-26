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
                                <li class="breadcrumb-item active"><a href="#">Laporan Pembukuan</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Laporan Pembukuan</h4>
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
                        <h4 class="m-t-0 header-title"><b>LAPORAN PEMBUKUAN</b></h4>
                        <form action="{{ url('/admin/laporan/cetak') }}">
                            <div class="row">
                                <div class="col-md-5 row">
                                    <div class="col-md-12">
                                        {{-- <div class="col-md-4"> --}}
                                            <input type="date" name="tanggal_awal" class="form-control">
                                        {{-- </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-5 row">
                                    <div class="col-md-12">
                                        {{-- <div class="col-md-4"> --}}
                                            <input type="date" name="tanggal_akhir" class="form-control">
                                        {{-- </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary" name="btn_cetak" value="laporan-pembukuan">Cetak</button>
                                    <button class="btn btn-info info-pembukuan" type="button">Lihat Data</button>
                                </div>
                            </div>
                            <hr>
                        {{-- <input type="hidden" name="kelas_siswa_input"> --}}
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
            // format: "yyyy",
            // viewMode: "years", 
            // minViewMode: "years",
            autoclose:true, //to close picker once year is selected
            orientation: 'bottom'
        });
    })

    $('button[name="btn_cetak"]').click(function() {
        let attr = $(this).attr('id-kelas')
        $(`input[name="kelas_siswa_input"]`).val(attr)
    })
    $('.info-pembukuan').click(function(){
        let tanggal_dari   = $('input[name="tanggal_awal"]').val()
        let tanggal_sampai = $('input[name="tanggal_akhir"]').val()
        let url            = `${base_url}/admin/laporan-pembukuan/lihat-data?tanggal_awal=${tanggal_dari}&tanggal_akhir=${tanggal_sampai}`
        
        window.open(url,'_blank')
    })
</script>
@endsection
