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
            <form action="{{ url('/admin/spp/bulan-tahun/'.$id.'/update/'.$id_bulan_tahun) }}" method="POST">
                @csrf
                @method('PUT')
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
                                        <input type="text" class="form-control" value="{{$row->tahun_ajaran}}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kelas<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="{{$row->kelas}}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Siswa<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="{{ $row->nisn.' | '.$row->nama_siswa }}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bulan Tahun<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" name="bulan_tahun" class="form-control" readonly="readonly" value="{{ $row->bulan_tahun }}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kantin<span class="text-danger">*</span></label>
                                    <div class="col-7">
                                        <input type="text" name="kantin" class="form-control" readonly="readonly" value="{{ $row->nama_kantin }}" disabled="disabled">
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
                                <span class="text-danger">Hanya Bisa Edit Pada Kolom SPP Yang Belum Dibayar</span>
                                @foreach ($row_kolom_spp as $key => $element)
                                @php
                                    $no = $key+1
                                @endphp
                                <div id="bayar-spp" class="bayar-spp" id-spp="{{$no}}">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Kolom Spp<span class="text-danger">*</span></label>
                                                <div class="col-7">
                                                    <select name="kolom_spp[]" id="kolom-spp" class="form-control selectize kolom-spp" required="required" kolom-id="{{ $no }}">
                                                        <option value="" selected disabled>=== Pilih Kolom Spp ===</option>
                                                        @foreach ($kolom_spp as $value)
                                                        <option value="{{ $value->id_kolom_spp }}" {!!$value->id_kolom_spp == $element->id_kolom_spp ? 'selected="selected"' : '' !!}>{{ $value->nama_kolom_spp }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Nominal SPP<span class="text-danger">*</span></label>
                                                <div class="col-7">
                                                    <input type="number" name="nominal_spp[]" class="form-control nominal-spp" id="nominal-spp" required="required" placeholder="Isi Nominal SPP" value="{{ $element->nominal_spp }}" nominal-id="{{ $no }}">
                                                    <label class="label-nominal-spp" nominal-id="{{ $no }}"><b>{{ format_rupiah($element->nominal_spp) }}</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            @if ($no > 1)
                                                <button class="btn btn-danger hapus-input" type="button" id="hapus-input" btn-id="{{ $no }}"><span class="dripicons-trash"></span></button>
                                            @else
                                                <button class="btn btn-danger hapus-input form-hide" type="button" id="hapus-input" btn-id="{{ $no }}"><span class="dripicons-trash"></span></button>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                @endforeach
                                <div id="bayar-spp-hide" class="bayar-spp-hide form-hide" id-spp="1">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Kolom Spp<span class="text-danger">*</span></label>
                                                <div class="col-7">
                                                    <select id="kolom-spp-hide" class="form-control selectize kolom-spp-hide"kolom-id="1">
                                                        <option value="" selected disabled>=== Pilih Kolom Spp ===</option>
                                                        @foreach ($kolom_spp as $value)
                                                        <option value="{{ $value->id_kolom_spp }}">{{ $value->nama_kolom_spp }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Nominal SPP<span class="text-danger">*</span></label>
                                                <div class="col-7">
                                                    <input type="number" class="form-control nominal-spp-hide" id="nominal-spp-hide" placeholder="Isi Nominal SPP" nominal-id="1">
                                                    <label for="" class="label-nominal-spp-hide" nominal-id="1"><b>Rp 0,00</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger hapus-input-hide form-hide" type="button" id="hapus-input-hide" btn-id="1"><span class="dripicons-trash"></span></button>
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
        $('#tambah-input').click(() => {
            if ($('.bayar-spp').length != 0) {
                var kolom_attr    = parseInt($('.bayar-spp:last').find('select[name="kolom_spp[]"]').attr('kolom-id')) + 1;
                var nominal_attr  = parseInt($('.bayar-spp:last').find('input[name="nominal_spp[]"]').attr('nominal-id')) + 1;
                var nominal_label = parseInt($('.bayar-spp:last').find('.label-nominal-spp').attr('nominal-id')) + 1;
                var btn_id        = parseInt($('.bayar-spp:last').find('.hapus-input').attr('btn-id')) + 1;
                var id_spp        = parseInt($('.bayar-spp:last').attr('id-spp')) + 1;
                // $('#hapus-input').removeClass('form-hide')
                $('.kolom-spp').each(function(){
                    if ($(this)[0].selectize) { // requires [0] to select the proper object
                        var value = $(this).val(); // store the current value of the select/input
                        $(this)[0].selectize.destroy(); // destroys selectize()
                        $(this).val(value);  // set back the value of the select/input
                        // $(this).find('option').removeAttr('selected')
                    }
                })
                let clone = $('#bayar-spp').clone();
                $('#layout-bayar-spp').append(clone)
                $('.kolom-spp:last').attr('kolom-id',kolom_attr++)
                $('.nominal-spp:last').attr('nominal-id',nominal_attr++)
                $('.label-nominal-spp:last').attr('nominal-id',nominal_label++)
                $('.label-nominal-spp:last').html(`<b>${rupiah_format(0)}</b>`)
                $('.bayar-spp:last').attr('id-spp',id_spp++)
                $('.bayar-spp:last').find('input').val('')
                $('.bayar-spp:last').find('input').removeAttr('readonly')
                // $(`.hapus-input[btn-id="${btn_id-1}"]`).removeClass('form-hide')
                $('.hapus-input:last').attr('btn-id',btn_id++)
                $('.hapus-input:last').removeClass('form-hide')
                $('.kolom-spp').selectize({
                    create:true,
                    sortField:'text'
                })
                // $('.kolom-spp:last').find('option[value=""]').attr('selected')
                if ($('.hapus-input:last').hasClass('form-hide')) {
                    $('.hapus-input:last').removeClass('form-hide')
                }
            }
            else {
                var kolom_attr    = parseInt($('.bayar-spp-hide:last').find('.kolom-spp-hide').attr('kolom-id')) + 1;
                var nominal_attr  = parseInt($('.bayar-spp-hide:last').find('.nominal-spp-hide').attr('nominal-id')) + 1;
                var nominal_label = parseInt($('.bayar-spp-hide:last').find('.label-nominal-spp-hide').attr('nominal-id')) + 1;
                var btn_id        = parseInt($('.bayar-spp-hide:last').find('.hapus-input-hide').attr('btn-id')) + 1;
                var id_spp        = parseInt($('.bayar-spp-hide:last').attr('id-spp')) + 1;
                // $('#hapus-input').removeClass('form-hide')
                $('.kolom-spp-hide').each(function(){
                    if ($(this)[0].selectize) { // requires [0] to select the proper object
                        var value = $(this).val(); // store the current value of the select/input
                        $(this)[0].selectize.destroy(); // destroys selectize()
                        $(this).val(value);  // set back the value of the select/input
                        // $(this).find('option').removeAttr('selected')
                    }
                })
                let clone = $('#bayar-spp-hide').clone();
                $('#layout-bayar-spp').append(clone)
                $('.kolom-spp-hide:last').attr('kolom-id',kolom_attr++)
                $('.nominal-spp-hide:last').attr('nominal-id',nominal_attr++)
                $('.label-nominal-spp-hide:last').attr('nominal-id',nominal_label++)
                $('.label-nominal-spp-hide:last').html(`<b>${rupiah_format(0)}</b>`)
                $('.bayar-spp-hide:last').attr('id-spp',id_spp++)
                $('.bayar-spp-hide:last').find('input').val('')
                $('.bayar-spp-hide:last').find('input').removeAttr('readonly')
                $('.bayar-spp-hide:last').removeClass('form-hide')
                // $(`.hapus-input[btn-id="${btn_id-1}"]`).removeClass('form-hide')
                $('.hapus-input-hide:last').attr('btn-id',btn_id++)
                $('.hapus-input-hide:last').removeClass('form-hide')
                $('.nominal-spp-hide:last').attr('name','nominal_spp_hide[]')
                $('.kolom-spp-hide:last').attr('name','kolom_spp_hide[]')
                $('.nominal-spp-hide:last').attr('required','required')
                $('.kolom-spp-hide:last').attr('required','required')
                $('.kolom-spp-hide').selectize({
                    create:true,
                    sortField:'text'
                })
                // $('.kolom-spp:last').find('option[value=""]').attr('selected')
                if ($('.hapus-input-hide:last').hasClass('form-hide')) {
                    $('.hapus-input-hide:last').removeClass('form-hide')
                }

                // let clone = $('#bayar-spp-hide').clone();
                // $('#layout-bayar-spp').append(clone)
                // $('#kolom-spp-hide').attr('kolom-id',kolom_attr++)
                // $('#nominal-spp-hide').attr('nominal-id',nominal_attr++)
                // $('.bayar-spp-hide:last').find('input').val('')
                // $('.bayar-spp-hide:last').find('input').removeAttr('readonly')
                // $('.kolom-spp-hide').selectize({
                //     create:true,
                //     sortField:'text'
                // })
                // $('.hapus-input-hide:last').removeClass('form-hide')
            }
        })

        // $('#hapus-input').click(function() {
        //     $('.bayar-spp').last().remove()
        // })

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

        $(document).on('keyup','input[name="nominal_spp_hide[]"]',function(){
            var val  = $(this).val()
            var attr = $(this).attr('nominal-id')
            if (val == '') {
                $(`.label-nominal-spp-hide[nominal-id="${attr}"]`).html(`<b>${rupiah_format(0)}</b>`)
            }
            else {
                $(`.label-nominal-spp-hide[nominal-id="${attr}"]`).html(`<b>${rupiah_format(val)}</b>`)   
            }
        })

        $(document).on('click','.hapus-input',function() {
            let attr = $(this).attr('btn-id')
            console.log(attr)
            $(`.bayar-spp[id-spp="${attr}"]`).remove()
        })

        $(document).on('click','.hapus-input-hide',function() {
            let attr = $(this).attr('btn-id')
            console.log(attr)
            $(`.bayar-spp-hide[id-spp="${attr}"]`).remove()
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
