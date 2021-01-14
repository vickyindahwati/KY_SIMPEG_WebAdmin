function loadDataTableProfesi(id){

    $("#dt-table-profesi").DataTable().clear().destroy();

    var column = [
            { "data": "profesi.name" },
            { "data": "penyelenggara"},
            { "data": "tahun_lulus"},
            { "data": "navigation" }
    ];
    
    $("#dt-table-profesi").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getTableData",
            "type": "POST",
            "data":{"id":id, "module":"\/user\/profesi"},
        },
        "columns":column,
        "scrollX": true,
        columnDefs:[{targets:[1], class:"wrapok"}]
    });
}