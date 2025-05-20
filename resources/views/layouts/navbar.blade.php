<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Logo dengan ukuran yang responsif -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="img-fluid me-2" style="max-height: 35px;">
        </a>
        
        <!-- Tombol toggle yang lebih baik untuk perangkat mobile -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarContent" aria-controls="navbarContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Konten navbar yang akan collapse di perangkat mobile -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-0 py-3 py-lg-0">
                <!-- Menu untuk mobile -->
                <li class="nav-item text-center border-bottom border-light-subtle d-lg-none py-2">
                    <a class="nav-link px-3 fw-medium {{ Request::is('/') ? 'active text-success' : '' }}" href="/">
                        <i class="bi bi-house-door{{ Request::is('/') ? '-fill' : '' }} me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item text-center border-bottom border-light-subtle d-lg-none py-2">
                    <a class="nav-link px-3 fw-medium {{ Request::is('about') ? 'active text-success' : '' }}" href="/about">
                        <i class="bi bi-info-circle{{ Request::is('about') ? '-fill' : '' }} me-2"></i>Tentang
                    </a>
                </li>
                <li class="nav-item text-center border-bottom border-light-subtle d-lg-none py-2">
                    <a class="nav-link px-3 fw-medium {{ Request::is('artikel*') ? 'active text-success' : '' }}" href="/artikel">
                        <i class="bi bi-journal-text{{ Request::is('artikel*') ? '-fill' : '' }} me-2"></i>Artikel
                    </a>
                </li>
                <li class="nav-item text-center d-lg-none py-2">
                    <a class="nav-link px-3 fw-medium {{ Request::is('toko*') ? 'active text-success' : '' }}" href="/toko">
                        <i class="bi bi-shop{{ Request::is('toko*') ? '-window' : '' }} me-2"></i>Toko
                    </a>
                </li>
                
                <!-- Menu untuk desktop -->
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link px-3 fw-medium {{ Request::is('/') ? 'active text-success' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link px-3 fw-medium {{ Request::is('about') ? 'active text-success' : '' }}" href="/about">Tentang</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link px-3 fw-medium {{ Request::is('artikel*') ? 'active text-success' : '' }}" href="/artikel">Artikel</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link px-3 fw-medium {{ Request::is('toko*') ? 'active text-success' : '' }}" href="/toko">Toko</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    
    .navbar .nav-link {
        position: relative;
        transition: color 0.3s ease;
    }
    
    .navbar .nav-link:not(.active):hover {
        color: var(--primary-green);
    }
    
    .navbar .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 2px;
        background-color: var(--primary-green);
        transition: width 0.3s ease;
    }
    
    .navbar .nav-link.active:hover::after {
        width: 30px;
    }
    
    @media (max-width: 991px) {
        .navbar .nav-link.active::after {
            display: none;
        }
        
        .navbar-collapse {
            transition: all 0.3s ease;
        }
    }
</style>