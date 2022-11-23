<div class="container">
	<div class="row my-2">
		<div class="col-lg my-2 py-2 header-title">
			<h3><i class="fas fa-fw fa-utensils"></i> Daftar Menu</h3>
		</div>

		<?php if ($dataUser['jabatan'] == 'administrator'): ?>
			<div class="col-lg my-2 py-2 header-button">
				<a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahMenuModal"><i class="fas fa-fw fa-plus"></i> Tambah</a>
				<!-- Modal -->
				<div class="modal fade" id="tambahMenuModal" tabindex="-1" aria-labelledby="tambahMenuModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <form action="<?= base_url('main/addMenu'); ?>" method="post">
				    	<div class="modal-content text-left">
					      <div class="modal-header">
					        <h5 class="modal-title" id="tambahMenuModalLabel"><i class="fas fa-fw fa-utensils"></i><sup><i class="fas fa-1x fa-plus"></i></sup> Tambah Menu</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					      	<div class="form-group">
					      		<label for="nama_menu">Nama Menu</label>
					      		<input type="text" id="nama_menu" class="form-control" placeholder="Masukkan Nama Menu" name="nama_menu" required>
					      	</div>
					      	<div class="form-group">
					      		<label for="harga_menu">Harga Menu</label>
					      		<input type="number" id="harga_menu" class="form-control" placeholder="Masukkan Harga Menu" name="harga_menu" required>
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
		<?php endif ?>
	</div>
	<div class="row my-2">
		<div class="col-lg">
			<div class="table-responsive">
				<table class="text-center table table-bordered table-hover table-striped" id="table_id">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Menu</th>
							<th>Harga Menu</th>
							<th>Pada Outlet</th>
							<?php if ($dataUser['jabatan'] == 'administrator'): ?>
								<th>Aksi</th>
							<?php endif ?>
						</tr>
					</thead>
					<tbdody>
						<?php $i = 1; ?>
						<?php foreach ($menu as $dm): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td class="text-left"><?= $dm['nama_menu']; ?></td>
								<td class="text-left">Rp. <?= number_format($dm['harga_menu']); ?></td>
								<td class="text-left"><?= $dm['nama_outlet']; ?></td>
								<?php if ($dataUser['jabatan'] == 'administrator'): ?>
									<td>
										<a class="btn m-1 btn-info" href="" data-toggle="modal" data-target="#ubahMenuModal<?= $dm['id_menu']; ?>"><i class="fas fa-fw fa-edit"></i> Ubah</a>
										<!-- Modal -->
										<div class="modal fade" id="ubahMenuModal<?= $dm['id_menu']; ?>" tabindex="-1" aria-labelledby="ubahMenuModalLabel<?= $dm['id_menu']; ?>" aria-hidden="true">
										  <div class="modal-dialog">
										    <form action="<?= base_url('main/editMenu/' . $dm['id_menu']); ?>" method="post">
										    	<div class="modal-content text-left">
											      <div class="modal-header">
											        <h5 class="modal-title" id="ubahMenuModalLabel<?= $dm['id_menu']; ?>"><i class="fas fa-fw fa-utensils"></i><sup><i class="fas fa-1x fa-edit"></i></sup> Ubah Menu</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											      	<div class="form-group">
											      		<label for="nama_menu<?= $dm['id_menu']; ?>">Nama Menu</label>
											      		<input type="text" id="nama_menu<?= $dm['id_menu']; ?>" class="form-control" name="nama_menu" value="<?= $dm['nama_menu']; ?>" required>
											      	</div>
											      	<div class="form-group">
											      		<label for="harga_menu<?= $dm['id_menu']; ?>">Harga Menu</label>
											      		<input type="number" id="harga_menu<?= $dm['id_menu']; ?>" class="form-control" placeholder="Masukkan Harga Menu" name="harga_menu" value="<?= $dm['harga_menu']; ?>" required>
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
											<a class="btn m-1 btn-danger btn-delete" data-name="<?= $dm['nama_menu']; ?>" href="<?= base_url('main/deleteMenu/' . $dm['id_menu']); ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
										<?php endif ?>
									</td>
								<?php endif ?>
							</tr>
						<?php endforeach ?>
					</tbdody>
				</table>
			</div>
		</div>
	</div>
</div>