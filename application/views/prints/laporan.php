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
<a href="<?= base_url('laporan'); ?>" class="no_print btn btn-primary"><i class="fas fa-fw fa-arrow-left"></i></a>
<div class="container my-3">
	<div class="row">
		<div class="col">
			<h3>Laporan At Dymsum Aww</h3>
			<h5>Dari Tanggal <?= $tanggal_awal; ?> Sampai Tanggal <?= $tanggal_akhir; ?>, Status Bayar : 
			<?php if ($status_bayar == 'belum_dibayar'): ?>
				<span>Belum Dibayar</span>
			<?php elseif ($status_bayar == 'sudah_dibayar'): ?>
				<span>Sudah Dibayar</span>
			<?php else: ?>
				<span>Semua</span>
			<?php endif ?></h5>
			<table class="table table-hover table-striped table-bordered" id="#table_id">
				<thead>
					<tr>
						<th>No</th>
						<th>Dilakukan Oleh</th>
						<th>Kode Invoice</th>
						<th>Status Bayar</th>
						<th>Tanggal Pembayaran</th>
						<th>Total Pembayaran</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$omset = 0; 
					?>

					<?php foreach ($transaksi as $dt): ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><?= $dt['nama_user']; ?></td>
							<td><?= $dt['kode_invoice']; ?></td>
							<td>
								<?php if ($dt['status_bayar'] == 'belum_dibayar'): ?>
									<span>Belum Dibayar</span>
								<?php else: ?>
									<span>Sudah Dibayar</span>
								<?php endif ?>
							</td>
							<td><?= date('d-m-Y, H:i:s', $dt['tgl_pembayaran']); ?></td>
							<td><?= number_format($dt['total_pembayaran']); ?></td>
						</tr>
						<?php 
							if ($dt['total_pembayaran'] != null) {
								$omset += $dt['total_pembayaran']; 
							}
						?>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col py-4 text-dark bg-primary rounded">
			<h4>Keuntungan Kotor : Rp. <?= number_format($omset); ?></h4>
		</div>
	</div>
</div>
<script>
	window.print();
</script>