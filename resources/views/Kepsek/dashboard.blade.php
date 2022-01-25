@extends('Kepsek.layout-app.layout')

@section('css')
    <link href= "{{asset('assets/plugins/custombox/css/custombox.css')}}" rel="stylesheet">
@endsection

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
                                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-info pull-left">
                            <i class="md md-attach-money text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">{{ money_receipt($transaksi_hari_ini) }}</b></h3>
                            <p class="text-muted mb-0">Transaksi Hari Ini</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-success pull-left">
                            <i class="fa fa-money text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">{{ money_receipt($transaksi_bulan_ini) }}</b></h3>
                            <p class="text-muted mb-0">Transaksi Bulan ini</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-purple pull-left">
                            <i class="fa fa-edit text-purple"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">{{ money_receipt($total_uang_kantin) }}</b></h3>
                            <p class="text-muted mb-0">Total Uang Kantin</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-danger pull-left">
                            <i class="md md-warning text-danger"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">{{ money_receipt($total_tunggakan) }}</b></h3>
                            <p class="text-muted mb-0">Total Tunggakan</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>TRANSAKSI TERAKHIR</b></h4>

                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Wilayah</th>
                                <th>Total Pembayaran</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($transaksi_terakhir as $element)
                                <tr>
                                    <td>{{ human_date($element->tanggal_bayar) }}</td>
                                    <td>{{ $element->nama_siswa }}</td>
                                    <td>{{ unslug_str($element->wilayah) }}</td>
                                    <td>{{ format_rupiah($element->nominal_bayar) }}</td>
                                    <td><a href="{{ url('/kepsek/spp/bulan-tahun/'.$element->id_spp.'/lihat-pembayaran/'.$element->id_spp_bulan_tahun) }}"><button class="btn btn-primary waves-light">Lihat</button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <!-- Modal -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Modal title</h4>
        <div class="custom-modal-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
    </div>

@endsection

@section('js')
    {{-- <script src="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script> --}}

    <!--Form Wizard-->
    <script src="{{asset('assets/plugins/custombox/js/custombox.min.js')}}"></script>
    <script src="{{asset('assets/plugins/custombox/js/legacy.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery.steps/js/jquery.steps.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>

    <!--wizard initialization-->
    <script src="{{asset('assets/pages/jquery.wizard-init.js')}}" type="text/javascript"></script>
    <script>
        $(() => {

            $('table#datatable').DataTable();
            $('select[name="kelas"]').change(function() {
                let kelas        = $(this).val()
                let tahun_ajaran = $('select[name="tahun_ajaran"]').val()

                if (tahun_ajaran != '' && kelas != '') {
                    $.ajax({
                        url: "{{ url('/ajax/get-siswa-dashboard/') }}/"+kelas+'/'+tahun_ajaran
                    })
                    .done(function(done) {
                        $('select[name="siswa"]').removeAttr('disabled')
                        $('select[name="siswa"]').html(done)
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                }
                
            })

            $('select[name="tahun_ajaran"]').change(function() {
                let tahun_ajaran = $(this).val()
                let kelas        = $('select[name="kelas"]').val()

                if (tahun_ajaran != '' && kelas != '') {
                    $.ajax({
                        url: "{{ url('/ajax/get-siswa-dashboard/') }}/"+kelas+'/'+tahun_ajaran
                    })
                    .done(function(done) {
                        $('select[name="siswa"]').removeAttr('disabled')
                        $('select[name="siswa"]').html(done)
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                }

            })

            $('a[href="#next"]').click(function() {
                if ($(this).attr('keterangan') == null || $(this).attr('keterangan') == '') {
                    $('a[href="#previous"]').attr('keterangan','previous-spp')
                    $(this).attr('keterangan','bayar-spp')
                    let kelas        = $('select[name="kelas"]').val()
                    let tahun_ajaran = $('select[name="tahun_ajaran"]').val()
                    let siswa        = $('select[name="siswa"]').val()

                    $('#tunggakan-table').html('<tr><td colspan="3">Loading...</td></tr>')
                    $.ajax({
                        url: "{{ url('/ajax/get-tunggakan/') }}/"+siswa+'/'+kelas+'/'+tahun_ajaran
                    })
                    .done(function(done) {
                        $('#tunggakan-table').html(done.table)
                        $('#tunggakan_an').html(`Tunggakan an. ${done.siswa['nama_siswa']}`)
                        $('#info_siswa').html(done.siswa['wilayah'])
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                }
                else if ($(this).attr('keterangan') == 'bayar-spp') {
                    // $(this).removeAttr('keterangan')
                    // $.ajax({
                    //     url: "{{ url('/ajax/get-bayar/') }}"
                    // })
                    // .done(function(done) {

                    // })
                    // .fail(function() {
                    //     console.log("error");
                    // })
                    // .always(function() {
                    //     console.log("complete");
                    // });
                    $('a[href="#previous"]').attr('keterangan','previous-finish')
                }
                
            })

            $('a[href="#previous"]').click(function(){
                console.log($(this).attr('keterangan'))
                if ($(this).attr('keterangan') == 'previous-finish') {
                    $(this).attr('keterangan','previous-spp')
                }
                else if ($(this).attr('keterangan') == 'previous-spp') {
                    $('a[href="#next"]').attr('keterangan','')
                    $(this).attr('keterangan','')
                }
            })

            $('a[href="#finish"]').click(function(){
                window.location.href="{{ url('/admin/dashboard/bayar-spp') }}"
            })

            $(document).on('click','.tombol-bayar',function(){
                let attr = $(this).attr('id-spp-bulan-tahun')
                $(this).html('Loading...')
                $.ajax({
                    url: "{{ url('/ajax/get-tunggakan-detail/') }}/"+attr
                })
                .done(function(done) {
                    $(`.tombol-bayar[id-spp-bulan-tahun="${attr}"]`).html('Bayar')
                    $('#full-width-modal').modal('show')
                    $('#bayar-spp').html(done.kolom_spp)
                    $('input[name="id_spp_bulan_tahun"]').val(done.id_spp_bulan_tahun)
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            })

            $('#close-bayar').click(function(){
                $('#form-spp').find('input').val('')
                // $('#form-spp').find('label').html(rupiah_format(0))
                $('#total-biaya-juga').html(rupiah_format(0))
                $('#bayar-total-label').html(rupiah_format(0))
                $('#kembalian-label').html(rupiah_format(0))

                $('#total-biaya').val(0)
                $('#bayar-spp').html('')
                $('#full-width-modal').modal('hide')
            })

            $('#form-spp').submit(function(e){
                e.preventDefault()
                let val = $(this).serialize()
                $('#act-simpan').html('Loading...')
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/ajax/get-bayar/') }}",
                    type: 'POST',
                    data: val,
                })
                .done(function(done) {
                    $('#act-simpan').html('Simpan')

                    $('#form-spp').find('input').val('')
                    $('#total-biaya-juga').html(rupiah_format(0))
                    $('#bayar-total-label').html(rupiah_format(0))
                    $('#kembalian-label').html(rupiah_format(0))

                    $('#total-biaya').val(0)
                    $('#bayar-spp').html('')
                    $('#full-width-modal').modal('hide')

                    $(`.tombol-bayar[id-spp-bulan-tahun="${done.id_spp_bulan_tahun}"]`).html('Sudah Bayar')
                    $(`.tombol-bayar[id-spp-bulan-tahun="${done.id_spp_bulan_tahun}"]`).attr('disabled','disabled')

                    $('#nama_siswa').html(done.nama_siswa)
                    $('#total').html(done.total_bayar_rupiah)
                    $('#range_pembayaran').html(done.untuk_pembayaran)
                    $('#terbilang').html(done.terbilang)
                    $('#tanggal_spp').html(`Samarinda, ${done.tanggal_spp_convert}`)
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                
            })

            $(document).on('keyup','input[name="bayar_spp[]"]',function(){
                var val  = $(this).val()
                var attr = $(this).attr('id-kolom-spp')
                if (val == '') {
                    $(`.label-bayar-kolom-spp[id-kolom-spp="${attr}"]`).html(`<b>${rupiah_format(0)}</b>`)
                }
                else {
                    $(`.label-bayar-kolom-spp[id-kolom-spp="${attr}"]`).html(`<b>${rupiah_format(val)}</b>`)   
                }
            })

            $(document).on('change','input[name="bayar_spp[]"]',function(){
                var val         = parseInt($(this).val())
                var total_biaya = parseInt($('#total-biaya').val())
                if (val == '') {
                    val = 0
                }

                let kalkulasi  = total_biaya + val
                $('#total-biaya-juga').html(`<b>${rupiah_format(kalkulasi)}</b>`)
                $('#total-biaya').val(kalkulasi)
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
        })
    </script>
@endsection
