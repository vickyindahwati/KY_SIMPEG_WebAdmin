function loadDataTablePindahInstansi(id){

    $("#dt-table-pindahinstansi").DataTable().clear().destroy();

    var column = [
            { "data": "jenis_pemindahan"},
            { "data": "tmt_pi" },
            { "data": "tgl_sk"},
            { "data": "insduk_baru.name"},
            { "data": "insker_baru.name"},
            { "data": "insduk_lama.name"},
            { "data": "insker_lama.name"},
            { "data": "navigation" }
    ];
    
    $("#dt-table-pindahinstansi").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getTableData",
            "type": "POST",
            "data":{"id":id, "module":"\/user\/pindah_instansi"},
        },
        "columns":column
    });
}

//Date picker
$(' #x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_1,' + 
  ' #x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_2, ' + 
  ' #x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_3, ' + 
  ' #x_addedit_pindahinstansi_no_surat_instansi_tgl_sk_4, ' + 
  ' #x_addedit_pindahinstansi_tgl_sk, ' + 
  ' #x_addedit_pindahinstansi_tmt_pi').datepicker({
  autoclose: true,
  endDate: '+0d'
});