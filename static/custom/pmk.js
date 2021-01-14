function loadDataTablePMK(id){

    $("#dt-table-pmk").DataTable().clear().destroy();

    var column = [
            
            { "data": "jenis_pmk.name" },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir"},
            { "data": "instansi_perusahaan"},
            { "data": "no_surat_keputusan"},
            { "data": "tgl_sk"},
            { "data": "no_bkn"},
            { "data": "tgl_bkn"},
            { "data": "masa_kerja"},
            { "data": "link_upload_sk"}           
    ];
    
    $("#dt-table-pmk").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getPMKData",
            "type": "POST",
            "data":{"id":id},
        },
        "columns":column,
        "scrollX": true,
        columnDefs:[{targets:[-1], class:"wrapok"}]
    });
}

var uploadSKPMKFile = {
    url: indexURL + "/profile/uploadSKPMK",
    dragDrop:true,
    fileName: "x_file_pmk",
    allowedTypes:"png,jpg,jpeg,zip,rar", 
    returnType:"json",
    onSuccess:function(files,data,xhr)
    {
        $('#x_file_pmk').val(data);
        //$('#x_img_photo_profile').attr('src',pathPhotoProfile + data);
    },
    showDelete:true,
    deleteCallback: function(data,pd)
    {
        for(var i=0;i<data.length;i++)
        {
            $.post(indexURL + "/profile/cancelUploadSKPMK",{op:"delete",name:data[i]},
            function(resp, textStatus, jqXHR)
            {
                //Show Message  
                $("#status").append("<div>File Deleted</div>");      
            });
        }      
        pd.statusbar.hide(); //You choice to hide/not.

        $('#x_file_pmk').val('');
        // $('#container-file-excel').html('');

    }
}
var uploadObj = $("#mulitplefileuploader_SK_PMK").uploadFile(uploadSKPMKFile);

$("form#form-upload-sk-pmk").validationEngine('attach',{
            onValidationComplete: function(form,status) {
                if (status === true) {
                    $.ajax({

                        type        : 'POST',
                        url         : indexURL + '/profile/saveUploadSK',
                        data        : $('#form-upload-sk-pmk').serialize(),
                        dataType    : 'json',
                        beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                        success     : function(data){        
                                        $('#modal-loader').modal('hide');
                                        $('#modal-upload-sk-pmk').modal('hide');                                       

                                        if( data.status_code == '00' ){   
                                            $('#modal-message').modal('show');                                    
                                            $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                            loadDataTablePMK( $('#x_id').val() );
                                        }else{
                                            $('#modal-message').modal('show');
                                            $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        }                                

                                    }

                    });

                }

            }

        });

