<style>
	.box-table {
		font-size: 1.2rem;
	}
</style>
<div class="container-fluid mx-0 px-0">
	<div class="row my-2">
		<div class="col-lg header-judul">
			<h2 class="text-break"><i class="fas fa-fw fa-user-tie"></i> Profile - <?= $dataUser['nama_user']; ?></h2>
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Gagal!</strong> <?= validation_errors(); ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php endif ?>
		</div>
	</div>
	<div class="row justify-content-center mt-4">
		<div class="col-6">
			<div class="card bg-danger box-table rounded text-white mb-3">
			  <div class="row no-gutters">
			    <div class="col-lg-12">
			      <div class="card-body my-auto">
		       		<div class="row">
		      			<div class="col-md-5">Username</div>
		      			<div class="col-xs-1"> : </div>
		      			<div class="col text-break"><?= $dataUser['username']; ?></div>
		       		</div>
		      		<div class="row">
		      			<div class="col-md-5">Nama User</div>
		      			<div class="col-xs-1"> : </div>
		      			<div class="col text-break"><?= ucwords(strtolower($dataUser['nama_user'])); ?></div>
		       		</div>
		       		<div class="row">
		      			<div class="col-md-5">Jabatan</div>
		      			<div class="col-xs-1"> : </div>
		      			<div class="col text-break"><?= $dataUser['jabatan']; ?></div>
		       		</div>
		       		<div class="row">
		      			<div class="col-md-5">Pada Outlet</div>
		      			<div class="col-xs-1"> : </div>
		      			<div class="col text-break"><?= $dataUser['nama_outlet']; ?></div>
		       		</div>
		       		<div class="row mt-2">
		       			<div class="col">
		       				<a target="_blank" href="<?= base_url('prints/profile/') . $dataUser['id_user']; ?>" class="btn btn-success"><i class="fas fa-fw fa-print"></i></a>
							<a href="" data-toggle="modal" data-target="#editProfileModal" class="btn btn-warning text-white"><i class="fas fa-fw fa-user-edit"></i></a>
							<a href="" data-toggle="modal" data-target="#gantiPasswordModal" class="btn btn-info text-white"><i class="fas fa-fw fa-lock"></i><sup><i class="fas fa-1x fa-edit"></i></sup></a>
		       			</div>
		       		</div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  	<form action="<?= base_url('main/editUser/' . $dataUser['id_user']); ?>" method="post">
    	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Ubah Profile - <?= $dataUser['nama_user']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<label for="username">username</label>
        	<input style="cursor: not-allowed;" disabled="" type="text" id="username" class="form-control" name="username" value="<?= $dataUser['username']; ?>">
        </div>
        <div class="form-group">
        	<label for="nama_user">Nama User</label>
        	<input type="text" id="nama_user" class="form-control" name="nama_user" value="<?= $dataUser['nama_user']; ?>" required="">
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
        			<?php if ($dataUser['id_outlet'] != $do['id_outlet']): ?>
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

<!-- Modal -->
<div class="modal fade" id="gantiPasswordModal" tabindex="-1" aria-labelledby="gantiPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('main/gantiPassword'); ?>" method="post">
    	<div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="gantiPasswordModalLabel"><i class="fas fa-fw fa-lock"></i><sup><i class="fas fa-1x fa-edit"></i></sup> Ganti Password - <?= $dataUser['nama_user']; ?></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="form-group">
	      		<label for="password_lama">Password Lama</label>
	      		<input type="password" id="password_lama" class="form-control" name="password_lama" required="" minlength="5" placeholder="Masukkan Password Lama">
	      	</div>
	      	<div class="form-group">
	      		<label for="password_baru">Password Baru</label>
	      		<input type="password" id="password_baru" class="form-control" name="password_baru" required="" minlength="5" placeholder="Masukkan Password Baru">
	      	</div>
	      	<div class="form-group">
	      		<label for="verifikasi_password_baru">Verifikasi Password Baru</label>
	      		<input type="password" id="verifikasi_password_baru" class="form-control" name="verifikasi_password_baru" required="" minlength="5" placeholder="Masukkan Verifikasi Password Baru">
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