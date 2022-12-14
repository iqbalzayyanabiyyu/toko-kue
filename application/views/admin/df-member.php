
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
                    <?= $this->session->flashdata('message'); ?>

                    <!-- Member: Start -->
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h3>Daftar Member</h3>
                            <?php if (empty($user)) : ?>
                                <div class="alert alert-danger" role="alert">
                                data mahasiswa tidak ditemukan.
                                </div>
                            <?php endif; ?>
                            <ul class="list-group">
                                <?php foreach ($name as $nm) : ?>
                                <li class="list-group-item">
                                    <?= $nm['name']; ?>
                                    <a href="<?= base_url('admin/delmember/'); ?><?= $nm['id']; ?>"
                                        class="badge badge-danger float-right tombol-hapus">hapus</a>
                                    <a href="#"
                                        class="badge badge-success float-right mr-1">ubah</a>
                                    <a href="#"
                                        class="badge badge-primary float-right mr-1">detail</a>
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

            