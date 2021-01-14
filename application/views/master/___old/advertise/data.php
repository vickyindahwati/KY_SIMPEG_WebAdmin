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
          <th>Company Name</th>
          <th>Sequence</th>
          <th>File</th>
          <th>Period</th>
          <th>Adv. Rebate</th>
          <th>Status</th>
          <th>Created</th>
          <th>Created User</th>
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
            <td><?php echo $dt->companyName; ?></td>
            <td><?php echo $dt->sequence; ?></td>
            <td>
              <?php 
                if( $dt->file <> '' ){
              ?>
                <a href="<?php echo CONST_IMG_ADVERTISE . "" . $dt->file; ?>">
                  <img src="<?php echo CONST_IMG_ADVERTISE . "mini/" . $dt->file; ?>">
                </a>
              <?php
                }else{
                  echo '-';
                }
              ?>
            </td>
            <td><?php echo $dt->startDate . " - " . $dt->endDate; ?></td>
            <td style="text-align: right;"><?php echo $dt->advertiseRebate . " %" ?></td>
            <td><small class="label pull-left <?php echo $class_status;?>"><?php echo $class_label?></small></td>
            <td><?php echo $dt->created; ?></td>
            <td><?php echo $dt->userName; ?></td>
            <td nowrap="nowrap">
              <?php 

                $data_edit    = $this->converter->encode($dt->advertiseId) . "Þ" . 
                                $dt->companyId . "Þ" .
                                $dt->file . "Þ" .
                                $dt->sequence . "Þ" .
                                $dt->startDate . " - " . $dt->endDate . "Þ" . 
                                $dt->status . "Þ" . 
                                $dt->advertiseType . "Þ" . 
                                $dt->advertiseRebate;

              ?>

              <a href="#" class="btn bg-olive" data-toggle="modal" data-target="#modal-form" data-edit="<?php echo $data_edit;?>" name="link-edit">
                <span class="glyphicon glyphicon-edit fa-1x"></span>
              </a>

              <a href="#" class="btn bg-red" name="link-delete-user" data-toggle="modal" data-target="#modal-confirm-delete" data-edit="<?php echo $this->converter->encode($dt->advertiseId)?>">
                <span class="glyphicon glyphicon-remove fa-1x"></span>
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


    /*
    $this->converter->encode($dt->advertiseId) . "Þ" . 
                                $dt->companyId . "Þ" .
                                $dt->file . "Þ" .
                                $dt->sequence . "Þ" .
                                $dt->startDate . "Þ" .
                                $dt->endDate . "Þ" .                                
                                $dt->status;
    */
    
    $('#x_act').val('edit');
    $('#x_id').val( arr_data[0] );
    $('#x_company').val( arr_data[1] );
    $('#x_file').val( arr_data[2] );
    $('#x_sequence').val( arr_data[3] );
    $('#x_period').val( arr_data[4] );
    $('#x_status').val( arr_data[5] );
    $('#x_advertise_type').val( arr_data[6] );
    $('#x_advertise_rebate').val( arr_data[7] );

    if( arr_data[6] == 1 ){
      $('#container-advertise-rebate').hide();
      $('#container-advertise-balance').hide();
      $('#x_advertise_balance').attr('disabled',false);
    }else{
      $('#container-advertise-rebate').show();
      $('#container-advertise-balance').show();
      $('#x_advertise_balance').attr('disabled',true);
    }


  });

</script>