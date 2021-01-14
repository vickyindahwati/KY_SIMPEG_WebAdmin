$(document).ready(function(){
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
    });

    /*Upload File*/
    var uploadSettingSKCPNS = {
        url: indexURL + "/employee/uploadSKCPNS",
        dragDrop:true,
        fileName: "x_file_skcpns",
        allowedTypes:"zip, rar, jpg, jpeg, png, gif", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_skcpns').val(data);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/employee/cancelUploadSKCPNS",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_skcpns').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjSKCPNS = $("#mulitplefileuploader_skcpns").uploadFile(uploadSettingSKCPNS);

    var uploadSettingSKCK = {
        url: indexURL + "/employee/uploadSKCK",
        dragDrop:true,
        fileName: "x_file_skck",
        allowedTypes:"zip, rar, jpg, jpeg, png, gif", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_skck').val(data);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/employee/cancelUploadSKCK",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_skck').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjSKCK = $("#mulitplefileuploader_skck").uploadFile(uploadSettingSKCK);

    $('#x_mulai_tanggal, #x_tgl_keputusan, #x_tgl_diklat, #x_tgl_uji_kesehatan, #x_tgl_skck').datepicker({
      autoclose: true
    })

    $("form#frm-" + module).validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/employee/saveSKCPNS',
                    data        : $('#frm-' + module).serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show'); },
                    success     : function(data){                            
                                    
                                    $('#modal-loader').modal('hide');                                        

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
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