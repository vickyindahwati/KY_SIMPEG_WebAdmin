<div class="info-box bg-navy">
	<span class="info-box-icon"><i class="fa fa-briefcase"></i></span>

	<div class="info-box-content">
	  <span class="info-box-number">PENINJAUAN MASA KERJA</span>
	  <?php 
	  	foreach( $rsPMK->data as $dtPMK ){
	  ?>
	  		<span class="info-box-number"><?php echo $dtPMK->instansi_perusahaan; ?></span>
	  		<span class="progress-description"><?php echo $dtPMK->no_sk; ?></span>
	  		<span class="progress-description">Lulus tahun : <?php echo $dtPMK->masa_kerja_tahun . " tahun " . $dtPMK->masa_kerja_tahun . " bulan"; ?></span>
	  <?php 
	  	}
	  ?>
	  
	</div>
	<!-- /.info-box-content -->
</div>