function loadDataTableRiwayatPendidikanDiklat(id,type){
    //alert(indexURL + "/employee/getRiwayatPangkat")
    $("#dt-table-riwayat-pendidikan-diklat").DataTable().clear().destroy();
    
    $("#dt-table-riwayat-pendidikan-diklat").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getRiwayatPendidikanDiklat",
            "type": "POST",
            "data":{"id":id, "type":type},
        },
        "columns":[
            { "data": "index" },
            { "data": "nama_diklat" },
            { "data": "tanggal_mulai" }
           
        ],
        destroy: true,
        scrollX: true
    });
}  

$(document).ready(function(){
    loadDataTableRiwayatPendidikanDiklat( $('#x_id').val() );

});