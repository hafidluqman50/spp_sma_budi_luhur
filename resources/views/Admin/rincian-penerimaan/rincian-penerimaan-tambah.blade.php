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
                                <li class="breadcrumb-item active"><a href="#">Data Rincian Penerimaan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Tambah Rincian Penerimaan</a></li>
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
                        <h4 class="header-title m-t-0">Tambah Data Rincian Penerimaan</h4>
                    </div>
                    <form action="{{ url('/admin/data-perincian-rab/rincian-penerimaan/'.$id.'/save') }}" method="POST">
                        @csrf
                        <div class="card-box">
                        	<div class="form-group">
                        		<div class="row">
                        			<label for="" class="col-2 col-form-label">Tahun Ajaran</label>
                        			<div class="col-md-7">
                        				<input type="text" class="form-control" name="tahun_ajaran" value="{{ $tahun_ajaran }}" readonly>
                        			</div>
                        		</div>
                        	</div>
                        	<div class="form-group">
                        		<div class="row">
                        			<label for="" class="col-2 col-form-label">Bulan</label>
                        			<div class="col-md-7">
                        				<input type="text" class="form-control" name="bulan_laporan" value="{{ $bulan_laporan }}" readonly>
                        			</div>
                        		</div>
                        	</div>
                        </div>
                        <div class="card-box">
                            <div class="input-rincian-layout" id="input-rincian-layout">
                                <div class="input-rincian" id="input-rincian" id-input-rincian="1">
                                	<div class="row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Pendapatan</label>
                                                    <select name="pendapatan[]" class="spp form-control selectize" id-spp="1" id="spp" required>
                                                        <option value="" selected disabled>=== Pilih Pendapatan ===</option>
                                                        @foreach ($pendapatan as $element)
                                                        @if ($element->kolom_pendapatan != '')
                                                        <option value="{{ $element->id_rincian_pengeluaran_detail }}">{{ $element->kolom_pendapatan }}</option>
                                                        @else
                                                        <option value="{{ $element->id_rincian_pengeluaran_detail }}">{{ $element->nama_kolom_spp }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Rencana</label>
                                                    <input type="number" name="rencana[]" class="rencana form-control" id-rencana="1" id="rencana" placeholder="Masukkan Nominal Rencana">
                                                    <label for="" class="rencana-label" id="rencana-label" id-rencana-label="1">Rp. 0,00</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Penerimaan</label>
                                                    <input type="number" name="penerimaan[]" class="penerimaan form-control" id="penerimaan" id-penerimaan="1" placeholder="Masukkan Nominal Penerimaan">
                                                    <label for="" class="penerimaan-label" id="penerimaan-label" id-penerimaan-label="1">Rp. 0,00</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Keterangan</label>
                                                    <input type="text" name="keterangan_penerimaan[]" class="keterangan-penerimaan form-control" id="keterangan-penerimaan" id-keterangan="1" placeholder="Input Keterangan; Ex: Penerimaan Uang Makan;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <button class="btn btn-danger btn-delete-rincian form-hide" id="btn-delete-rincian" style="margin-top:35%;" id-delete-rincian="1">X</button>
                                            </div>
                                        </div>
                                	</div>
                                    <hr>
                                </div>
                            </div>
                            <button class="btn btn-primary tambah-rincian" id="tambah-rincian" id-act="1" type="button">Tambah Input</button>
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal Bon Pengajuan</label>
                                        <input type="date" name="tanggal_bon_pengajuan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bon Pengajuan</label>
                                        <input type="number" name="bon_pengajuan" class="form-control" value="{{ $bon_pengajuan }}" readonly>
                                        <label for="" class="bon-pengajuan-label" id="bon-pengajuan-label">{{ format_rupiah($bon_pengajuan) }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal Realisasi Pengeluaran</label>
                                        <input type="date" name="tanggal_realisasi_pengeluaran" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Realisasi Pengeluaran</label>
                                        <input type="number" name="realisasi_pengeluaran" class="form-control realisasi-pengeluaran" value="{{ $realisasi_pengeluaran }}" readonly>
                                        <label for="" class="realisasi-pengeluaran-label" id="realisasi-pengeluaran-label">{{ format_rupiah($realisasi_pengeluaran) }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal Penerimaan Bulan Ini</label>
                                        <input type="date" name="tanggal_penerimaan_bulan_ini" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penerimaan Bulan Ini</label>
                                        <input type="number" name="penerimaan_bulan_ini" class="form-control penerimaan-bulan-ini" id="penerimaan-bulan-ini">
                                        <label for="" class="penerimaan-bulan-ini-label" id="penerimaan-bulan-ini-label">Rp. 0,00</label>
                                    </div>  
                                </div>
                            </div>
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
                            @endphp
                        	<h5>{{ month($bulan[$key][$i]).' '.$value }}</h5>
                        	<div class="row">
                        		<div class="col-md-4">
	                        		<div class="form-group">
	                        			<label for="">Pemasukan</label>
	                        			<input type="number" name="pemasukan[]" class="form-control pemasukan" required placeholder="Isi Pemasukan" id-pemasukan="{{ $no }}">
                                        <label for="" class="pemasukan-label" id-pemasukan-label="{{ $no }}">Rp. 0,00</label>
	                        		</div>
                        		</div>
                        		<div class="col-md-4">
	                        		<div class="form-group">
	                        			<label for="">Realisasi Pengeluaran</label>
	                        			<input type="number" name="realisasi_pengeluaran_bulan[]" class="form-control realisasi-pengeluaran-bulan" required placeholder="Isi Realisasi Pengeluaran" id-realisasi-pengeluaran-bulan="{{ $no }}">
                                        <label for="" class="realisasi-pengeluaran-bulan-label" id-realisasi-pengeluaran-bulan-label="{{ $no }}">Rp. 0,00</label>
	                        		</div>
                        		</div>
                        		<div class="col-md-4">
	                        		<div class="form-group">
	                        			<label for="">Sisa Akhir Bulan</label>
	                        			<input type="number" name="sisa_akhir_bulan[]" class="form-control sisa-akhir-bulan" required placeholder="Isi Sisa Akhir Bulan" id-sisa-akhir-bulan="{{ $no }}">
                                        <label for="" class="sisa-akhir-bulan-label" id-sisa-akhir-bulan-label="{{ $no }}">Rp. 0,00</label>
	                        		</div>
                        		</div>
                                <input type="hidden" name="bulan_rincian[]" value="{{ $bulan[$key][$i] }}">
                                <input type="hidden" name="tahun_rincian[]" value="{{ $value }}">
                        	</div>
                        	<hr>
                        	@endfor
                        	@endforeach
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
        var input_rincian        = 2;
        var hapus_input_rincian  = 1;
        var btn_delete_rincian   = 2;

        var id_spp              = 2;
        var id_rencana          = 2;
        var id_penerimaan       = 2;
        var id_keterangan       = 2;
        var id_rencana_label    = 2;
        var id_penerimaan_label = 2;

        $('.tambah-rincian').click(() => {
            $('.spp').each(function(){
                if ($(this)[0].selectize) {
                    var value = $(this).val();
                    $(this)[0].selectize.destroy();
                    $(this).val(value);
                }
            })
            $('#input-rincian').clone().appendTo('#input-rincian-layout')
            $('.input-rincian:last').attr('id-input-rincian',input_rincian)
            $('.tambah-rincian:last').attr('id-act',input_rincian)
            $('.spp').selectize({
                create:true,
                sortField:'text'
            })
            $(`.input-rincian:last`).find('.btn-delete-rincian:last').removeClass('form-hide')

            $('.btn-delete-rincian:last').attr('id-delete-rincian',btn_delete_rincian++)
            
            $(`.input-rincian:last`).attr('id-input-rincian',input_rincian++)
             $(`.input-rincian:last`).find('select.spp:last').attr('id-spp',id_spp++)
            
            $(`.input-rincian:last`).find('.penerimaan:last').attr('id-penerimaan',id_penerimaan++)
            $(`.penerimaan:last`).val('')
            
            $(`.input-rincian:last`).find('.penerimaan-label:last').attr('id-penerimaan-label',id_penerimaan_label++)
            $(`.penerimaan-label:last`).html(rupiah_format(0))
            
            $(`.input-rincian:last`).find('.rencana:last').attr('id-rencana',id_rencana++)
            $(`.rencana:last`).val('')

            $(`.input-rincian:last`).find('.rencana-label:last').attr('id-rencana-label',id_rencana_label++)
            $(`.rencana-label:last`).html(rupiah_format(0))

            $(`.input-rincian:last`).find('.keterangan-penerimaan:last').attr('id-keterangan',id_keterangan++)

            $(`.keterangan-penerimaan:last`).val('')

            input_rincian++
            hapus_input_rincian++
        })

        $(document).on('change','.spp',function(){
            let val           = $(this).val()
            let attr          = $(this).attr('id-spp')

            $.ajax({
                url: "{{ url('/ajax/get-penerimaan-rab') }}",
                data: {id_rincian_pengeluaran_detail:val},
            })
            .done(function(done) {
                $(`.penerimaan[id-penerimaan="${attr}"`).val(done)
                $(`.penerimaan-label[id-penerimaan-label="${attr}"`).html(rupiah_format(done))
            })
            .fail(function(fail) {
                console.log(fail)
            });
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

        $(document).on('keyup','.penerimaan',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-penerimaan')

            if (val == '') {
                $(`.penerimaan-label[id-penerimaan-label="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.penerimaan-label[id-penerimaan-label="${attr}"]`).html(rupiah_format(val))   
            }
        })

        $(document).on('keyup','.rencana',function(){
            let val  = $(this).val()
            let attr = $(this).attr('id-rencana')

            if (val == '') {
                $(`.rencana-label[id-rencana-label="${attr}"]`).html(rupiah_format(0))
            }
            else {
                $(`.rencana-label[id-rencana-label="${attr}"]`).html(rupiah_format(val))   
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

        $(document).on('click','.btn-delete-rincian',function(){
            let attr = $(this).attr('id-delete-rincian');
            $(`.input-rincian[id-input-rincian="${attr}"]`).remove()
        })
    })
</script>
@endsection