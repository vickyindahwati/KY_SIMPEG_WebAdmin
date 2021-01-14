function loadDataTablePWK(id){

    $("#dt-table-pwk").DataTable().clear().destroy();

    var column = [
            { "data": "satuan_kerja.name"},
            { "data": "kppn.name" },
            { "data": "lokasi.name"},
            { "data": "unor.name"},
            { "data": "navigation" }
    ];
    
    $("#dt-table-pwk").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getTableData",
            "type": "POST",
            "data":{"id":id, "module":"\/user\/pwk"},
        },
        "columns":column
    });
}

//Date picker
$('#x_addedit_pwk_tgl_sk, #x_addedit_pwk_tmt_pemindahan').datepicker({
  autoclose: true,
  endDate: '+0d'
});