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
          <th>Merchant Name</th>
          <th>Photo</th>
          <th>Voucher</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Status</th>
          <?php /*
          <th>Created</th>
          <th>Created User</th>
          */?>
          <th></th>
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
          else{ 
            $class_status = "bg-red"; 
            $class_label  = "Not Active";
          }
  ?>

          <tr>
            <td class="pull-right"><?php echo $no;?></td>
            <td><?php echo $dt->merchantName; ?></td>
            <td>
              <?php 
                if( $dt->photo <> '' ){
              ?>
                <a href="<?php echo CONST_IMG_EVOUCHER . "" . $dt->photo; ?>">
                  <img src="<?php echo CONST_IMG_EVOUCHER . "" . $dt->photo; ?>" width="100">
                </a>
              <?php
                }else{
                  echo '-';
                }
              ?>
            </td>            
            <td nowrap="nowrap"><?php echo "IDR " . number_format($dt->voucherValue); ?></td>
            <td nowrap="nowrap"><?php echo $dt->startDate; ?></td>
            <td nowrap="nowrap"><?php echo $dt->endDate; ?></td>
            <td><small class="label pull-left <?php echo $class_status;?>"><?php echo $class_label?></small></td>

            <?php /*
            <td nowrap="nowrap"><?php echo $dt->created; ?></td>
            <td nowrap="nowrap"><?php echo $dt->userName; ?></td>
            */?>

            <td nowrap="nowrap">
              <?php 

                $data_edit    = $this->converter->encode($dt->voucherId) . "Þ" . 
                                $dt->merchantId . "Þ" .
                                $dt->productName . "Þ" .
                                $dt->photo . "Þ" .
                                $dt->voucherValue . "Þ" .
                                $dt->startDate . "Þ" .
                                $dt->endDate . "Þ" .
                                $dt->status . "Þ" . 
                                $dt->period;

              ?>

              <a href="#" class="btn bg-olive" data-toggle="modal" data-target="#modal-form" data-edit="<?php echo $data_edit;?>" name="link-edit">
                <span class="glyphicon glyphicon-edit fa-1x"></span>
              </a>

              <a href="#" class="btn bg-red" name="link-delete-user" data-toggle="modal" data-target="#modal-confirm-delete" data-edit="<?php echo $this->converter->encode($dt->voucherId)?>">
                <span class="glyphicon glyphicon-remove fa-1x"></span>
              </a>

              <a href="<?php echo base_url() . "index.php/evoucher/customer/" . $this->converter->encode($dt->voucherId); ?>" class="btn bg-orange" 
                <span class="glyphicon glyphicon-list fa-1x">Customer</span>
              </a>
            </td>
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
            <h4><i class="icon fa fa-warning"></i> Attention!</h4>
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

    /*$this->converter->encode($dt->voucher) . "Þ" . 
                                $dt->merchantId . "Þ" .
                                $dt->productName . "Þ" .
                                $dt->photo . "Þ" .
                                $dt->voucherValue . "Þ" .
                                $dt->startDate . "Þ" .
                                $dt->endDate . "Þ" .
                                $dt->status;*/
    
    $('#x_act').val('edit');
    $('#x_id').val( arr_data[0] );
    $('#x_merchant').val( arr_data[1] );
    $('#x_product_name').val( arr_data[2] );
    $('#x_file').val( arr_data[3] );
    $('#x_voucher').val( arr_data[4] );
    $('#x_period').val( arr_data[8] );
    $('#x_status').val( arr_data[7] );


  });

</script>