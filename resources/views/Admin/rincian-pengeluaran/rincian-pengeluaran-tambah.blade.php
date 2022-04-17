@extends('Admin.layout-app.layout-rab')

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
                                <li class="breadcrumb-item active"><a href="#">Data Perincian</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data Perincian</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <form action="{{ url('/admin/data-perincian-rab/save') }}" method="POST">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="button-list" style="margin-bottom:1%;">
                                <a href="{{ url()->previous() }}">
                                    <button class="btn btn-default" type="button">Kembali</button>
                                </a>
                            </div>
                            <h4 class="header-title m-t-0">Tambah Data Perincian</h4>
                                @csrf
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Saldo Awal</label>
                                    <div class="col-7">
                                        <input type="number" name="saldo_awal" class="form-control" placeholder="Isi Saldo Awal" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bulan Laporan</label>
                                    <div class="col-7">
                                        <select name="bulan_laporan" class="form-control select2" required>
                                            <option value="" selected disabled>=== Pilih Bulan Laporan ===</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ month(zero_front_number($i)) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Laporan</label>
                                    <div class="col-7">
                                        <input type="text" name="tahun_laporan" class="form-control" placeholder="Isi Tahun Laporan; Ex: 2022;" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bulan Pengajuan</label>
                                    <div class="col-7">
                                        <select name="bulan_pengajuan" class="form-control select2" required>
                                            <option value="" selected disabled>=== Pilih Bulan Pengajuan ===</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ month(zero_front_number($i)) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Pengajuan</label>
                                    <div class="col-7">
                                        <input type="text" name="tahun_pengajuan" class="form-control" placeholder="Isi Tahun Pengajuan; Ex: 2022;" required>
                                    </div>
                                </div>
                            {{-- <div class="visible-lg" style="height: 79px;"></div> --}}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="layout-input-perincian" id="layout-input-perincian">
                                <div class="input-perincian" id="input-perincian">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Tanggal Perincian</label>
                                                <div>
                                                    <input type="date" name="tanggal_perincian[]" class="form-control" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Nominal Rincian</label>
                                                <div>
                                                    <input type="number" name="nominal_rincian[]" class="form-control" placeholder="Isi Nominal Rincian" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Uraian RAB</label>
                                                <div>
                                                    <input type="text" name="uraian_rab[]" class="form-control" placeholder="Isi Uraian RAB; Ex: PDAM Bulan Mei 2022">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Uraian Rincian</label>
                                                <div>
                                                    <input type="text" name="uraian_rincian[]" class="form-control" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Pendapatan</label>
                                                <div>
                                                    <select name="id_kolom_spp[]" class="form-control selectize pendapatan">
                                                        <option value="" selected disabled>=== Pilih Pendapatan ===</option>
                                                        @foreach ($kolom_spp as $element)
                                                        <option value="{{ $element->id_kolom_spp }}">{{ $element->nama_kolom_spp }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Nominal RAB</label>
                                                <div>
                                                    <input type="number" name="nominal_rab[]" class="form-control" placeholder="Isi Nominal RAB">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Volume Rincian</label>
                                                <div>
                                                    <input type="number" name="volume_rincian[]" class="form-control" placeholder="Isi Volume Rincian" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Nominal Pendapatan</label>
                                                <div>
                                                    <input type="number" name="nominal_pendapatan[]" class="form-control" placeholder="Isi Nominal Pendapatan" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Volume RAB</label>
                                                <div>
                                                    <input type="number" name="volume_rab[]" class="form-control" placeholder="Isi Volume RAB">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success" id="input-act-perincian">Tambah Input</button>
                                <button type="button" class="btn btn-danger form-hide" id="hapus-act-perincian">Hapus Input</button>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                            {{-- <div class="visible-lg" style="height: 79px;"></div> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection

@section('js')
<script>
    $(() => {
        $('#input-act-perincian').click(() => {
            $('.pendapatan').each(function(){
                if ($(this)[0].selectize) { // requires [0] to select the proper object
                    var value = $(this).val(); // store the current value of the select/input
                    $(this)[0].selectize.destroy(); // destroys selectize()
                    $(this).val(value);  // set back the value of the select/input
                }
            })
            $('#input-perincian').clone().appendTo('#layout-input-perincian')
            $('.pendapatan').selectize({
                create:true,
                sortField:'text'
            })

            $('#hapus-act-perincian').removeClass('form-hide')
        })
        $('#hapus-act-perincian').click(() => {
            $('.input-perincian').last().remove()
            if ($('.input-perincian').length == 1) {
                $('#hapus-act-perincian').addClass('form-hide')
            }
        })
    })
</script>
@endsection