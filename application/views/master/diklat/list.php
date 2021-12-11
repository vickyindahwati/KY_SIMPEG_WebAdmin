<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static') ?>/plugins/datatables/dataTables.bootstrap.css">

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		DIKLAT
		<small>SIMPEG - Diklat</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah Baru</button>
				</div><!-- /.box-header -->
				<div id="container-list">
					<div class="box-body">
						<table id="dt-table" class="table table-bordered table-striped" style="width:100%;">
							<thead>
								<tr>
									<th width="30px">No</th>
									<th>Nama Diklat</th>
									<th>Jenis Diklat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$diklats = [
									['jenis_diklat' => 'Diklat Struktural'],
									['jenis_diklat' => 'Teknis'],
									['jenis_diklat' => 'Fungsional'],
									['jenis_diklat' => 'Teknis']
								];
								?>
								<?php foreach ($diklats as $key => $diklat) : ?>
									<tr>
										<td><?= $key + 1 ?></td>
										<td>Diklat <?= $key + 1 ?></td>
										<td><?= $diklat['jenis_diklat'] ?></td>
										<td>
											<button type="button" class="btn btn-xs btn-default edit" data-nama_diklat="Diklat <?= $key + 1 ?>" data-jns_diklat="<?= $diklat['jenis_diklat'] ?>">Edit</button>
											<button type="button" class="btn btn-xs btn-info delete" data-nama_diklat="Diklat <?= $key + 1 ?>">Hapus</button>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="overlay" id="container-loader-list" style="display:none;">
					<i class="fa fa-refresh fa-spin"></i>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Form Tambah Diklat</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="jns_diklat" class="col-sm-4 control-label">Jenis Diklat</label>
						<div class="col-sm-8">
							<select name="jns_diklat" id="jns_diklat" class="form-control select2" data-placeholder="- Silahkan pilih -" style="width: 100%;">
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="nama_diklat" class="col-sm-4 control-label">Nama Diklat</label>
						<div class="col-sm-8">
							<input type="text" name="nama_diklat" id="nama_diklat" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="bidang_studi" class="col-sm-4 control-label">Bidang Studi</label>
						<div class="col-sm-8">
							<input type="text" name="bidang_studi" id="bidang_studi" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="prioritas_program" class="col-sm-4 control-label">Prioritas Program</label>
						<div class="col-sm-8">
							<select name="prioritas_program" id="prioritas_program" class="form-control select2" data-placeholder="- Silahkan pilih -" style="width: 100%;">
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="tahun_pelaksanaan" class="col-sm-4 control-label">Tahun Pelaksanaan</label>
						<div class="col-sm-8">
							<input type="text" name="tahun_pelaksanaan" id="tahun_pelaksanaan" class="form-control">
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

<script type="text/javascript">
	$(() => {
		$("#dt-table").DataTable();

		$(".modal-edit").click((e) => {
			const data = $(e.target).data();
		});

		$(".delete").click((e) => {
			const data = $(e.target).data();
			Swal.fire({
				title: 'Are you sure delete ' + data.diklat + '?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire(
						'Deleted!',
						data.diklat + ' has been deleted.',
						'success'
					)
				}
			})
		});

		$('.select2').select2();
	});
</script>
