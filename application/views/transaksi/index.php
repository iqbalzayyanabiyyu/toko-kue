<style>
	hr {
		background-color: #aaa;
	}	

	.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
	  background-color: #fefefe;
	}

	.table > tbody > tr:hover > td, .table > tbody > tr:hover > td > .pesanan > hr {
	    border-top: 1px solid #aaa;
	    border-left: 1px solid #aaa;
	    border-right: 1px solid #aaa;
	    border-bottom: 1px solid #aaa;
	}

</style>

<div class="container">
	<div class="row my-2">
		<div class="col-lg my-2 py-2 header-title">
			<h3><i class="fas fa-fw fa-handshake"></i> Daftar Transaksi</h3>
		</div>
		<div class="col-lg my-2 py-2 header-button">
			<a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahTransaksiModal"><i class="fas fa-fw fa-plus"></i> Tambah Pesanan</a>
			<!-- Modal -->
			<div class="modal fade" id="tambahTransaksiModal" tabindex="-1" aria-labelledby="tambahTransaksiModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <form action="<?= base_url('transaksi/addTransaksi'); ?>" method="post">
			    	<div class="modal-content text-left">
				      <div class="modal-header">
				        <h5 class="modal-title" id="tambahTransaksiModalLabel"><i class="fas fa-fw fa-handshake"></i><sup><i class="fas fa-1x fa-plus"></i></sup> Tambah Transaksi</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<a class="btn btn-primary mb-2" href="javascript:add();"><i class="fas fa-fw fa-plus"></i> Tambah Pesanan</a>
				      	<div class="row">
				      		<div class="col-lg-4">
				      			<div class="form-group">
						      		<label for="kuantitas[]">Kuantitas</label>
						      		<input type="number" min="1" id="kuantitas[]" class="form-control" placeholder="Masukkan Kuantitas" name="kuantitas[]" required value="<?= set_value('kuantitas[]'); ?>">
			           		 		<?= form_error('kuantitas[]', '<small class="form-text text-danger">', '</small>'); ?>
						      	</div>
				      		</div>
				      		<div class="col-lg">
				      			<div class="form-group">
						      		<label for="id_menu[]">Nama Menu</label>
						      		<select name="id_menu[]" id="id_menu[]" class="form-control">
						      			<?php foreach ($menu as $dm): ?>
							      			<option value="<?= $dm['id_menu']; ?>"><?= $dm['nama_menu']; ?> | Rp. <?= ucwords($dm['harga_menu']); ?></option>
						      			<?php endforeach ?>
						      		</select>
						      	</div>
				      		</div>
				      	</div>
				      	<hr>
						<div id="record"></div>
						<div class="col-lg">
			      			<div class="form-group">
					      		<label for="keterangan">Keterangan</label>
					      		<textarea name="keterangan" id="keterangan" class="form-control" placeholder="(optional)"><?= set_value('keterangan'); ?></textarea>
		           		 		<?= form_error('keterangan', '<small class="form-text text-danger">', '</small>'); ?>
					      	</div>
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
		<div class="col-lg my-2 py-2">
			<div class="table-responsive">
				<table id="table_id" class="table text-center table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Invoice</th>
						<th style="min-width: 12rem">Pesanan</th>
						<th style="min-width: 6rem">Status Bayar</th>
						<th>Tanggal Transaksi</th>
						<th>Dilakukan Oleh</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($transaksi as $dt): ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><?= $dt['kode_invoice']; ?></td>
							<td class="py-0 my-0">
								<?php 
									$kode_invoice = $dt['kode_invoice'];
									$queryKuantitas = "
										SELECT 
											tb_menu.nama_menu, tb_transaksi.keterangan , sum(tb_transaksi.kuantitas) as jmlKuantitasMenuSama
										FROM tb_transaksi 
										LEFT JOIN tb_menu ON tb_transaksi.id_menu = tb_menu.id_menu
										WHERE tb_transaksi.kode_invoice = '$kode_invoice' 
										GROUP BY tb_transaksi.id_menu
									";
									
									$executeKuantitasMenuSama = $this->db->query($queryKuantitas)->result_array();
								?>
								<div class="row pesanan py-0 mx-0 my-0 px-2 text-left">
									<?php foreach ($executeKuantitasMenuSama as $pesanan): ?>
									  	<hr style="margin: 5px 0; background: #eaeaea; width: 100%">
									  	<div class="col-10 text-left"><?= $pesanan['nama_menu']; ?></div>
									  	<div class="col-2 text-center bg-info text-white rounded"><?= $pesanan['jmlKuantitasMenuSama']; ?></div>
									<?php endforeach ?>
								  	<hr style="margin: 5px 0; background: #eaeaea; width: 100%">
								  	<p class="text-dark border border-dark rounded px-2">
								  		<strong>Keterangan : </strong>
								  		<?= $dt['keterangan']; ?>
								  	</p>
								</div>
							</td>
							<td>
								<?php if ($dt['status_bayar'] == 'belum_dibayar'): ?>
									<a href="<?= base_url('pembayaran/bayar/' . $kode_invoice); ?>" class="badge badge-danger"><i class="fas fa-fw fa-times"></i> Belum Dibayar</a>
								<?php else: ?>
									<span class="badge badge-success"><i class="fas fa-fw fa-check"></i> Sudah Dibayar</span>
								<?php endif ?>
							</td>
							<td><?= date('d-m-Y, H:i:s', $dt['tgl_transaksi']); ?></td>
							<td><?= $dt['nama_user']; ?></td>
							<td>
								<?php if ($dt['status_bayar'] == 'sudah_dibayar'): ?>
									<a target="_blank" href="<?= base_url('prints/pembayaran/' . $kode_invoice); ?>" class="btn btn-sm m-1 btn-success"><i class="fas fa-fw fa-print"></i> Cetak</a>
								<?php endif ?>
								<?php if ($dt['status_bayar'] == 'belum_dibayar'): ?>
									<a class="btn btn-sm m-1 btn-info" href="" data-toggle="modal" data-target="#ubahTransaksiModal<?= $dt['id_transaksi']; ?>"><i class="fas fa-fw fa-edit"></i> Ubah</a>
									<div class="modal fade" id="ubahTransaksiModal<?= $dt['id_transaksi']; ?>" tabindex="-1" aria-labelledby="ubahTransaksiModalLabel<?= $dt['id_transaksi']; ?>" aria-hidden="true">
										  <div class="modal-dialog modal-lg">
										    <form action="<?= base_url('transaksi/editTransaksi/' . $dt['kode_invoice']); ?>" method="post">
										    	<div class="modal-content text-left">
											      <div class="modal-header">
											        <h5 class="modal-title" id="ubahTransaksiModalLabel<?= $dt['id_transaksi']; ?>"><i class="fas fa-fw fa-handshake"></i><sup><i class="fas fa-1x fa-edit"></i></sup> Ubah Transaksi</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											      	<a class="btn btn-primary mb-2" href="javascript:add2();"><i class="fas fa-fw fa-plus"></i> Tambah Pesanan</a>
											      	<?php 
														$kode_invoice = $dt['kode_invoice'];
														$query = "SELECT * FROM tb_transaksi 
														LEFT JOIN tb_menu ON tb_transaksi.id_menu = tb_menu.id_menu
														LEFT JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet
														LEFT JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user
														WHERE tb_transaksi.kode_invoice = '$kode_invoice'
														";
														$execute = $this->db->query($query)->result_array();
													?>
													<div id="record2">
													<?php foreach ($execute as $ex): ?>
												      	<div class="row">
												      		<div class="col-lg-4">
												      			<div class="form-group">
														      		<label for="kuantitas[]<?= $dt['id_transaksi']; ?>">Kuantitas</label>
														      		<input type="number" min="1" id="kuantitas[]<?= $dt['id_transaksi']; ?>" class="form-control" placeholder="Masukkan Kuantitas" name="kuantitas[]" required value="<?= $ex['kuantitas']; ?>">
											           		 		<?= form_error('kuantitas[]', '<small class="form-text text-danger">', '</small>'); ?>
														      	</div>
												      		</div>
												      		<div class="col-lg-8">
												      			<div class="form-group">
														      		<label for="id_menu[]<?= $dt['id_transaksi']; ?>">Nama Menu</label>
														      		<select name="id_menu[]" id="id_menu[]<?= $dt['id_transaksi']; ?>" class="form-control">
														      			<option value="<?= $ex['id_menu']; ?>"><?= $ex['nama_menu']; ?> | Rp. <?= ucwords($ex['harga_menu']); ?></option>
														      			<?php foreach ($menu as $dm): ?>
															      			<?php if ($ex['id_menu'] !== $dm['id_menu']): ?>
															      				<option value="<?= $dm['id_menu']; ?>"><?= $dm['nama_menu']; ?> | Rp. <?= ucwords($dm['harga_menu']); ?></option>
															      			<?php endif ?>
														      			<?php endforeach ?>
														      		</select>
														      	</div>
												      		</div>
													      	<a class="btn btn-danger my-2 ml-3" href="javascript:;" onclick="hapus2(this)"><i class="fas fa-fw fa-trash"></i> Hapus Pesanan</a>
												      		<hr style="width: 100%">
												      	</div>
													<?php endforeach ?>
													</div>
													<div class="col-lg">
										      			<div class="form-group">
												      		<label for="keterangan<?= $dt['id_transaksi']; ?>">Keterangan</label>
												      		<textarea name="keterangan" id="keterangan<?= $dt['id_transaksi']; ?>" class="form-control" placeholder="(optional)"><?= $dt['keterangan']; ?></textarea>
									           		 		<?= form_error('keterangan', '<small class="form-text text-danger">', '</small>'); ?>
												      	</div>
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
								<?php endif ?>
								<a class="btn btn-sm m-1 btn-danger btn-delete" data-name="<?= $dt['kode_invoice']; ?>" href="<?= base_url('transaksi/deleteTransaksi/' . $dt['kode_invoice']); ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				</table>
			</div>	
		</div>
	</div>
</div>

<script type="text/javascript">
	function add() {
	    var content = '';
	  	content += `
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
	      		<label for="kuantitas[]">Kuantitas</label>
	      		<input type="number" min="1" id="kuantitas[]" class="form-control" placeholder="Masukkan Kuantitas" name="kuantitas[]" required>
	      	</div>
			</div>
			<div class="col-lg">
				<div class="form-group">
	      		<label for="id_menu[]">Nama Menu</label>
	      		<select name="id_menu[]" id="id_menu[]" class="form-control">
	      			<?php foreach ($menu as $dm): ?>
		      			<option value="<?= $dm['id_menu']; ?>"><?= $dm['nama_menu']; ?> | Rp. <?= ucwords($dm['harga_menu']); ?></option>
	      			<?php endforeach ?>
	      		</select>
	      	</div>
			</div>
		</div>`;
	  content += '<a class="btn btn-danger my-2" href="javascript:;" onclick="hapus(this)"><i class="fas fa-fw fa-trash"></i> Hapus Pesanan</a><br />';
	  content += '<hr />';

	  var x = document.createElement('div');
	  x.innerHTML = content;
	  document.getElementById('record').appendChild(x);
	}

	function hapus(element) {
		var x = document.getElementById('record');
		x.removeChild(element.parentNode);
	}

	function add2() {
	    var content = '';
	  	content += `
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
	      		<label for="kuantitas[]">Kuantitas</label>
	      		<input type="number" min="1" id="kuantitas[]" class="form-control" placeholder="Masukkan Kuantitas" name="kuantitas[]" required>
	      	</div>
			</div>
			<div class="col-lg-8">
				<div class="form-group">
	      		<label for="id_menu[]">Nama Menu</label>
	      		<select name="id_menu[]" id="id_menu[]" class="form-control">
	      			<?php foreach ($menu as $dm): ?>
		      			<option value="<?= $dm['id_menu']; ?>"><?= $dm['nama_menu']; ?> | Rp. <?= ucwords($dm['harga_menu']); ?></option>
	      			<?php endforeach ?>
	      		</select>
	      	</div>
			</div>
		</div>`;
	  content += '<a class="btn btn-danger my-2" href="javascript:;" onclick="hapus2(this)"><i class="fas fa-fw fa-trash"></i> Hapus Pesanan</a><br />';
	  content += '<hr />';

	  var x2 = document.createElement('div');
	  x2.innerHTML = content;
	  document.getElementById('record2').appendChild(x2);
	}									      	

	function hapus2(element) {
		var x2 = document.getElementById('record2');
		x2.removeChild(element.parentNode);
	}
</script>