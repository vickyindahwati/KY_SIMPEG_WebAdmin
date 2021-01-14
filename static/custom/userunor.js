function loadDataTableUserUnor_Header(){

    $("#dt-table-userunor").DataTable().clear().destroy();

    var column = [
            
            { "data": "code" },
            { "data": "name"},
            { "data": "created_at"},
            { "data": "navigation" }
    ];
    
    $("#dt-table-userunor").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/userunor/getTableData",
            "type": "POST",
            "data":{"module":"\/user\/jabatan\/header"},
        },
        "columns":column,
        "scrollX": true,
        columnDefs:[{targets:[-1], class:"wrapok"}]
    });

}

$(document).ready(function(){

    loadDataTableUserUnor_Header('POST','');

    $('#x_efective_date').datepicker({autoClose:true});

    $("form#frm-userunor-header").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/userunor/saveUnorHeader',
                    data        : $('#frm-userunor-header').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-userunor-header-form').modal('hide'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');                                        

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }      
                                    loadListPage_UserUnorHeader( 'POST','' );

                                }

                });

            }

        }

    });

    $('#dt-table-userunor').on('click', 'a[name="link-edit-unorheader"]', function(){
        var arrDataEdit = $(this).attr('data').toString().split(dataSeparator);
        $('#x_id_userunorheader').val( arrDataEdit[0] );
        $('#x_code').val( arrDataEdit[1] );            
        $('#x_name').val( arrDataEdit[2] );
        $('#x_act').val('edit');
    });

    $("form#form-confirm-delete-userunorheader").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                // alert($("form#form-add-user").serialize());
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/userunor/delete',
                    data        : $("form#form-confirm-delete-userunorheader").serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-confirm-userunorheader').modal('hide');},
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide'); 
                                    if( data.status_code == "00" ){ 
                                        $('#modal-message-add-edit').modal('show');                                    
                                        $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        $(this).trigger('reset');
                                        //loadListPage_UserUnorHeader( 'POST','' );
                                    }else{
                                        $('#modal-message-add-edit').modal('show');
                                        $('#container-popup-message-addedit').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        $('#modal-frm-add-edit').modal('show');
                                    }      
                                    
                    }

                });
                

            }

        }

    });

    $('#dt-table-userunor').on( 'click', 'a[name="link-delete-unorheader"]', function(){
        $('#x_confirm_delete_id').val($(this).attr('data'));
        $('#modal-body-confirm-msg-userunorheader').html('Anda yakin ingin menghapus data ini?');
    } );

    
    $('#btn-close-modal-userunorheader').click(function(){
        $('#modal-message-add-edit').modal('hide');      
        $('.modal-backdrop').remove();    
        loadListPage_UserUnorHeader('POST','');
        
    });

    $('.modal').on('hide.bs.modal', function (e) {
        e.stopPropagation();
        $('body').css('padding-right','');
    });

    $('.modal').on('hide.bs.modal', function (e) {
        e.stopPropagation();
        $('body').css('padding-right','');
    });
});