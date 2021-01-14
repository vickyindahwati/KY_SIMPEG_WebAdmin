function loadListPage(method, param){
    $.ajax({

        type        : method,
        url         : indexURL + '/employee/showTableList',
        data        : param,
        crossDomain : true,
        beforeSend  : function(){ $('#container-loader-list').show(); },
        success     : function(html){ 
                        $('#container-loader-list').hide();
                        $('#container-list').html(html); 
                      }
    
      });
}


function showNonActiveForm(){

    clearForm('form-submit-nonactive-employee');

    $('#container-nonactive-employee-form-file-sk').show();
    $('#container-nonactive-employee-detail-file-sk').hide();

    $('#x_type_id').attr('disabled',false);
    $('#x_no_sk').attr('disabled',false);
    $('#x_tgl_sk').attr('disabled',false);
    $('#x_tgl_efektif').attr('disabled',false);
}

function showNonActiveDetail(){
    $('#container-nonactive-employee-form-file-sk').hide();
    $('#container-nonactive-employee-detail-file-sk').show();

    $('#x_type_id').attr('disabled',true);
    $('#x_no_sk').attr('disabled',true);
    $('#x_tgl_sk').attr('disabled',true);
    $('#x_tgl_efektif').attr('disabled',true);
}

$(document).ready(function(){

    loadListPage('POST','');
    var uploadSKPemberhentianFile = {
        url: indexURL + "/employee/uploadSKNonActive",
        dragDrop:true,
        fileName: "x_file_sk_nonactive",
        allowedTypes:"png,jpg,jpeg,zip,rar,pdf", 
        returnType:"json",
        //formData:{ type_id: $('#x_type_id').val() },
        dynamicFormData: function() {
            var data = { type_id: $('#x_type_id').val()}
            return data;
        },
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_sk_nonactive').val(data);
            //$('#x_img_photo_profile').attr('src',pathPhotoProfile + data);
        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/employee/cancelUploadSKNonActive",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_sk_nonactive').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObj = $("#mulitplefileuploader_SK_NONACTIVE").uploadFile(uploadSKPemberhentianFile);

    //Date picker
    $('#x_tgl_sk, #x_tgl_efektif').datepicker({
      autoclose: true,
      endDate: '+10d'
    });

    $("form#form-submit-nonactive-employee").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/employee/nonActiveEmployee',
                    data        : $('#form-submit-nonactive-employee').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');           
                                    $('#modal-form-nonactive-employee').modal('hide');                             

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        clearForm('form-submit-nonactive-employee');
                                        loadListPage('POST','');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }      

                                }

                });

            }

        }

    });       

    $("form#form-adjust-anual-leave").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/leave/adjustAnualLeave',
                    data        : $('#form-adjust-anual-leave').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');           
                                    $('#modal-form-adjust-anual-leave').modal('hide');                             

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        clearForm('form-adjust-anual-leave');
                                        loadListPage('POST','');
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