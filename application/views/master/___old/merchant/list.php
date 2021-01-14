<link href="<?php echo base_url('static');?>/plugins/jquery-upload-file/uploadfile.css" rel="stylesheet">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url('static');?>/plugins/iCheck/all.css">

<!-- Start : Modal Form -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-form-merchant-support">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">FORM MERCHANT SUPPORT</h4>
      </div>

      <form id="form-search" name="form-search" class="form-horizontal">
        <div class="modal-body">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group">
                <label for="input1" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <div class="input-group margin">
                    <input type="text" name="x_support_email" id="x_support_email" class="form-control">
                    <span class="input-group-btn">
                      <button type="submit" id="btn-search-email" class="btn btn-info btn-flat">Search</button>
                    </span>
                  </div>
                </div>          
              </div>
              <div class="form-group" id="container-search-msg" style="display:none;">
                <div class="alert alert-warning alert-dismissable">
                  <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                  Data tidak ditemukan
                </div>
              </div>
              <div class="form-group">
                <div class="overlay" id="container-loader-form-search" style="display:none;">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

      <!-- form start -->
      <form class="form-horizontal" id="form-merchant-support" name="form-merchant-support" style="display:none;">
        <div class="modal-body">
          <!-- general form elements -->
          <div class="box box-primary">
            
              <input type="hidden" name="x_act_support" id="x_act_support" value="add">
              <input type="hidden" name="x_merchant_id" id="x_merchant_id" value="">
              <input type="hidden" name="x_acc_id" id="x_acc_id">
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Support Type</label>
                  <div class="col-sm-9" id="container-support-type">
                    <input type="text" readonly="readonly" name="x_type_support" id="x_type_support" class="form-control">
                  </div>
                </div>                

                <div class="form-group" id="container-support-name">
                  <label for="input1" class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="x_support_name" id="x_support_name" class="form-control">
                  </div>
                </div>
                <div class="form-group" id="container-phone-number">
                  <label for="input1" class="col-sm-3 control-label">Phone Number</label>
                  <div class="col-sm-9">
                    <input readonly="readonly" type="text" name="x_support_phone" id="x_support_phone" class="form-control">
                  </div>
                </div>
                <div class="form-group" id="container-photo">
                  <label for="input1" class="col-sm-3 control-label">Photo</label>
                  <div class="col-sm-9">
                    <img src="" id="x_support_photo" width="100">
                  </div>
                </div>

                <div class="form-group" id="container-status">
                  <label for="input1" class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-9" id="x_support_status"></div>
                </div>

                <div class="form-group" id="container-commision">
                  <label for="input1" class="col-sm-3 control-label">Commision (%)</label>
                  <div class="col-sm-9">
                    <input type="text" name="x_support_commision" id="x_support_commision" class="form-control validate[required]">
                  </div>
                </div>               

                <div class="overlay" id="container-loader-form-support" style="display:none;">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>

              </div>
          </div>
        </div>
        <div class="modal-footer" id="container-support-button">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-form-merchant">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">FORM MANAGEMENT MERCHANT</h4>
      </div>

      <!-- form start -->
      <form class="form-horizontal" id="form-merchant" name="form-merchant">
        <div class="modal-body">
          <!-- general form elements -->
          <div class="box box-primary">
            
              <input type="hidden" name="x_act" id="x_act" value="add">
              <input type="hidden" name="x_id" id="x_id" value="">
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Merchant Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="x_name" id="x_name" class="form-control">
                  </div>
                </div>                            

                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Logo (Icon)</label>
                  <div class="col-sm-9">
                    <div id="mulitplefileuploader" >Upload</div>
                    <input type="hidden" name="x_file_icon" id="x_file_icon" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Logo (Icon at History)</label>
                  <div class="col-sm-9">
                    <div id="mulitplefileuploader_history" >Upload</div>
                    <input type="hidden" name="x_file_icon_history" id="x_file_icon_history" value="">
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
                  <label for="input1" class="col-sm-3 control-label">PKS File</label>
                  <div class="col-sm-9">
                    <div id="mulitplefileuploader_pks" >Upload</div>
                    <input type="hidden" name="x_pks_file" id="x_pks_file" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" name="x_email" id="x_email" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Contact Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="x_contact" id="x_contact" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Contact Phone</label>
                  <div class="col-sm-9">
                    <input type="text" name="x_contact_phone" id="x_contact_phone" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Merchat Rebate Type</label>
                  <div class="col-sm-9">
                    <label>
                      <input type="radio" name="x_rebate_type" class="minimal" value="1" checked>
                      Total
                    </label>
                    &nbsp;&nbsp;
                    <label>
                      <input type="radio" name="x_rebate_type" class="minimal" value="2">
                      Per Item
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Rebate</label>
                  <div class="col-sm-9">
                    <input type="text" name="x_rebate_value" id="x_rebate_value" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-9">
                    <select name="x_status" id="x_status" class="form-control">
                        <option value="">-Silahkan Pilih-</option>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                  </div>
                </div>

                <div class="overlay" id="container-loader-form" style="display:none;">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div><!-- /.box-body -->
            
          </div><!-- /.box -->

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b>INVOICE INFORMATION</b></h3>
            </div>
            <div class="form-group">
              <label for="input1" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" name="x_inv_name" id="x_inv_name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="input1" class="col-sm-3 control-label">Company Name</label>
              <div class="col-sm-9">
                <input type="text" name="x_inv_company" id="x_inv_company" class="form-control">
              </div>
            </div>  
            <div class="form-group">
              <label for="input1" class="col-sm-3 control-label">Address</label>
              <div class="col-sm-9">
                <input type="text" name="x_inv_address" id="x_inv_address" class="form-control">
              </div>
            </div> 
            <div class="form-group">
              <label for="input1" class="col-sm-3 control-label">City/State/ZIP</label>
              <div class="col-sm-3">
                <input type="text" name="x_inv_city" id="x_inv_city" class="form-control" placeholder="City">
              </div>
              <div class="col-sm-3">
                <input type="text" name="x_inv_state" id="x_inv_state" class="form-control" placeholder="State">
              </div>
              <div class="col-sm-2">
                <input type="text" name="x_inv_zip" id="x_inv_zip" class="form-control" placeholder="ZIP">
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
        <h4 class="modal-title" id="gridSystemModalLabel">KONFIRMASI HAPUS</h4>
      </div>
      <form class="form-horizontal" id="form-conf-delete" name="form-conf-delete">
        <input type="hidden" id="x_delete_id" name="x_delete_id">
        <div class="modal-body">
          <!-- general form elements -->
          Apakah anda yakin ingin menghapus data ini?
        </div>
        <div class="overlay" id="container-loader-delete" style="display:none;">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-approval">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">CONFIRM APPROVAL MERCHANT</h4>
      </div>
      <form class="form-horizontal" id="form-conf-approval" name="form-conf-approval">
        <input type="hidden" id="x_app_merchant_id" name="x_app_merchant_id">
        <input type="hidden" id="x_app_type" name="x_app_type">
        <div class="modal-body" id="container-msg-approval">

        </div>
        <div class="overlay" id="container-loader-confirm-approval" style="display:none;">
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

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-confirm-reset-password">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">CONFIRM RESET PASSWORD MERCHANT</h4>
      </div>
      <form class="form-horizontal" id="form-conf-reset-password" name="form-conf-reset-password">
        <input type="hidden" id="x_reset_password_merchant_id" name="x_reset_password_merchant_id">
        <div class="modal-body">
          <!-- general form elements -->
          Are you sure reset password this merchant?
        </div>
        <div class="overlay" id="container-loader-reset-password" style="display:none;">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-generate-qrcode">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">MERCHANT QRCODE</h4>
      </div>
      <div class="modal-body" id="container-popup-merchantqrcode" style="text-align: center;"></div>
      <div class="modal-footer">
        <input type="hidden" id="x_qrcode_file" name="x_qrcode_file">
        <button type="button" class="btn btn-success" id="btn-download-qrcode"><i class="glyphicon glyphicon-download-alt"></i>&nbsp;Download QRCode</button>
      </div>
      <div class="overlay" id="container-loader-qrcode" style="display:none;">
          <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- End : Modal Form -->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title;?>
    <small>Data List Merchant</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Surat Edaran</a></li>
    <li class="active"><?php echo $title;?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <p>
    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-form-merchant" id="btn-add"><i class="fa fa-plus"></i>&nbsp;Add New</button>
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
<!-- Jquery File Download -->
<script src="<?php echo base_url('static');?>/plugins/file_download/jquery.fileDownload.js"></script>

<script type="text/javascript">

function disabledForm(){
  $('#form-announcement :input').attr("disabled",true);
  $('#form-announcement :button').attr("disabled",true);
}

function enabledForm(){
  $('#form-announcement :input').attr("disabled",false);
  $('#form-announcement :button').attr("disabled",false);
}

function clearForm(){
  $('#form-merchant-support').trigger('reset');
  $('#form-search').trigger('reset');
  $('#form-merchant-support').hide();
  $('#x_support_photo').attr('src','');
}

function loadList( method, param ){

  $.ajax({

    type        : method,
    url         : '<?php echo base_url();?>index.php/merchant/getMerchantData',
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

  $("form#form-merchant-support").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

              $.ajax({

                type        : 'POST',
                url         : '<?php echo base_url()?>index.php/merchantsupport/save',
                data        : $('#form-merchant-support').serialize(),
                dataType    : 'json',
                beforeSend  : function(){ disabledForm();$('#container-loader-form-support').show(); },
                success     : function(data){ 

                                enabledForm();
                                clearForm();
                                
                                $('#container-loader-form-support').hide();

                                if( data.errCode == '00' ){

                                  loadList('POST','');

                                  $('#modal-form-merchant-support').modal('hide');
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

  $('form#form-search').submit(function(){

    $('#form-merchant-support').hide();

    if( $('#x_support_email').val() != '' ){

      $.ajax({

        type        : 'POST',
        url         : '<?php echo base_url()?>index.php/merchantsupport/getCustomerByEmail',
        data        : { m:$('#x_support_email').val() },
        dataType    : 'json',
        beforeSend  : function(){ disabledForm();$('#container-loader-form-search').show(); },
        success     : function(data){ 
                        
                        $('#container-loader-form-search').hide();

                        if( data.errCode == '00' ){

                          $('#form-merchant-support').show();

                          $('#container-support-name').show();
                          $('#x_support_name').val(data.name);

                          $('#x_support_phone').val(data.phoneNumber);

                          $('#container-photo').show();
                          $('#x_support_photo').attr('src','<?php echo CONST_IMG_PROFILE ?>' + data.photo);

                          $('#container-status').show();
                          if( data.status == '1' ){
                            $('#x_support_status').html('<small class="label pull-left bg-green">Active</small>');
                          }else{
                            $('#x_support_status').html('<small class="label pull-left bg-red">Not Active</small>');
                          }

                          $('#x_acc_id').val(data.id);

                          $('#container-commision').show();
                          

                        }else{

                          $('#container-search-msg').show();

                        }

                      }

      });

    }else{

      alert('Please fill email');

    }

    return false;

  });

  $('#btn-add').click(function(){
    $('#x_name').focus();
    $('#x_act').val('add');
    clearForm();
  });

  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
  });

  $("form#form-merchant").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

              $.ajax({

                type        : 'POST',
                url         : '<?php echo base_url()?>index.php/merchant/save',
                data        : $('#form-merchant').serialize(),
                dataType    : 'json',
                beforeSend  : function(){ disabledForm();$('#container-loader-form').show(); },
                success     : function(data){ 

                                enabledForm();
                                clearForm();
                                
                                $('#container-loader-form').hide();

                                if( data.errCode == '00' ){

                                  loadList('POST','');

                                  $('#modal-form-merchant').modal('hide');
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

  var upload_setting = {
      url: "<?php echo base_url();?>index.php/merchant/uploadFileIcon",
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
            $.post("<?php echo base_url();?>index.php/merchant/cancelUploadFileIcon",{op:"delete",name:data[i]},
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
  var uploadObj = $("#mulitplefileuploader").uploadFile(upload_setting);

  var upload_setting_history = {
      url: "<?php echo base_url();?>index.php/merchant/uploadFileIconHistory",
      dragDrop:true,
      fileName: "x_file_icon_history",
      allowedTypes:"png,jpg,jpeg", 
      returnType:"json",
      onSuccess:function(files,data,xhr)
      {
         $('#x_file_icon_history').val(data);

      },
      showDelete:true,
      deleteCallback: function(data,pd)
    {
        for(var i=0;i<data.length;i++)
        {
            $.post("<?php echo base_url();?>index.php/merchant/cancelUploadFileIconHistory",{op:"delete",name:data[i]},
            function(resp, textStatus, jqXHR)
            {
                //Show Message  
                $("#status").append("<div>File Deleted</div>");      
            });
         }      
        pd.statusbar.hide(); //You choice to hide/not.

        $('#x_file_icon_history').val('');
        // $('#container-file-excel').html('');

    }
  }
  var uploadObj = $("#mulitplefileuploader_history").uploadFile(upload_setting_history);

  var upload_setting_landscape = {
      url: "<?php echo base_url();?>index.php/merchant/uploadFileLandscape",
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
            $.post("<?php echo base_url();?>index.php/merchant/cancelUploadFileLandscape",{op:"delete",name:data[i]},
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
  var uploadObj_landscape = $("#mulitplefileuploader_landscape").uploadFile(upload_setting_landscape);


  var upload_setting_pks = {
      url: "<?php echo base_url();?>index.php/merchant/uploadPKSFile",
      dragDrop:true,
      fileName: "x_pks_file",
      allowedTypes:"pdf,zip,rar,jpg,jpeg", 
      returnType:"json",
      onSuccess:function(files,data,xhr)
      {
         $('#x_pks_file').val(data);

      },
      showDelete:true,
      deleteCallback: function(data,pd)
    {
        for(var i=0;i<data.length;i++)
        {
            $.post("<?php echo base_url();?>index.php/merchant/cancelUploadPKSFile",{op:"delete",name:data[i]},
            function(resp, textStatus, jqXHR)
            {
                //Show Message  
                $("#status").append("<div>File Deleted</div>");      
            });
         }      
        pd.statusbar.hide(); //You choice to hide/not.

        $('#x_pks_file').val('');
        // $('#container-file-excel').html('');

    }
  }
  var uploadObj_pks = $("#mulitplefileuploader_pks").uploadFile(upload_setting_pks);


  $('form#form-conf-delete').submit(function(){

      $.ajax({

          type        : 'POST',
          url         : '<?php echo base_url();?>index.php/merchant/delete',
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


  $('form#form-conf-approval').submit(function(){

    $.ajax({

          type        : 'POST',
          url         : '<?php echo base_url();?>index.php/merchant/doConfirmMerchantData',
          data        : $(this).serialize(),
          dataType    : 'json',
          beforeSend  : function(){ $('#container-loader-confirm-approval').show(); },
          success     : function(data){ 
                          
                        $('#container-loader-delete').hide();

                        if( data.errCode == '00' ){

                          loadList('POST','');

                          $('#modal-confirm-approval').modal('hide');
                          $('#modal-message').modal('show');
                          $('#container-popup-message').html(data.errMsg);

                        }else{

                          $('#modal-confirm-approval').modal('hide');
                          $('#modal-message').modal('show');
                          $('#container-popup-message').html(data.errMsg);

                        }

                      }

    });

    return false;

  });


  $('form#form-conf-reset-password').submit(function(){

    $.ajax({

          type        : 'POST',
          url         : '<?php echo base_url();?>index.php/merchant/resetWebAdminMerchantAccess',
          data        : $(this).serialize(),
          dataType    : 'json',
          beforeSend  : function(){ $('#container-loader-reset-password').show(); },
          success     : function(data){ 
                          
                        $('#container-loader-reset-password').hide();

                        if( data.errCode == '00' ){

                          loadList('POST','');

                          $('#modal-confirm-reset-password').modal('hide');
                          $('#modal-message').modal('show');
                          $('#container-popup-message').html(data.errMsg);

                        }else{

                          $('#modal-confirm-reset-password').modal('hide');
                          $('#modal-message').modal('show');
                          $('#container-popup-message').html(data.errMsg);

                        }

                      }

    });

    return false;

  });

  $('#btn-download-qrcode').click(function(){

    var fileName        = $('#x_qrcode_file').val();
    var urlDownload     = '<?php echo base_url(); ?>index.php/download/downloadMerchantQRCode';

    $.fileDownload( urlDownload, {
        httpMethod : 'POST',
        data : { fn : fileName }
      } )
      .done(function () { /*alert('File download a success!');*/ })
      .fail(function () { alert('File download failed!'); });
  });

});
</script>

