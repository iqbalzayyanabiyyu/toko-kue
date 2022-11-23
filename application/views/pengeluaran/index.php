<div class="container">
	<div class="row my-2">
		<div class="col-lg my-2 py-2 header-title">
			<h3><i class="fas fa-fw fa-share-square"></i> Daftar Pengeluaran</h3>
		</div>

		<div class="col-lg my-2 py-2 header-button">
			<a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahPengeluaranModal"><i class="fas fa-fw fa-plus"></i> Tambah</a>
			<!-- Modal -->
			<div class="modal fade" id="tambahPengeluaranModal" tabindex="-1" aria-labelledby="tambahPengeluaranModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <form action="<?= base_url('pengeluaran/addPengeluaran'); ?>" method="post">
			    	<div class="modal-content text-left">
				      <div class="modal-header">
				        <h5 class="modal-title" id="tambahPengeluaranModalLabel"><i class="fas fa-fw fa-share-square"></i><sup><i class="fas fa-1x fa-plus"></i></sup> Tambah Pengeluaran</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<div class="form-group">
				      		<label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
				      		<input type="number" id="jumlah_pengeluaran" class="form-control" placeholder="Masukkan Jumlah Pengeluaran" name="jumlah_pengeluaran" required>
				      	</div>
				      	<div class="form-group">
				      		<label for="keterangan_pengeluaran">Keterangan Pengeluaran</label>
				      		<textarea id="keterangan_pengeluaran" class="form-control" placeholder="Masukkan Keterangan Pengeluaran" name="keterangan_pengeluaran" required></textarea>
				      	</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
				        <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-save"></i> Simpan</button>
				      </div>
				    </div>
			    </form>
			  </div>
			</div>
		</div>
	</div>
	<div class="row my-2">
		<div class="col-lg">
			<div class="table-responsive">
				<table class="text-center table table-bordered table-hover table-striped" id="table_id">
					<thead>
						<tr>
							<th>No.</th>
							<th>Jumlah Pengeluaran</th>
							<th>Keterangan Pengeluaran</th>
							<th>Tanggal Pengeluaran</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbdody>
						<?php $i = 1; ?>
						<?php foreach ($pengeluaran as $dpe): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td class="text-left">Rp. <?= number_format($dpe['jumlah_pengeluaran']); ?></td>
								<td class="text-left"><?= $dpe['keterangan_pengeluaran']; ?></td>
								<td class="text-left"><?= date('Y-m-d, H:i:s', $dpe['tanggal_pengeluaran']); ?></td>
								<td>
									<a class="btn m-1 btn-info" href="" data-toggle="modal" data-target="#ubahPengeluaranModal<?= $dpe['id_pengeluaran']; ?>"><i class="fas fa-fw fa-edit"></i> Ubah</a>
									<!-- Modal -->
									<div class="modal fade" id="ubahPengeluaranModal<?= $dpe['id_pengeluaran']; ?>" tabindex="-1" aria-labelledby="ubahPengeluaranModalLabel<?= $dpe['id_pengeluaran']; ?>" aria-hidden="true">
									  <div class="modal-dialog">
									    <form action="<?= base_url('pengeluaran/editPengeluaran/' . $dpe['id_pengeluaran']); ?>" method="post">
									    	<div class="modal-content text-left">
										      <div class="modal-header">
										        <h5 class="modal-title" id="ubahPengeluaranModalLabel<?= $dpe['id_pengeluaran']; ?>"><i class="fas fa-fw fa-share-square"></i><sup><i class="fas fa-1x fa-edit"></i></sup> Ubah Pengeluaran</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      	<div class="form-group">
										      		<label for="jumlah_pengeluaran<?= $dpe['id_pengeluaran']; ?>">Jumlah Pengeluaran</label>
										      		<input type="number" id="jumlah_pengeluaran<?= $dpe['id_pengeluaran']; ?>" class="form-control" placeholder="Masukkan Jumlah Pengeluaran" name="jumlah_pengeluaran" value="<?= $dpe['jumlah_pengeluaran']; ?>" required>
										      	</div>
										      	<div class="form-group">
										      		<label for="keterangan_pengeluaran<?= $dpe['id_pengeluaran']; ?>">Keterangan Pengeluaran</label>
										      		<textarea id="keterangan_pengeluaran<?= $dpe['id_pengeluaran']; ?>" class="form-control" placeholder="Masukkan Keterangan Pengeluaran" name="keterangan_pengeluaran" required><?= $dpe['keterangan_pengeluaran']; ?></textarea>
										      	</div>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
										        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
										      </div>
										    </div>
									    </form>
									  </div>
									</div>
									<?php if ($dataUser['jabatan'] == 'administrator'): ?>
										<a class="btn m-1 btn-danger btn-delete" data-name="Rp. <?= number_format($dpe['jumlah_pengeluaran']); ?> dengan keterangan <?= $dpe['keterangan_pengeluaran']; ?>" href="<?= base_url('pengeluaran/deletePengeluaran/' . $dpe['id_pengeluaran']); ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
									<?php endif ?>
								</td>
							</tr>
						<?php endforeach ?>
					</tbdody>
				</table>
			</div>
		</div>
	</div>
</div>