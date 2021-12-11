<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static') ?>/plugins/datatables/dataTables.bootstrap.css">

<style>
	.dl-horizontal>dt {
		font-weight: 400;
		text-align: left;
	}
	.dl-horizontal>dd {
		font-weight: 700;
		margin-bottom: 10px;
	}
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		DETAIL PENGAJUAN DIKLAT
		<div class="pull-right">
			<button type="button" class="btn btn-primary">PRIORITASKAN</button>
			<button type="button" class="btn btn-default">OPSIONAL</button>
			<button type="button" class="btn btn-danger" id="btnTolak">TOLAK</button>
		</div>
	</h1>
</section>

<br>

<!-- Main content -->
<section class="invoice">
	<div class="row" style="border-bottom: 1px solid #eee;">
		<div class="col-sm-12">
			<h2 class="page-header" style="border-bottom: unset;">
				<b>
					No. REQ/DKLT/<?= date('Y/m') ?>/<?= sprintf('%04d', $id) ?>
					<br>
					<small>Request at : <?= date('d M Y H:i') ?></small>
				</b>
				<button type="button" class="btn btn-link pull-right" id="btnDiklatWajib">Lihat Diklat Wajib</button>
			</h2>
		</div>
	</div>
	<div class="row" style="border-bottom: 1px solid #eee; margin-top: 20px;">
		<div class="col-sm-6">
			<dl class="dl-horizontal">
				<dt>NIP</dt>
				<dd>190928399948532</dd>

				<dt>Nama</dt>
				<dd>User <?= $id ?></dd>
			</dl>
		</div>
		<div class="col-sm-6">
			<dl class="dl-horizontal">
				<dt>Jabatan</dt>
				<dd>Kepala Biro <?= $id ?></dd>

				<dt>Unit Kerja</dt>
				<dd>Unit Kerja <?= $id ?></dd>
			</dl>
		</div>
	</div>
	<div class="row" style="border-bottom: 1px solid #eee; margin-top: 20px;">
		<div class="col-sm-12">
			<dl class="dl-horizontal">
				<dt>Nama Diklat</dt>
				<dd>Diklat <?= $id ?></dd>

				<dt>Jenis Diklat</dt>
				<dd>Teknis</dd>

				<dt>Penyelenggara</dt>
				<dd>Vendor <?= $id ?></dd>

				<dt>Jadwal Penyelenggara</dt>
				<dd><?= date('d M Y H:i') . ' s/d ' . date('d M Y H:i') ?></dd>

				<dt>Estimasi Biaya</dt>
				<dd>Rp. <?= number_format(2500000, 0, ',', '.') ?></dd>

				<dt>Deskripsi</dt>
				<dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>

				<dt>Data Pendukung</dt>
				<dd>
					<a href="" target="_blank" rel="noopener noreferrer" class="btn btn-link" style="padding: 0;">Download Data Pendukung</a>
				</dd>
			</dl>
		</div>
	</div>
	<div class="row" style="margin-top: 20px;">
		<div class="col-sm-12">
			<h2 class="page-header" style="border-bottom: unset;"><b>FEEDBACK</b></h2>
			<dl class="dl-horizontal">
				<dt>Jam Pelajaran</dt>
				<dd>5 Jam</dd>

				<dt>Feedback</dt>
				<dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>

				<dt>Data Pendukung</dt>
				<dd>
					<a href="#" target="_blank" class="btn btn-link" style="padding: 0;">Download Data Pendukung</a>
				</dd>
			</dl>
		</div>
	</div>
</section>

<div class="clearfix"></div>

<div class="modal fade" id="modal-diklat_wajib">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Diklat Wajib</h4>
			</div>
			<div class="modal-body">
				<table class="dt-table table table-bordered table-striped" style="width:100%;">
					<thead>
						<tr>
							<th>Diklat</th>
							<th>Jenis</th>
							<th>Jadwal</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$diklat_wajibs = [
								['jenis' => 'Teknis', 'jadwal' => '2021/03/06', 'status' => 'Selesai'],
								['jenis' => 'Fungsional', 'jadwal' => '2022/04/01', 'status' => 'Belum'],
								['jenis' => 'Struktural', 'jadwal' => '2022/10/20', 'status' => 'Belum'],
								['jenis' => 'Teknis', 'jadwal' => '2022/12/01', 'status' => 'Belum'],
							];
						?>
						<?php foreach ($diklat_wajibs as $key => $diklat_wajib) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $diklat_wajib['jenis'] ?></td>
								<td><?= $diklat_wajib['jadwal'] ?></td>
								<td><?= $diklat_wajib['status'] ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-tolak">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Jendela Konfirmasi</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<label for="reason">Silahkan isi keterangan mengenai penolakan atas pengajuan diklat ini</label>
						<textarea name="reason" id="reason" cols="30" rows="10" class="form-control" style="width: 100%;"></textarea>
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
	</div>
</div>

<!-- DataTables -->
<script src="<?php echo base_url('static') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static') ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
	$(() => {
		$(".dt-table").DataTable();
		$("#btnDiklatWajib").click(() => {
			$("#modal-diklat_wajib").modal("show");
		});
		$("#btnTolak").click(() => {
			$("#modal-tolak").modal("show");
		});
	});
</script>
