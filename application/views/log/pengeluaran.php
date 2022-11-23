<div class="container">
	<div class="row my-2">
		<div class="col-lg my-2 py-2 header-title">
			<h3><i class="fas fa-fw fa-file-signature"></i> Daftar Log Pengeluaran</h3>
		</div>
	</div>
	<div class="row my-2">
		<div class="col-lg my-2 py-2">
			<div class="table-responsive">
				<table id="table_id" class="table text-center table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th style="width: 8rem">Dilakukan Oleh</th>
						<th>Isi Log Pengeluaran</th>
						<th>Tanggal Log Pengeluaran</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($daftar_log as $log): ?>
						<tr>
							<?php 
								$id_user = $log['id_user'];
								$data_user = $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();
							 ?>
							<td><?= $i++; ?></td>
							<td class="text-left"><?= $data_user['nama_user']; ?></td>
							<td class="text-left"><?= $log['keterangan']; ?></td>
							<td class="text-left"> <?= date('d-m-Y, H:i:s', $log['tanggal']); ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
				</table>
			</div>	
		</div>
	</div>
</div>