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
                                <li class="breadcrumb-item active"><a href="#">Data Sapras</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Sapras</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Sapras</h4>
                    </div>
                    <form action="{{ url('/admin/data-perincian-rab/sapras/'.$id.'/save') }}" method="POST">
                        @csrf
                        <div id="input-pemohon-layout">
                            <div class="input-pemohon-rincian-layout" id="input-pemohon-rincian-layout" id-pemohon-layout="1">
                                <div class="card-box">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Pemohon</label>
                                                <input type="text" class="form-control pemohon" placeholder="Isi Pemohon" id-pemohon-rincian="1">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Keterangan Pemohon</label>
                                                <input type="text" class="form-control keterangan-pemohon" placeholder="Isi Keterangan Pemohon; Ex: KEGIATAN PELAKSANAAN;" id-keterangan-pemohon-rincian="1">
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-danger form-hide btn-delete-pemohon-rincian" style="margin-top:9%;" type="button" id-delete-pemohon="1">X</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="input-kategori-rincian-layout" id="input-kategori-rincian-layout" id-pemohon-layout="1">
                                        <div class="input-kategori-rincian" id="input-kategori-rincian" id-kategori-layout="1" id-pemohon-layout="1">
                                            <div class="container-fluid">
                                                <div class="form-group">
                                                    <label class="col-form-label">Kategori Barang</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control kategori-rincian" placeholder="Isi Kategori Barang; Ex: Obat" id-kategori-rincian="1">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button class="btn btn-danger form-hide btn-delete-kategori-rincian" type="button" id-delete-kategori="1">X</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="input-rincian" id="input-rincian" id-kategori-layout="1">
                                                    <div class="input-rincian-layout row" id="input-rincian-layout" id-layout-rincian="1" id-kategori-layout="1">
                                                        <input type="hidden" id-kategori-input="1" name="kategori_rincian[]" value="">
                                                        <input type="hidden" id-pemohon-input="1" name="pemohon[]" value="">
                                                        <input type="hidden" id-keterangan-pemohon-input="1" name="keterangan_pemohon[]" value="">
                                                        <div class="col-md-10 row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Nama Barang</label>
                                                                    <input type="text" name="nama_barang[]" class="form-control nama-barang" id-nama-barang="1">
                                                                </div>  
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Qty</label>
                                                                    <input type="text" name="qty[]" class="qty form-control" id-qty="1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Ket</label>
                                                                    <input type="text" name="ket[]" class="ket form-control" id-ket="1">
                                                                </div>  
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Harga Barang</label>
                                                                    <input type="text" name="harga_barang[]" class="harga-barang form-control" id-harga-barang="1">
                                                                    <label for="" class="harga-barang-label" id="harga-barang-label" id-harga-barang-label="1">Rp. 0,00</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah</label>
                                                                    <input type="text" name="jumlah[]" class="jumlah form-control" id-jumlah="1" readonly>
                                                                    <label for="" class="jumlah-label" id="jumlah-label" id-jumlah-label="1">Rp. 0,00</label>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <button class="btn btn-danger form-hide btn-delete-rincian" type="button" style="margin-top:19%;" id-delete-rincian="1">X</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success tambah-input-rincian" type="button" id-act="1">Tambah Input Rincian</button>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary tambah-input-kategori-rincian" type="button" id-act-kategori="1">Tambah Input Kategori</button>
                                </div>
                            </div>
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
        var input_kategori_rincian       = 2;
        var hapus_input_kategori_rincian = 1;
        var btn_delete_rincian           = 2;
        var id_pemohon_layout            = 2;
        var hapus_input_pemohon_layout   = 1;

        var id_layout_rincian     = 2;
        var id_nama_barang        = 2;
        var id_qty                = 2;
        var id_harga_barang       = 2;
        var id_ket                = 2;
        var id_jumlah             = 2;
        var id_harga_barang_label = 2;
        var id_jumlah_label       = 2;

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

            $('input[name="pemohon[]"]:last').attr('id-pemohon-input',id_pemohon_layout)
            $('input[name="kategori_pemohon[]"]:last').attr('id-kategori-pemohon-input',id_pemohon_layout)
            
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