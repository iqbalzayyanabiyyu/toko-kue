
<div class="container d-flex flex-column">
    <div class="mt-5">
        <h1 class="text-center"><i>Co'Cake</i></h1>
    </div>

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-10 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Checkout!</h1>
                            <?= $this->session->flashdata('checkout'); ?>
                        </div>
                        <form class="user" action="<?= base_url('user/checkout'); ?>" method="post">
                            <!-- Orders: Start -->
                            <div class="form-group">
                                <select class="form-select form-select-lg c-orders" aria-label=".form-select-lg example" name="orders" id="orders">
                                    <option selected>Orders</option>
                                    <option value="Black Forest">Black Forest</option>
                                    <option value="Red Velvet">Red Velvet</option>
                                    <option value="Choco Devila">Choco Devila</option>
                                    <option value="Choco Maltine">Choco Maltine</option>
                                    <option value="Klasik Opera">Klasik Opera</option>
                                </select>
                            </div>
                            <!-- Orders: End -->

                            <!-- Email: Start -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email"
                                placeholder="Email Address" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <!-- Email: End -->

                            <!-- Name: Start -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    placeholder="Full Name" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <!-- Name: End -->
                            
                            <!-- Address: Start -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="address" name="address"
                                    placeholder="Address" value="">
                            </div>
                            <!-- Address: End -->

                            <!-- Password: Start -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-user"
                                    id="districts" name="districts" placeholder="Districts">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <select class="col-sm-4 form-select c-form-select" aria-label="Default select example" name="city" id="city">
                                    <option selected>city</option>
                                    <option value="Jakarta" name="">Jakarta</option>
                                    <option value="Bogor" name="">Bogor</option>
                                    <option value="Depok" name="">Depok</option>
                                    <option value="Tangerang" name="">Tangerang</option>
                                    <option value="Bekasi" name="">Bekasi</option>
                                </select>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-user"
                                    id="zip_code" name="zip_code" placeholder="ZIP code">
                                </div>
                            </div>
                            <!-- Password: End -->
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('user'); ?>">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>