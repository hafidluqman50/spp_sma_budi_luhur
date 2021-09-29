$(() => {
	// $('.data-tables').DataTable();
    $('.select2').select2();
    
	var base_url = 'http://localhost:8000'

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
            {data:'wilayah',name:'wilayah'},
            {data:'total_pembayaran',name:'total_pembayaran'},
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

    var id_spp = $('.data-spp-detail').attr('id-spp')
    var spp_detail = $('.data-spp-detail').DataTable({
        processing:true,
        serverSide:true,
        ajax:base_url+'/datatables/data-spp/detail/'+id_spp,
        columns:[
            {data:'id_spp_detail',searchable:false,render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1;
            }},
            {data:'nama_kolom_spp',name:'nama_kolom_spp'},
            {data:'bayar_spp',name:'bayar_spp'},
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
})