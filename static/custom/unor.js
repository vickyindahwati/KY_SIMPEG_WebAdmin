function loadDataTableUnor(id){

    $("#dt-table-unor").DataTable().clear().destroy();

    var column = [
            
            { "data": "unor.name" },
            { "data": "no_sk"},
            { "data": "tgl_sk"},
            { "data": "prosedur_asal"},
            { "data": "link_upload_sk" }
    ];
    
    $("#dt-table-unor").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getTableData",
            "type": "POST",
            "data":{"id":id, "module":"\/user\/history_unor"},
        },
        "columns":column,
        "scrollX": true,
        columnDefs:[{targets:[-1], class:"wrapok"}]
    });
}

var uploadSKUnorFile = {
    url: indexURL + "/profile/uploadSKUnor",
    dragDrop:true,
    fileName: "x_file_unor",
    allowedTypes:"png,jpg,jpeg,zip,rar", 
    returnType:"json",
    onSuccess:function(files,data,xhr)
    {
        $('#x_file_unor').val(data);
        //$('#x_img_photo_profile').attr('src',pathPhotoProfile + data);
    },
    showDelete:true,
    deleteCallback: function(data,pd)
    {
        for(var i=0;i<data.length;i++)
        {
            $.post(indexURL + "/profile/cancelUploadSKUnor",{op:"delete",name:data[i]},
            function(resp, textStatus, jqXHR)
            {
                //Show Message  
                $("#status").append("<div>File Deleted</div>");      
            });
        }      
        pd.statusbar.hide(); //You choice to hide/not.

        $('#x_file_unor').val('');
        // $('#container-file-excel').html('');

    }
}
var uploadObj = $("#mulitplefileuploader_SK_UNOR").uploadFile(uploadSKUnorFile);

$("form#form-upload-sk-unor").validationEngine('attach',{
    onValidationComplete: function(form,status) {
        if (status === true) {
            $.ajax({

                type        : 'POST',
                url         : indexURL + '/profile/saveUploadSK',
                data        : $('#form-upload-sk-unor').serialize(),
                dataType    : 'json',
                beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                success     : function(data){        
                                $('#modal-loader').modal('hide');
                                $('#modal-upload-sk-unor').modal('hide');                                       

                                if( data.status_code == '00' ){   
                                    $('#modal-message').modal('show');                                    
                                    $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    loadDataTableUnor( $('#x_id').val() );
                                }else{
                                    $('#modal-message').modal('show');
                                    $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                }                                

                            }

            });

        }

    }

});