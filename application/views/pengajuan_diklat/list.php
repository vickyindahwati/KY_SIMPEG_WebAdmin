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
	<div class="box box-primary">
		<div class="box-header">
			<button type="button" class="btn btn-success" id="btnTambah"><i class="fa fa-plus"></i> Tambah</button>
		</div>
		<div class="box-body">
			<table class="dt-table table table-bordered table-striped" style="width:100%;">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Tgl. Request</th>
						<th>Nama Diklat</th>
						<th>Jenis Diklat</th>
						<th>Jadwal</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$jenis_diklat = [
							['jenis_diklat' => 'Teknis', 'jadwal' => '2020/03/06', 'status' => 'Terima'],
							['jenis_diklat' => 'Teknis', 'jadwal' => '2020/04/01', 'status' => 'Terima'],
							['jenis_diklat' => 'Teknis', 'jadwal' => '2020/10/20', 'status' => 'Pengajuan'],
							['jenis_diklat' => 'Fungsional', 'jadwal' => '2020/12/01', 'status' => 'Pengajuan'],
						];
						for ($i=1; $i <= 4; $i++) :
					?>
						<tr>
							<td>REQ/DKLT/<?= date('Y/m') ?>/<?= sprintf('%04d', $i) ?></td>
							<td><?= date('d-m-Y H:i') ?></td>
							<td>Diklat <?= $i ?></td>
							<td><?= $jenis_diklat[$i - 1]['jenis_diklat'] ?></td>
							<td><?= $jenis_diklat[$i - 1]['jadwal'] ?></td>
							<td><?= $jenis_diklat[$i - 1]['status'] ?></td>
							<td>
								<a href="<?= base_url('index.php/pengajuan_diklat/show/' . $i . '?jenis=' . $jenis_diklat[$i]['jenis_diklat'] . '&status=' . $jenis_diklat[$i-1]['status'] . '&jadwal=' . $jenis_diklat[$i-1]['jadwal']) ?>" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> Show</a>
								<?php if ($jenis_diklat[$i -1]['status'] == 'Terima') : ?>
									<button type="button" class="btn btn-xs btn-info btn_feedback"><i class="fa fa-commenting-o"></i> Feedback</button>
								<?php elseif ($jenis_diklat[$i -1]['status'] == 'Pengajuan') : ?>
									<button type="button" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Batal</button>
								<?php endif ?>
							</td>
						</tr>
					<?php endfor ?>
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</section>

<div class="modal fade" id="modal-penjadwalan_diklat">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Form Pengajuan Diklat</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label class="col-sm-4 control-label">Nama Diklat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Jenis Diklat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="alasan" class="col-sm-4 control-label">Alasan Pengajuan</label>
						<div class="col-sm-8">
							<textarea name="alasan" id="alasan" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="data_pendukung" class="col-sm-4 control-label">Updload data pendukung</label>
						<div class="col-sm-8">
							<input type="file" name="data_pendukung" id="data_pendukung">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="pull-right">
					<button type="button" class="btn btn-primary">SUBMIT</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-feedback_diklat">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Form Feedback Diklat</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label class="col-sm-4 control-label">Nama Diklat</label>
						<label class="col-sm-8 control-label text-left">Diklat <?= $id ?></label>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Waktu Pelaksanaan</label>
						<label class="col-sm-8 control-label text-left"><?= date('d M Y') . ' s/d ' . date('d M Y') ?></label>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Vendor</label>
						<label class="col-sm-8 control-label text-left">Vendor ABC</label>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Jam Pelajaran</label>
						<div class="col-sm-8">
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="feedback" class="col-sm-4 control-label">Feedback</label>
						<div class="col-sm-8">
							<textarea name="feedback" id="feedback" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="data_pendukung" class="col-sm-4 control-label">Updload data pendukung</label>
						<div class="col-sm-8">
							<input type="file" name="data_pendukung" id="data_pendukung">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="pull-right">
					<button type="button" class="btn btn-primary">SIMPAN</button>
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
		$("#btnTambah").click(() => {
			$("#modal-penjadwalan_diklat").modal("show")
		});

		$(".btn_feedback").click(() => {
			$("#modal-feedback_diklat").modal("show");
		});
	});
</script>
