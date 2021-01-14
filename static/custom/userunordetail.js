function loadDataTableUserUnor_Detail(pId){

    $("#dt-table-userunor-detail").DataTable().clear().destroy();

    var column = [
            
            { "data": "unor_name" },
            { "data": "name"},
            { "data": "tgl_efektif"},
            { "data": "navigation" }
    ];
    
    $("#dt-table-userunor-detail").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/userunor/getTableData",
            "type": "POST",
            "data":{"module":"\/user\/jabatan\/header_detail","id":pId},
        },
        "columns":column,
        "scrollX": true,
        "oSearch": { "bSmart": false, "bRegex": true, "sSearch": ""  },
        columnDefs:[{targets:[-1], class:"wrapok"}]
    });

}

$(document).ready(function(){

    var xUnorHeaderId = $('#x_id_userunorheader').val();
    loadDataTableUserUnor_Detail(xUnorHeaderId);

    $('.select2').select2();

    $('#x_efective_date').datepicker({autoClose:true});

    $("form#frm-userunor-detail").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/userunor/saveUnorDetail',
                    data        : $('#frm-userunor-detail').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-userunor-detail-form').modal('hide'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');                                        

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }      
                                    loadDataTableUserUnor_Detail( xUnorHeaderId );

                                }

                });

            }

        }

    });

    $('#dt-table-userunor-detail').on('click', 'a[name="link-edit-unordetail"]', function(){
        var arrDataEdit = $(this).attr('data').toString().split(dataSeparator);
        $('#x_id_userunordetail').val( arrDataEdit[0] );
        $('#x_unor_id').val( arrDataEdit[2] );            
        $('#x_user_name').val( arrDataEdit[3] );
        $('#x_user_name').trigger('change.select2');
        $('#x_efective_date').val( arrDataEdit[4] );
        $('#x_act').val('edit');
    });

    $("form#form-confirm-delete-userunordetail").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                // alert($("form#form-add-user").serialize());
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/userunor/delete',
                    data        : $("form#form-confirm-delete-userunordetail").serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-confirm-userunordetail').modal('hide');},
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide'); 
                                    if( data.status_code == "00" ){ 
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        $(this).trigger('reset');
                                        loadDataTableUserUnor_Detail(xUnorHeaderId);
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                        //$('#modal-frm-add-edit').modal('show');
                                    }      
                                    
                    }

                });
                

            }

        }

    });

    $('#dt-table-userunor-detail').on( 'click', 'a[name="link-delete-unordetail"]', function(){
        $('#x_confirm_delete_id').val($(this).attr('data'));
        $('#modal-body-confirm-msg-userunordetail').html('Anda yakin ingin menghapus data ini?');
    } );

    
    $('#btn-close-modal-userunordetail').click(function(){
        $('#modal-message').modal('hide');      
        $('.modal-backdrop').remove();    
        loadDataTableUserUnor_Detail('POST','');
        
    });

    $('.modal').on('hide.bs.modal', function (e) {
        e.stopPropagation();
        $('body').css('padding-right','');
    });
});