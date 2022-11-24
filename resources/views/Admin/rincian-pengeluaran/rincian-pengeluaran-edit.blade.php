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
                                <li class="breadcrumb-item active"><a href="#">Edit Data Perincian</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <form action="{{ url('/admin/data-perincian-rab/update/'.$id) }}" method="POST">
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="button-list" style="margin-bottom:1%;">
                                <a href="{{ url()->previous() }}">
                                    <button class="btn btn-default" type="button">Kembali</button>
                                </a>
                            </div>
                            <h4 class="header-title m-t-0">Edit Data Perincian</h4>
                                @csrf
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Saldo Awal</label>
                                    <div class="col-7">
                                        <input type="number" name="saldo_awal" class="form-control" value="{{ $row->saldo_awal }}" placeholder="Isi Saldo Awal" required>
                                        <label for="" class="saldo-awal-label">{{ format_rupiah($row->saldo_awal) }}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Ajaran</label>
                                    <div class="col-7">
                                        <select name="tahun_ajaran" class="form-control select2" required>
                                            <option value="" selected disabled>=== Pilih Tahun Ajaran ===</option>
                                            @foreach ($tahun_ajaran as $key => $value)
                                            <option value="{{ $value->id_tahun_ajaran }}" {!!$row->id_tahun_ajaran == $value->id_tahun_ajaran ? 'selected="selected"' : ''!!}>{{ $value->tahun_ajaran }}</option>
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
                                            <option value="{{ $i }}" {!!$row->bulan_laporan == $i ? 'selected="selected"' : ''!!}>{{ month(zero_front_number($i)) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Laporan</label>
                                    <div class="col-7">
                                        <input type="text" name="tahun_laporan" class="form-control" value="{{ $row->tahun_laporan }}" placeholder="Isi Tahun Laporan; Ex: 2022;" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Bulan Pengajuan</label>
                                    <div class="col-7">
                                        <select name="bulan_pengajuan" class="form-control select2" required>
                                            <option value="" selected disabled>=== Pilih Bulan Pengajuan ===</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}" {!!$row->bulan_pengajuan == $i ? 'selected="selected"' : ''!!}>{{ month(zero_front_number($i)) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Tahun Pengajuan</label>
                                    <div class="col-7">
                                        <input type="text" name="tahun_pengajuan" class="form-control" value="{{ $row->tahun_pengajuan }}" placeholder="Isi Tahun Pengajuan; Ex: 2022;" required>
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
                                @foreach ($row_sekolah as $key => $value)
                                @php
                                    $no = $key+1;
                                @endphp
                                <div class="input-perincian" id="input-perincian" input-perincian-id="{{ $no }}">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Tanggal Perincian</label>
                                                        <div>
                                                            <input type="date" name="tanggal_perincian[]" class="form-control" value="{{ $value->tanggal_rincian }}" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nominal Rincian</label>
                                                        <div>
                                                            <input type="number" name="nominal_rincian[]" class="form-control nominal-rincian" value="{{ $value->nominal_rincian }}" placeholder="Isi Nominal Rincian" required="required" nominal-rincian-id="{{ $no }}">
                                                            <label for="" class="nominal-rincian-label" nominal-rincian-id="{{ $no }}">{{ format_rupiah($value->nominal_rincian) }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Uraian RAB</label>
                                                        <div>
                                                            <input type="text" name="uraian_rab[]" class="form-control" value="{{ $value->uraian_rab }}" placeholder="Isi Uraian RAB; Ex: PDAM Bulan Mei 2022">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Uraian Rincian</label>
                                                        <div>
                                                            <input type="text" name="uraian_rincian[]" class="form-control" value="{{ $value->uraian_rincian }}" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Pendapatan</label>
                                                        <div>
                                                            @if ($value->id_kolom_spp != null && $value->kolom_pendapatan == null)
                                                            <select name="id_kolom_spp[]" class="form-control selectize pendapatan" pendapatan-id="{{ $no }}">
                                                                <option value="" selected disabled>=== Pilih Pendapatan ===</option>
                                                                {{-- <option value="SPP" {!!$value->kolom_pendapatan == 'SPP' ? 'selected="selected"': ''!!}>SPP</option> --}}
                                                                @foreach ($kolom_spp as $element)
                                                                <option value="{{ $element->id_kolom_spp }}" {!!$value->id_kolom_spp == $element->id_kolom_spp ? 'selected="selected"': ''!!}>{{ $element->nama_kolom_spp }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="text" name="pendapatan_input[]" class="form-control form-hide pendapatan-input" pendapatan-input-id="{{ $no }}" placeholder="Isi Pendapatan Input; Ex: Almamater">
                                                            @elseif ($value->id_kolom_spp == null && $value->kolom_pendapatan != null)
                                                            <select name="id_kolom_spp[]" class="form-control form-hide selectize pendapatan" pendapatan-id="{{ $no }}">
                                                                <option value="" selected disabled>=== Pilih Pendapatan ===</option>
                                                                @foreach ($kolom_spp as $element)
                                                                <option value="{{ $element->id_kolom_spp }}">{{ $element->nama_kolom_spp }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="text" name="pendapatan_input[]" class="form-control pendapatan-input" value="{{ $value->kolom_pendapatan }}" pendapatan-input-id="{{ $no }}" placeholder="Isi Pendapatan Input; Ex: Almamater">
                                                            @else
                                                            <select name="id_kolom_spp[]" class="form-control selectize pendapatan" pendapatan-id="{{ $no }}">
                                                                <option value="" selected disabled>=== Pilih Pendapatan ===</option>
                                                                @foreach ($kolom_spp as $element)
                                                                <option value="{{ $element->id_kolom_spp }}">{{ $element->nama_kolom_spp }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="text" name="pendapatan_input[]" class="form-control form-hide pendapatan-input" pendapatan-input-id="{{ $no }}" placeholder="Isi Pendapatan Input; Ex: Almamater">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nominal RAB</label>
                                                        <div>
                                                            <input type="number" name="nominal_rab[]" class="form-control nominal-rab" value="{{ $value->nominal_rab }}" placeholder="Isi Nominal RAB" nominal-rab-id="{{ $no }}">
                                                            <label for="" class="nominal-rab-label" nominal-rab-id="{{ $no }}">{{ format_rupiah($value->nominal_rab) }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Volume Rincian</label>
                                                        <div class="d-flex">
                                                            <div>
                                                                <input type="number" name="volume_rincian[]" class="form-control" value="{{ $value->volume_rincian }}" placeholder="Isi Volume Rincian" required="required">
                                                            </div>
                                                            <div>
                                                                <input type="text" name="ket_volume_rincian[]" class="form-control" value="{{ $value->ket_volume_rincian }}" placeholder="Ket Volume Rincian" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nominal Pendapatan</label>
                                                        <div>
                                                            @if ($value->nominal_pendapatan_spp != null && $value->nominal_pendapatan == null)
                                                                    {{-- @if ($value->kolom_pendapatan == 'SPP')
                                                                    <input type="number" class="form-control nominal-pendapatan" value="{{ $value->nominal_pendapatan }}" nominal-pendapatan-id="{{ $no }}" readonly>
                                                                    @else --}}
                                                                    <input type="number" class="form-control nominal-pendapatan" value="{{ $value->nominal_pendapatan_spp }}" nominal-pendapatan-id="{{ $no }}" readonly>
                                                                    {{-- @endif --}}
                                                                <input type="text" name="nominal_pendapatan_input[]" class="form-control form-hide nominal-pendapatan-input" nominal-pendapatan-input-id="{{ $no }}" placeholder="Isi Nominal Pendapatan">
                                                            @elseif ($value->nominal_pendapatan != null && $value->nominal_pendapatan_spp == null)
                                                                <input type="text" name="nominal_pendapatan_input[]" class="form-control nominal-pendapatan-input" value="{{ $value->nominal_pendapatan }}" nominal-pendapatan-input-id="{{ $no }}" placeholder="Isi Nominal Pendapatan">
                                                                <input type="number" class="form-control form-hide nominal-pendapatan" nominal-pendapatan-id="{{ $no }}" readonly>
                                                            @else
                                                                <input type="number" class="form-control nominal-pendapatan" nominal-pendapatan-id="{{ $no }}" readonly>
                                                                <input type="text" name="nominal_pendapatan_input[]" class="form-control form-hide nominal-pendapatan-input" nominal-pendapatan-input-id="{{ $no }}" placeholder="Isi Nominal Pendapatan">
                                                            @endif
                                                            {{-- @if ($value->kolom_pendapatan == 'SPP')
                                                                <label for="" class="nominal-pendapatan-label" nominal-pendapatan-label-id="{{ $no }}">{{ format_rupiah($value->nominal_pendapatan) }}</label>
                                                            @else --}}
                                                                <label for="" class="nominal-pendapatan-label" nominal-pendapatan-label-id="{{ $no }}">{{ $value->nominal_pendapatan_spp != null ? format_rupiah($value->nominal_pendapatan_spp) : format_rupiah($value->nominal_pendapatan) }}</label>
                                                            {{-- @endif --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Volume RAB</label>
                                                        <div class="d-flex">
                                                            <div>
                                                                <input type="number" name="volume_rab[]" class="form-control" value="{{ $value->volume_rab }}" placeholder="Isi Volume RAB">
                                                            </div>
                                                            <div>
                                                                <input type="text" name="ket_volume_rab[]" class="form-control" value="{{ $value->ket_volume_rab }}" placeholder="Ket Volume RAB">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_rincian_pengeluaran_sekolah[]" value="{{ $value->id_rincian_pengeluaran_sekolah }}">
                                        <div class="col-md-1">
                                            <button class="btn btn-danger hapus-act-perincian-sekolah" style="margin-top: 41%;" id="hapus-act-perincian-sekolah" hapus-id="{{ $no }}">X</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @if ($value->kolom_pendapatan == null && $value->nominal_pendapatan == null)
                                        <button type="button" class="btn btn-info input-pendapatan" input-pendapatan-id="{{ $no }}">Input Pendapatan</button>
                                        <button type="button" class="btn btn-info form-hide pilih-pendapatan" pilih-pendapatan-id="{{ $no }}">Pilih Pendapatan</button>
                                        @else
                                        <button type="button" class="btn btn-info form-hide input-pendapatan" input-pendapatan-id="{{ $no }}">Input Pendapatan</button>
                                        <button type="button" class="btn btn-info pilih-pendapatan" pilih-pendapatan-id="{{ $no }}">Pilih Pendapatan</button>
                                        @endif
                                    </div>
                                    <hr>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success" id="input-act-perincian">Tambah Input</button>
                                {{-- <button type="button" class="btn btn-danger form-hide" id="hapus-act-perincian">Hapus Input</button> --}}
                            </div>
                            <hr>
                        </div>

                        <div class="card-box">
                            <h5>Pengeluaran Uang Makan</h5>
                            <hr>
                            {{-- <div class="row"> --}}
                                {{-- <div class="col-md-6"> --}}
                            <div class="form-group" style="width: 30%;">
                                <label for="" class="col-form-label">Pemasukan Uang Makan</label>
                                <div>
                                    <input type="number" name="pemasukan_uang_makan" value="{{ $row->pemasukan_uang_makan }}" class="form-control pemasukan-uang-makan" readonly>
                                    <label for="" class="pemasukan-uang-makan-label">{{ format_rupiah($row->pemasukan_uang_makan) }}</label>
                                </div>
                            </div>
                                {{-- </div> --}}
                            {{-- </div> --}}
                            <hr>
                            <div class="layout-input-uang-makan" id="layout-input-uang-makan">
                                @foreach ($row_uang_makan as $key => $value)
                                <div class="input-uang-makan" id="input-uang-makan" input-uang-makan-id="{{ $key+1 }}">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Tanggal Perincian Uang Makan</label>
                                                        <div>
                                                            <input type="date" name="tanggal_perincian_uang_makan[]" class="form-control" value="{{ $value->tanggal_rincian }}" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Kantin</label>
                                                        <div>
                                                            <select name="kantin[]" class="form-control selectize kantin" kantin-id="{{ $key+1 }}">
                                                                <option value="" selected disabled>=== Pilih Kantin ===</option>
                                                                @foreach ($kantin as $element)
                                                                <option value="{{ $element->id_kantin }}" {!!$value->id_kantin == $element->id_kantin ? 'selected="selected"' : ''!!}>{{ $element->nama_kantin }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Uraian Rincian</label>
                                                        <div>
                                                            <input type="text" name="uraian_rincian_uang_makan[]" class="form-control" placeholder="Isi Uraian Rincian; Ex: PDAM Bulan Mei 2022" value="{{ $value->uraian_rincian }}" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Volume Rincian</label>
                                                        <div class="d-flex">
                                                            <div>
                                                                <input type="number" name="volume_rincian_uang_makan[]" class="form-control" placeholder="Isi Volume Rincian" value="{{ $value->volume_rincian }}" required="required">
                                                            </div>
                                                            <div>
                                                                <input type="text" name="ket_volume_rincian_uang_makan[]" class="form-control" value="{{ $value->ket_volume_rincian }}" placeholder="Ket Volume Rincian" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Nominal Rincian</label>
                                                        <div>
                                                            <input type="number" name="nominal_rincian_uang_makan[]" class="form-control nominal-rincian-uang-makan" placeholder="Isi Nominal Rincian" value="{{ $value->nominal_rincian }}" required="required" nominal-rincian-uang-makan-id="{{ $key+1 }}">
                                                            <label for="" class="nominal-rincian-uang-makan-label" nominal-rincian-uang-makan-id="{{ $key+1 }}">{{ format_rupiah($value->nominal_rincian) }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="hidden" name="id_rincian_pengeluaran_uang_makan[]" value="{{ $value->id_rincian_pengeluaran_uang_makan }}">
                                            <button class="btn btn-danger hapus-act-perincian-uang-makan" type="button" style="margin-top: 41%;" id="hapus-act-perincian-uang-makan" hapus-uang-makan-id="{{ $key+1 }}">X</button>
                                        </div>
                                    </div>
                                    <hr>
                                    {{-- <input type="hidden" name="jenis_rincian_pengeluaran[]" value="uang-makan"> --}}
                                </div>
                                @endforeach
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
                                    <button type="submit" class="btn btn-warning waves-effect waves-light">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                            {{-- <div class="visible-lg" style="height: 79px;"></div> --}}
                    </div>
                </div>
            </form>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection

@section('js')
<script src="{{ asset('assets/rincian-pengeluaran-edit-dom.js') }}"></script>
@endsection