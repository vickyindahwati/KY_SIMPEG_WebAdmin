function loadDataTableRiwayatPangkat(id,type){
    //alert(indexURL + "/employee/getRiwayatPangkat")
    $("#dt-table-riwayat-pangkat").DataTable().clear().destroy();
    
    $("#dt-table-riwayat-pangkat").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getRiwayatPangkat",
            "type": "POST",
            "data":{"id":id, "type":type},
        },
        "columns":[
            { "data": "index" },
            { "data": "golongan.name" },
            { "data": "pangkat.name" },
            { "data": "tmt_golongan" },
            { "data": "tmt_pangkat" },
            { "data": "no_nota" },
            { "data": "tgl_nota" },
            { "data": "no_sk" },
            { "data": "tgl_sk" },
            { "data": "jenis_kp.name" },
            { "data": "masa_kerja_thn" },
            { "data": "masa_kerja_bln" }
           
        ],
        destroy: true,
        "scrollX": true,
        columnDefs:[{targets:[3], class:"wrapok"}]
    });
}  

$(document).ready(function(){
    loadDataTableRiwayatPangkat( $('#x_id').val() );

});