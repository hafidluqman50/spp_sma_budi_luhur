function rupiah_format(string){
    if (Math.sign(string) !== -1) {
        reverse = string.toString().split('').reverse().join(''),
        ribuan  = reverse.match(/\d{1,3}/g);
        ribuan  = 'Rp. '+ribuan.join('.').split('').reverse().join('')+',00';
        return ribuan;
    }
}
$(() => {
	// $('.data-tables').DataTable();
    $('.selectize').selectize({
        create:true,
        sortField:'text'
    });
    $('.select2').select2();
    
	// var base_url = 'http://localhost:8000'
    var base_url = 'http://project_work.web'

    var siswa = $('.data-siswa').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-siswa',
        columns:[
            {data:'id_siswa',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nisn',name:'nisn'},
            {data:'nama_siswa',name:'nama_siswa'},
            {data:'jenis_kelamin',name:'jenis_kelamin'},
            {data:'tanggal_lahir',name:'tanggal_lahir'},
            {data:'nomor_orang_tua',name:'nomor_orang_tua'},
            {data:'wilayah',name:'wilayah'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    siswa.on( 'order.dt search.dt', function () {
        siswa.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var kelas = $('.data-kelas').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-kelas',
        columns:[
            {data:'id_kelas',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'kelas',name:'kelas'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    kelas.on( 'order.dt search.dt', function () {
        kelas.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var tahun_ajaran = $('.data-tahun-ajaran').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-tahun-ajaran',
        columns:[
            {data:'id_kelas_siswa',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'tahun_ajaran',name:'tahun_ajaran'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    tahun_ajaran.on( 'order.dt search.dt', function () {
        tahun_ajaran.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    let id_kelas = $('.data-kelas-siswa').attr('id-kelas')
    var kelas_siswa = $('.data-kelas-siswa').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-kelas-siswa/'+id_kelas,
        columns:[
            {data:'id_kelas_siswa',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nisn',name:'nisn'},
            {data:'nama_siswa',name:'nama_siswa'},
            {data:'kelas',name:'kelas'},
            {data:'tahun_ajaran',name:'tahun_ajaran'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    kelas_siswa.on( 'order.dt search.dt', function () {
        kelas_siswa.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var kantin = $('.data-kantin').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-kantin/',
        columns:[
            {data:'id_kantin',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nama_kantin',name:'nama_kantin'},
            {data:'lokasi_kantin',name:'lokasi_kantin'},
            {data:'biaya_perbulan',name:'biaya_perbulan'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    kantin.on( 'order.dt search.dt', function () {
        kantin.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var kolom_spp = $('.data-kolom-spp').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-kolom-spp/',
        columns:[
            {data:'id_kolom_spp',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nama_kolom_spp',name:'nama_kolom_spp'},
            {data:'keterangan_kolom',name:'keterangan_kolom'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    kolom_spp.on( 'order.dt search.dt', function () {
        kolom_spp.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var spp = $('.data-spp').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/',
        columns:[
            {data:'id_spp',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nisn',name:'nisn'},
            {data:'nama_siswa',name:'nama_siswa'},
            {data:'kelas',name:'kelas'},
            {data:'tahun_ajaran',name:'tahun_ajaran'},
            {data:'wilayah',name:'wilayah'},
            {data:'total_harus_bayar',name:'total_harus_bayar'},
            {data:'name',name:'name'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp.on( 'order.dt search.dt', function () {
        spp.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var id_spp = $('.data-spp-bulan-tahun').attr('id-spp')
    var spp_bulan_tahun = $('.data-spp-bulan-tahun').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/bulan-tahun/'+id_spp,
        columns:[
            {data:'id_spp_bulan_tahun',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'bulan_tahun',name:'bulan_tahun'},
            {data:'nama_kantin',name:'nama_kantin'},
            {data:'status_pelunasan',name:'status_pelunasan'},
            {data:'total_kalkulasi',name:'total_kalkulasi'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 2, 'asc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_bulan_tahun.on( 'order.dt search.dt', function () {
        spp_bulan_tahun.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var id_spp_bulan_tahun_ = $('.data-spp-bayar').attr('id-bulan-tahun')
    var spp_bayar = $('.data-spp-bayar').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/bayar/'+id_spp_bulan_tahun_,
        columns:[
            {data:'id_spp_bayar',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'tanggal_bayar',name:'tanggal_bayar'},
            {data:'total_biaya',name:'total_biaya'},
            {data:'nominal_bayar',name:'nominal_bayar'},
            {data:'kembalian',name:'kembalian'},
            {data:'keterangan_bayar',name:'keterangan_bayar'},
            {data:'name',name:'name'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_bayar.on( 'order.dt search.dt', function () {
        spp_bayar.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var id_spp_bulan_tahun = $('.data-spp-detail').attr('id-spp-bulan-tahun')
    var spp_detail = $('.data-spp-detail').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/detail/'+id_spp_bulan_tahun,
        columns:[
            {data:'id_spp_detail',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nama_kolom_spp',name:'nama_kolom_spp'},
            {data:'nominal_spp',name:'nominal_spp'},
            {data:'bayar_spp',name:'bayar_spp'},
            {data:'sisa_bayar',name:'sisa_bayar'},
            {data:'status_bayar',name:'status_bayar'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_detail.on( 'order.dt search.dt', function () {
        spp_detail.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var id_spp_bulan_tahun_petugas_ = $('.data-spp-bayar-petugas').attr('id-bulan-tahun')
    var spp_bayar_petugas = $('.data-spp-bayar-petugas').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/bayar/'+id_spp_bulan_tahun_petugas_,
        columns:[
            {data:'id_spp_bayar',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'tanggal_bayar',name:'tanggal_bayar'},
            {data:'total_biaya',name:'total_biaya'},
            {data:'nominal_bayar',name:'nominal_bayar'},
            {data:'kembalian',name:'kembalian'},
            {data:'keterangan_bayar',name:'keterangan_bayar'},
            {data:'name',name:'name'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_bayar_petugas.on( 'order.dt search.dt', function () {
        spp_bayar_petugas.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var id_siswa = $('.spp-ortu').attr('id-siswa')
    var spp_ortu = $('.spp-ortu').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/spp-ortu/'+id_siswa,
        columns:[
            {data:'id_spp_bulan_tahun',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'bulan_tahun',name:'bulan_tahun'},
            {data:'status_pelunasan',name:'status_pelunasan'},,
            {data:'total_kalkulasi',name:'total_kalkulasi'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 2, 'asc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_ortu.on( 'order.dt search.dt', function () {
        spp_ortu.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var id_detail_spp_ortu = $('.spp-ortu-detail').attr('id-spp-bulan-tahun')
    var spp_detail_ortu = $('.spp-ortu-detail').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/spp-ortu/detail/'+id_detail_spp_ortu,
        columns:[
            {data:'id_spp_bayar',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'tanggal_bayar',name:'tanggal_bayar'},
            {data:'total_biaya',name:'total_biaya'},
            {data:'nominal_bayar',name:'nominal_bayar'},
            {data:'kembalian',name:'kembalian'},
            {data:'keterangan_bayar',name:'keterangan_bayar'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_detail_ortu.on( 'order.dt search.dt', function () {
        spp_detail_ortu.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var siswa_ortu = $('.siswa-ortu').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-siswa-ortu',
        columns:[
            {data:'id_kelas_siswa',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nisn',name:'nisn'},
            {data:'nama_siswa',name:'nama_siswa'},
            {data:'kelas',name:'kelas'},
            {data:'tahun_ajaran',name:'tahun_ajaran'},
            {data:'wilayah',name:'wilayah'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    siswa_ortu.on( 'order.dt search.dt', function () {
        siswa_ortu.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var petugas = $('.data-petugas').DataTable({
        processing:true,
        serverSide:true,
        ajax:`${base_url}/datatables/data-petugas`,
        columns:[
            {data:'id_petugas',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nama_petugas',name:'nama_petugas'},
            {data:'username',name:'username'},
            {data:'jabatan_petugas',name:'jabatan_petugas'},
            {data:'status_akun',name:'status_akun'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        targets: 0
        }],
        order: [[ 1, 'desc' ]],
        scrollX:true,
        fixedColumns: true
    });
    petugas.on( 'order.dt search.dt', function () {
        petugas.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var kepsek = $('.data-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:`${base_url}/datatables/data-kepsek`,
        columns:[
            {data:'id_kepsek',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nip_kepsek',name:'nip_kepsek'},
            {data:'nama_kepsek',name:'nama_kepsek'},
            {data:'username',name:'username'},
            {data:'status_akun',name:'status_akun'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        targets: 0
        }],
        order: [[ 1, 'desc' ]],
        scrollX:true,
        fixedColumns: true
    });
    kepsek.on( 'order.dt search.dt', function () {
        kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    // DATATABLES KEPSEK //
    var siswa_kepsek = $('.data-siswa-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-siswa',
        columns:[
            {data:'id_siswa',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nisn',name:'nisn'},
            {data:'nama_siswa',name:'nama_siswa'},
            {data:'jenis_kelamin',name:'jenis_kelamin'},
            {data:'tanggal_lahir',name:'tanggal_lahir'},
            {data:'nomor_orang_tua',name:'nomor_orang_tua'},
            {data:'wilayah',name:'wilayah'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    siswa_kepsek.on( 'order.dt search.dt', function () {
        siswa_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var kelas_kepsek = $('.data-kelas-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-kelas',
        columns:[
            {data:'id_kelas',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'kelas',name:'kelas'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    kelas_kepsek.on( 'order.dt search.dt', function () {
        kelas_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var tahun_ajaran_kepsek = $('.data-tahun-ajaran-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-tahun-ajaran',
        columns:[
            {data:'id_kelas_siswa',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'tahun_ajaran',name:'tahun_ajaran'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    tahun_ajaran_kepsek.on( 'order.dt search.dt', function () {
        tahun_ajaran_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    let id_kelas_kepsek = $('.data-kelas-siswa-kepsek').attr('id-kelas')
    var kelas_siswa_kepsek = $('.data-kelas-siswa-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-kelas-siswa/'+id_kelas_kepsek,
        columns:[
            {data:'id_kelas_siswa',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nisn',name:'nisn'},
            {data:'nama_siswa',name:'nama_siswa'},
            {data:'kelas',name:'kelas'},
            {data:'tahun_ajaran',name:'tahun_ajaran'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    kelas_siswa_kepsek.on( 'order.dt search.dt', function () {
        kelas_siswa_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var kantin_kepsek = $('.data-kantin-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-kantin/',
        columns:[
            {data:'id_kantin',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nama_kantin',name:'nama_kantin'},
            {data:'lokasi_kantin',name:'lokasi_kantin'},
            {data:'biaya_perbulan',name:'biaya_perbulan'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    kantin_kepsek.on( 'order.dt search.dt', function () {
        kantin_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var kolom_spp_kepsek = $('.data-kolom-spp-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-kolom-spp/',
        columns:[
            {data:'id_kolom_spp',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nama_kolom_spp',name:'nama_kolom_spp'},
            {data:'keterangan_kolom',name:'keterangan_kolom'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    kolom_spp_kepsek.on( 'order.dt search.dt', function () {
        kolom_spp_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var spp_kepsek = $('.data-spp-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/',
        columns:[
            {data:'id_spp',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nisn',name:'nisn'},
            {data:'nama_siswa',name:'nama_siswa'},
            {data:'kelas',name:'kelas'},
            {data:'tahun_ajaran',name:'tahun_ajaran'},
            {data:'wilayah',name:'wilayah'},
            {data:'total_harus_bayar',name:'total_harus_bayar'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_kepsek.on( 'order.dt search.dt', function () {
        spp_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var id_spp_kepsek = $('.data-spp-bulan-tahun-kepsek').attr('id-spp')
    var spp_bulan_tahun_kepsek = $('.data-spp-bulan-tahun-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/bulan-tahun/'+id_spp_kepsek,
        columns:[
            {data:'id_spp_bulan_tahun',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'bulan_tahun',name:'bulan_tahun'},
            {data:'status_pelunasan',name:'status_pelunasan'},
            {data:'total_kalkulasi',name:'total_kalkulasi'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 2, 'asc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_bulan_tahun_kepsek.on( 'order.dt search.dt', function () {
        spp_bulan_tahun_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var id_spp_bulan_tahun_kepsek = $('.data-spp-bayar-kepsek').attr('id-bulan-tahun')
    var spp_bayar_kepsek = $('.data-spp-bayar-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/bayar/'+id_spp_bulan_tahun_kepsek,
        columns:[
            {data:'id_spp_bayar',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'tanggal_bayar',name:'tanggal_bayar'},
            {data:'total_biaya',name:'total_biaya'},
            {data:'nominal_bayar',name:'nominal_bayar'},
            {data:'kembalian',name:'kembalian'},
            {data:'keterangan_bayar',name:'keterangan_bayar'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_bayar_kepsek.on( 'order.dt search.dt', function () {
        spp_bayar_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var id_spp_bulan_tahun_kepsek = $('.data-spp-detail-kepsek').attr('id-spp-bulan-tahun')
    var spp_detail_kepsek = $('.data-spp-detail-kepsek').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/detail/'+id_spp_bulan_tahun_kepsek,
        columns:[
            {data:'id_spp_detail',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nama_kolom_spp',name:'nama_kolom_spp'},
            {data:'nominal_spp',name:'nominal_spp'},
            {data:'bayar_spp',name:'bayar_spp'},
            {data:'sisa_bayar',name:'sisa_bayar'},
            {data:'status_bayar',name:'status_bayar'}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    spp_detail_kepsek.on( 'order.dt search.dt', function () {
        spp_detail_kepsek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();
    // END DATATABLES KEPSEK //

    var history_spp = $('.data-history-spp').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-history-spp/',
        columns:[
            {data:'id_history_proses_spp',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'text',name:'text'},
            {data:'created_at',name:'created_at'},
            {data:'action',name:'action',searchable:false,orderable:false}
        ],
        scrollCollapse: true,
        columnDefs: [ {
        sortable: true,
        "class": "index",
        }],
        scrollX:true,
        order: [[ 0, 'desc' ]],
        responsive:true,
        fixedColumns: true
    });
    history_spp.on( 'order.dt search.dt', function () {
        history_spp.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();
})