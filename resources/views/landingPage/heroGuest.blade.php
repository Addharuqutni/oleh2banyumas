<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title fw-bold">
                <span class="first-line">Pusat Belanja</span>
                <span class="second-line">Oleh-oleh Makanan Ringan</span>
                <span class="third-line">Khas Banyumas</span>
            </h1>

            <div class="hero-action">
                <a href="{{ route('shops.index') }}" class="btn hero-button fw-semibold shadow">Cari Toko</a>
            </div>
        </div>
    </div>
</section>

<style>Add commentMore actions
    /* Hero Section */
    .hero-section {
        padding: 2rem 0;
        position: relative;
    }

    .hero-content {
        padding: 2.5rem 0;
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 2.5rem;
        line-height: 1.2;
        margin-bottom: 2.5rem;
        color: #2e7d32;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .hero-title span {
        display: block;
        margin-bottom: 0.5rem;
        opacity: 0;
        animation: fadeInUp 0.8s forwards;
    }

    .hero-title .first-line {
        animation-delay: 0.2s;
    }

    .hero-title .second-line {
        animation-delay: 0.4s;
    }

    .hero-title .third-line {
        animation-delay: 0.6s;
        font-weight: 800;
        color: #1b5e20;
    }

    .hero-button {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ffffff;
        border: 2px solid #2e7d32;
        color: #2e7d32;
        border-radius: 50px;
        height: 70px;
        width: 220px;
        font-size: 1.25rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        opacity: 0;
        animation: fadeInUp 0.8s forwards 0.8s;
    }

    .hero-button:hover {
        transform: translateY(-3px);
        background: #2e7d32;
        color: #ffffff;
        box-shadow: 0 10px 20px rgba(46, 125, 50, 0.2) !important;
    }

    .hero-button:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: 0.5s;
    }

    .hero-button:hover:before {
        left: 100%;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive styles */
    @media (min-width: 768px) {
        .hero-section {
            padding: 4rem 0;
            border-radius: 0 0 50px 50px;
        }

        .hero-content {
            padding: 4rem 0;
        }

        .hero-title {
            font-size: 3.5rem;
            margin-bottom: 3.5rem;
        }

        .hero-button {
            height: 100px;
            width: 300px;
            font-size: 1.5rem;
            border-width: 3px;
        }
    }

    @media (min-width: 992px) {
        .hero-section {
            padding: 5rem 0;
        }

        .hero-title {
            font-size: 4rem;
        }

        .hero-content {
            max-width: 80%;Add commentMore actions
        }
    }
</style>

<!-- Add Bootstrap Icons if not already included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
