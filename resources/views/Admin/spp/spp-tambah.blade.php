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
                                    <label class="col-4 col-form-label">Bulan<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <select name="bulan_spp" class="form-control select2" required="required">
                                            <option value="" selected="" disabled="">=== Pilih Bulan ===</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ month($i) }}">{{ month($i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="number" name="tahun_spp" class="form-control" required="required" placeholder="Isi Tahun; Ex: 2017;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kantin</label>
                                    <div class="col-7">
                                        <select name="kantin" class="form-control select2" required>
                                            <option value="" selected disabled>=== Pilih Kantin ===</option>
                                            @foreach ($kantin as $element)
                                            <option value="{{ $element->id_kantin }}">{{ $element->nama_kantin }}</option>
                                            @endforeach
                                        </select>
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
                                <div id="bayar-spp" class="bayar-spp" id-spp="1">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Kolom Spp<span class="text-danger">*</span></label>
                                                <div class="col-7">
                                                    <select name="kolom_spp[]" id="kolom-spp" class="form-control selectize kolom-spp" required="required" kolom-id="1">
                                                        <option value="" selected="" disabled="">== Pilih Kolom Spp ==</option>
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
                                                    <label for="" class="label-nominal-spp" id="label-nominal-spp" nominal-id="1"><b>Rp. 0,00</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger form-hide hapus-input" type="button" id="hapus-input" btn-id="1"><span class="dripicons-trash"></span></button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button class="btn btn-success" type="button" id="tambah-input">Tambah Input</button>
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
        $('body').on('keydown','input,select,textarea',function(e){
            var self = $(this),
                form = self.parents('form:eq(0)'),
                focusable,
                next
                ;
            if (e.keyCode == 13) {
                focusable = form.find('input,a,select,button,textarea').filter(':visible');
                console.log(focusable);
                next = focusable.eq(focusable.index(this)+1);
                if (next.length) {
                    next.focus();
                }
                else {
                    next.submit();
                }
                return false;
            }
        });

        var kolom_attr    = 2;
        var nominal_attr  = 2;
        var nominal_label = 2;
        var btn_id        = 2;
        var id_spp        = 2;

        $('#tambah-input').click(() => {
            // $('#hapus-input').removeClass('form-hide')
            $('.kolom-spp').each(function(){
                if ($(this)[0].selectize) { // requires [0] to select the proper object
                    var value = $(this).val(); // store the current value of the select/input
                    $(this)[0].selectize.destroy(); // destroys selectize()
                    $(this).val(value);  // set back the value of the select/input
                }
            })
            let clone = $('#bayar-spp').clone();
            $('#layout-bayar-spp').append(clone)
            $('#kolom-spp').attr('kolom-id',kolom_attr++)
            $('#nominal-spp').attr('nominal-id',nominal_attr++)
            $('#label-nominal-spp').attr('nominal-id',nominal_label++)
            $('.label-nominal-spp:last').html(`<b>${rupiah_format(0)}</b>`)
            $('#bayar-spp').attr('id-spp',id_spp++)
            $('.bayar-spp:last').find('input').val('')
            $('.bayar-spp:last').find('input').removeAttr('readonly')
            // $(`.hapus-input[btn-id="${btn_id-1}"]`).removeClass('form-hide')
            $('#hapus-input').attr('btn-id',btn_id++)
            $('.hapus-input:last').removeClass('form-hide')
            $('.kolom-spp').selectize({
                create:true,
                sortField:'text'
            })
        })

        $(document).on('click','.hapus-input',function() {
            let attr = $(this).attr('btn-id')
            $(`.bayar-spp[id-spp="${attr}"]`).remove()
        })

        $('#hapus-input').click(function() {
            $('.bayar-spp').last().remove()
            if ($('.bayar-spp').length == 1) {
                $(this).addClass('form-hide')
            }
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

        $(document).on('keyup','input[name="nominal_spp[]"]',function(){
            var val  = $(this).val()
            var attr = $(this).attr('nominal-id')
            if (val == '') {
                $(`.label-nominal-spp[nominal-id="${attr}"]`).html(`<b>${rupiah_format(0)}</b>`)
            }
            else {
                $(`.label-nominal-spp[nominal-id="${attr}"]`).html(`<b>${rupiah_format(val)}</b>`)   
            }
        })

        // $(document).on('change','.kolom-spp',function(){
        //     let attr = $(this).attr('kolom-id')
        //     let val = $('option:selected',this).attr('keterangan')
        //     console.log(val)
        //     if (val != '') {
        //         $(`.nominal-spp[nominal-id="${attr}"]`).val(val)
        //         $(`.nominal-spp[nominal-id="${attr}"]`).attr('readonly','readonly')
        //     }
        // })
    })
</script>
@endsection
