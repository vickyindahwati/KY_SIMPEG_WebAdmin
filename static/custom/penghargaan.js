function loadDataTablePenghargaan(id){

    $("#dt-table-penghargaan").DataTable().clear().destroy();

    var column = [
            { "data": "jenis_penghargaan.name" },
            { "data": "tgl_sk"},
            { "data": "no_sk"},
            { "data": "tahun"}
    ];
    
    $("#dt-table-penghargaan").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getPenghargaanData",
            "type": "POST",
            "data":{"id":id},
        },
        "columns":column
    });
}