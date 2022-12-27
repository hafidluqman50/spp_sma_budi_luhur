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
                                <li class="breadcrumb-item active"><a href="#">Data Rincian Pengeluaran</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Rincian Pembelanjaan Uang Makan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Edit Rincian Pembelanjaan Uang Makan</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="button-list" style="margin-bottom:1%;">
                            <a href="{{ url()->previous() }}">
                                <button class="btn btn-default">Kembali</button>
                            </a>
                        </div>
                        <h4 class="header-title m-t-0">Edit Data</h4>
                    </div>
                    <form action="{{ url('/admin/data-perincian-rab/rincian-pembelanjaan-uang-makan/'.$id.'/update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-box">
                            <div class="form-group">
                                <label for="" class="col-form-label">Tanggal Setor Uang Makan</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="date" name="tanggal_setor_dapur" class="form-control" value="{{ $tanggal_setor_dapur }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="input-kategori-rincian-layout">
                            @php
                                $no__ = 0;
                            @endphp
                            @foreach ($kategori_group as $key => $value)
                            @php
                                $no = $key+1;
                            @endphp
                            <div class="card-box input-kategori-rincian" id="input-kategori-rincian" id-input-kategori="{{ $no }}">
                                <div class="form-group">
                                    <label class="col-form-label">Kategori Rincian</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control kategori-rincian" value="{{ $value->kategori_rincian_pembelanjaan }}" placeholder="Isi Kategori Rincian; Ex: Belanja Pegawai" id-kategori-rincian="{{ $no }}">
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-danger btn-delete-kategori-rincian" type="button" id-delete-kategori="{{ $no }}">X</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="input-rincian" id="input-rincian" id-layout-input-rincian="{{ $no }}">
                                    @php
                                        $get_rincian_pembelanjaan = $rincian_pembelanjaan->getRincianByKategori($value->kategori_rincian_pembelanjaan,'uang-makan');
                                    @endphp
                                    @foreach ($get_rincian_pembelanjaan as $index => $val)
                                    @php
                                        $no__ = $no__+1;
                                    @endphp
                                    <div class="input-rincian-layout row" id="input-rincian-layout" id-layout-rincian="{{ $no__ }}" id-layout-input-rincian="{{ $no }}">
                                        <input type="hidden" name="kategori_rincian[]" value="{{ $value->kategori_rincian_pembelanjaan }}">
                                        <div class="col-md-10 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Rincian</label>
                                                    <select name="rincian_uang_makan[]" class="form-control rincian selectize" id-rincian="{{ $no__ }}">
                                                        <option value="" selected disabled>=== Pilih Rincian ===</option>
                                                        @foreach ($rincian_pengeluaran_detail as $data)
                                                        <option value="{{ $data->id_rincian_pengeluaran_uang_makan }}" {!!$val->id_rincian_pengeluaran_uang_makan == $data->id_rincian_pengeluaran_uang_makan ? 'selected="selected"' : ''!!}>{{ $data->uraian_rincian }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Volume</label>
                                                    <input type="text" class="volume form-control" value="{{ $val->volume_rincian }}" id-volume="{{ $no__ }}" readonly>
                                                </div>  
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">SPP</label>
                                                    <input type="text" class="spp form-control" id-spp="1" readonly>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Uang Masuk</label>
                                                    <input type="text" class="uang-masuk form-control" id-uang-masuk="1" readonly>
                                                    <label for="" class="uang-masuk-label" id="uang-masuk-label" id-uang-masuk-label="1">Rp. 0,00</label>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Nominal Rincian</label>
                                                    <input type="text" class="uang-keluar form-control" value="{{ $val->nominal_rincian }}" id-uang-keluar="{{ $no__ }}" readonly>
                                                    <label for="" class="uang-keluar-label" id="uang-keluar-label" id-uang-keluar-label="{{ $no__ }}">{{ format_rupiah($val->nominal_rincian) }}</label>
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Keterangan</label>
                                                    <input type="text" name="keterangan_pembelanjaan[]" value="{{ $val->keterangan_pembelanjaan }}" class="form-control keterangan-pembelanjaan">
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button class="btn btn-danger btn-delete-rincian" type="button" style="margin-top:19%;" id-delete-rincian="{{ $no__ }}">X</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_rincian_pembelanjaan[]" value="{{ $val->id_rincian_pembelanjaan }}">
                                    @endforeach
                                </div>
                                <button class="btn btn-success tambah-input-rincian" type="button" id-act="{{ $no }}">Tambah Input Rincian</button>
                                <hr>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-box">
                            <button class="btn btn-primary tambah-input" type="button">Tambah Input</button>
                        </div>
                        <div class="card-box">
                            @php
                                $explode_tahun_ajaran = explode('/', $tahun_ajaran);
                                $no = 0;
                            @endphp
                            @foreach ($explode_tahun_ajaran as $key => $value)
                            @for ($i = 0; $i < count($bulan[$key]); $i++)
                            @php
                                $no = $no+1;
                                $get_rincian_tahun_ajaran = $rincian_tahun_ajaran->getRincian($id,$bulan[$key][$i],$value);
                            @endphp
                            <h5>{{ month($bulan[$key][$i]).' '.$value }}</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Pemasukan</label>
                                        <input type="number" name="pemasukan[]" class="form-control pemasukan" value="{{ $get_rincian_tahun_ajaran->pemasukan }}" required placeholder="Isi Pemasukan" id-pemasukan="{{ $no }}">
                                        <label for="" class="pemasukan-label" id-pemasukan-label="{{ $no }}">{{ format_rupiah($get_rincian_tahun_ajaran->pemasukan) }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Realisasi Pengeluaran</label>
                                        <input type="number" name="realisasi_pengeluaran_bulan[]" class="form-control realisasi-pengeluaran-bulan" value="{{ $get_rincian_tahun_ajaran->realisasi_pengeluaran }}" required placeholder="Isi Realisasi Pengeluaran" id-realisasi-pengeluaran-bulan="{{ $no }}">
                                        <label for="" class="realisasi-pengeluaran-bulan-label" id-realisasi-pengeluaran-bulan-label="{{ $no }}">{{ format_rupiah($get_rincian_tahun_ajaran->realisasi_pengeluaran) }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Sisa Akhir Bulan</label>
                                        <input type="number" name="sisa_akhir_bulan[]" value="{{ $get_rincian_tahun_ajaran->sisa_akhir_bulan }}" class="form-control sisa-akhir-bulan" required placeholder="Isi Sisa Akhir Bulan" id-sisa-akhir-bulan="{{ $no }}">
                                        <label for="" class="sisa-akhir-bulan-label" id-sisa-akhir-bulan-label="{{ $no }}">{{ format_rupiah($get_rincian_tahun_ajaran->sisa_akhir_bulan) }}</label>
                                    </div>
                                </div>
                                <input type="hidden" name="bulan_rincian[]" value="{{ $bulan[$key][$i] }}">
                                <input type="hidden" name="tahun_rincian[]" value="{{ $value }}">
                                <input type="hidden" name="id_rincian_pembelanjaan_tahun_ajaran[]" value="{{ $get_rincian_tahun_ajaran->id_rincian_pembelanjaan_tahun_ajaran }}">
                            </div>
                            <hr>
                            @endfor
                            @endforeach
                        </div>
                        <div class="card-box">
                            <button class="btn btn-warning">Edit Data</button>
                        </div>
                        <input type="hidden" name="jenis_rincian" value="uang-makan">
                    </form>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection

@section('js')
<script>
    $(() => {
        var get_id_input_kategori_rincian = parseInt($('.input-kategori-rincian:last').attr('id-input-kategori'));

        var input_kategori_rincian        = parseInt($('.input-kategori-rincian:last').attr('id-input-kategori'))+1;

        var hapus_input_kategori_rincian  = get_id_input_kategori_rincian;

        var btn_delete_rincian            = parseInt($('.btn-delete-rincian:last').attr('id-delete-rincian'))+1;

        var id_layout_rincian             = parseInt($(`.input-rincian-layout[id-layout-input-rincian="${get_id_input_kategori_rincian}"]:last`).attr('id-layout-rincian'))+1;

        var id_rincian                    = parseInt($(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('select.rincian:last').attr('id-rincian'))+1;
        
        var id_volume                     = parseInt($(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('.volume:last').attr('id-volume'))+1;
        
        var id_spp                        = parseInt($(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('.spp:last').attr('id-spp'))+1;

        var id_uang_masuk                 = parseInt($(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('.uang-masuk:last').attr('id-uang-masuk'))+1;

        var id_uang_keluar                = $(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('.uang-keluar:last').attr('id-uang-keluar');

        var id_uang_masuk_label           = parseInt($(`.input-rincian[id-layout-input-rincian="${get_id_input_kategori_rincian}"]`).find('.uang-masuk-label:last').attr('id-uang-masuk-label'))+1;

        var id_uang_keluar_label          = parseInt($(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-keluar-label:last').attr('id-uang-keluar-label'))+1;

        $('.tambah-input').click(() => {
            $('.rincian').each(function(){
                if ($(this)[0].selectize) {
                    var value = $(this).val();
                    $(this)[0].selectize.destroy();
                    $(this).val(value);
                }
            })
            $('#input-kategori-rincian').clone().appendTo('#input-kategori-rincian-layout')
            $('.input-kategori-rincian:last').attr('id-input-kategori',input_kategori_rincian)
            $('.input-kategori-rincian:last').find('.kategori-rincian:last').attr('id-kategori-rincian',input_kategori_rincian)
            $('.input-kategori-rincian:last').find('.kategori-rincian:last').val('')
            $('.input-rincian:last').attr('id-layout-input-rincian',input_kategori_rincian)
            $('.input-rincian-layout:last').attr('id-layout-input-rincian',input_kategori_rincian)
            $('.tambah-input-rincian:last').attr('id-act',input_kategori_rincian)
            $('.rincian').selectize({
                create:true,
                sortField:'text'
            })

            $('select.rincian').each(function(index,element){
                console.log(index)
                let attr = $(this).attr('id-rincian')
                $('.selectize-control').eq(index).attr('id-rincian',attr)
            })

            $('.btn-delete-kategori-rincian:last').removeClass('form-hide')
            $('.btn-delete-kategori-rincian:last').attr('id-delete-kategori',input_kategori_rincian)
            
            $(`.input-kategori-rincian[id-input-kategori="${input_kategori_rincian}"]`).find(`.input-rincian-layout[id-layout-input-rincian="${hapus_input_kategori_rincian}"]`).remove();

            $('.btn-delete-rincian:last').attr('id-delete-rincian',btn_delete_rincian++)

            if (!$('.btn-delete-rincian:last').hasClass('form-hide')) {
                $('.btn-delete-rincian:last').addClass('form-hide')
            }
            
            $(`.input-rincian-layout[id-layout-input-rincian="${input_kategori_rincian}"]:last`).attr('id-layout-rincian',id_layout_rincian++)
             $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('select.rincian:last').attr('id-rincian',id_rincian++)
             $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('select.rincian:last')[0].selectize.clear()
            
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.spp:last').attr('id-spp',id_spp++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.spp:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.volume:last').attr('id-volume',id_volume++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.volume:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-masuk:last').attr('id-uang-masuk',id_uang_masuk++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-masuk:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-masuk-label:last').attr('id-uang-masuk-label',id_uang_masuk_label++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-masuk-label:last').html(rupiah_format(0))
            
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-keluar:last').attr('id-uang-keluar',id_uang_keluar++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-keluar:last').val('')

            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-keluar-label:last').attr('id-uang-keluar-label',id_uang_keluar_label++)
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.uang-keluar-label:last').html(rupiah_format(0))

            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('.keterangan-pembelanjaan:last').val('')
            $(`.input-rincian[id-layout-input-rincian="${input_kategori_rincian}"]`).find('input[name="id_rincian_pembelanjaan[]"]').val('')

            $('select.rincian:last')[0].selectize.clear()
            input_kategori_rincian++
            hapus_input_kategori_rincian++
        })

        $(document).on('click','.tambah-input-rincian',function() {
            let attr = $(this).attr('id-act')
            $('.rincian').each(function(){
                if ($(this)[0].selectize) {
                    var value = $(this).val();
                    $(this)[0].selectize.destroy();
                    $(this).val(value);
                }
            })
            $(`.input-rincian-layout[id-layout-input-rincian="${attr}"]:last`).clone().appendTo(`.input-rincian[id-layout-input-rincian="${attr}"]`)
            $(`.input-rincian-layout[id-layout-input-rincian="${attr}"]:last`).attr('id-layout-rincian',id_layout_rincian++)
            $('.rincian').selectize({
                create:true,
                sortField:'text'
            })
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.btn-delete-rincian:last').removeClass('form-hide')
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.btn-delete-rincian:last').attr('id-delete-rincian',btn_delete_rincian++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('select.rincian:last').attr('id-rincian',id_rincian++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('select.rincian:last')[0].selectize.clear()
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.spp:last').attr('id-spp',id_spp++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.spp:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.volume:last').attr('id-volume',id_volume++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.volume:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-masuk:last').attr('id-uang-masuk',id_uang_masuk++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-masuk:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-masuk-label:last').attr('id-uang-masuk-label',id_uang_masuk_label++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-masuk-label:last').html(rupiah_format(0))
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-keluar:last').attr('id-uang-keluar',id_uang_keluar++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-keluar:last').val('')

            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-keluar-label:last').attr('id-uang-keluar-label',id_uang_keluar_label++)
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.uang-keluar-label:last').html(rupiah_format(0))

            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('.keterangan-pembelanjaan:last').val('')
            
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('input[name="id_rincian_pembelanjaan[]"]').val('')
        })

        $(document).on('keyup','.kategori-rincian',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-kategori-rincian')
            $(`.input-rincian[id-layout-input-rincian="${attr}"]`).find('input[name="kategori_rincian[]"]').val(val)
        })

        $(document).on('change','select[name="rincian[]"]',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-rincian')
            if (val != '') {
                $.ajax({
                    url: "{{ url('/ajax/get-rincian') }}",
                    data: {id_rincian: val},
                })
                .done(function(done) {
                    $(`.spp[id-spp="${attr}"]`).val(done.spp)
                    $(`.volume[id-volume="${attr}"]`).val(done.volume)
                    $(`.uang-masuk[id-uang-masuk="${attr}"`).val(done.uang_masuk)
                    $(`.uang-masuk-label[id-uang-masuk-label="${attr}"`).html(rupiah_format(done.uang_masuk))
                    $(`.uang-keluar[id-uang-keluar="${attr}"`).val(done.uang_keluar)
                    $(`.uang-keluar-label[id-uang-keluar-label="${attr}"`).html(rupiah_format(done.uang_keluar))
                })
                .fail(function(fail) {

                });
            }
        })

        $(document).on('keyup','.pemasukan',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-pemasukan')

            if (val == '') {
                $(`.pemasukan-label[id-pemasukan-label="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.pemasukan-label[id-pemasukan-label="${attr}"]`).html(rupiah_format(val))   
            }
        })

        $(document).on('keyup','.penerimaan-bulan-ini',function(){
            let val  = $(this).val()

            if (val == '') {
                $(`.penerimaan-bulan-ini-label`).html(rupiah_format(0))
            }
            else {
                $(`.penerimaan-bulan-ini-label`).html(rupiah_format(val))   
            }
        })

        $(document).on('keyup','.realisasi-pengeluaran-bulan',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-realisasi-pengeluaran-bulan')

            if (val == '') {
                $(`.realisasi-pengeluaran-bulan-label[id-realisasi-pengeluaran-bulan-label="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.realisasi-pengeluaran-bulan-label[id-realisasi-pengeluaran-bulan-label="${attr}"]`).html(rupiah_format(val))   
            }
        })

        $(document).on('keyup','.sisa-akhir-bulan',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-sisa-akhir-bulan')

            if (val == '') {
                $(`.sisa-akhir-bulan-label[id-sisa-akhir-bulan-label="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.sisa-akhir-bulan-label[id-sisa-akhir-bulan-label="${attr}"]`).html(rupiah_format(val))   
            }
        })

        $(document).on('click','.btn-delete-kategori-rincian',function(){
            let attr = $(this).attr('id-delete-kategori');
            $(`.input-kategori-rincian[id-input-kategori="${attr}"]`).remove()
        })

        $(document).on('click','.btn-delete-rincian',function(){
            let attr = $(this).attr('id-delete-rincian');
            $(`.input-rincian-layout[id-layout-rincian="${attr}"]`).remove()
        })
    })
</script>
@endsection