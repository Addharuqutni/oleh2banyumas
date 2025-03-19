@extends('layouts.index')

@section('title', 'Getuk Goreng - Oleh-oleh Khas Banyumas')

@section('content')
    <div class="container py-3">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none">Artikel</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Getuk Goreng</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="fw-bold mb-4 text-center">Getuk Goreng</h1>

                <div class="mb-4 text-center">
                    <img src="https://radarbanyumas.disway.id/upload/21f2411871cc16ea65d41cc9f6f10379.jpg"
                        alt="Getuk Goreng" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>

                <div class="mb-4">
                    <h2 class="fw-semibold mb-3">Apa itu Getuk Goreng?</h2>
                    <p>Getuk goreng adalah makanan olahan yang terbuat dari singkong yang dihaluskan kemudian digoreng.
                        Getuk goreng khas Sokaraja memiliki tekstur yang lembut di dalam namun renyah di luar. Rasanya manis
                        dengan aroma yang khas, menjadikannya salah satu oleh-oleh favorit dari Banyumas.</p>
                    <p>Getuk goreng Sokaraja biasanya dikemas dalam kotak kardus yang praktis untuk dibawa sebagai
                        oleh-oleh. Makanan ini memiliki daya tahan sekitar 3-4 hari pada suhu ruangan.</p>
                    <p>Harga getuk goreng bervariasi mulai dari Rp 15.000 hingga Rp 30.000 per kotak, tergantung ukuran dan
                        produsennya.</p>
                </div>

                <div class="mb-4">
                    <h2 class="fw-semibold mb-3">Sejarah Getuk Goreng</h2>
                    <p>Getuk goreng Sokaraja pertama kali dibuat pada sekitar tahun 1918 oleh Ibu Djoewariyah. Awalnya,
                        makanan ini hanya dijual di pasar tradisional Sokaraja. Namun seiring berjalannya waktu, popularitas
                        getuk goreng semakin meningkat hingga menjadi ikon kuliner Banyumas.</p>
                    <p>Nama "getuk goreng" sendiri berasal dari kata "getuk" yang merupakan makanan tradisional berbahan
                        dasar singkong yang dikukus, dan "goreng" karena proses pengolahannya yang digoreng setelah
                        dihaluskan dan diberi bumbu.</p>
                </div>

                <div class="mb-4">
                    <h2 class="fw-semibold mb-3">Cara Pembuatan</h2>
                    <p>Pembuatan getuk goreng dimulai dengan mengupas dan membersihkan singkong. Singkong kemudian dikukus
                        hingga empuk. Setelah empuk, singkong ditumbuk atau dihaluskan, kemudian dicampur dengan gula pasir,
                        gula merah, dan sedikit garam. Adonan kemudian dibentuk pipih dan digoreng hingga kecoklatan dan
                        renyah di bagian luarnya.</p>
                    <p>Proses penggorengan membutuhkan keahlian khusus agar getuk goreng tidak hancur saat digoreng dan
                        memiliki tekstur yang tepat - renyah di luar namun tetap lembut di dalam.</p>
                </div>

                <div class="text-center mt-5 mb-5">
                    <a href="{{ route('shops.index') }}" class="btn btn-success px-4 py-2">Lihat Toko Oleh-oleh</a>
                    <a href="{{ route('artikel.index') }}" class="btn btn-outline-secondary px-4 py-2 ms-2">Kembali ke
                        Artikel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
