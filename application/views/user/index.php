                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4"><i><?= $title; ?> - Co'Cake</i></h1>

                    <!-- List Products 1: Start -->
                    <section class="list-products mt-3 p-5" style="height: 100vh;">

                        <div class="container p-0 d-flex flex-row align-items-center justify-content-between ">
                            <figure class="img-product position-relative">
                                <img src="<?= base_url('assets/img/img-product1.jpg'); ?>" alt="" class="img-item open">
                                <img src="<?= base_url('assets/img/img-product2.jpg'); ?>" alt="" class="img-item">
                                <img src="<?= base_url('assets/img/img-product3.jpg'); ?>" alt="" class="img-item">
                            </figure>

                            <div class="desc-products text-center">
                                <h1>List Product Co'Cake</h1>
                                <p class="py-3 px-5">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae, aperiam? Officia sapiente placeat accusantium tempore dolore nesciunt quod laboriosam, necessitatibus ut illo et, temporibus facilis. Fugit molestias dignissimos dolorem aspernatur?
                                </p>
                                <div class="btn-control">
                                    <button class="btn btn-prev" id="prev">
                                        <svg width="35" height="35" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1" y="1" width="53" height="53" rx="13" stroke="black" stroke-width="2"/>
                                            <path d="M36.75 48L16.75 28L36.75 8L39.55 10.85L22.4 28L39.55 45.15L36.75 48Z" fill="black"/>
                                        </svg>
                                    </button>
                                    
                                    <button class="btn btn-next" id="next">
                                        <svg width="35" height="35" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1" y="1" width="53" height="53" rx="13" stroke="black" stroke-width="2"/>
                                            <path d="M19.2 47.9L16.4 45.05L33.55 27.9L16.4 10.75L19.2 7.90002L39.2 27.9L19.2 47.9Z" fill="black"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </section>
                    <!-- List Products 1: End -->


                    <!-- List Products 2: Start -->
                    <section class="list-products mt-5 p-5" style="height: 100vh;">

                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade mt-5" data-bs-ride="true">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <!-- Carousel Items 1: Start -->
                                <div class="carousel-item d-flex flex-row align-items-center justify-content-between active">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= base_url('assets/img/blackforest-cake.jpg'); ?>" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Black Forest</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="<?= base_url('user/checkout'); ?>" class="btn c-btn">shop now</a>
                                        </div>
                                    </div>

                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= base_url('assets/img/redvelvet-cake.jpg'); ?>" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Red Velvet</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="<?= base_url('user/checkout'); ?>" class="btn c-btn">shop now</a>
                                        </div>
                                    </div>

                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= base_url('assets/img/chocodevila-cake.jpg'); ?>" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Choco Devila</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="<?= base_url('user/checkout'); ?>" class="btn c-btn">shop now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Carousel Items 1: End -->

                                <!-- Carousel Items 2: Start -->
                                <div class="carousel-item d-flex flex-row align-items-center justify-content-between">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= base_url('assets/img/chocomaltine-cake.jpg'); ?>" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Choco Maltine</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="<?= base_url('user/checkout'); ?>" class="btn c-btn">shop now</a>
                                        </div>
                                    </div>

                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= base_url('assets/img/klasikopera-cake.jpg'); ?>" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Klasik Opera</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="<?= base_url('user/checkout'); ?>" class="btn c-btn">shop now</a>
                                        </div>
                                    </div>

                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= base_url('assets/img/matchaopera-cake.jpg'); ?>" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Matcha Opera</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="<?= base_url('user/checkout'); ?>" class="btn c-btn">shop now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Carousel Items 2: End -->

                                <!-- Carousel Items 3: Start -->
                                <div class="carousel-item d-flex flex-row align-items-center justify-content-between">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= base_url('assets/img/cokelatregal-cake.jpg'); ?>" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Cokelat Regal</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="<?= base_url('user/checkout'); ?>" class="btn c-btn">shop now</a>
                                        </div>
                                    </div>

                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= base_url('assets/img/strawberrykeju-cake.jpg'); ?>" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Strawberry Keju</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="<?= base_url('user/checkout'); ?>" class="btn c-btn">shop now</a>
                                        </div>
                                    </div>

                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= base_url('assets/img/vanilafruit-cake.jpg'); ?>" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Vanila Fruit</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="<?= base_url('user/checkout'); ?>" class="btn c-btn">shop now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Carousel Items 3: End -->
                            </div>
                            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button> -->
                        </div>
                        
                    </section>
                    <!-- List Products 2: End -->
                
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->