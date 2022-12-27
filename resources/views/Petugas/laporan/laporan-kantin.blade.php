@extends('Petugas.layout-app.layout')

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
                                <li class="breadcrumb-item active"><a href="#">Laporan Kantin</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Laporan Kantin</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>LAPORAN KANTIN</b></h4>
                        <form action="{{ url('/petugas/laporan/cetak') }}">
                            <div class="row">
                                <div class="col-md-4 offset-md-2">
                                    <select name="bulan_laporan" class="form-control select2" required>
                                        <option value="" selected disabled>=== Pilih Bulan Laporan ===</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ month(zero_front_number($i)) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="tahun_laporan" class="form-control" id="datepicker" required>
                                </div>
                            </div>
                            <table class="table table-hover table-bordered laporan-kantin force-fullwidth">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kantin</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <input type="hidden" name="kantin_nama">
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
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose:true, //to close picker once year is selected
            orientation: 'bottom'
        });
    })

    $(document).on('click','button[name="btn_cetak"]',function() {
        let attr = $(this).attr('id-kantin')
        $(`input[name="kantin_nama"]`).val(attr)
    })

    $(document).on('click','.info-kantin',function(){
        // alert('sip')
        let attr  = $(this).attr('id-kantin')
        let bulan = $('select[name="bulan_laporan"]').val()
        let tahun = $('input[name="tahun_laporan"]').val()
        let url   = `${base_url}/petugas/laporan-kantin/lihat-data?id_kantin=${attr}&bulan=${bulan}&tahun=${tahun}`

        window.open(url,'_blank')
    })
</script>
@endsection
