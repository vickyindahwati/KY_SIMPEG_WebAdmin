function loadDataTableRiwayatPendidikanUmum(id,type){
    //alert(indexURL + "/employee/getRiwayatPangkat")
    $("#dt-table-riwayat-pendidikan-umum").DataTable().clear().destroy();
    
    $("#dt-table-riwayat-pendidikan-umum").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getRiwayatPendidikanUmum",
            "type": "POST",
            "data":{"id":id, "type":type},
        },
        "columns":[
            { "data": "index" },
            { "data": "pendidikan_nama" },
            { "data": "jurusan_nama" },
            { "data": "nama_sekolah" },
            { "data": "alamat_sekolah" },
            { "data": "no_sttb" },
            { "data": "tgl_kelulusan" },
            { "data": "tahun_kelulusan" }
           
        ],
        destroy: true,
        scrollX: true
    });
}  

$(document).ready(function(){
    loadDataTableRiwayatPendidikanUmum( $('#x_id').val() );

});