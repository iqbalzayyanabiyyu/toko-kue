<!-- Transaksi: Start -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg">
			<?php if (validation_errors()) : ?>
			<div class="alert alert-danger" role="alert">
				<?= validation_errors(); ?>
			</div>
			<?php endif; ?>

			<?= $this->session->flashdata('message'); ?>

			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newProductModal">Add Product</a>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama</th>
						<th scope="col">Email</th>
						<th scope="col">Nama Produk</th>
						<th scope="col" style="min-width: 8rem">Kuantitas</th>
						<th scope="col">Tanggal Transaksi</th>
						<th scope="col">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($transaksi as $tr) : ?>

					<?php if ($this->session->userdata('email') == $tr['email']) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $tr['name']; ?></td>
						<td><?= $tr['email']; ?></td>
						<td><?= $tr['nama_produk']; ?></td>
						<td><?= $tr['kuantitas']; ?></td>
						<td><?= date('d F Y', $tr['tgl_transaksi']); ?></td>
						<td><?= $tr['keterangan']; ?></td>
					</tr>
					<?php $i++; ?>
					<?php endif; ?>

					<?php endforeach; ?>
				</tbody>
			</table>


		</div>
	</div>

</div>
<!-- Transaksi: End -->


<!-- Modal: Start -->
<div class="modal fade" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProductModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="transaksi" action="<?= base_url('user/transaksi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
						<label for="kuantitas">Kuantitas</label>
                        <input type="number" class="form-control" id="kuantitas" name="kuantitas" placeholder="Kuantitas" value="<?= set_value('kuantitas'); ?>">
						<?= form_error('kuantitas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
						<label for="produk_id">Select Product</label>
                        <select name="produk_id" id="produk_id" class="form-control">
                            <option value="">Select Product</option>
                            <?php foreach ($nama_produk as $np) : ?>
                            <option value="<?= $np['id']; ?>"><?= $np['nama_produk']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
						<label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan'); ?>">
						<?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<!-- Modal: End -->