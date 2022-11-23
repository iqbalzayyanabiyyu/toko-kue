<style>
	body {
		font-family: monospace;
		font-weight: 600;
		font-size: .9rem;
	}
	@media print {
		.no_print {
			display: none;	
		}
	}
</style>
<a onclick="window.print();" class="no_print btn btn-success"><i class="fas fa-fw fa-print"></i></a> <br><br>
<a href="<?= base_url('laporanPengeluaran'); ?>" class="no_print btn btn-primary"><i class="fas fa-fw fa-arrow-left"></i></a>
<div class="container my-3">
	<div class="row">
		<div class="col">
			<h3>Laporan At Dymsum Aww</h3>
			<h5>Dari Tanggal <?= $tanggal_awal; ?> Sampai Tanggal <?= $tanggal_akhir; ?></h5>
			<table class="text-center table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Jumlah Pengeluaran</th>
						<th>Keterangan Pengeluaran</th>
						<th>Tanggal Pengeluaran</th>
					</tr>
				</thead>
				<tbdody>
					<?php 
						$i = 1;
						$jumlah_pengeluaran = 0;
					?>
					<?php foreach ($pengeluaran as $dpe): ?>
						<tr>
							<td><?= $i++; ?></td>
							<td class="text-left">Rp. <?= number_format($dpe['jumlah_pengeluaran']); ?></td>
							<td class="text-left"><?= $dpe['keterangan_pengeluaran']; ?></td>
							<td class="text-left"><?= date('Y-m-d, H:i:s', $dpe['tanggal_pengeluaran']); ?></td>
						</tr>
						<?php $jumlah_pengeluaran += $dpe['jumlah_pengeluaran']; ?>
					<?php endforeach ?>
				</tbdody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col py-4 text-dark bg-primary rounded">
			<h4>Pengeluaran : Rp. <?= number_format($jumlah_pengeluaran); ?></h4>
		</div>
	</div>
</div>
<script>
	window.print();
</script>