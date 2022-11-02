$(() => {
    $('.selectize-control:first').attr('pendapatan-id',1)
    $('input[name="saldo_awal"]').keyup(function(){
        let val = $(this).val()
        if (val == 0) {
            $('.saldo-awal-label').html(rupiah_format(0))
        }
        else {
            $('.saldo-awal-label').html(rupiah_format(val))
        }
    })

    var input_perincian_id        = 2;
    var pendapatan_id             = 2;
    var pendapatan_input_id       = 2;
    var nominal_rincian_input     = 2;
    var nominal_pendapatan_select = 2;
    var nominal_pendapatan_input  = 2;
    var nominal_rab_input         = 2;
    var nominal_rincian_label     = 2;
    var nominal_pendapatan_label  = 2;
    var nominal_rab_label         = 2;
    var hapus_id                  = 2;
    var btn_input_pendapatan      = 2;
    var btn_pilih_pendapatan      = 2;

    $('#input-act-perincian-sekolah').click(() => {
        $('.pendapatan').each(function(){
            if ($(this)[0].selectize) { // requires [0] to select the proper object
                var value = $(this).val(); // store the current value of the select/input
                $(this)[0].selectize.destroy(); // destroys selectize()
                $(this).val(value);  // set back the value of the select/input
            }
        })

        $('#input-perincian').clone().appendTo('#layout-input-perincian')
        $('.pendapatan').selectize({
            create:true,
            sortField:'text'
        })

        $('.input-perincian:last').attr('input-perincian-id',input_perincian_id++)

        if ($('select.pendapatan:last').hasClass('form-hide')) {
            $('select.pendapatan:last').removeClass('form-hide')
        }

        $('select.pendapatan:last').attr('pendapatan-id',pendapatan_id++)

        $('select.pendapatan').each(function(index,element){
            console.log(index)
            let attr = $(this).attr('pendapatan-id')
            $('.selectize-control').eq(index).attr('pendapatan-id',attr)
        })

        $('.pendapatan:last').attr('pendapatan-id',pendapatan_id)

        $('.pendapatan-input:last').attr('pendapatan-input-id',pendapatan_input_id++)

        $('.nominal-rincian:last').attr('nominal-rincian-id',nominal_rincian_input++)
        $('.nominal-pendapatan:last').attr('nominal-pendapatan-id',nominal_pendapatan_select++)
        $('.nominal-pendapatan-input:last').attr('nominal-pendapatan-input-id',nominal_pendapatan_input++)
        $('.nominal-rab:last').attr('nominal-rab-id',nominal_rab_input++)

        $('.nominal-rincian-label:last').attr('nominal-rincian-id',nominal_rincian_label++)
        $('.nominal-pendapatan-label:last').attr('nominal-pendapatan-label-id',nominal_pendapatan_label++)
        $('.nominal-rab-label:last').attr('nominal-rab-id',nominal_rab_label++)

        $('.hapus-act-perincian:last').attr('hapus-id',hapus_id++)
        $('.input-pendapatan:last').attr('input-pendapatan-id',btn_input_pendapatan++)
        $('.pilih-pendapatan:last').attr('pilih-pendapatan-id',btn_pilih_pendapatan++)

        if ($('.input-pendapatan:last').hasClass('form-hide')) {
            $('.input-pendapatan:last').removeClass('form-hide')
        }

        if (!$('.pilih-pendapatan:last').hasClass('form-hide')) {
            $('.pilih-pendapatan:last').addClass('form-hide')
        }

        if ($('select.pendapatan:last').hasClass('form-hide') || $('.selectize-control:last').hasClass('form-hide')) {
            $('select.pendapatan:last').removeClass('form-hide')
            $('.selectize-control:last').removeClass('form-hide')
            $('.nominal-pendapatan:last').removeClass('form-hide')

            $('.pendapatan-input:last').addClass('form-hide')
            $('.nominal-pendapatan-input:last').addClass('form-hide')
        }

        $('.input-perincian:last').find('input').val('')

        $('.nominal-pendapatan:last').val()
        $('.nominal-pendapatan-input:last').val()

        $('.nominal-rincian-label:last').html(`${rupiah_format(0)}`)
        $('.nominal-rab-label:last').html(`${rupiah_format(0)}`)
        $('.nominal-pendapatan-label:last').html(rupiah_format(0))

        $('.hapus-act-perincian-sekolah:last').removeClass('form-hide')
    })


    var input_perincian_uang_makan_id    = 2;
    var nominal_rincian_uang_makan_input = 2;
    var nominal_rincian_uang_makan_label = 2;
    var hapus_uang_makan_id              = 2;

    $('#input-act-perincian-uang-makan').click(() => {

        $('#input-uang-makan').clone().appendTo('#layout-input-uang-makan')

        $('.input-uang-makan:last').attr('input-uang-makan-id',input_perincian_uang_makan_id++)

        $('.nominal-rincian-uang-makan:last').attr('nominal-rincian-id',nominal_rincian_uang_makan_input++)

        $('.nominal-rincian-label:last').attr('nominal-rincian-id',nominal_rincian_uang_makan_label++)

        $('.hapus-act-perincian-uang-makan:last').attr('hapus-uang-makan-id',hapus_uang_makan_id++)

        $('.input-uang-makan:last').find('input').val('')

        $('.hapus-act-perincian-uang-makan:last').removeClass('form-hide')
    })

    $(document).on('keyup','.nominal-rincian',function() {
        let val  = $(this).val()
        let attr = $(this).attr('nominal-rincian-id')
        if (val == 0) {
            $(`.nominal-rincian-label[nominal-rincian-id="${attr}"]`).html(rupiah_format(0))
        }
        else {
            $(`.nominal-rincian-label[nominal-rincian-id="${attr}"]`).html(rupiah_format(val))
        }
    })

    $(document).on('keyup','.nominal-pendapatan',function() {
        let val  = $(this).val()
        let attr = $(this).attr('nominal-pendapatan-id')
        if (val == 0) {
            $(`.nominal-pendapatan-label[nominal-pendapatan-id="${attr}"]`).html(rupiah_format(0))
        }
        else {
            $(`.nominal-pendapatan-label[nominal-pendapatan-id="${attr}"]`).html(rupiah_format(val))
        }
    })
    $(document).on('keyup','.nominal-rab',function() {
        let val  = $(this).val()
        let attr = $(this).attr('nominal-rab-id')
        if (val == 0) {
            $(`.nominal-rab-label[nominal-rab-id="${attr}"]`).html(rupiah_format(0))
        }
        else {
            $(`.nominal-rab-label[nominal-rab-id="${attr}"]`).html(rupiah_format(val))
        }
    })
    $(document).on('change','select.pendapatan',function() {
        let val           = $(this).val()
        let attr          = $(this).attr('pendapatan-id')
        let bulan_laporan = $('select[name="bulan_laporan"]').val()
        let tahun_laporan = $('input[name="tahun_laporan"]').val()

        $.ajax({
            url: `${base_url}/ajax/get-pendapatan-spp`,
            data: {id_kolom_spp: val,bulan_laporan: bulan_laporan, tahun_laporan: tahun_laporan},
        })
        .done(function(done) {
            $(`.nominal-pendapatan[nominal-pendapatan-id="${attr}"]`).val(done);
            $(`.nominal-pendapatan-label[nominal-pendapatan-label-id="${attr}"]`).html(rupiah_format(done))
        })
        .fail(function(fail) {
            console.log(fail)
        });
        
    })
    $(document).on('click','.hapus-act-perincian',function() {
        let attr = $(this).attr('hapus-id')
        $(`.input-perincian[input-perincian-id="${attr}"]`).remove()
        // $('.input-perincian').last().remove()
        // if ($('.input-perincian').length == 1) {
        //     $('#hapus-act-perincian').addClass('form-hide')
        // }
    })
    $(document).on('click', '.input-pendapatan', function() {
        let attr = $(this).attr('input-pendapatan-id')
        $(this).addClass('form-hide')
        $(`.pilih-pendapatan[pilih-pendapatan-id="${attr}"]`).removeClass('form-hide')
        console.log($(this).addClass('form-hide'))

        $(`select.pendapatan[pendapatan-id="${attr}"]`)[0].selectize.clear()
        $(`select.pendapatan[pendapatan-id="${attr}"], .selectize-control[pendapatan-id="${attr}"]`).addClass('form-hide')
        // $(`select.pendapatan[pendapatan-id="${attr}"].selectize-control`).addClass('form-hide')
        $(`.pendapatan-input[pendapatan-input-id="${attr}"]`).removeClass('form-hide')
        $(`.pendapatan-input[pendapatan-input-id="${attr}"]`).val('')

        $(`.nominal-pendapatan[nominal-pendapatan-id="${attr}"]`).val('')
        $(`.nominal-pendapatan[nominal-pendapatan-id="${attr}"]`).addClass('form-hide')
        $(`.nominal-pendapatan-label[nominal-pendapatan-label-id="${attr}"]`).html(rupiah_format(0))

        $(`.nominal-pendapatan-input[nominal-pendapatan-input-id="${attr}"]`).removeClass('form-hide')
        $(`.nominal-pendapatan-input[nominal-pendapatan-input-id="${attr}"]`).val('')
    });

    $(document).on('click', '.pilih-pendapatan', function() {
        let attr = $(this).attr('pilih-pendapatan-id')
        $(this).addClass('form-hide')
        $(`.input-pendapatan[input-pendapatan-id="${attr}"]`).removeClass('form-hide')

        $(`select.pendapatan[pendapatan-id="${attr}"]`)[0].selectize.clear()
        $(`select.pendapatan[pendapatan-id="${attr}"], .selectize-control[pendapatan-id="${attr}"]`).removeClass('form-hide')
        $(`.pendapatan-input[pendapatan-input-id="${attr}"]`).addClass('form-hide')
        $(`.pendapatan-input[pendapatan-input-id="${attr}"]`).val('')

        $(`.nominal-pendapatan[nominal-pendapatan-id="${attr}"]`).val('')
        $(`.nominal-pendapatan[nominal-pendapatan-id="${attr}"]`).removeClass('form-hide')
        $(`.nominal-pendapatan-label[nominal-pendapatan-label-id="${attr}"]`).html(rupiah_format(0))

        $(`.nominal-pendapatan-input[nominal-pendapatan-input-id="${attr}"]`).addClass('form-hide')
        $(`.nominal-pendapatan-input[nominal-pendapatan-input-id="${attr}"]`).val('')
    });

    $(document).on('keyup','.nominal-pendapatan-input',function(){
        let attr = $(this).attr('nominal-pendapatan-input-id')
        let val  = $(this).val()

        if (val != '') {
            $(`.nominal-pendapatan-label[nominal-pendapatan-label-id="${attr}"]`).html(rupiah_format(val))
        }
        else {
            $(`.nominal-pendapatan-label[nominal-pendapatan-label-id="${attr}"]`).html(rupiah_format(0))   
        }
    })

    $('input[name="tahun_laporan"]').keyup(function(){
        let val           = $(this).val()
        let bulan_laporan = $('input[name="bulan_laporan"]').val()
        $.ajax({
            url: `${base_url}/ajax/get-pemasukan-uang-makan`,
            data: {tahun_laporan: val, bulan_laporan:bulan_laporan},
        })
        .done(function(done) {
            $('.pemasukan-uang-makan').val(done)
            $('.pemasukan-uang-makan-label').val(rupiah_format(done))
        })
        .fail(function(error) {
            console.log(error);
        });
        
    })

    $(document).on('change','.kantin',function(){
        let val           = $(this).val()
        let attr          = $(this).attr('kantin-id')
        let bulan_laporan = $('select[name="bulan_laporan"]').val()
        let tahun_laporan = $('input[name="tahun_laporan"]').val()

        $.ajax({
            url: `${base_url}/ajax/get-pemasukan-kantin`,
            data: {id_kantin: val, bulan_laporan: bulan_laporan, tahun_laporan: tahun_laporan},
        })
        .done(function(done) {
            $(`.nominal-rincian-uang-makan[nominal-rincian-uang-makan-id="${attr}"]`).val(done)
            $(`.nominal-rincian-uang-makan-label[nominal-rincian-uang-makan-id="${attr}"]`).html(rupiah_format(done))
        })
        .fail(function(error) {
            console.log(error)
        });
        
    })
})