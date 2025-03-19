<section class="py-4 py-md-5">
    <div class="container px-3 px-md-5 py-4 py-md-5">
        <div class="row">
            <div class="col-12">
                <div class="text-start">
                    <h1 class="hero-title fw-bold pb-3 pb-md-5">
                        <span class="d-block">Pusat Belanja</span>
                        <span class="d-block">Oleh-oleh Makanan Ringan</span>
                        <span class="d-block">Khas Banyumas</span>
                    </h1>

                    <div class="d-flex justify-content-start">
                        <a href="{{ route('shops.index') }}"
                            class="btn fs-5 fs-md-4 fw-semibold border rounded shadow d-flex justify-content-center align-items-center hero-button">
                            Cari Toko
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    /* Responsive styling for hero section */
    @media (max-width: 767.98px) {
        .hero-title {
            font-size: calc(1.8rem + 3vw);
            line-height: 1.2;
        }

        .hero-button {
            height: 70px !important;
            width: 220px !important;
        }
    }

    @media (min-width: 768px) {
        .hero-title {
            font-size: calc(2.5rem + .5vw);
            line-height: 1.2;
        }

        .hero-button {
            height: 100px !important;
            width: 300px !important;
        }
    }

    /* Shared styles */
    .hero-title span {
        margin-bottom: 0.3rem;
    }

    .hero-button {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #ffffff;
    }

    .hero-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
</style>
