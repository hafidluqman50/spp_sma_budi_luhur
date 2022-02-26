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
                                <li class="breadcrumb-item active"><a href="#">Data SPP</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Data SPP</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <form action="{{ url('/petugas/spp/bulan-tahun/'.$id.'/update/'.$id_bulan_tahun) }}" method="POST">
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
                                                        <option value="" selected="" disabled="">=== Pilih Kolom Spp ===</option>
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
                                                    <label for="" class="label-nominal-spp" nominal-id="{{ $no }}"><b>{{ format_rupiah($element->nominal_spp) }}</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            @if ($no > 1)
                                                <button class="btn btn-danger hapus-input" type="button" id="hapus-input" btn-id="{{ $no }}"><span class="dripicons-trash"></span></button>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                @endforeach
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
        
        var kolom_attr   = 2;
        var nominal_attr = 2;
        $('#tambah-input').click(() => {
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
            $('.bayar-spp:last').find('input').val('')
            $('.bayar-spp:last').find('input').removeAttr('readonly')
            $('.kolom-spp').selectize({
                create:true,
                sortField:'text'
            })
        })

        // $('#hapus-input').click(function() {
        //     $('.bayar-spp').last().remove()
        // })

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

        $('input[name="nominal_spp[]"]').keyup(function(){
            var val  = $(this).val()
            var attr = $(this).attr('nominal-id')
            if (val == '') {
                $(`.label-nominal-spp[nominal-id="${attr}"]`).html(`<b>${rupiah_format(0)}</b>`)
            }
            else {
                $(`.label-nominal-spp[nominal-id="${attr}"]`).html(`<b>${rupiah_format(val)}</b>`)   
            }
        })

        $(document).on('click','.hapus-input',function() {
            let attr = $(this).attr('btn-id')
            console.log(attr)
            $(`.bayar-spp[id-spp="${attr}"]`).remove()
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
