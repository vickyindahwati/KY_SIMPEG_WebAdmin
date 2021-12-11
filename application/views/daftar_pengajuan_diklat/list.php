<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static') ?>/plugins/datatables/dataTables.bootstrap.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?= base_url('static') ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<style>
	.text-left {
		text-align: left !important;
	}
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		DAFTAR PENGAJUAN DIKLAT
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
											<th>Nomor</th>
											<th>Tgl. Request</th>
											<th>User</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php for ($j=1; $j <= 4; $j++) : ?>
											<tr>
												<td>REQ/DKLT/<?= date('Y/m') ?>/<?= sprintf('%04d', $i.$j) ?></td>
												<td><?= date('d-m-Y H:i') ?></td>
												<td>User <?= $i.$j ?></td>
												<td>Menunggu</td>
												<td>
													<a href="<?= base_url('index.php/daftar_pengajuan_diklat/show/' . $i.$j) ?>" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> Show</a>
													<button type="button" class="btn btn-xs btn-info modal-edit"><i class="fa fa-pencil"></i> Edit</button>
													<button type="button" class="btn btn-xs btn-danger delete"><i class="fa fa-remove"></i> Hapus</button>
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

<div class="modal fade" id="modal-penjadwalan_diklat">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Form Penjadwalan Diklat</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label class="col-sm-4 control-label">Nama Diklat</label>
						<label class="col-sm-8 control-label text-left">Diklat <?= $id ?></label>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Jenis Diklat</label>
						<label class="col-sm-8 control-label text-left">Teknis</label>
					</div>
					<hr>
					<div class="form-group">
						<label for="start" class="col-sm-4 control-label">Jadwal</label>
						<div class="col-sm-8">
							<div class="form-inline">
								<div class="input-group date">
									<input type="text" class="form-control pull-right datepicker">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
								<!-- /.input group -->
								<span style="margin: 0 10px;">s/d</span>
								<div class="input-group date">
									<input type="text" class="form-control pull-right datepicker">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
								<!-- /.input group -->
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="tempat" class="col-sm-4 control-label">Tempat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="tempat" name="tempat">
						</div>
					</div>
					<div class="form-group">
						<label for="harga" class="col-sm-4 control-label">Harga</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="harga" name="harga">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="pull-right">
					<button type="button" class="btn btn-primary">PROSES</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- DataTables -->
<script src="<?php echo base_url('static') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static') ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- bootstrap datepicker -->
<script src="<?= base_url('static') ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
	$(() => {
		$(".dt-table").DataTable();
		$(".datepicker").datepicker({
			autoclose: true
		});

		$("#btnBuatJadwal").click(() => {
			$("#modal-penjadwalan_diklat").modal("show");
		});
	});
</script>
