<style>
	body {
		font-family: monospace;
		font-weight: 600;
		font-size: .9rem;
	}
	@media print {
		.no_print {
			display: none;	
		}
	}
</style>
<div class="container-fluid pt-1 pb-2">
	<div class="row justify-content-center no_print mt-2">
		<div class="col">
			<a onclick="window.print();" class="no_print btn btn-success"><i class="fas fa-fw fa-print"></i></a> <br><br>
			<a href="<?= base_url('pembayaran'); ?>" class="no_print btn btn-primary"><i class="fas fa-fw fa-arrow-left"></i></a>
		</div>
	</div>
	<div class="row justify-content-center mt-4">
		<div class="col-5">
			<h3 class="text-center">*** AT DYMSUM AWW ***</h3>
			<div id="header" class="mt-3">
				<span>JL. AMD BABAKAN POCIS 11 SETU TANGSEL BANTEN</span>
				<div class="row mb-0">
					<div class="col-5">
						<span>Telp : 0882-1162-3915</span>
					</div>
					<div class="col-5">
						<span>Fax : -</span>
					</div>
				</div>
				<!-- <span>www.atawdymsumaww.com</span> -->
			</div>
			<div id="sub_header">
				<div class="row mt-3">
	      			<div class="col-md-3">Kode Invoice</div>
	      			<div class="col-xs-1"> : </div>
	      			<div class="col text-break"><?= $isi_menu_invoice[0]['kode_invoice']; ?></div>
	      			<div class="col text-right">
	      				<?= date('d-m-Y', $pembayaran['tgl_pembayaran']); ?>
	      			</div>
	       		</div>
				<div class="row">
	      			<div class="col-md-3">kasir</div>
	      			<div class="col-xs-1"> : </div>
	      			<div class="col text-break"><?= $isi_menu_invoice[0]['nama_user']; ?></div>
	      			<div class="col text-right">
	      				<?= date('H:i:s', $pembayaran['tgl_pembayaran']); ?>
	      			</div>
	       		</div>
			</div>
			<div style="border-top: black dashed 1px; border-bottom: black dashed 1px" class="my-2 py-2">
				<?php 
					$baris = 0; 
					$total_kuantitas = 0;
				?>
				<?php foreach ($isi_menu_invoice as $dimi): ?>
					<div class="row">
						<div class="col">
							<span><?= $dimi['nama_menu']; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<span><?= number_format($dimi['harga_menu']); ?></span>
						</div>
						<div class="col">
							<span>x <?= $dimi['kuantitas']; ?></span>
						</div>
						<div class="col">
							<span>PCS = </span>
						</div>
						<div class="col text-right">
							<span><?= number_format($dimi['harga_menu'] * $dimi['kuantitas']); ?></span>
						</div>
		       		</div>
		       		<?php $total_kuantitas += $dimi['kuantitas']; ?>
		       		<?php $baris++ ?>
				<?php endforeach ?>
			</div>
			<div>
				<div class="row">
					<div class="col">
						<span>BARIS = <?= $baris; ?></span>
					</div>
					<div class="col text-right">
						<span>QTY = <?= $total_kuantitas; ?></span>
					</div>
					<div class="col text-right">
						<span><?= number_format($pembayaran['total_pembayaran']); ?></span>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<span>Tunai</span>
					</div>
					<div class="col text-right">
						<span>=</span>
					</div>
					<div class="col text-right">
						<span><?= number_format($pembayaran['jml_uang_dibayar']); ?></span>
						<hr style="border-top: black dashed 1px; width: 100%" class="text-right my-2 py-0">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<span>Kembalian</span>
					</div>
					<div class="col text-right">
						<span>=</span>
					</div>
					<div class="col text-right">
						<span><?= number_format($pembayaran['kembalian']); ?></span>
					</div>
				</div>
			</div>
			<div id="footer">
				<div class="row mt-4">
					<div class="col-8">
						<span>
							TERIMA KASIH SUDAH MEMESAN <br>
							SELAMAT MENIKMATI
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	window.print();
</script>