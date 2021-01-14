$(document).ready(function(){
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
    });

    /*Upload File*/
    var uploadSettingSKPNS = {
        url: indexURL + "/employee/uploadSKPNS",
        dragDrop:true,
        fileName: "x_file_skpns",
        allowedTypes:"zip, rar, jpg, jpeg, png, gif", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_skpns').val(data);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/employee/cancelUploadSKPNS",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_skpns').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjSKPNS = $("#mulitplefileuploader_skpns").uploadFile(uploadSettingSKPNS);

    $('#x_mulai_tanggal, #x_tgl_keputusan, #x_tgl_diklat, #x_tgl_uji_kesehatan, #x_tgl_skck').datepicker({
      autoclose: true
    })

    $("form#frm-" + module).validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/employee/saveSKPNS',
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