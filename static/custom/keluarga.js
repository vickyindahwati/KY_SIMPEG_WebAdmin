function loadDataTableKeluarga(id,parentUserFamilyId, type){

    $("#dt-table-keluarga").DataTable().clear().destroy();

    var column;
    if( type == 2 ){
        column = [
            { "data": "relasi_name" },
            { "data": "name" },
            { "data": "status_hidup_name" },
            { "data": "is_pns"},
            { "data": "link_edit"}
        ];
    }else if( type == 3 ){
        column = [
            { "data": "name" },
            { "data": "jenis_kelamin.name" },
            { "data": "tempat_lahir" },
            { "data": "tanggal_lahir"},
            { "data": "status_anak"}      
        ];
    }
    
    $("#dt-table-keluarga").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getKeluargaData",
            "type": "POST",
            "data":{"id":id, "type":type, "parentUserFamilyId": parentUserFamilyId},
        },
        "columns":column
    });
}


