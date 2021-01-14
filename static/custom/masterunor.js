function loadDataTableMasterUnor(){

    $("#dt-table-masterunor").DataTable().clear().destroy();

    var column = [
            
            { "data": "name" },
            { "data": "parent_name"},
            { "data": "type_name"},
            { "data": "navigation" }
    ];
    
    $("#dt-table-masterunor").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/masterunor/getTableData",
            "type": "POST",
            "data":{"module":"\/unor"},
        },
        "columns":column,
        "scrollX": true,
        columnDefs:[{targets:[-1], class:"wrapok"}]
    });

}

$(document).ready(function(){
    loadDataTableMasterUnor('POST','');

    $("form#frm-master-unor").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/masterunor/save',
                    data        : $('#frm-master-unor').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ $('#modal-loader').modal('show');$('#modal-unor-form').modal('hide'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');                                        

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }      
                                    loadDataTableMasterUnor( 'POST','' );

                                }

                });

            }

        }

    });

    
    $('#dt-table-masterunor').on('click', 'a[name="link-edit-masterunor"]', function(){
        var arrDataEdit = $(this).attr('data').toString().split(dataSeparator);
        $('#x_id_unor').val( arrDataEdit[0] );
        $('#x_unor_name').val( arrDataEdit[2] );            
        $('#x_unor_parent_id').val( arrDataEdit[1] );
        $('#x_unor_type').val( arrDataEdit[3] );
        $('#x_act').val('edit');
    });

    $('.modal').on('hide.bs.modal', function (e) {
        e.stopPropagation();
        $('body').css('padding-right','');
    });
});