function loadDataTableJobExperience(id,type){

    $("#dt-table-job-experience").DataTable().clear().destroy();
    
    $("#dt-table-job-experience").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/employee/getJobExperienceHistoryData",
            "type": "POST",
            "data":{"id":id, "type":type},
        },
        "columns":[
            { "data": "index" },
            { "data": "instansi" },
            { "data": "jabatan" },
            { "data": "tgl_mulai_thn" },
            { "data": "tgl_mulai_bln" },
            { "data": "upload_pengalaman" },
            { "data": "status" },
            //{ "data": "created_at" },
            { "data": "navigation" }
           
        ]
    });
}    

$(document).ready(function(){

    loadDataTableJobExperience( $('#x_id').val() );
    
    $('#btn-add-job-experience').click(function(){
        
    });   
    
    $('#btn-pending-job-experience').click(function(){
        $(this).attr('class','btn');
        $(this).attr('disabled',true);
        $('#btn-existing-job-experience').attr('class','btn btn-success');
        $('#btn-existing-job-experience').attr('disabled',false);
        loadDataTableJobExperience( $('#x_id').val(), 'PENDING' );
    });

    $('#btn-existing-job-experience').click(function(){
        $(this).attr('class','btn');
        $(this).attr('disabled',true);
        $('#btn-pending-job-experience').attr('class','btn btn-warning');
        $('#btn-pending-job-experience').attr('disabled',false);
        loadDataTableJobExperience( $('#x_id').val(), 'APPROVED' );
    });

    $("form#frm-job-experience").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/employee/saveJobExperienceHistory',
                    data        : $('#frm-job-experience').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-frm-job-experience').modal('hide'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');                                        

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }      
                                    loadDataTableJobExperience( $('#x_id').val(), "APPROVE" );

                                }

                });

            }

        }

    });

    $("form#form-confirm-jobexperience").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/employee/confirmJobExperienceHistory',
                    data        : $('#form-confirm-jobexperience').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-confirm-jobexperience').modal('hide'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');                                        

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }      
                                    loadDataTableJobExperience( $('#x_id').val(), "PENDING" );

                                }

                });

            }

        }

    });

    $( "#dt-table tbody" ).on('click', 'a[name=link-modal-confirm-update]',  function(){      

        var arrId = $(this).attr('data');

        $.ajax({

            type        : 'POST',
            url         : '<?php echo base_url()?>index.php/profile/getPendingData',
            data        : {id:id},
            beforeSend  : function(){$('#container-loader-update-data-pending').show();},
            success     : function(html){                               
                            $('#container-loader-update-data-pending').hide();
                            $('#container-update-data-pending').html(html);                    

                        }

        });
    });

    var uploadSettingJobExperience = {
        url: indexURL + "/employee/uploadJobExperienceHistory",
        dragDrop:true,
        fileName: "x_file_pengalaman_kerja",
        allowedTypes:"zip, rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_pengalaman_kerja').val(data);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/employee/cancelUploadJobExperienceHistory",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_pengalaman_kerja').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjJobExperience = $("#mulitplefileuploader_pengalaman_kerja").uploadFile(uploadSettingJobExperience);

    $( "#dt-table-job-experience tbody" ).on('click', 'a[name=link-approve-jobexperience]',  function(){  
        var arrId = $(this).attr('data').split("|");
        $('#x_confirm_jobexperience_id').val(arrId[0]);
        $('#x_confirm_jobexperience_user_id').val(arrId[1]);
        $('#x_confirm_jobexperience_type').val('APPROVE');
        $('#modal-body-confirm-jobexperience-msg').html('Apakah anda yakin ingin <strong style="color:#42f456">MENERIMA</strong> data ini?');
    });

    $( "#dt-table-job-experience tbody" ).on('click', 'a[name=link-reject-jobexperience]',  function(){  
        var arrId = $(this).attr('data').split("|");
        $('#x_confirm_jobexperience_id').val(arrId[0]);
        $('#x_confirm_jobexperience_user_id').val(arrId[1]);
        $('#x_confirm_jobexperience_type').val('REJECT');
        $('#modal-body-confirm-jobexperience-msg').html('Apakah anda yakin ingin <strong style="color:#f44242">MENOLAK</strong> data ini?');
    });

    $( "#dt-table-job-experience tbody" ).on('click', 'a[name=link-edit-jobexperience]',  function(){  
        var data = $(this).attr('data').split(dataSeparator);

       $('#x_job_experience_id').val( data[0] );
        $('#x_act').val('EDIT');

        $('#x_instansi').val( data[2] );
        $('#x_jabatan').val( data[3] );
        $('#x_mulai_tahun').val( data[4] );
        $('#x_mulai_bulan').val( data[5] );
    });

});
