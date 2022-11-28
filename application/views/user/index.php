
    <div class="container-fluid">
        <div class="row text-center">

            <?php foreach ($produk as $pdk) : ?>

                <div class="card ml-1 mr-3 mb-4" style="width: 15rem;  ">
                    <img src="<?= base_url().'/uploads/'.$pdk->gambar ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?= $pdk->nama_produk ?></h5>   
                        <p class="card-text mb-1"><?= $pdk->keterangan ?></p>
                        <small class="badge badge-pill badge-success mb-3">Rp. <?= $pdk->harga ?></small><br>
                        <a href="#" class="btn btn-sm btn-primary">Add to Cart</a>
                        <a href="#" class="btn btn-sm btn-success">Detail</a>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>