<div class="container">
	<div class="row my-2">
		<div class="col-lg my-2 py-2 header-title">
			<h3><i class="fas fa-fw fa-tachometer-alt"></i> Halaman Dashboard</h3>
		</div>
	</div>
	<div class="row my-2">
		<div class="col-lg-3">
			<div class="card shadow">
			  <div class="card-body">
			    <h6><i class="fas fa-fw fa-handshake"></i> <br>Transaksi</h6>
			    <?php 
			    	$this->db->group_by('kode_invoice');
			    	$jml_transaksi = $this->db->get('tb_transaksi')->num_rows();
			    ?>
			    <h6 class="text-muted"><?= number_format($jml_transaksi); ?> Transaksi</h6>
			  </div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card shadow">
			  <div class="card-body">
			    <h6><i class="text-success fas fa-fw fa-caret-up"></i> <i class="text-success fas fa-fw fa-dollar-sign"></i> <br>Omset</h6>
			    <?php 
				    $pembayaran = $this->pm->getAllPembayaran();
			    	$omset = 0;
			    	foreach ($pembayaran as $dp) {
			    		if ($dp['status_bayar'] == 'sudah_dibayar') {
				    		$omset += $this->pm->totalHargaTerakhir($dp['kode_invoice'])['total_harga_terakhir'];
			    		} else {
			    			$omset += 0;
			    		}
			    	}
			    ?>
			    <h6 class="text-muted">Rp. <?= number_format($omset); ?></h6>
			  </div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card shadow">
				<div class="card-body">
					<h6><i class="text-danger fas fa-fw fa-caret-down"></i><i class="text-danger fas fa-fw fa-dollar-sign"></i> <br>Pengeluaran</h6>
					<?php 
				    	$jumlah_pengeluaran = 0;
				    	foreach ($pengeluaran as $dpe) {
				    		$jumlah_pengeluaran += $dpe['jumlah_pengeluaran'];
				    	}
				    ?>
					<h6 class="text-muted">Rp. <?= number_format($jumlah_pengeluaran); ?></h6>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card shadow">
				<div class="card-body">
					<h6><i class="fas fa-fw fa-wallet"></i> <br>Total Keuangan</h6>
					<h6 class="text-muted">Rp. <?= number_format($omset - $jumlah_pengeluaran); ?></h6>
				</div>
			</div>
		</div>
	</div>

	<div class="row my-2 mt-3">
		<div class="col">
			<div class="table-responsive">
				<h4>Daftar Terakhir Transaksi</h4>
				<table class="table table-hover table-striped table-bordered" id="#table_id">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Invoice</th>
							<th>Status Bayar</th>
							<th>Tanggal Transaksi</th>
							<th>Dilakukan Oleh</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($transaksi as $dt): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $dt['kode_invoice']; ?></td>
								<td>
									<?php if ($dt['status_bayar'] == 'belum_dibayar'): ?>
										<a href="<?= base_url('pembayaran/bayar/' . $dt['kode_invoice']); ?>" class="badge badge-danger"><i class="fas fa-fw fa-times"></i> Belum Dibayar</a>
									<?php else: ?>
										<span class="badge badge-success"><i class="fas fa-fw fa-check"></i> Sudah Dibayar</span>
									<?php endif ?>
								</td>
								<td><?= date('d-m-Y, H:i:s', $dt['tgl_transaksi']); ?></td>
								<td><?= $dt['nama_user']; ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>