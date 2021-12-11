<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static') ?>/plugins/datatables/dataTables.bootstrap.css">
<style>
	.text-left {
		text-align: left !important;
	}
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		LAPORAN REKAP FEEDBACK DIKLAT
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-solid">
		<div class="box-body">
			<div class="box-group" id="accordion">
				<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
				<?php for ($i=1; $i <= 4; $i++) : ?>
					<div class="panel box box-primary">
						<div class="box-header with-border">
							<h4 class="box-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>">
									DIKLAT <?= $i ?> | Jadwal : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| Vendor :
								</a>
							</h4>
						</div>
						<div id="collapse<?= $i ?>" class="panel-collapse collapse <?= ($i == 1) ? 'in' : '' ?>">
							<div class="box-body">
								<table class="dt-table table table-bordered table-striped" style="width:100%;">
									<thead>
										<tr>
											<th style="width: 20px;">No</th>
											<th>NIP</th>
											<th>Nama</th>
											<th>Tgl. Feedback</th>
											<th>JP</th>
											<th>Feedback</th>
											<th>Data Pendukung</th>
										</tr>
									</thead>
									<tbody>
										<?php for ($j=1; $j <= 4; $j++) : ?>
											<tr>
												<td><?= $j ?></td>
												<td>1928374859432</td>
												<td>User <?= $i.$j ?></td>
												<td><?= date('d-m-Y H:i') ?></td>
												<td><?= $i.$j ?></td>
												<td>
													<button type="button" class="btn btn-xs btn-link">View Feedback</button>
												</td>
												<td>
													<button type="button" class="btn btn-xs btn-link">Download</button>
												</td>
											</tr>
										<?php endfor ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				<?php endfor ?>
			</div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<button type="button" class="btn btn-success pull-right" id="btnBuatJadwal">Buat Jadwal</button>
		</div>
		<!-- /.box-footer -->
	</div>
	<!-- /.box -->
</section>

<!-- DataTables -->
<script src="<?php echo base_url('static') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static') ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
	$(() => {
		$(".dt-table").DataTable();
	});
</script>
