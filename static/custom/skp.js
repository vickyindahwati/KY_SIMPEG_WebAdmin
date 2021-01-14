function loadDataTableSKP(id){

    $("#dt-table-skp").DataTable().clear().destroy();

    var column = [
            { "data": "tahun" },
            { "data": "rata_rata"},
            { "data": "keterangan"},
            { "data": "jumlah"},
            { "data": "pejabat_penilai"},
            { "data": "atasan_pejabat_penilai"},
            { "data": "navigation" }
    ];
    
    $("#dt-table-skp").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getTableData",
            "type": "POST",
            "data":{"id":id, "module":"\/user\/skp"},
        },
        "columns":column,
        "scrollX": true,
        columnDefs:[{targets:[1], class:"wrapok"}]
    });
}

$(document).ready(function(){

    loadDataTableSKP( $('#x_id').val() );

    $('#dt-table-skp').on( 'click', 'a[name="link-detail-skp"]', function(){
        var arrData = $(this).attr('data').toString().split(dataSeparator);

        $('#x_skp_jenis_jabatan').val( arrData[0] );
        $('#x_skp_tahun').val( arrData[1] );
        $('#x_skp_nilai_skp').val( arrData[2] );
        $('#x_skp_orientasi_pelayanan').val( arrData[3] );
        $('#x_skp_integritas').val( arrData[4] );
        $('#x_skp_komitmen').val( arrData[5] );
        $('#x_skp_disiplin').val( arrData[6] );
        $('#x_skp_kerjasama').val( arrData[7] );
        $('#x_skp_kepemimpinan').val( arrData[10] );
        $('#x_skp_nilai_perilaku_kerja').val( arrData[8] );
        $('#x_skp_nilai_prestasi_kerja').val( arrData[9] );

        $('#x_skp_status_pejabat_penilai').val( arrData[19] );
        $('#x_skp_nip_pejabat_penilai').val( arrData[13] );
        $('#x_skp_nama_pejabat_penilai').val( arrData[14] );
        $('#x_skp_jabatan_pejabat_penilai').val( arrData[16] );
        $('#x_skp_unor_pejabat_penilai').val( arrData[15] );
        $('#x_skp_golongan_pejabat_penilai').val( arrData[17] );
        $('#x_tmt_golongan_pejabat_penilai').val( arrData[18] );

        $('#x_skp_status_atasan_penilai').val( arrData[24] );
        $('#x_skp_nip_atasan_penilai').val( "-" );
        $('#x_skp_nama_atasan_penilai').val( arrData[25] );
        $('#x_skp_jabatan_atasan_penilai').val( arrData[21] );
        $('#x_skp_unor_atasan_penilai').val( arrData[20] );
        $('#x_skp_golongan_atasan_penilai').val( arrData[22] );
        $('#x_tmt_golongan_atasan_penilai').val( arrData[23] );

    } );
});