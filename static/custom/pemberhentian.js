function loadDataTablePemberhentian(id){

    $("#dt-table-pemberhentian").DataTable().clear().destroy();

    var column = [
            
            { "data": "jenis_pemberhentian.name" },
            { "data": "kedudukan.name" },
            { "data": "no_sk"},
            { "data": "tgl_sk"},
            { "data": "prosedur_asal"},
            { "data": "link_upload_sk" }
    ];
    
    $("#dt-table-pemberhentian").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getTableData",
            "type": "POST",
            "data":{"id":id, "module":"\/user\/pemberhentian"},
        },
        "columns":column,
        "scrollX": true,
        columnDefs:[{targets:[-1], class:"wrapok"}]
    });
}

$('#dt-table-pemberhentian').on('click', 'a[name="link-modal-upload-sk-pemberhentian"]', function(){
    var id = $(this).attr('data-edit');
    $('#x_id_pemberhentian').val(id);
});

var uploadSKPemberhentianFile = {
    url: indexURL + "/profile/uploadSKPemberhentian",
    dragDrop:true,
    fileName: "x_file_pemberhentian",
    allowedTypes:"png,jpg,jpeg,zip,rar", 
    returnType:"json",
    onSuccess:function(files,data,xhr)
    {
        $('#x_file_pemberhentian').val(data);
        //$('#x_img_photo_profile').attr('src',pathPhotoProfile + data);
    },
    showDelete:true,
    deleteCallback: function(data,pd)
    {
        for(var i=0;i<data.length;i++)
        {
            $.post(indexURL + "/profile/cancelUploadSKPemberhentian",{op:"delete",name:data[i]},
            function(resp, textStatus, jqXHR)
            {
                //Show Message  
                $("#status").append("<div>File Deleted</div>");      
            });
        }      
        pd.statusbar.hide(); //You choice to hide/not.

        $('#x_file_pemberhentian').val('');
        // $('#container-file-excel').html('');

    }
}
var uploadObj = $("#mulitplefileuploader_SK_PEMBERHENTIAN").uploadFile(uploadSKPemberhentianFile);

$("form#form-upload-sk-pemberhentian").validationEngine('attach',{
    onValidationComplete: function(form,status) {
        if (status === true) {
            $.ajax({

                type        : 'POST',
                url         : indexURL + '/profile/saveUploadSK',
                data        : $('#form-upload-sk-pemberhentian').serialize(),
                dataType    : 'json',
                beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                success     : function(data){        
                                $('#modal-loader').modal('hide');
                                $('#modal-upload-sk-pemberhentian').modal('hide');                                       

                                if( data.status_code == '00' ){   
                                    $('#modal-message').modal('show');                                    
                                    $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    loadDataTablePemberhentian( $('#x_id').val() );
                                }else{
                                    $('#modal-message').modal('show');
                                    $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                }                                

                            }

            });

        }

    }

});