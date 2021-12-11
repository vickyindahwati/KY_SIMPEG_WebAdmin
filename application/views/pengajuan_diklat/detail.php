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
	</h1>
</section>
<br>
<?php if ($this->input->get('status') == 'Terima') : ?>
	<div class="alert alert-success alert-dismissible" style="text-align: center;">
		<h4><i class="icon fa fa-check"></i> DITERIMA</h4>
	</div>
<?php elseif ($this->input->get('status') == 'Pengajuan') : ?>
	<div class="alert alert-warning alert-dismissible" style="text-align: center;">
		<h4></i> PENGAJUAN</h4>
	</div>
<?php endif ?>

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
	<div class="row" style="margin-top: 20px;">
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
</section>

<div class="clearfix"></div>
