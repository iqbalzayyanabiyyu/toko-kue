<main class="content">

    <!-- Hero: Start -->
    <section class="hero d-flex align-items-center justify-content-between">

        <div class="hero-title d-flex text-center flex-column align-items-center justify-content-center">
            <h1 class="px-2">
                Kelezatan, Kenikmatan & Kelembutan Cinta
            </h1>

            <button class="btn c-btn mt-3">shop now</button>
        </div>

        <figure class="hero-figure">
            <img src="<?= base_url("assets/img/hero.jpg"); ?>" alt="" srcset="">
        </figure>

    </section>
    <!-- Hero: Start -->


    <!-- Desc Products: Start -->
    <section class="desc mt-5 p-5">

        <div class="container d-flex flex-row align-items-center justify-content-between">
            <div class="desc-items text-center">
                <h1>Product Toko Kue</h1>
                <p class="px-5 py-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis.
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
                <h1>List Product Toko Kue</h1>
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

    </section>
    <!-- List Products: End -->

</main>
