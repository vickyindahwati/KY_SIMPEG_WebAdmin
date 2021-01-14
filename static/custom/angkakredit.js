function loadDataTableAngkaKredit(id){

    $("#dt-table-angkakredit").DataTable().clear().destroy();

    var column = [
            { "data": "no_sk" },
            { "data": "tgl_sk" },
            { "data": "kredit_utama_baru"},
            { "data": "kredit_penunjang_baru"},
            { "data": "total_kredit"},
            { "data": "nama_jabatan"},
            { "data": "link_upload_sk"}
    ];
    
    $("#dt-table-angkakredit").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getTableData",
            "type": "POST",
            "data":{"id":id, "module":"\/user\/angka_kredit"},
        },
        "columns":column,
        "scrollX": true
    });
}

$(document).ready(function(){
    loadDataTableAngkaKredit( $('#x_id').val() );

    $('#dt-table-angkakredit').on('click', 'a[name="link-modal-upload-sk-angkakredit"]', function(){
        var id = $(this).attr('data-edit');
        $('#x_id_angkakredit').val(id);
    });

    var uploadSKAngkaKreditFile = {
        url: indexURL + "/profile/uploadSKAngkaKredit",
        dragDrop:true,
        fileName: "x_file_angkakredit",
        allowedTypes:"png,jpg,jpeg,zip,rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_angkakredit').val(data);
            //$('#x_img_photo_profile').attr('src',pathPhotoProfile + data);
        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/profile/cancelUploadSKAngkaKredit",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_angkakredit').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObj = $("#mulitplefileuploader_SK_ANGKAKREDIT").uploadFile(uploadSKAngkaKreditFile);


    $("form#form-upload-sk-angkakredit").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/profile/saveUploadSK',
                    data        : $('#form-upload-sk-angkakredit').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){        
                                    $('#modal-loader').modal('hide');
                                    $('#modal-upload-sk-angkakredit').modal('hide');                                       

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        loadDataTableAngkaKredit( $('#x_id').val() );
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                

                                }

                });

            }

        }

    });

});