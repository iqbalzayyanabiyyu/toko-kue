<div class="container">
	<div class="row my-2">
		<div class="col-lg my-2 py-2 header-title">
			<h3><i class="fas fa-fw fa-user"></i> Daftar User</h3>
		</div>

		<?php if ($dataUser['jabatan'] == 'administrator'): ?>
			<div class="col-lg my-2 py-2 header-button">
				<a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahUserModal"><i class="fas fa-fw fa-plus"></i> Tambah</a>
				<!-- Modal -->
				<div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <form action="<?= base_url('main/addUser'); ?>" method="post">
				    	<div class="modal-content text-left">
					      <div class="modal-header">
					        <h5 class="modal-title" id="tambahUserModalLabel"><i class="fas fa-fw fa-user-plus"></i> Tambah User</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					      	<div class="form-group">
					      		<label for="nama_user">Nama User</label>
					      		<input type="text" id="nama_user" class="form-control" placeholder="Masukkan Nama" name="nama_user" required>
					      	</div>
					      	<div class="form-group">
					      		<label for="username">Username</label>
					      		<input type="text" id="username" class="form-control" placeholder="Masukkan Username"  name="username" required>
					      	</div>
					      	<div class="form-group">
					      		<label for="password">Password</label>
					      		<input type="password" id="password" class="form-control" placeholder="Masukkan Password" name="password" required minlength="5">
					      	</div>
					      	<div class="form-group">
					      		<label for="password_verifikasi">Verifikasi Password</label>
					      		<input type="password" id="password_verifikasi" class="form-control" placeholder="Masukkan Password Ulang"  name="password_verifikasi" required minlength="5">
					      	</div>
					      	<div class="form-group">
					      		<label for="jabatan">Jabatan</label>
					      		<select name="jabatan" id="jabatan" class="form-control">
					      			<option value="administrator">Administrator</option>
					      			<option value="kasir">Kasir</option>
					      		</select>
					      	</div>
					      	<div class="form-group">
					      		<label for="id_outlet">Nama Outlet</label>
					      		<select name="id_outlet" id="id_outlet" class="form-control">
				      				<option value="<?= $dataUser['id_outlet']; ?>"><?= $dataUser['nama_outlet']; ?></option>
					      			<?php foreach ($outlet as $do): ?>
					      				<?php if ($dataUser['id_outlet'] !== $do['id_outlet']): ?>
						      				<option value="<?= $do['id_outlet']; ?>"><?= $do['nama_outlet']; ?></option>
					      				<?php endif ?>
					      			<?php endforeach ?>
					      		</select>
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
							<th>Nama User</th>
							<th>Username</th>
							<th>Jabatan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbdody>
						<?php $i = 1; ?>
						<?php foreach ($user as $du): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $du['nama_outlet']; ?></td>
								<td><?= $du['nama_user']; ?></td>
								<td><?= $du['username']; ?></td>
								<td><?= $du['jabatan']; ?></td>
								<td>
									<?php if ($dataUser['jabatan'] == 'administrator' || $dataUser['id_user'] == $du['id_user']): ?>
										<a class="btn m-1 btn-info" href="" data-toggle="modal" data-target="#ubahUserModal<?= $du['id_user']; ?>"><i class="fas fa-fw fa-edit"></i> Ubah</a>
										<!-- Modal -->
										<div class="modal fade" id="ubahUserModal<?= $du['id_user']; ?>" tabindex="-1" aria-labelledby="ubahUserModalLabel<?= $du['id_user']; ?>" aria-hidden="true">
										  <div class="modal-dialog">
										    <form action="<?= base_url('main/editUser/' . $du['id_user']); ?>" method="post">
										    	<div class="modal-content text-left">
											      <div class="modal-header">
											        <h5 class="modal-title" id="ubahUserModalLabel<?= $du['id_user']; ?>"><i class="fas fa-fw fa-user-edit"></i> Ubah User</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											      	<div class="form-group">
											      		<label for="username<?= $du['id_user']; ?>">Username</label>
											      		<input style="cursor: not-allowed;" disabled type="text" id="username<?= $du['id_user']; ?>" class="form-control" name="username" value="<?= $du['username']; ?>" required>
											      	</div>
											      	<div class="form-group">
											      		<label for="nama_user<?= $du['id_user']; ?>">Nama User</label>
											      		<input type="text" id="nama_user<?= $du['id_user']; ?>" class="form-control" name="nama_user" value="<?= $du['nama_user']; ?>" required>
											      	</div>
											      	<div class="form-group">
											      		<label for="jabatan<?= $du['id_user']; ?>">Jabatan</label>
											      		<select name="jabatan" id="jabatan<?= $du['id_user']; ?>" class="form-control">
											      			<?php if ($dataUser['jabatan'] == 'administrator'): ?>
											      				<?php if ($du['jabatan'] == 'administrator'): ?>
											      					<option value="administrator">Administrator</option>
													      			<option value="kasir">Kasir</option>
											      					<?php else: ?>
													      			<option value="kasir">Kasir</option>
											      					<option value="administrator">Administrator</option>
											      				<?php endif ?>
											      			<?php else: ?>
												      			<option value="kasir">Kasir</option>
											      			<?php endif ?>
											      		</select>
											      	</div>
											      	<div class="form-group">
											      		<label for="id_outlet<?= $du['id_user']; ?>">Nama Outlet</label>
											      		<select name="id_outlet" id="id_outlet<?= $du['id_user']; ?>" class="form-control">
										      				<option value="<?= $dataUser['id_outlet']; ?>"><?= $dataUser['nama_outlet']; ?></option>
											      			<?php foreach ($outlet as $do): ?>
											      				<?php if ($dataUser['id_outlet'] !== $do['id_outlet']): ?>
												      				<option value="<?= $do['id_outlet']; ?>"><?= $do['nama_outlet']; ?></option>
											      				<?php endif ?>
											      			<?php endforeach ?>
											      		</select>
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
										<?php if ($du['jabatan'] != 'administrator'): ?>
											<?php if ($dataUser['jabatan'] == 'administrator'): ?>
												<a class="btn m-1 btn-danger btn-delete" data-name="<?= $du['nama_user']; ?>" href="<?= base_url('main/deleteUser/' . $du['id_user']); ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
											<?php endif ?>
										<?php endif ?>
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