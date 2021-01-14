<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/iCheck/all.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/daterangepicker/daterangepicker-bs3.css">

<!-- Start : Modal Form -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-form">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">FORM MERCHANT CATEGORY MANAGEMENT</h4>
      </div>

      <form id="form-submit" name="form-submit" class="form-horizontal">
        <input type="hidden" name="x_id" id="x_id">
        <input type="hidden" name="x_act" id="x_act" value="add">
        <div class="modal-body">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group" id="container-support-name">
                <label for="input1" class="col-sm-3 control-label">Category Name</label>
                <div class="col-sm-9">
                  <input type="text" name="x_category_name" id="x_category_name" class="form-control">
                </div>
              </div>              
              <div class="form-group">
                <label for="input1" class="col-sm-3 control-label">Icon</label>
                <div class="col-sm-9">
                  <div id="mulitplefileuploader_icon" >Upload</div>
                  <input type="hidden" name="x_file_icon" id="x_file_icon" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="input1" class="col-sm-3 control-label">Photo Landscape</label>
                <div class="col-sm-9">
                  <div id="mulitplefileuploader_landscape" >Upload</div>
                  <input type="hidden" name="x_file_landscape" id="x_file_landscape" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="input1" class="col-sm-3 control-label">Status</label>
                <div class="col-sm-9">
                  <select name="x_status" id="x_status" class="form-control">
                      <option value="">-Silahkan Pilih-</option>
                      <option value="1" selected="selected">Active</option>
                      <option value="0">Not Active</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="overlay" id="container-loader-form" style="display:none;">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-message">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">POP UP MESSAGE</h4>
      </div>
      <div class="modal-body" id="container-popup-message"></div>
      <div class="overlay" id="container-loader-delete-driver" style="display:none;">
          <i class="fa fa-refresh fa-spin"></i>
        </div>
      <div class="modal-footer">
        <button type="button" id="btn-close" class="btn btn-primary">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">DELETE CONFIRMATION</h4>
      </div>
      <form class="form-horizontal" id="form-conf-delete" name="form-conf-delete">
        <input type="hidden" id="x_delete_id" name="x_delete_id">
        <div class="modal-body">
          <!-- general form elements -->
          Are you sure to delete this data?
        </div>
        <div class="overlay" id="container-loader-delete" style="display:none;">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- End : Modal Form -->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title;?>
    <small>Data List Merchant Category</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <p>
    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-form" id="btn-add"><i class="fa fa-plus"></i>&nbsp;Add New</button>
  </p>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data List</h3>
        </div><!-- /.box-header -->
        <div id="container-data"></div>
        <div class="overlay" id="container-loader-list" style="display:none;">
          <i class="fa fa-refresh fa-spin"></i>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="<?php echo base_url('static');?>/plugins/jquery-upload-file/jquery.uploadfile.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url('static');?>/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url('static');?>/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url('static');?>/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('static');?>/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('static');?>/plugins/fastclick/fastclick.js"></script>

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('static');?>/plugins/daterangepicker/daterangepicker.js"></script>


<script type="text/javascript">

function disabledForm(){
  $('#form-announcement :input').attr("disabled",true);
  $('#form-announcement :button').attr("disabled",true);
}

function enabledForm(){
}

function clearForm(){
}

function loadList( method, param ){

  $.ajax({

    type        : method,
    url         : '<?php echo base_url();?>index.php/merchantcategory/getMerchantCategoryData',
    data        : param,
    beforeSend  : function(){ $('#container-loader-list').show(); },
    success     : function(html){ 
                    $('#container-loader-list').hide();
                    $('#container-data').html(html); 
                  }

  });

}

$(document).ready(function(){

  loadList( 'POST', '' );

  var upload_landscape = {
      url: "<?php echo base_url();?>index.php/merchantcategory/uploadFileLandscape",
      dragDrop:true,
      fileName: "x_file_landscape",
      allowedTypes:"png,jpg,jpeg", 
      returnType:"json",
      onSuccess:function(files,data,xhr)
      {
         $('#x_file_landscape').val(data);

      },
      showDelete:true,
      deleteCallback: function(data,pd)
    {
        for(var i=0;i<data.length;i++)
        {
            $.post("<?php echo base_url();?>index.php/merchantcategory/cancelUploadFileLandscape",{op:"delete",name:data[i]},
            function(resp, textStatus, jqXHR)
            {
                //Show Message  
                $("#status").append("<div>File Deleted</div>");      
            });
         }      
        pd.statusbar.hide(); //You choice to hide/not.

        $('#x_file_landscape').val('');
        // $('#container-file-excel').html('');

    }
  }
  var uploadObj_landscape = $("#mulitplefileuploader_landscape").uploadFile(upload_landscape);

  var upload_icon = {
      url: "<?php echo base_url();?>index.php/merchantcategory/uploadFileIcon",
      dragDrop:true,
      fileName: "x_file_icon",
      allowedTypes:"png,jpg,jpeg", 
      returnType:"json",
      onSuccess:function(files,data,xhr)
      {
         $('#x_file_icon').val(data);

      },
      showDelete:true,
      deleteCallback: function(data,pd)
    {
        for(var i=0;i<data.length;i++)
        {
            $.post("<?php echo base_url();?>index.php/merchantcategory/cancelUploadFileIcon",{op:"delete",name:data[i]},
            function(resp, textStatus, jqXHR)
            {
                //Show Message  
                $("#status").append("<div>File Deleted</div>");      
            });
         }      
        pd.statusbar.hide(); //You choice to hide/not.

        $('#x_file_icon').val('');
        // $('#container-file-excel').html('');

    }
  }
  var uploadObj_icon = $("#mulitplefileuploader_icon").uploadFile(upload_icon);

  $("form#form-submit").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

              $.ajax({

                type        : 'POST',
                url         : '<?php echo base_url()?>index.php/merchantcategory/save',
                data        : $('#form-submit').serialize(),
                dataType    : 'json',
                beforeSend  : function(){ disabledForm();$('#container-loader-form').show(); },
                success     : function(data){ 

                                enabledForm();
                                clearForm();
                                
                                $('#container-loader-form').hide();

                                if( data.errCode == '00' ){

                                  loadList('POST','');

                                  $('#modal-form').modal('hide');
                                  $('#modal-message').modal('show');
                                  $('#container-popup-message').html(data.errMsg);

                                }else{

                                  alert(data.err_msg);

                                }

                              }

              });

            }

        }

  });  

  $('#btn-add').click(function(){
    $('#x_name').focus();
    $('#x_act').val('add');
    clearForm();
  }); 

  $('form#form-conf-delete').submit(function(){

      $.ajax({

          type        : 'POST',
          url         : '<?php echo base_url();?>index.php/merchantcategory/delete',
          data        : {id:$('#x_delete_id').val()},
          dataType    : 'json',
          beforeSend  : function(){ $('#container-loader-delete').show(); },
          success     : function(data){ 
                          
                        $('#container-loader-delete').hide();

                        if( data.errCode == '00' ){

                          loadList('POST','');

                          $('#modal-confirm-delete').modal('hide');
                          $('#modal-message').modal('show');
                          $('#container-popup-message').html(data.errMsg);

                        }else{

                          $('#modal-confirm-delete').modal('hide');
                          $('#modal-message').modal('show');
                          $('#container-popup-message').html(data.errMsg);

                        }

                      }

      });

      return false;

  });

   $('#btn-close').click(function(){

    $('#modal-message').modal('hide');

  });


});
</script>

