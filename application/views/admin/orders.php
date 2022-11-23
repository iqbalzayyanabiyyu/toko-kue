

        

        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

                    <!-- Member: Start -->
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h3>Orders</h3>
                            <?php if (empty($name)) : ?>
                                <div class="alert alert-danger" role="alert">
                                data user tidak ditemukan.
                                </div>
                            <?php endif; ?>
                            <ul class="list-group">
                                <?php foreach ($name as $nm) : ?>
                                <li class="list-group-item">
                                    <?= $nm['name']; ?>
                                    <?= $nm['orders']; ?>
                                    <?= $nm['email']; ?>
                                    <?= $nm['address']; ?>
                                    <?= $nm['districts']; ?>
                                    <?= $nm['city']; ?>
                                    <?= $nm['zip_code']; ?>
                                    <?= date('d F Y', $nm['date_orders']); ?>
                                    <a href="#"
                                        class="badge badge-danger float-right tombol-hapus">hapus</a>
                                    <a href="#"
                                        class="badge badge-success float-right">ubah</a>
                                    <a href="#"
                                        class="badge badge-primary float-right">detail</a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Member: End -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            