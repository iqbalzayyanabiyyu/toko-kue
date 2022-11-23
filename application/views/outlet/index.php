<div class="container">
	<div class="row my-2">
		<div class="col-lg my-2 py-2 header-title">
			<h3><i class="fas fa-fw fa-store"></i> Daftar Outlet</h3>
		</div>

		<?php if ($dataUser['jabatan'] == 'administrator'): ?>
			<div class="col-lg my-2 py-2 header-button">
				<a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahOutletModal"><i class="fas fa-fw fa-plus"></i> Tambah</a>
				<!-- Modal -->
				<div class="modal fade" id="tambahOutletModal" tabindex="-1" aria-labelledby="tambahOutletModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <form action="<?= base_url('main/addOutlet'); ?>" method="post">
				    	<div class="modal-content text-left">
					      <div class="modal-header">
					        <h5 class="modal-title" id="tambahOutletModalLabel"><i class="fas fa-fw fa-store"></i><sup><i class="fas fa-1x fa-plus"></i></sup> Tambah Outlet</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					      	<div class="form-group">
					      		<label for="nama_outlet">Nama Outlet</label>
					      		<input type="text" id="nama_outlet" class="form-control" placeholder="Masukkan Nama Outlet" name="nama_outlet" required>
					      	</div>
					      	<div class="form-group">
					      		<label for="no_telepon_outlet">No. Telepon Outlet</label>
					      		<input type="number" id="no_telepon_outlet" class="form-control" placeholder="Masukkan No. Telepon Outlet" name="no_telepon_outlet" required>
					      	</div>
					      	<div class="form-group">
					      		<label for="alamat_outlet">Alamat Outlet</label>
					      		<textarea id="alamat_outlet" class="form-control" placeholder="Masukkan Alamat Outlet" name="alamat_outlet" required></textarea>
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
							<th>Nama Outlet</th>
							<th>No. Telepon Outlet</th>
							<th>Alamat Outlet</th>
							<?php if ($dataUser['jabatan'] == 'administrator'): ?>
								<th>Aksi</th>
							<?php endif ?>
						</tr>
					</thead>
					<tbdody>
						<?php $i = 1; ?>
						<?php foreach ($outlet as $do): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td class="text-left">
									<?= $do['nama_outlet']; ?>
									<?php 
										$this->db->join('tb_user', 'tb_user.id_outlet=tb_outlet.id_outlet');
										$this->db->from('tb_outlet');
										$this->db->where('tb_user.id_outlet', $do['id_outlet']);
										$jmlUserOutlet =  $this->db->count_all_results();
									?>
									<?php if ($jmlUserOutlet == '0'): ?>
										<br>
									 	<a href="<?= base_url('main/user'); ?>"><small> Belum ada User <span class="text-info">(Tambahkan User)</span></small></a>
									<?php endif ?>
								</td>
								<td class="text-left"><?= $do['no_telepon_outlet']; ?></td>
								<td class="text-left"><?= $do['alamat_outlet']; ?></td>
								<?php if ($dataUser['jabatan'] == 'administrator'): ?>
									<td>
										<a class="btn m-1 btn-info" href="" data-toggle="modal" data-target="#ubahOutletModal<?= $do['id_outlet']; ?>"><i class="fas fa-fw fa-edit"></i> Ubah</a>
										<!-- Modal -->
										<div class="modal fade" id="ubahOutletModal<?= $do['id_outlet']; ?>" tabindex="-1" aria-labelledby="ubahOutletModalLabel<?= $do['id_outlet']; ?>" aria-hidden="true">
										  <div class="modal-dialog">
										    <form action="<?= base_url('main/editOutlet/' . $do['id_outlet']); ?>" method="post">
										    	<div class="modal-content text-left">
											      <div class="modal-header">
											        <h5 class="modal-title" id="ubahOutletModalLabel<?= $do['id_outlet']; ?>"><i class="fas fa-fw fa-store"></i><sup><i class="fas fa-1x fa-edit"></i></sup> Ubah Outlet</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											      	<div class="form-group">
											      		<label for="nama_outlet<?= $do['id_outlet']; ?>">Nama Outlet</label>
											      		<input type="text" id="nama_outlet<?= $do['id_outlet']; ?>" class="form-control" name="nama_outlet" value="<?= $do['nama_outlet']; ?>" required>
											      	</div>
											      	<div class="form-group">
											      		<label for="no_telepon_outlet<?= $do['id_outlet']; ?>">No. Telepon Outlet</label>
											      		<input type="number" id="no_telepon_outlet<?= $do['id_outlet']; ?>" class="form-control" placeholder="Masukkan No. Telepon Outlet" name="no_telepon_outlet" value="<?= $do['no_telepon_outlet']; ?>" required>
											      	</div>
											      	<div class="form-group">
											      		<label for="alamat_outlet<?= $do['id_outlet']; ?>">Alamat Outlet</label>
											      		<textarea id="alamat_outlet<?= $do['id_outlet']; ?>" class="form-control" placeholder="Masukkan Alamat Outlet" name="alamat_outlet" required><?= $do['alamat_outlet']; ?></textarea>
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
									<?php if ($dataUser['jabatan'] == 'administrator' && $do['id_outlet'] != '1'): ?>
										<a class="btn m-1 btn-danger btn-delete" data-name="<?= $do['nama_outlet']; ?>" href="<?= base_url('main/deleteOutlet/' . $do['id_outlet']); ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
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