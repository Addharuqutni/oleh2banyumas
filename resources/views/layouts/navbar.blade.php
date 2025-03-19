<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Logo dengan ukuran yang responsif -->
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 35px;">
        </a>
        
        <!-- Tombol toggle yang lebih baik untuk perangkat mobile -->
        <button class="navbar-toggler border-0 focus-ring focus-ring-light" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarContent" aria-controls="navbarContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Konten navbar yang akan collapse di perangkat mobile -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-0 py-3 py-lg-0">
                <li class="nav-item text-center border-bottom border-light-subtle d-lg-none py-2">
                    <a class="nav-link px-3 fw-medium" href="/">Home</a>
                </li>
                <li class="nav-item text-center border-bottom border-light-subtle d-lg-none py-2">
                    <a class="nav-link px-3 fw-medium" href="/about">Tentang</a>
                </li>
                <li class="nav-item text-center border-bottom border-light-subtle d-lg-none py-2">
                    <a class="nav-link px-3 fw-medium" href="/artikel">Artikel</a>
                </li>
                <li class="nav-item text-center d-lg-none py-2">
                    <a class="nav-link px-3 fw-medium" href="/toko">Toko</a>
                </li>
                
                <!-- Menu untuk desktop -->
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link px-3 fw-medium" href="/">Home</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link px-3 fw-medium" href="/about">Tentang</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link px-3 fw-medium" href="/artikel">Artikel</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link px-3 fw-medium" href="/toko">Toko</a>
                </li>
            </ul>
        </div>
    </div>
</nav>