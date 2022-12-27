@extends('Petugas.layout-app.layout-rab')

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
                                <li class="breadcrumb-item active"><a href="#">Data Sapras</a></li>
                                <li class="breadcrumb-item active"><a href="#">Edit Sapras</a></li>
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
                        <h4 class="header-title m-t-0">Edit Data Sapras</h4>
                    </div>
                    <form action="{{ url('/petugas/data-perincian-rab/sapras/'.$id.'/update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div id="input-pemohon-layout">
                            @foreach ($pemohon as $key => $value)
                            @php
                                $id_pemohon_layout = $key+1;
                            @endphp
                                <div class="input-pemohon-rincian-layout" id="input-pemohon-rincian-layout" id-pemohon-layout="{{ $id_pemohon_layout }}">
                                    <div class="card-box">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="col-form-label">Pemohon</label>
                                                    <input type="text" class="form-control pemohon" value="{{ $value->pemohon }}" placeholder="Isi Pemohon" id-pemohon-rincian="{{ $id_pemohon_layout }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-form-label">Keterangan Pemohon</label>
                                                    <input type="text" class="form-control keterangan-pemohon" value="{{ $value->keterangan_pemohon }}" placeholder="Isi Keterangan Pemohon; Ex: KEGIATAN PELAKSANAAN;" id-keterangan-pemohon-rincian="{{ $id_pemohon_layout }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-danger form-hide btn-delete-pemohon-rincian" style="margin-top:9%;" type="button" id-delete-pemohon="{{ $id_pemohon_layout }}">X</button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="input-kategori-rincian-layout" id="input-kategori-rincian-layout" id-pemohon-layout="{{ $id_pemohon_layout }}">
                                            @php
                                                $kategori_sapras = $sapras->where('id_rincian_pengeluaran',$id)
                                                                          ->where('pemohon',$value->pemohon)
                                                                          ->groupBy('kategori_sapras')
                                                                          ->get();
                                            @endphp
                                            @foreach ($kategori_sapras as $index => $val)
                                            @php
                                                $id_kategori_layout = $index+1;
                                            @endphp
                                            <div class="input-kategori-rincian" id="input-kategori-rincian" id-kategori-layout="{{ $id_kategori_layout }}" id-pemohon-layout="{{ $id_pemohon_layout }}">
                                                <div class="container-fluid">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Kategori</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control kategori-rincian" value="{{ $val->kategori_sapras }}" placeholder="Isi Kategori; Ex: Obat" id-kategori-rincian="{{ $id_kategori_layout }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button class="btn btn-danger form-hide btn-delete-kategori-rincian" type="button" id-delete-kategori="{{ $id_kategori_layout }}">X</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="input-rincian" id="input-rincian" id-kategori-layout="{{ $id_kategori_layout }}">
                                                        @php
                                                            $rincian_sapras = $sapras->where('id_rincian_pengeluaran',$id)
                                                                                     ->where('pemohon',$value->pemohon)
                                                                                     ->where('kategori_sapras',$val->kategori_sapras)
                                                                                     ->get();
                                                        @endphp     
                                                        @foreach ($rincian_sapras as $no => $data)
                                                        @php
                                                            $id_layout_rincian = $no+1;
                                                        @endphp
                                                            <div class="input-rincian-layout row" id="input-rincian-layout" id-layout-rincian="{{ $id_layout_rincian }}" id-kategori-layout="{{ $id_kategori_layout }}">
                                                                <input type="hidden" id-kategori-input="{{ $id_kategori_layout }}" name="kategori_rincian[]" value="{{ $val->kategori_sapras }}">
                                                                <input type="hidden" id-pemohon-input="{{ $id_pemohon_layout }}" name="pemohon[]" value="{{ $value->pemohon }}">
                                                                <input type="hidden" id-keterangan-pemohon-input="{{ $id_pemohon_layout }}" name="keterangan_pemohon[]" value="{{ $value->keterangan_pemohon }}">
                                                                <div class="col-md-10 row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Rincian</label>
                                                                            <input type="text" name="nama_barang[]" class="form-control nama-barang" value="{{ $data->nama_barang }}" id-nama-barang="{{ $id_layout_rincian }}">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Volume</label>
                                                                            <input type="text" name="qty[]" class="qty form-control" value="{{ $data->qty }}" id-qty="{{ $id_layout_rincian }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Ket</label>
                                                                            <input type="text" name="ket[]" class="ket form-control" value="{{ $data->ket }}" id-ket="{{ $id_layout_rincian }}">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Satuan</label>
                                                                            <input type="text" name="harga_barang[]" class="harga-barang form-control" value="{{ $data->harga_barang }}" id-harga-barang="{{ $id_layout_rincian }}">
                                                                            <label for="" class="harga-barang-label" id="harga-barang-label" id-harga-barang-label="{{ $id_layout_rincian }}">{{ format_rupiah($data->harga_barang) }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Total</label>
                                                                            <input type="text" name="jumlah[]" class="jumlah form-control" value="{{ $data->jumlah }}" id-jumlah="{{ $id_layout_rincian }}" readonly>
                                                                            <label for="" class="jumlah-label" id="jumlah-label" id-jumlah-label="{{ $id_layout_rincian }}">{{ format_rupiah($data->jumlah) }}</label>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id_sapras[]" value="{{ $data->id_sapras }}">
                                                                        <button class="btn btn-danger btn-delete-rincian" type="button" style="margin-top:19%;" id-delete-rincian="{{ $id_layout_rincian }}">X</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button class="btn btn-success tambah-input-rincian" type="button" id-act="{{ $id_layout_rincian }}">Tambah Input Rincian</button>
                                                    <hr>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button class="btn btn-primary tambah-input-kategori-rincian" type="button" id-act-kategori="{{ $id_kategori_layout }}">Tambah Input Kategori</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="card-box">
                        </div> --}}
                        <div class="card-box">
                            <button class="btn btn-info tambah-input-pemohon" type="button">Tambah Input Pemohon</button>
                        </div>
                        <div class="card-box">
                            <button class="btn btn-primary">Simpan Data</button>
                        </div>
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
        var get_input_kategori_rincian   = $('.input-kategori-rincian:last').attr('id-input-kategori')
        var input_kategori_rincian       = get_input_kategori_rincian+1;
        var hapus_input_kategori_rincian = get_input_kategori_rincian;
        var btn_delete_rincian           = $('.btn-delete-rincian:last').attr('id-delete-rincian')+1;
        var id_pemohon_layout            = $('.input-pemohon-rincian-layout:last').attr('id-pemohon-layout')+1;
        var hapus_input_pemohon_layout   = $('.input-pemohon-rincian-layout:last').attr('id-pemohon-layout');

        var id_layout_rincian     = $(`.input-rincian-layout[id-kategori-layout="${input_kategori_rincian}"]:last`).attr('id-layout-rincian')+1;
        var id_nama_barang        = $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.nama-barang:last').attr('id-nama-barang')+1;
        var id_qty                = $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.qty:last').attr('id-qty')+1;
        var id_harga_barang       = $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.harga-barang:last').attr('id-harga-barang')+1;
        var id_ket                = $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.ket:last').attr('id-ket')+1;
        var id_jumlah             = $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.jumlah:last').attr('id-jumlah')+1;
        var id_harga_barang_label = $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.harga-barang-label:last').attr('id-harga-barang-label')+1;
        var id_jumlah_label       = $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.jumlah:last').attr('id-jumlah')+1;

        $('.tambah-input-pemohon').click(() => {
            $('#input-pemohon-rincian-layout').clone().appendTo('#input-pemohon-layout')
            $('.input-pemohon-rincian-layout:last').attr('id-pemohon-layout',id_pemohon_layout)
            $('.input-kategori-rincian-layout:last').attr('id-pemohon-layout',id_pemohon_layout)
            $('.input-kategori-rincian:last').attr('id-pemohon-layout',id_pemohon_layout)
            $('.btn-delete-pemohon-rincian:last').attr('id-delete-pemohon',id_pemohon_layout)
            $('.btn-delete-pemohon-rincian:last').removeClass('form-hide')
            $('.input-kategori-rincian:last').attr('id-input-kategori',input_kategori_rincian)
            $('.input-kategori-rincian:last').find('.kategori-rincian:last').attr('id-kategori-rincian',input_kategori_rincian)
            $('.input-kategori-rincian:last').find('.kategori-rincian:last').val('')
            $('.input-rincian:last').attr('id-kategori-layout',input_kategori_rincian)
            $('.input-rincian-layout:last').attr('id-kategori-layout',input_kategori_rincian)
            $('.tambah-input-rincian:last').attr('id-act',input_kategori_rincian)
            $('.tambah-input-kategori-rincian:last').attr('id-act-kategori',input_kategori_rincian)
            $('.btn-delete-kategori-rincian:last').attr('id-delete-kategori',input_kategori_rincian)

            $('.pemohon:last').attr('id-pemohon-rincian',id_pemohon_layout)
            $('.kategori-pemohon:last').attr('id-kategori-pemohon-rincian',id_pemohon_layout)
            $('.pemohon:last').val('')
            $('.kategori-pemohon:last').val('')

            $('input[name="pemohon[]"]:last').attr('id-pemohon-input',id_pemohon_layout)
            $('input[name="kategori_pemohon[]"]:last').attr('id-kategori-pemohon-input',id_pemohon_layout)
            $('input[name="pemohon[]"]:last').val('')
            $('input[name="kategori_pemohon[]"]:last').val('')
            
            $(`.input-kategori-rincian-layout[id-pemohon-layout="${id_pemohon_layout}"]`).find(`.input-kategori-rincian[id-pemohon-layout="${hapus_input_pemohon_layout}"]`).remove();
            
            $(`.input-kategori-rincian[id-input-kategori="${input_kategori_rincian}"]`).find(`.input-rincian-layout[id-layout-input-rincian="${hapus_input_kategori_rincian}"]`).remove();

            $('.btn-delete-rincian:last').attr('id-delete-rincian',btn_delete_rincian++);
            $(`.input-rincian-layout[id-kategori-layout="${input_kategori_rincian}"]:last`).attr('id-layout-rincian',id_layout_rincian++)

            if (!$('.btn-delete-rincian:last').hasClass('form-hide')) {
                $('.btn-delete-rincian:last').addClass('form-hide')
            }

            if (!$('.btn-delete-kategori-rincian:last').hasClass('form-hide')) {
                $('.btn-delete-kategori-rincian:last').addClass('form-hide')
            }
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('input[name="kategori_rincian[]"]:last').attr('id-kategori-input',input_kategori_rincian)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('input[name="kategori_rincian[]"]:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.nama-barang:last').attr('id-nama-barang',id_nama_barang++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.nama-barang:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.qty:last').attr('id-qty',id_qty++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.qty:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.ket:last').attr('id-ket',id_ket++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.ket:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.harga-barang:last').attr('id-harga-barang',id_harga_barang++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.harga-barang:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.harga-barang-label:last').attr('id-harga-barang-label',id_harga_barang_label++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.harga-barang-label:last').html(rupiah_format(0))
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.jumlah:last').attr('id-jumlah',id_jumlah++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.jumlah:last').val('')

            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.jumlah-label:last').attr('id-jumlah-label',id_jumlah_label++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.jumlah-label:last').html(rupiah_format(0))

            $('input[name="id_sapras[]"]:last').val('')

            id_pemohon_layout++
            input_kategori_rincian++
            hapus_input_kategori_rincian++
        })

        $(document).on('click','.tambah-input-kategori-rincian',() => {
            // $('.rincian').each(function(){
            //     if ($(this)[0].selectize) {
            //         var value = $(this).val();
            //         $(this)[0].selectize.destroy();
            //         $(this).val(value);
            //     }
            // })
            $('#input-kategori-rincian').clone().appendTo('#input-kategori-rincian-layout')
            $('.input-kategori-rincian:last').attr('id-input-kategori',input_kategori_rincian)
            $('.input-kategori-rincian:last').find('.kategori-rincian:last').attr('id-kategori-rincian',input_kategori_rincian)
            $('.input-kategori-rincian:last').find('.kategori-rincian:last').val('')
            $('.input-rincian:last').attr('id-kategori-layout',input_kategori_rincian)
            $('.input-rincian-layout:last').attr('id-kategori-layout',input_kategori_rincian)
            $('.tambah-input-rincian:last').attr('id-act',input_kategori_rincian)
            $('.tambah-input-kategori-rincian:last').attr('id-act-kategori',input_kategori_rincian)
            
            // $('.rincian').selectize({
            //     create:true,
            //     sortField:'text'
            // })
            $('.btn-delete-kategori-rincian:last').removeClass('form-hide')
            $('.btn-delete-kategori-rincian:last').attr('id-delete-kategori',input_kategori_rincian)
            
            $(`.input-kategori-rincian[id-input-kategori="${input_kategori_rincian}"]`).find(`.input-rincian-layout[id-kategori-layout="${hapus_input_kategori_rincian}"]`).remove();

            $('.btn-delete-rincian:last').attr('id-delete-rincian',btn_delete_rincian++)

            if (!$('.btn-delete-rincian:last').hasClass('form-hide')) {
                $('.btn-delete-rincian:last').addClass('form-hide')
            }
            
            $(`.input-rincian-layout[id-kategori-layout="${input_kategori_rincian}"]:last`).attr('id-layout-rincian',id_layout_rincian++)
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('input[name="kategori_rincian[]"]:last').attr('id-kategori-input',input_kategori_rincian)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('input[name="kategori_rincian[]"]:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.nama-barang:last').attr('id-nama-barang',id_nama_barang++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.nama-barang:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.qty:last').attr('id-qty',id_qty++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.qty:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.ket:last').attr('id-ket',id_ket++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.ket:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.harga-barang:last').attr('id-harga-barang',id_harga_barang++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.harga-barang:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.harga-barang-label:last').attr('id-harga-barang-label',id_harga_barang_label++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.harga-barang-label:last').html(rupiah_format(0))
            
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.jumlah:last').attr('id-jumlah',id_jumlah++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.jumlah:last').val('')

            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.jumlah-label:last').attr('id-jumlah-label',id_jumlah_label++)
            $(`.input-rincian[id-kategori-layout="${input_kategori_rincian}"]`).find('.jumlah-label:last').html(rupiah_format(0))

            $('input[name="id_sapras[]"]:last').val('')
            
            input_kategori_rincian++
            hapus_input_kategori_rincian++
        })

        $(document).on('click','.tambah-input-rincian',function() {
            let attr = $(this).attr('id-act')
            // $('.rincian').each(function(){
            //     if ($(this)[0].selectize) {
            //         var value = $(this).val();
            //         $(this)[0].selectize.destroy();
            //         $(this).val(value);
            //     }
            // })
            $(`.input-rincian-layout[id-kategori-layout="${attr}"]:last`).clone().appendTo(`.input-rincian[id-kategori-layout="${attr}"]`)
            $(`.input-rincian-layout[id-kategori-layout="${attr}"]:last`).attr('id-layout-rincian',id_layout_rincian++)
            // $('.rincian').selectize({
            //     create:true,
            //     sortField:'text'
            // })
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.btn-delete-rincian:last').removeClass('form-hide')
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.btn-delete-rincian:last').attr('id-delete-rincian',btn_delete_rincian++)

            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.nama-barang:last').attr('id-nama-barang',id_nama_barang++)
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.nama-barang:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.qty:last').attr('id-qty',id_qty++)
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.qty:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.ket:last').attr('id-ket',id_ket++)
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.ket:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.harga-barang:last').attr('id-harga-barang',id_harga_barang++)
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.harga-barang:last').val('')
            
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.harga-barang-label:last').attr('id-harga-barang-label',id_harga_barang_label++)
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.harga-barang-label:last').html(rupiah_format(0))
            
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.jumlah:last').attr('id-jumlah',id_jumlah++)
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.jumlah:last').val('')

            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.jumlah-label:last').attr('id-jumlah-label',id_jumlah_label++)
            $(`.input-rincian[id-kategori-layout="${attr}"]`).find('.jumlah-label:last').html(rupiah_format(0))

            $('input[name="id_sapras[]"]:last').val('')
        })

        $(document).on('keyup','.kategori-rincian',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-kategori-rincian')
            $(`input[name="kategori_rincian[]"][id-kategori-input="${attr}"]`).val(val)
        })

        $(document).on('keyup','.pemohon',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-pemohon-rincian')
            $(`input[name="pemohon[]"][id-pemohon-input="${attr}"]`).val(val)
        })

        $(document).on('keyup','.keterangan-pemohon',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-keterangan-pemohon-rincian')
            $(`input[name="keterangan_pemohon[]"][id-keterangan-pemohon-input="${attr}"]`).val(val)
        })

        $(document).on('click','.btn-delete-pemohon-rincian',function(){
            let attr = $(this).attr('id-delete-pemohon');
            $(`.input-pemohon-rincian-layout[id-pemohon-layout="${attr}"]`).remove()
        })

        $(document).on('click','.btn-delete-kategori-rincian',function(){
            let attr = $(this).attr('id-delete-kategori');
            $(`.input-kategori-rincian[id-input-kategori="${attr}"]`).remove()
        })

        $(document).on('click','.btn-delete-rincian',function(){
            let attr = $(this).attr('id-delete-rincian');
            $(`.input-rincian-layout[id-layout-rincian="${attr}"]`).remove()
        })

        $(document).on('keyup','.qty',function(){
            let attr         = $(this).attr('id-qty')
            let val          = $(this).val()
            let harga_barang = $(`.harga-barang[id-harga-barang="${attr}"]`).val()
            if (val != '' && harga_barang != '') {
                $(`.jumlah[id-jumlah="${attr}"]`).val(val * harga_barang)
                $(`.jumlah-label[id-jumlah-label="${attr}"]`).html(rupiah_format(val * harga_barang))
            }
        })

        $(document).on('keyup','.harga-barang',function(){
            let attr = $(this).attr('id-harga-barang')
            let val  = $(this).val()
            let qty  = $(`.qty[id-qty="${attr}"]`).val()

            $(`.harga-barang-label[id-harga-barang-label="${attr}"]`).html(rupiah_format(val))
            if (val != '' && qty != '') {
                $(`.jumlah[id-jumlah="${attr}"]`).val(val * qty)
                $(`.jumlah-label[id-jumlah-label="${attr}"]`).html(rupiah_format(val * qty))
            }
        })
    })
</script>
@endsection