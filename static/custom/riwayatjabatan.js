function loadDataTableRiwayatJabatan(id,type){
    //alert(indexURL + "/employee/getRiwayatPangkat")
    $("#dt-table-riwayat-jabatan").DataTable().clear().destroy();
    
    $("#dt-table-riwayat-jabatan").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getRiwayatJabatan",
            "type": "POST",
            "data":{"id":id, "type":type},
        },
        "columnDefs": [
            {
                "targets": "_all",
                "className": "dt-body-nowrap"
            }
        ],
        "columns":[
            { "data": "index" },
            { "data": "jenis_jabatan.name" },
            { "data": "instansi_kerja.name"},
            { "data": "satuan_kerja.name"},
            { "data": "unor.name"},
            { "data": "unor_induk.name"},
            { "data": "eselon.name"},
            { "data": "jabatan_fungsional.name"},
            { "data": "jabatan_fungsional_umum.name"},
            { "data": "tmt_jabatan"},
            { "data": "no_sk"},
            { "data": "tanggal_sk"},
            { "data": "tmt_pelantikan"},
        ],
        destroy: true,
        scrollX: true
    });
}  

$(document).ready(function(){
    loadDataTableRiwayatJabatan( $('#x_id').val() );

});