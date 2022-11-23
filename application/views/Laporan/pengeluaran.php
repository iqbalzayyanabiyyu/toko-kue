<div class="container">
	<div class="row my-2">
		<div class="col-lg my-2 py-2 header-title">
			<h3><i class="fas fa-fw fa-file-pdf"></i> Halaman Laporan Pengeluaran</h3>
		</div>
	</div>
	<div class="row my-2">
		<div class="col-lg-12">
	        <form method="post" action="<?= base_url('laporanPengeluaran'); ?>" class="form-inline bg-danger p-3 rounded text-white">
	          <div class="row mx-auto justify-content-center">
	            <div class="col-lg text-center ml-2 p-1">
					<?php if (isset($_POST['cari_tanggal'])): ?>
						<?php 
							$tanggal_awal_heading = date('d-m-Y', strtotime($tanggal_awal));
							$tanggal_akhir_heading = date('d-m-Y', strtotime($tanggal_akhir));
						 ?>
						<h5>Dari Tanggal <?= $tanggal_awal_heading; ?> Sampai Tanggal <?= $tanggal_akhir_heading; ?>
					<?php else: ?>
						<h5>Dari Tanggal <?= date('01-m-Y'); ?> Sampai Tanggal <?= date('d-m-Y'); ?></h5>
					<?php endif ?>
	            </div>
	          </div>
	          <div class="row justify-content-center text-center">
	            <div class="col-lg-4">
	              <div class="form-group my-1">
	                <label class="mx-2">Dari tanggal : </label>
	                <?php if (isset($_POST['cari_tanggal'])): ?>
	                  <input type="date" name="tanggal_awal" class="form-control" value="<?= $tanggal_awal; ?>">
	                <?php else: ?>
	                  <input type="date" name="tanggal_awal" class="form-control" value="<?= date('Y-m-01'); ?>">
	                <?php endif ?>
	              </div>
	            </div>
	            <div class="col-lg-4">
	              <div class="form-group my-1">
	                <label class="mx-2">Sampai tanggal : </label>
	                <?php if (isset($_POST['cari_tanggal'])): ?>
	                  <input type="date" name="tanggal_akhir" class="form-control" value="<?= $tanggal_akhir; ?>">
	                <?php else: ?>
	                  <input type="date" name="tanggal_akhir" class="form-control" value="<?= date('Y-m-d'); ?>">
	                <?php endif ?>
	              </div>
	            </div>
	            <div class="form-group my-1">
	                <button class="btn btn-success mx-1" name="cari_tanggal" type="submit"><i class="fas fa-fw fa-filter"></i> Filter</button>
	                <a class="btn btn-success m-1" href="<?= base_url('main'); ?>"><i class="fas fa-fw fa-redo"></i></a>
					<?php if (isset($_POST['cari_tanggal'])): ?>
		                <a class="btn btn-success mx-1" href="<?= base_url('prints/laporanPengeluaran/' . $tanggal_awal . '/' . $tanggal_akhir); ?>"><i class="fas fa-fw fa-print"></i> Print</a>
					<?php endif ?>
	              </div>
	            </div>
	          </div>
	        </form>
	    </div>
	</div>
	<div class="row my-2 mt-3">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered" id="#table_id">
					<thead>
						<tr>
							<th>No</th>
							<th>Jumlah Pengeluaran</th>
							<th>Tanggal Pengeluaran</th>
							<th>Keterangan Pengeluaran</th>
							<th>Dilakukan Oleh</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($pengeluaran as $dpe): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td>Rp. <?= number_format($dpe['jumlah_pengeluaran']); ?></td>
								<td><?= $dpe['keterangan_pengeluaran']; ?></td>
								<td><?= date('d-m-Y, H:i:s', $dpe['tanggal_pengeluaran']); ?></td>
								<td><?= $dpe['nama_user']; ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>