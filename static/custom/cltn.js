function loadDataTableCLTN(id){

    $("#dt-table-cltn").DataTable().clear().destroy();

    var column = [
            { "data": "jenis_cltn.name"},
            { "data": "no_sk_cltn" },
            { "data": "tgl_skep"},
            { "data": "tgl_awal"},
            { "data": "tgl_akhir"},
            { "data": "tgl_aktif"},
            { "data": "no_bkn"},
            { "data": "tgl_bkn"},
            { "data": "navigation" }
    ];
    
    $("#dt-table-cltn").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getTableData",
            "type": "POST",
            "data":{"id":id, "module":"\/user\/cltn"},
        },
        "columns":column,
        "scrollX": true
    });
}

//Date picker
$(' #x_addedit_cltn_tgl_skep,' + 
  ' #x_addedit_cltn_tgl_awal, ' + 
  ' #x_addedit_cltn_tgl_akhir, ' + 
  ' #x_addedit_cltn_tgl_aktif, ' + 
  ' #x_addedit_cltn_tgl_bkn').datepicker({
  autoclose: true,
  endDate: '+0d'
});