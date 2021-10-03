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
                                <li class="breadcrumb-item active"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data SPP</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <form action="{{ url('/admin/spp/save') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box">
                            <div class="button-list" style="margin-bottom:1%;">
                                <a href="{{ url()->previous() }}">
                                    <button class="btn btn-default" type="button">Kembali</button>
                                </a>
                            </div>
                            <h4 class="header-title m-t-0">Tambah Data SPP</h4>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <select name="tahun_ajaran" class="form-control select2" required="required">
                                            <option value="" selected="" disabled="">=== Pilih Tahun Ajaran ===</option>
                                            @foreach ($tahun_ajaran as $value)
                                            <option value="{{ $value->id_tahun_ajaran }}">{{ $value->tahun_ajaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kelas<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <select name="kelas" class="form-control select2" required="required">
                                            <option value="" selected="" disabled="">=== Pilih Kelas ===</option>
                                            @foreach ($kelas as $value)
                                            <option value="{{ $value->id_kelas }}">{{ $value->kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Siswa<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <select name="siswa" class="form-control select2" required="required" disabled="disabled">
                                            <option value="" selected="" disabled="">=== Pilih Siswa ===</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bulan Tahun<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" name="bulan_tahun" class="form-control" readonly="readonly" value="{{ bulan_tahun(date('Y-m-d')) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-8 offset-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            <div class="visible-lg" style="height: 79px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box">
                            <div id="layout-bayar-spp">
                                <div id="bayar-spp" class="bayar-spp">
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label">Kolom Spp<span class="text-danger">*</span></label>
                                        <div class="col-7">
                                            <select name="kolom_spp[]" id="kolom-spp" class="form-control select2 kolom-spp" required="required" kolom-id="1">
                                                <option value="" selected="" disabled="">=== Pilih Kolom Spp ===</option>
                                                @foreach ($kolom_spp as $value)
                                                <option value="{{ $value->id_kolom_spp }}" keterangan="{{ $value->keterangan_kolom }}">{{ $value->nama_kolom_spp }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label">Nominal SPP<span class="text-danger">*</span></label>
                                        <div class="col-7">
                                            <input type="number" name="nominal_spp[]" class="form-control nominal-spp" id="nominal-spp" required="required" placeholder="Isi Nominal SPP" nominal-id="1">
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button class="btn btn-success" type="button" id="tambah-input">Tambah Input</button>
                                    <button class="btn btn-danger form-hide" type="button" id="hapus-input">Hapus Input</button>
                                </div>
                            </div>
                            <div class="visible-lg" style="height: 79px;"></div>
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
        var kolom_attr   = 2;
        var nominal_attr = 2;
        $('#tambah-input').click(() => {
            $('.bayar-spp:last').find('.kolom-spp').select2('destroy')
            let clone = $('#bayar-spp').clone();
            $('#layout-bayar-spp').append(clone)
            $('#kolom-spp').attr('kolom-id',kolom_attr++)
            $('#nominal-spp').attr('nominal-id',nominal_attr++)
            $('.bayar-spp:last').find('input').val('')
            $('.bayar-spp:last').find('input').removeAttr('readonly')
            $('.kolom-spp').select2()
        })

        $('select[name="kelas"]').change(function() {
            let val          = $(this).val();
            let tahun_ajaran = $('select[name="tahun_ajaran"]').val();
            $.ajax({
                url: "{{ url('/ajax/get-siswa/') }}"+`/${val}/${tahun_ajaran}`
            })
            .done(function(done) {
                $('select[name="siswa"]').removeAttr('disabled')
                $('select[name="siswa"]').html(done)
            })
            .fail(function() {
                console.log("error");
            });
        })

        $(document).on('change','.kolom-spp',function(){
            let attr = $(this).attr('kolom-id')
            let val = $('option:selected',this).attr('keterangan')
            console.log(val)
            if (val != '') {
                $(`.nominal-spp[nominal-id="${attr}"]`).val(val)
                $(`.nominal-spp[nominal-id="${attr}"]`).attr('readonly','readonly')
            }
        })
    })
</script>
@endsection
