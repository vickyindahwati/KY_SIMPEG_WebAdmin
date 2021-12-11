<?php
	$menus = [
		['col' => '4', 'nama' => 'Pegawai', 'url' => 'employee'],
		['col' => '4', 'nama' => 'NEWS', 'url' => 'news'],
		['col' => '4', 'nama' => 'Rekapitulasi Kinerja', 'url' => 'rekapitulasi'],
		['col' => '4', 'nama' => 'APIs', 'url' => 'api'],
		['col' => '4', 'nama' => 'Pelayanan Pegawai', 'url' => 'pelayanan_pegawai'],
		['col' => '4', 'nama' => 'Reports', 'url' => 'laporan_feedback_diklat'],
		['col' => '6', 'nama' => 'Cuti', 'url' => 'leave'],
		['col' => '6', 'nama' => 'Surat Lainnya', 'url' => 'surat_lainnya'],
		['col' => '6', 'nama' => 'Jurnal Harian', 'url' => 'journal'],
		['col' => '6', 'nama' => 'Pendidikan dan Pelatihan', 'url' => 'diklat'],
	];
?>
<section class="content">
	<div class="container">
		<div class="row">
			<?php foreach ($menus as $menu) : ?>
			<div class="col-sm-<?= $menu['col'] ?>">
				<a href="<?= base_url('index.php/' . $menu['url']) ?>">
					<div class="small-box bg-gray">
						<div class="inner text-center">
							<h3><?= $menu['nama'] ?></h3>
						</div>
					</div>
				</a>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
