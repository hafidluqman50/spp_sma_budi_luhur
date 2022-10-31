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
                                        <label for="" class="saldo-awal-label">Rp 0,00</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Ajaran</label>
                                    <div class="col-7">
                                        <select name="tahun_ajaran" class="form-control select2" required>
                                            <option value="" selected disabled>=== Pilih Tahun Ajaran ===</option>
                                            @foreach ($tahun_ajaran as $key => $value)
                                            <option value="{{ $value->id_tahun_ajaran }}">{{ $value->tahun_ajaran }}</option>
                                            @endforeach
                                        </select>
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
                            <h5>Pengeluaran Sekolah</h5>
                            <hr>
                            <div class="layout-input-perincian" id="layout-input-perincian">
                                <div class="input-perincian" id="input-perincian" input-perincian-id="1">
                                    <div class="row">
                                        <div class="col-md-11">
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
                                                            <input type="number" name="nominal_rincian[]" class="form-control nominal-rincian" placeholder="Isi Nominal Rincian" required="required" nominal-rincian-id="1">
                                                            <label for="" class="nominal-rincian-label" nominal-rincian-id="1">Rp 0,00</label>
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
                                                            <select name="id_kolom_spp[]" class="form-control selectize pendapatan" pendapatan-id="1">
                                                                <option value="" selected disabled>=== Pilih Pendapatan ===</option>
                                                                @foreach ($kolom_spp as $element)
                                                                <option value="{{ $element->id_kolom_spp }}">{{ $element->nama_kolom_spp }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="text" name="pendapatan_input[]" class="form-control form-hide pendapatan-input" pendapatan-input-id="1" placeholder="Isi Pendapatan Input; Ex: Almamater">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nominal RAB</label>
                                                        <div>
                                                            <input type="number" name="nominal_rab[]" class="form-control nominal-rab" placeholder="Isi Nominal RAB" nominal-rab-id="1">
                                                            <label for="" class="nominal-rab-label" nominal-rab-id="1">Rp 0,00</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Volume Rincian</label>
                                                        <div class="d-flex">
                                                            <div>
                                                                <input type="number" name="volume_rincian[]" class="form-control" placeholder="Isi Volume Rincian" required="required">
                                                            </div>
                                                            <div>
                                                                <input type="text" name="ket_volume_rincian[]" class="form-control" placeholder="Ket Volume Rincian" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nominal Pendapatan</label>
                                                        <div>
                                                            <input type="number" class="form-control nominal-pendapatan" nominal-pendapatan-id="1" readonly>
                                                            <input type="text" name="nominal_pendapatan_input[]" class="form-control form-hide nominal-pendapatan-input" nominal-pendapatan-input-id="1" placeholder="Isi Nominal Pendapatan">
                                                            <label for="" class="nominal-pendapatan-label" nominal-pendapatan-label-id="1">Rp 0,00</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Volume RAB</label>
                                                        <div class="d-flex">
                                                            <div>
                                                                <input type="number" name="volume_rab[]" class="form-control" placeholder="Isi Volume RAB">
                                                            </div>
                                                            <div>
                                                                <input type="text" name="ket_volume_rab[]" class="form-control"  placeholder="Ket Volume RAB">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-danger form-hide hapus-act-perincian-sekolah" style="margin-top: 41%;" id="hapus-act-perincian-sekolah" hapus-id="1">X</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info input-pendapatan" input-pendapatan-id="1">Input Pendapatan</button>
                                        <button type="button" class="btn btn-info form-hide pilih-pendapatan" pilih-pendapatan-id="1">Pilih Pendapatan</button>
                                    </div>
                                    <hr>
                                    <input type="hidden" name="jenis_rincian_pengeluaran[]" value="sekolah">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success" id="input-act-perincian-sekolah">Tambah Input</button>
                                {{-- <button type="button" class="btn btn-danger form-hide" id="hapus-act-perincian">Hapus Input</button> --}}
                            </div>
                            <hr>
                            {{-- <div class="visible-lg" style="height: 79px;"></div> --}}
                        </div>
                        <div class="card-box">
                            <h5>Pengeluaran Uang Makan</h5>
                            <hr>
                            {{-- <div class="row"> --}}
                                {{-- <div class="col-md-6"> --}}
                            <div class="form-group" style="width: 30%;">
                                <label for="" class="col-form-label">Pemasukan Uang Makan</label>
                                <div>
                                    <input type="number" name="pemasukan_uang_makan" class="form-control pemasukan-uang-makan" readonly>
                                    <label for="" class="pemasukan-uang-makan-label">Rp 0,00</label>
                                </div>
                            </div>
                                {{-- </div> --}}
                            {{-- </div> --}}
                            <hr>
                            <div class="layout-input-uang-makan" id="layout-input-uang-makan">
                                <div class="input-uang-makan" id="input-uang-makan" input-uang-makan-id="1">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                @foreach ($kantin as $element)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Tanggal Perincian Uang Makan</label>
                                                        <div>
                                                            <input type="date" name="tanggal_perincian[]" class="form-control"  required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Volume Rincian</label>
                                                        <div class="d-flex">
                                                            <div>
                                                                <input type="number" name="volume_rincian[]" class="form-control" placeholder="Isi Volume Rincian" required="required">
                                                            </div>
                                                            <div>
                                                                <input type="text" name="ket_volume_rincian[]" class="form-control" placeholder="Ket Volume Rincian" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Uraian Rincian</label>
                                                        <div>
                                                            <input type="text" name="uraian_rincian[]" class="form-control" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nominal Rincian</label>
                                                        <div>
                                                            <input type="number" name="nominal_rincian[]" class="form-control nominal-rincian-uang-makan" placeholder="Isi Nominal Rincian" required="required" nominal-rincian-uang-makan-id="1">
                                                            <label for="" class="nominal-rincian-uang-makan-label" nominal-rincian-uang-makan-id="1">Rp 0,00</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-danger form-hide hapus-act-perincian-uang-makan" style="margin-top: 41%;" id="hapus-act-perincian-uang-makan" hapus-uang-makan-id="1">X</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <input type="hidden" name="jenis_rincian_pengeluaran[]" value="uang-makan">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success" id="input-act-perincian-uang-makan">Tambah Input</button>
                                {{-- <button type="button" class="btn btn-danger form-hide" id="hapus-act-perincian">Hapus Input</button> --}}
                            </div>
                            <hr>
                            {{-- <div class="visible-lg" style="height: 79px;"></div> --}}
                            
                        </div>
                        <div class="card-box">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection

@section('js')
<script src="{{ asset('assets/rincian-pengeluaran-tambah-dom.js') }}"></script>
@endsection