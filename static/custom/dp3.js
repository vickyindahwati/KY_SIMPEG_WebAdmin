function loadDataTableDP3(id){

    $("#dt-table-dp3").DataTable().clear().destroy();

    var column = [
            { "data": "tahun" },
            { "data": "nilai_rata"},
            { "data": "nilai_desc"},
            { "data": "jumlah"},
            { "data": "pejabat_penilai"},
            { "data": "navigation"},
    ];
    
    $("#dt-table-dp3").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getDP3Data",
            "type": "POST",
            "data":{"id":id},
        },
        "columns":column
    });
}