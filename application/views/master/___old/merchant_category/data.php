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
          <th>Category Name</th>
          <th>Photo Landscape</th>
          <th>Icon</th>
          <th>Status</th>
          <th>Created</th>
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
            <td><?php echo $dt->categoryName; ?></td>
            <td>
              <?php 
                if( $dt->photoLandscape <> '' ){
              ?>
                <a href="<?php echo CONST_MERCHANT_CATEGORY_LANDSCAPE . "" . $dt->photoLandscape; ?>">
                  <img src="<?php echo CONST_MERCHANT_CATEGORY_LANDSCAPE . "" . $dt->photoLandscape; ?>" height="100">
                </a>
              <?php
                }else{
                  echo '-';
                }
              ?>
            </td>  
            <td>
              <?php 
                if( $dt->icon <> '' ){
              ?>
                <a href="<?php echo CONST_MERCHANT_CATEGORY_ICON . $dt->icon; ?>">
                  <img src="<?php echo CONST_MERCHANT_CATEGORY_ICON . $dt->icon; ?>" width="100">
                </a>
              <?php
                }else{
                  echo '-';
                }
              ?>
            </td>          
            <td><small class="label pull-left <?php echo $class_status;?>"><?php echo $class_label?></small></td>
            <td><?php echo $dt->created ?></td>
            <?php /*
            <td nowrap="nowrap"><?php echo $dt->created; ?></td>
            <td nowrap="nowrap"><?php echo $dt->userName; ?></td>
            */?>

            <td nowrap="nowrap">
              <?php 

                $data_edit    = $this->converter->encode($dt->merchantCategoryId) . "Þ" . 
                                $dt->categoryName . "Þ" .
                                $dt->photoLandscape . "Þ" .
                                $dt->icon . "Þ" .
                                $dt->status;

              ?>

              <a href="#" class="btn bg-olive" data-toggle="modal" data-target="#modal-form" data-edit="<?php echo $data_edit;?>" name="link-edit">
                <span class="glyphicon glyphicon-edit fa-1x"></span>
              </a>

              <a href="#" class="btn bg-red" name="link-delete-user" data-toggle="modal" data-target="#modal-confirm-delete" data-edit="<?php echo $this->converter->encode($dt->merchantCategoryId)?>">
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

    /*$data_edit    = $this->converter->encode($dt->merchantCategoryId) . "Þ" . 
                                $dt->categoryName . "Þ" .
                                $dt->photoLandscape . "Þ" .
                                $dt->icon . "Þ" .
                                $dt->status;*/
    
    $('#x_act').val('edit');
    $('#x_id').val( arr_data[0] );
    $('#x_category_name').val( arr_data[1] );
    $('#x_file_icon').val( arr_data[3] );
    $('#x_file_landscape').val( arr_data[2] );
    $('#x_status').val( arr_data[4] );


  });

</script>