<div class="container">
	<div class="row">
		<div class="col-lg">
	    	<div class="modal-content">
		      	<div class="modal-header">
    				<h5 class="modal-title"><i class="fas fa-fw fa-dollar-sign"></i> Pembayaran Transaksi</h5>
    				<a href="<?= base_url('pembayaran'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
		      	</div>
	      		<div class="modal-body">
        			<div class="row justify-content-between">
	        			<div class="col-lg-6">
	        				<div class="form-group">
			        			<label class="font-weight-bold" for="kode_invoice">Kode Invoice</label>
			        			<input style="cursor: not-allowed;" class="form-control" value="<?= $kode_invoice; ?>" disabled type="text">
			        		</div>
	        			</div>
	        			<div class="col-lg-6">
	        				<div class="form-group">
			        			<label class="font-weight-bold" for="tgl_transaksi">Tanggal Transaksi</label>
			        			<h6 class="text-dark"><?= date('d-m-Y', $isi_menu_invoice[0]['tgl_transaksi']); ?></h6>
			        		</div>
	        			</div>
        			</div>
		        	<div class="form-group">
			        	<label class="font-weight-bold">Daftar Pesanan</label>
			        	<div class="table-responsive">
			        		<table class="table table-bordered table-hover text-center">
				        		<thead>
				        			<tr>
				        				<th>No</th>
				        				<th>Nama Menu</th>
				        				<th>Kuantitas</th>
				        				<th>Harga (Rp.)</th>
				        				<th>Sub Total Harga (Rp.)</th>
				        			</tr>
				        		</thead>
				        		<tbody>
				        			<?php $i = 1; ?>
				        			<?php foreach ($isi_menu_invoice as $dimi): ?>
				        				<tr>
				        					<td><?= $i++; ?></td>
				        					<td><?= $dimi['nama_menu']; ?></td>
				        					<td><?= $dimi['jmlKuantitasMenuSama']; ?></td>
				        					<td><?= number_format($dimi['harga_menu']); ?></td>
				        					<td><?= number_format($dimi['jmlKuantitasMenuSama'] * $dimi['harga_menu']); ?></td>
				        				</tr>
				        			<?php endforeach ?>

				        		</tbody>
				        	</table>
			        	</div>
		        	</div>
		        	<div class="row">
		        		<div class="col-lg-6">
		        			<label class="font-weight-bold">Keterangan</label>
			        		<p class="form-control" style="min-height: 7.5rem; overflow-y: auto;">
			        			<?= $dimi['keterangan']; ?>
			        		</p>
		        		</div>
		        		<div class="col-lg-6">
		        			<label class="font-weight-bold">Total Pembayaran</label>
			        		<p class="form-control">
			        			Rp. <?= number_format($total_harga_terakhir['total_harga_terakhir']); ?>
			        		</p>
			        		<?php if ($this->session->flashdata('pembayaran-berhasil')): ?>
			        			<div class="form-group">
			        				<label for="jml_uang_dibayar" class="font-weight-bold">Uang yang dibayar</label>
			        				<p class="form-control">
					        			Rp. <?= number_format($isi_pembayaran['jml_uang_dibayar']); ?>
					        		</p>
			        			</div>
			        			<hr class="mb-2">
			        			<div class="form-group">
			        				<label for="kembalian" class="font-weight-bold">Kembalian</label>
			        				<p class="form-control">
					        			Rp. <?= number_format($isi_pembayaran['kembalian']); ?>
					        		</p>
			        			</div>
			        			<div class="form-group text-right">
				        			<a class="btn btn-success" href="<?= base_url('prints/pembayaran/') . $kode_invoice; ?>"><i class="fas fa-fw fa-print"></i> Cetak Invoice</a>
			        			</div>
		        			<?php elseif (isset($isi_pembayaran)) : ?>
		        				<div class="form-group">
			        				<label for="jml_uang_dibayar" class="font-weight-bold">Uang yang dibayar</label>
			        				<p class="form-control">
					        			Rp. <?= number_format($isi_pembayaran['jml_uang_dibayar']); ?>
					        		</p>
			        			</div>
			        			<hr class="mb-2">
			        			<div class="form-group">
			        				<label for="kembalian" class="font-weight-bold">Kembalian</label>
			        				<p class="form-control">
					        			Rp. <?= number_format($isi_pembayaran['kembalian']); ?>
					        		</p>
			        			</div>
			        			<div class="form-group text-right">
				        			<a class="btn btn-success" href="<?= base_url('prints/pembayaran/') . $kode_invoice; ?>"><i class="fas fa-fw fa-print"></i> Cetak Invoice</a>
			        			</div>
		        			<?php else: ?>
		        				<form method="post" action="<?= base_url('pembayaran/bayar/' . $kode_invoice); ?>">
		        					<input type="hidden" name="sudahMelakukanPembayaran" value="1">
				        			<div class="form-group">
				        				<input type="hidden" name="total_pembayaran" value="<?= $total_harga_terakhir['total_harga_terakhir']; ?>">
				        				<label for="jml_uang_dibayar" class="font-weight-bold">Uang yang dibayar</label>
				        				<input type="number" id="jml_uang_dibayar" required="" min="<?= $total_harga_terakhir['total_harga_terakhir']; ?>" class="form-control" name="jml_uang_dibayar" value="<?= set_value('jml_uang_dibayar'); ?>">
				        			</div>
				        			<div class="form-group text-right">
					        			<button name="bayar" type="submit" class="btn btn-success"><i class="fas fa-fw fa-dollar-sign"></i> Bayar</button>
				        			</div>
				        		</form>
			        		<?php endif ?>
		        		</div>
		        	</div>
		     	</div>
		    </div>
		</div>
	</div>
	
</div>
