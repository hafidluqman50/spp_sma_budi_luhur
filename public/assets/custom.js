$(() => {
	// $('.data-tables').DataTable();
    $('.select2').select2();
    
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
})