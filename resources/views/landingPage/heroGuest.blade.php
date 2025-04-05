<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title fw-bold">
                <span>Pusat Belanja</span>
                <span>Oleh-oleh Makanan Ringan</span>
                <span>Khas Banyumas</span>
            </h1>

            <div class="hero-action">
                <a href="{{ route('shops.index') }}" class="btn hero-button fw-semibold shadow">
                    Cari Toko
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    /* Hero Section */
    .hero-section {
        padding: 2rem 0;
    }

    .hero-content {
        padding: 2rem 0;
    }

    .hero-title {
        font-size: 2.5rem;
        line-height: 1.2;
        margin-bottom: 2rem;
    }

    .hero-title span {
        display: block;
        margin-bottom: 0.3rem;
    }

    .hero-button {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ffffff;
        border-radius: 0.375rem;
        height: 70px;
        width: 220px;
        font-size: 1.25rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hero-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    /* Responsive styles */
    @media (min-width: 768px) {
        .hero-section {
            padding: 3rem 0;
        }

        .hero-content {
            padding: 3rem 0;
        }

        .hero-title {
            font-size: 3rem;
            margin-bottom: 3rem;
        }

        .hero-button {
            height: 100px;
            width: 300px;
            font-size: 1.5rem;
        }
    }
</style>
