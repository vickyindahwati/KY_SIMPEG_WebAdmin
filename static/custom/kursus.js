function loadDataTableKursus(id){

    $("#dt-table-kursus").DataTable().clear().destroy();

    var column = [
            //{ "data": "" },
            { "data": "penyelenggara" },
            //{ "data": ""},
            { "data": "name"},
            { "data": "tahun_kursus"},
            { "data": "lama_kursus"},
            { "data": "tahun_kursus"},
            { "data": "no_sertifikat"}
    ];
    
    $("#dt-table-kursus").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getKursusData",
            "type": "POST",
            "data":{"id":id},
        },
        "columns":column
    });
}