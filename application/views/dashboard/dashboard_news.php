<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">

<div class="box box-PRIMARY">
	<div class="box-header with-border">
    	<h3 class="box-title">BERITA</h3>
  	</div>
  	<!-- /.box-header -->
  	<div class="box-body">
  		<table id="example1" class="table table-bordered table-striped">
	      <thead>
	        <tr>
	          <th></th>  
	        </tr>
	      </thead>
	      <tbody>
	      	<?php 
	      		foreach( $rsNews->data as $dtNews ){
	      	?>
	      			<tr>
	      				<td>
	      					<strong><a href="#" name="link-detail-news" data-toggle="modal" data-target="#modal-detail-news-dashboard" ><?php echo $dtNews->title; ?></a></strong><br>
	      					<?php echo $this->ci->global_lib->shapeSpace_truncate_string_at_word($dtNews->content,20,".","..."); ?>
	      				</td>
	      			</tr>
	      	<?php
	      		}
	      	?>
	      	
	      </tbody>
	    </table>
  	</div>
</div>

<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$("#example1").DataTable({
			"pageLength": 2,
			"searching": false,
			"lengthChange": false,
			"pagingType": "simple",
			"ordering": false
		});
	});
</script>