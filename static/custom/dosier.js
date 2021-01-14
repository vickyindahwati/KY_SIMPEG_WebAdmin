function loadDataTableDosier(pId,pFileType){

    $("#dt-table-dosier").DataTable().clear().destroy();

    var column = [
            { "data": "file_type_name" },
            { "data": "updated_at" },
            { "data": "file"}
    ];
    
    $("#dt-table-dosier").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax":{
            "url": indexURL + "/dosier/getDosierDataTableList",
            "type": "POST",
            "data":{"id": pId, "file_type":pFileType},
        },
        "columns":column,
        //"scrollX": true,
        //columnDefs:[{targets:[5], class:"wrapok"}]
    });
}

$(document).ready(function(){
    loadDataTableDosier($('#x_dosier_user_id').val(), "");

    $("form#form-filter-dosier").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                var xId = $('#x_dosier_user_id').val();
                var xFileType = $('#x_search_file_type').val();
                loadDataTableDosier(xId, xFileType);

            }

        }

    });
})