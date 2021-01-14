<div class="info-box bg-purple">
	<span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>

	<div class="info-box-content">
	  <span class="info-box-number">PENDIDIKAN TERAKHIR</span>
	  <?php 
	  	foreach( $rsPendidikan->data as $dtPendidikan ){
	  ?>
	  		<span class="info-box-number"><?php echo $dtPendidikan->pendidikan_nama; ?></span>
	  		<span class="progress-description"><?php echo $dtPendidikan->jurusan_nama; ?></span>
	  		<span class="progress-description">Lulus tahun : <?php echo $dtPendidikan->tahun_lulus; ?></span>
	  <?php 
	  	}
	  ?>
	  
	</div>
	<!-- /.info-box-content -->
</div>