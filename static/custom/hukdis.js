function loadDataTableHukdis(id){

    $("#dt-table-hukdis").DataTable().clear().destroy();

    var column = [
            { "data": "jenis_hukuman.name" },
            { "data": "no_sk"},
            { "data": "tgl_sk"},
            { "data": "tmt_hd"},
            { "data": "no_sk_pembatalan"},
            { "data": "tgl_sk_pembatalan"},
            { "data": "link_upload_sk"}
            
    ];
    
    $("#dt-table-hukdis").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getTableData",
            "type": "POST",
            "data":{"id":id, "module":"\/user\/hukdis"},
        },
        "columns":column,
        "scrollX": true,
        columnDefs:[{targets:[-1], class:"wrapok"}]
    });
}

//Date picker
$('#x_addedit_tgl_sk_hd, #x_addedit_tmt_hd').datepicker({
  autoclose: true,
  endDate: '+0d'
});

var uploadSKHukdisFile = {
    url: indexURL + "/profile/uploadSKHukdis",
    dragDrop:true,
    fileName: "x_file_hukdis",
    allowedTypes:"png,jpg,jpeg,zip,rar", 
    returnType:"json",
    onSuccess:function(files,data,xhr)
    {
        $('#x_file_hukdis').val(data);
        //$('#x_img_photo_profile').attr('src',pathPhotoProfile + data);
    },
    showDelete:true,
    deleteCallback: function(data,pd)
    {
        for(var i=0;i<data.length;i++)
        {
            $.post(indexURL + "/profile/cancelUploadSKHukdis",{op:"delete",name:data[i]},
            function(resp, textStatus, jqXHR)
            {
                //Show Message  
                $("#status").append("<div>File Deleted</div>");      
            });
        }      
        pd.statusbar.hide(); //You choice to hide/not.

        $('#x_file_hukdis').val('');
        // $('#container-file-excel').html('');

    }
}
var uploadObj = $("#mulitplefileuploader_SK_HUKDIS").uploadFile(uploadSKHukdisFile);

$("form#form-upload-sk-hukdis").validationEngine('attach',{
    onValidationComplete: function(form,status) {
        if (status === true) {
            $.ajax({

                type        : 'POST',
                url         : indexURL + '/profile/saveUploadSK',
                data        : $('#form-upload-sk-hukdis').serialize(),
                dataType    : 'json',
                beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                success     : function(data){        
                                $('#modal-loader').modal('hide');
                                $('#modal-upload-sk-hukdis').modal('hide');                                       

                                if( data.status_code == '00' ){   
                                    $('#modal-message').modal('show');                                    
                                    $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    loadDataTableHukdis( $('#x_id').val() );
                                }else{
                                    $('#modal-message').modal('show');
                                    $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                }                                

                            }

            });

        }

    }

});