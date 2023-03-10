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
            <form id="form-spp-bayar" action="{{ url('/admin/spp/tunggakan/'.$id.'/lihat-spp/'.$id_bulan_tahun.'/bayar/'.$id_detail.'/save') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box">
                            <div class="button-list" style="margin-bottom:1%;">
                                <a href="{{ url()->previous() }}">
                                    <button class="btn btn-default" type="button">Kembali</button>
                                </a>
                            </div>
                            <h4 class="header-title m-t-0">Bayar SPP</h4>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Ajaran</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="{{ $spp->tahun_ajaran }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kelas</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="{{ $spp->kelas }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Siswa</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="{{ $spp->nisn.' - '.$spp->nama_siswa }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bulan Tahun</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" value="{{ $spp->bulan_tahun }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Total Biaya</label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" name="total_biaya" id="total-biaya" value="0" readonly="readonly">
                                        <label for="" id="total-biaya-juga"><b>Rp. 0,00</b></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bayar Total</label>
                                    <div class="col-7">
                                        <input type="number" name="bayar_total" id="bayar-total" class="form-control">
                                        <label for="" id="bayar-total-label">Rp. 0,00</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Kembalian</label>
                                    <div class="col-7">
                                        <input type="number" name="kembalian" id="kembalian" class="form-control" readonly="readonly">
                                        <label for="" id="kembalian-label">Rp. 0,00</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Keterangan</label>
                                    <div class="col-7">
                                        <input type="text" name="keterangan_spp" class="form-control keterangan-spp" required="" placeholder="Isi Keterangan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Jenis Bayar</label>
                                    <div class="col-7">
                                        <select name="jenis_bayar" class="form-control select2 jenis-bayar" required>
                                            <option value disabled selected>=== Pilih Jenis Bayar ===</option>
                                            <option value="cash">Cash</option>
                                            <option value="alumni">Alumni</option>
                                            <option value="transfer">Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-8 offset-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light spp-submit">
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
                                <div id="bayar-spp">
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label">Kolom Spp</label>
                                        <div class="col-7">
                                            <input type="text" class="form-control" value="{{ $spp->nama_kolom_spp }}" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label">Nominal Spp</label>
                                        <div class="col-7">
                                            <input type="text" class="form-control" value="{{ format_rupiah($spp->sisa_bayar) }}" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label">Bayar</label>
                                        <div class="col-7">
                                            <input type="number" name="bayar_spp" class="form-control bayar-spp" placeholder="Isi Jumlah Bayar" required="required" autofocus>
                                            <label for="" class="label-bayar-kolom-spp"><b>Rp. 0,00</b></label>
                                        </div>
                                    </div>
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
        $('#form-spp-bayar').on('keydown','input,select,textarea',function(e){
            // var self = $(this),
            //     form = self.parents('form:eq(0)'),
            //     focusable,
            //     next
            //     ;
            if (e.keyCode == 13) {
            //     focusable = form.find('input,a,select,textarea').filter(':visible');
            //     // console.log(focusable);
            //     next = focusable.eq(focusable.index(this)+1);
            //     if (next.length) {
            //         next.focus();
            //     }
            //     else {
            //         next.submit();
            //     }
            //     return false;
                e.preventDefault()
            }
            // e.preventDefault();
        });

        $('input[name="bayar_spp"]').keyup(function(){
            var val  = $(this).val()
            if (val == '') {
                $(`.label-bayar-kolom-spp`).html(`<b>${rupiah_format(0)}</b>`)
            }
            else {
                $(`.label-bayar-kolom-spp`).html(`<b>${rupiah_format(val)}</b>`)   
            }
        })

        $('.bayar-spp').keydown((e) => {
            if (e.key === 'Enter') {
                $('#bayar-total').focus();
            }
        })

        $('input[name="bayar_spp"]').change(function(){
            var val         = parseInt($(this).val())
            var total_biaya = parseInt($('#total-biaya').val())
            if (val == '') {
                val = 0
            }

            let kalkulasi  = total_biaya + val
            $('#total-biaya-juga').html(`<b>${rupiah_format(kalkulasi)}<b>`)
            $('#total-biaya').val(kalkulasi)
        })

        $('#bayar-total').keydown((e) => {
            if (e.key === 'Enter') {
                $('.keterangan-spp').focus()
            }
        })

        $('#bayar-total').keyup(function(){
            let val         = $(this).val()
            let total_biaya = $('#total-biaya').val()
            
            $('#bayar-total-label').html(`<b>${rupiah_format(val)}</b>`)
            if (parseInt(val) > parseInt(total_biaya)) {
                $('#kembalian').val(parseInt(val) - parseInt(total_biaya))
                $('#kembalian-label').html(`<b>${rupiah_format(parseInt(val) - parseInt(total_biaya))}</b>`)
            }
            if (parseInt(val) == parseInt(total_biaya)) {
                $('#kembalian').val(0)
                $('#kembalian-label').html(`<b>${rupiah_format(0)}</b>`)
            }
        })

        $('.keterangan-spp').keydown((e) => {
            if (e.key === 'Enter') {
                $('.jenis-bayar').focus()
            }
        })

        $('.jenis-bayar').change((e) => {
            setTimeout(() => {
                $('.select2-container-active').removeClass('select2-container-active');
                $(':focus').blur();
                $('.spp-submit').focus()
            }, 1);
        })
    })
</script>
@endsection
