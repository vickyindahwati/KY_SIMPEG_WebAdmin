<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">
<div class="box-body">
<?php 

  if( count($rs) > 0 ){
?>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th></th>
          <th>Name</th>
          <th>Logo</th>
          <th>Acc. Number</th>
          <th>Rbt. Type</th>
          <th>Rbt. Value (%)</th>
          <?php /*
          <th>PKS File</th>
          */?>
          <th>Status</th>
          <th>Created</th>
          <th>Admin</th>
          <th></th>
          <?php 
            if( $roleId == 1 ){ 
          ?>
            <th>Support</th>
          <?php 
            } 
          ?>
        </tr>
      </thead>
      <tbody>
  <?php
      
        $no = 1;

        foreach( $rs as $dt ){

          $class_status = "";
          $class_label  = "";

          if( $dt->status == 1 ){
            $class_status = "bg-green";
            $class_label  = "Active";
          }
          else if( $dt->status == 0 ){ 
            $class_status = "bg-yellow"; 
            $class_label  = "Pending";
          }else if( $dt->status == -1 ){ 
            $class_status = "bg-red"; 
            $class_label  = "Reject";
          }
  ?>

          <tr>
            <td class="pull-right"><?php echo $no;?></td>
            <td>
              <a href="#" data-toggle="modal" data-target="#modal-generate-qrcode" data-edit="<?php echo $this->converter->encode($dt->merchantId);?>" name="link-show-qrcode">
                <i class="glyphicon glyphicon-qrcode"></i>
              </a>
            </td>
            <td><?php echo $dt->merchantName; ?></td>
            <td><?php echo ( $dt->logo <> '' ? '<img src="' . CONST_MERCHANT_URL . 'icon/' . $dt->logo . '" width="100">' : '-' ); ?></td>
            <td><?php echo $dt->accountNumber; ?></td>
            <td><?php echo ( $dt->rebateType == 1 ? 'Total' : 'Item' ); ?></td>
            <td style="text-align:right;"><?php echo $dt->merchantRebateValue; ?></td>
            <?php /*
            <td>
              <?php if( $dt->pksFile <> '' ){ ?>
                <a target="_blank" href="<?php echo CONST_MERCHANT_PKS . $dt->pksFile; ?>">Download PKS</a>
              <?php }else{ echo "-"; } ?>
            </td>
            */?>
            <td><small class="label pull-left <?php echo $class_status;?>"><?php echo $class_label?></small></td>
            <td><?php echo $dt->created; ?></td>
            <td><?php echo $dt->userName; ?></td>
            <td nowrap="nowrap">
              <?php 

                $data_edit    = $this->converter->encode($dt->merchantId) . "Þ" . 
                                $dt->merchantName . "Þ" .
                                $dt->logo . "Þ" .
                                $dt->email . "Þ" .
                                $dt->contactName . "Þ" .
                                $dt->contactPhone . "Þ" .                                
                                $dt->status . "Þ" .
                                $dt->merchantRebateType . "Þ" .
                                $dt->merchantRebateValue . "Þ" .
                                $dt->icon40x60;

              ?>

              <?php if( $dt->status == 1 ){ ?>
                <a href="#" class="btn bg-olive" data-toggle="modal" data-target="#modal-form-merchant" data-edit="<?php echo $data_edit;?>" name="link-edit">
                  <span class="glyphicon glyphicon-edit fa-1x"></span>
                </a>

                <a href="#" class="btn bg-red" name="link-delete-user" data-toggle="modal" data-target="#modal-confirm-delete" data-edit="<?php echo $this->converter->encode($dt->merchantId)?>">
                    <span class="glyphicon glyphicon-remove fa-1x"></span>
                </a>
              <?php }else if( $dt->status == 0 && $roleId == 1 ){ ?>

                <a href="#" class="btn bg-olive" data-toggle="modal" data-target="#modal-confirm-approval" data-edit="<?php echo $this->converter->encode($dt->merchantId);?>" name="link-approve">
                  Approve
                </a>

                <a href="#" class="btn bg-red" name="link-reject" data-toggle="modal" data-target="#modal-confirm-approval" data-edit="<?php echo $this->converter->encode($dt->merchantId)?>">
                    Reject
                </a>
              <?php } ?>

              <a href="#" class="btn bg-yellow" data-toggle="modal" data-target="#modal-confirm-reset-password" data-edit="<?php echo $this->converter->encode($dt->merchantId);?>" name="link-reset-password">
                  Reset Pwd
                </a>
            </td>

            <?php if( $roleId == 1 ){ ?>
            <td>
              <?php if( $dt->status == 1 ){ ?>
                <div class="btn-group">
                  <button type="button" class="btn btn-info">Select</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" name="link-merchant-support" data-edit="Merchant ReferalÞ<?php echo $this->converter->encode($dt->merchantId) ?>" data-toggle="modal" data-target="#modal-form-merchant-support">Merchant Referal</a></li>
                    <li><a href="#" name="link-merchant-support" data-edit="Sales SupportÞ<?php echo $this->converter->encode($dt->merchantId) ?>" data-toggle="modal" data-target="#modal-form-merchant-support">Sales Support</a></li>
                    <li><a href="#" name="link-merchant-support" data-edit="Technical SupportÞ<?php echo $this->converter->encode($dt->merchantId) ?>" data-toggle="modal" data-target="#modal-form-merchant-support">Technical Support</a></li>
                    <!--li class="divider"></li-->
                  </ul>
                </div>
              <?php } ?>
            </td>
            <?php } ?>
          </tr>

  <?php

          $no++;

        }

  ?>    

      </tbody>
    </table>

  <?php

  }else{

  ?>
        <td colspan="7">
          <div class="alert alert-warning alert-dismissable">
            <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
            Data not found
          </div>
        </td>

  <?php      

      }
  ?>

</div>

<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Jquery File Download -->
<script src="<?php echo base_url('static');?>/plugins/file_download/jquery.fileDownload.js"></script>
<script type="text/javascript">

  $("#example1").DataTable();

  $( "#example1 tbody" ).on('click', 'a[name=link-delete-user]',  function(){

    var id = $(this).attr('data-edit');

    $('#x_delete_id').val( id );

  });
  
  $( "#example1 tbody" ).on('click', 'a[name="link-edit"]',  function(){

    var arr_data      = $(this).attr('data-edit').split("Þ");

    
    $('#x_act').val('edit');
    $('#x_id').val( arr_data[0] );
    $('#x_name').val( arr_data[1] );
    $('#x_file_icon').val( arr_data[2] );
    $('#x_email').val( arr_data[3] );
    $('#x_contact').val( arr_data[4] );
    $('#x_contact_phone').val( arr_data[5] );
    $('#x_rebate_type').val( arr_data[7] );
    $('#x_rebate_value').val( arr_data[8] );
    $('#x_status').val( arr_data[6] );
    $('#x_file_icon_history').val( arr_data[9] );


  });

  $( "#example1 tbody" ).on('click', 'a[name="link-merchant-support"]',  function(){

    var arr_data      = $(this).attr('data-edit').split("Þ");

    clearForm();
    $('#x_type_support').val(arr_data[0]);
    $('#x_merchant_id').val( arr_data[1] );


  });

  $( "#example1 tbody" ).on('click', 'a[name="link-approve"]',  function(){

    $('#x_app_merchant_id').val( $(this).attr('data-edit') );
    $('#x_app_type').val('approve');
    $('#container-msg-approval').html('Are you sure want to approve this merchant data?');

  });

  $( "#example1 tbody" ).on('click', 'a[name="link-reject"]',  function(){

    $('#x_app_merchant_id').val( $(this).attr('data-edit') );
    $('#x_app_type').val('reject');
    $('#container-msg-approval').html('Are you sure want to reject this merchant data?');

  });

  $( "#example1 tbody" ).on('click', 'a[name="link-reset-password"]',  function(){

    $('#x_reset_password_merchant_id').val( $(this).attr('data-edit') );

  });

  $('#example1 tbody').on( 'click', 'a[name="link-show-qrcode"]', function(){

    var id = $(this).attr('data-edit');

    $.ajax({

      type        : 'POST',
      url         : '<?php echo base_url(); ?>index.php/merchant/generateMerchantQRCode',
      data        : { id : id},
      beforeSend  : function(){ $('#container-loader-qrcode').show(); },
      dataType    : 'json',
      success     : function(data){ 
                      $('#container-loader-qrcode').hide();
                      $('#container-popup-merchantqrcode').html('<img src="' + data.path + '">'); 
                      $('#x_qrcode_file').val( data.fileName );
                    }

    });
  } );

  

</script>