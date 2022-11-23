<!-- Main: Start -->
<main class="content">

    <!-- Hero: Start -->
    <section class="hero d-flex align-items-center justify-content-between">

        <figure class="hero-figure">
            <img src="<?= base_url("assets/img/hero.jpg"); ?>" alt="" srcset="">
        </figure>

        <div class="hero-title d-flex text-center flex-column align-items-center justify-content-center">
            <h1 class="px-2">
                Delicious Cake for Everyone
                <!-- Kelezatan, Kenikmatan & Kelembutan Cinta -->
            </h1>

            <a href="<?= base_url('auth'); ?>" class="btn c-btn mt-3">shop now</a>
        </div>
        
    </section>
    <!-- Hero: Start -->


    <!-- Desc Products: Start -->
    <section class="desc mt-5 p-5">

        <div class="container d-flex flex-row align-items-center justify-content-between">
            <div class="desc-items text-center">
                <h1>Product Co'Cake</h1>
                <p class="px-5 py-4">
                    Selamat datang di Toko Co'Cake, kami siap melayani anda dengan banyaknya jenis kue lezat untuk acara istimewa anda dan orang yang anda cinta
                </p>
            </div>
        </div>

    </section>
    <!-- Desc Products: End -->


    <!-- List Products: Start -->
    <section class="list-products mt-5 p-5" style="height: 100vh;">

        <div class="container d-flex flex-row align-items-center justify-content-between ">
            <figure class="img-product position-relative">
                <img src="<?= base_url('assets/img/img-product1.jpg'); ?>" alt="" class="img-item open">
                <img src="<?= base_url('assets/img/img-product2.jpg'); ?>" alt="" class="img-item">
                <img src="<?= base_url('assets/img/img-product3.jpg'); ?>" alt="" class="img-item">
            </figure>

            <div class="desc-products text-center">
                <h1>List Product Co'Cake</h1>
                <p class="py-3">
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

        <div id="carouselExampleIndicators" class="carousel slide carousel-fade mt-5" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <!-- Carousel Items 1: Start -->
                <div class="carousel-item d-flex flex-row align-items-center justify-content-evenly active">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/blackforest-cake.jpg'); ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Black Forest</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?= base_url('auth'); ?>" class="btn c-btn">Go somewhere</a>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/redvelvet-cake.jpg'); ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Red Velvet</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?= base_url('auth'); ?>" class="btn c-btn">Go somewhere</a>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/chocodevila-cake.jpg'); ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Choco Devila</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?= base_url('auth'); ?>" class="btn c-btn">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <!-- Carousel Items 1: End -->

                <!-- Carousel Items 2: Start -->
                <div class="carousel-item d-flex flex-row align-items-center justify-content-evenly">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/chocomaltine-cake.jpg'); ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Choco Maltine</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?= base_url('auth'); ?>" class="btn c-btn">Go somewhere</a>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/klasikopera-cake.jpg'); ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Klasik Opera</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?= base_url('auth'); ?>" class="btn c-btn">Go somewhere</a>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/matchaopera-cake.jpg'); ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Matcha Opera</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?= base_url('auth'); ?>" class="btn c-btn">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <!-- Carousel Items 2: End -->

                <!-- Carousel Items 3: Start -->
                <div class="carousel-item d-flex flex-row align-items-center justify-content-evenly">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/cokelatregal-cake.jpg'); ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Cokelat Regal</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?= base_url('auth'); ?>" class="btn c-btn">Go somewhere</a>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/strawberrykeju-cake.jpg'); ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Strawberry Keju</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?= base_url('auth'); ?>" class="btn c-btn">Go somewhere</a>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/vanilafruit-cake.jpg'); ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Vanila Fruit</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?= base_url('auth'); ?>" class="btn c-btn">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <!-- Carousel Items 3: End -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>
    <!-- List Products: End -->


    <!-- Comment: Start -->
    <section class="comment py-5 position-relative">

        <div class="container d-flex flex-row justify-content-between mt-5">
            <div class="card c-card py-3" style="width: 18rem;">
                <figure class="mx-auto pt-3">
                    <img src="<?= base_url('assets/img/profile/user2.png') ?>" width="90" class="" alt="">
                </figure>
                <div class="card-body text-center">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div class="card c-card py-3" style="width: 18rem;">
                <figure class="mx-auto pt-3">
                    <img src="<?= base_url('assets/img/profile/user1.png') ?>" width="90" class="" alt="">
                </figure>
                <div class="card-body text-center">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div class="card c-card py-3" style="width: 18rem;">
                <figure class="mx-auto pt-3">
                    <img src="<?= base_url('assets/img/profile/user3.png') ?>" width="90" class="" alt="">
                </figure>
                <div class="card-body text-center">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

    </section>
    <!-- Comment: End -->


    <!-- Email Newsletter: Start -->
    <section class="email-newsletter mt-5 py-5">

        <div class="container d-flex flex-row align-items-center justify-content-around">
            <div class="signup-newsletter">
                <h1>Sign up to our newsletter</h1>
                <p>Plus get the inside scoop about exclusive offers & news!</p>
            </div>

            <form action="<?= base_url('auth/registration'); ?>" method="post" class="email-address d-flex">
                <input type="email" name="email" id="email" placeholder="Email address" class="i-email">
                <button type="submit" id="submit" class="btn c-btn">
                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.375 29.1666V5.83325L32.0833 17.4999L4.375 29.1666ZM6.5625 25.776L26.3958 17.4999L6.5625 9.1145V15.2395L15.3854 17.4999L6.5625 19.6874V25.776ZM6.5625 25.776V9.1145V19.6874V25.776Z" fill="black"/>
                    </svg>
                </button>
            </form>
        </div>

    </section>
    <!-- Email Newsletter: End -->

</main>
<!-- Main: End -->



