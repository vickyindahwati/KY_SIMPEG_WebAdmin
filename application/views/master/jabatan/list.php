<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static') ?>/plugins/datatables/dataTables.bootstrap.css">
<style>
	.dl-horizontal>dt {
		text-align: left;
	}
	.dl-horizontal>dd {
		margin-bottom: 10px;
	}
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		JABATAN
		<small>SIMPEG - Jabatan</small>
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
									<th>Nama Jabatan</th>
									<th>Kelas Jabatan</th>
									<th>Ikhtisar Jabatan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$jabatans = [
									['kelas_jabatan' => 17],
									['kelas_jabatan' => 15],
									['kelas_jabatan' => 13],
									['kelas_jabatan' => 11],
								];
								?>
								<?php foreach ($jabatans as $key => $jabatan) : ?>
									<tr>
										<td><?= $key + 1 ?></td>
										<td>Jabatan <?= $key + 1 ?></td>
										<td><?= $jabatan['kelas_jabatan'] ?></td>
										<td>Ikhtisar <?= $key + 1 ?></td>
										<td>
											<button type="button" class="btn btn-xs btn-default modal-show" data-nama_jabatan="Jabatan <?= $key + 1 ?>" data-kelas_jabatan="<?= $jabatan['kelas_jabatan'] ?>" data-ikhtisar_jabatan="Ikhtisar <?= $key + 1 ?>">View</button>
											<button type="button" class="btn btn-xs btn-info modal-edit" data-nama_jabatan="Jabatan <?= $key + 1 ?>" data-kelas_jabatan="<?= $jabatan['kelas_jabatan'] ?>" data-ikhtisar_jabatan="Ikhtisar <?= $key + 1 ?>">Edit</button>
											<button type="button" class="btn btn-xs btn-danger delete" data-nama_jabatan="Jabatan <?= $key + 1 ?>">Hapus</button>
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
				<h4 class="modal-title">Form Tambah Jabatan</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="nama_jabatan" class="col-sm-4 control-label">Nama Jabatan</label>
						<div class="col-sm-8">
							<input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="kelas_jabatan" class="col-sm-4 control-label">Kelas Jabatan</label>
						<div class="col-sm-8">
							<select name="kelas_jabatan" id="kelas_jabatan" class="form-control select2" data-placeholder="- Silahkan pilih -" style="width: 100%;">
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="ikhtisar_jabatan" class="col-sm-4 control-label">Ikhtisar Jabatan</label>
						<div class="col-sm-8">
							<input type="text" name="ikhtisar_jabatan" id="ikhtisar_jabatan" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="diklat_wajib" class="col-sm-4 control-label">Diklat Wajib</label>
						<div class="col-sm-8">
							<select name="diklat_wajib" id="diklat_wajib" class="form-control select2" multiple="multiple" data-placeholder="- Silahkan pilih -" style="width: 100%;">
								<?php for ($i=1; $i <= 5; $i++) : ?>
									<option value="<?= $i ?>">Diklat <?= $i ?></option>
								<?php endfor ?>
							</select>
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

<div class="modal fade" id="modal-show">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Show Jabatan</h4>
			</div>
			<div class="modal-body">
				<dl class="dl-horizontal">
					<dt>Nama Jabatan</dt>
					<dd id="__nama_jabatan">KEPALA BIRO A</dd>

					<dt>Kelas Jabatan</dt>
					<dd id="__kelas_jabatan">KELAS 1</dd>

					<dt>Ikhtisar Jabatan</dt>
					<dd>
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
							Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
							when an unknown printer took a galley of type and scrambled it to make a type specimen book.
							It has survived not only five centuries, but also the leap into electronic typesetting,
							remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
							sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
							like Aldus PageMaker including versions of Lorem Ipsum.
						</p>
					</dd>

					<dt>Diklat Wajib</dt>
					<dd>
						<ol>
							<li>Diklat 1</li>
							<li>Diklat 2</li>
							<li>Diklat 5</li>
						</ol>
					</dd>
				</dl>
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

		$(".modal-show").click((e) => {
			const data = $(e.target).data();
			Object.keys(data).forEach((key) => {
				$("#__" + key).val(data[key]);
			});
			$("#modal-show").modal("show");
		});

		$(".modal-edit").click((e) => {
			const data = $(e.target).data();
			Object.keys(data).forEach((key) => {
				$("#" + key).val(data[key]);
			});
			$("#modal-default").modal("show");
		});

		$(".delete").click((e) => {
			const data = $(e.target).data();
			Swal.fire({
				title: 'Are you sure delete ' + data.nama_jabatan + '?',
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
