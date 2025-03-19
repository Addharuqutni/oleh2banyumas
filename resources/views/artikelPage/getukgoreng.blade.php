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
                <h1 class="fw-bold mb-4 text-center">Getuk Goreng: Kelezatan Tradisional Khas Sokaraja Banyumas</h1>

                <div class="mb-4 text-center">
                    <img src="https://radarbanyumas.disway.id/upload/21f2411871cc16ea65d41cc9f6f10379.jpg"
                        alt="Getuk Goreng" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Apa itu Getuk Goreng?</h2>
                    <p>Getuk goreng adalah makanan olahan yang terbuat dari singkong yang dihaluskan kemudian digoreng.
                        Getuk goreng khas Sokaraja memiliki tekstur yang lembut di dalam namun renyah di luar. Rasanya manis
                        dengan aroma yang khas, menjadikannya salah satu oleh-oleh favorit dari Banyumas.</p>
                    <p>Berbeda dengan getuk pada umumnya yang hanya dikukus, getuk goreng Sokaraja memiliki proses tambahan
                        yaitu digoreng hingga kecoklatan, menciptakan lapisan luar yang renyah dan aroma karamel yang
                        menggugah selera.</p>
                    <p>Getuk goreng Sokaraja biasanya dikemas dalam kotak kardus yang praktis untuk dibawa sebagai
                        oleh-oleh. Makanan ini memiliki daya tahan sekitar 3-4 hari pada suhu ruangan, namun akan lebih awet
                        jika disimpan dalam lemari pendingin.</p>
                    <p>Harga getuk goreng bervariasi mulai dari Rp 15.000 hingga Rp 30.000 per kotak, tergantung ukuran dan
                        produsennya. Saat ini, terdapat banyak produsen getuk goreng di Sokaraja dengan berbagai merek dan
                        varian rasa.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Sejarah Getuk Goreng</h2>
                    <p>Getuk goreng Sokaraja pertama kali dibuat pada sekitar tahun 1918 oleh Ibu Djoewariyah. Awalnya,
                        makanan ini hanya dijual di pasar tradisional Sokaraja. Namun seiring berjalannya waktu, popularitas
                        getuk goreng semakin meningkat hingga menjadi ikon kuliner Banyumas.</p>
                    <p>Nama "getuk goreng" sendiri berasal dari kata "getuk" yang merupakan makanan tradisional berbahan
                        dasar singkong yang dikukus, dan "goreng" karena proses pengolahannya yang digoreng setelah
                        dihaluskan dan diberi bumbu.</p>
                    <p>Pada awalnya, getuk goreng hanya dikenal di kalangan masyarakat lokal Banyumas. Namun, seiring dengan
                        perkembangan pariwisata dan transportasi, getuk goreng mulai dikenal luas sebagai oleh-oleh khas
                        Banyumas. Saat ini, sepanjang jalan Sokaraja berdiri puluhan toko yang menjual getuk goreng dengan
                        berbagai merek.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Cara Pembuatan</h2>
                    <p>Pembuatan getuk goreng melibatkan beberapa tahapan penting:</p>

                    <ol class="mb-4">
                        <li class="mb-2">Pemilihan bahan baku: Singkong yang berkualitas baik dipilih, biasanya jenis
                            singkong yang tidak terlalu berair.</li>
                        <li class="mb-2">Pengukusan: Singkong dikupas, dibersihkan, dan dikukus hingga benar-benar empuk.
                        </li>
                        <li class="mb-2">Penghalusan: Singkong yang sudah empuk ditumbuk atau dihaluskan menggunakan alat
                            tradisional atau modern.</li>
                        <li class="mb-2">Pencampuran: Singkong halus dicampur dengan gula pasir, gula merah, sedikit
                            garam, dan terkadang ditambahkan vanili untuk aroma.</li>
                        <li class="mb-2">Pembentukan: Adonan dibentuk pipih dengan ketebalan sekitar 1-2 cm.</li>
                        <li class="mb-2">Penggorengan: Adonan digoreng dalam minyak panas hingga kecoklatan dan renyah di
                            bagian luarnya.</li>
                    </ol>

                    <p>Proses penggorengan membutuhkan keahlian khusus agar getuk goreng tidak hancur saat digoreng dan
                        memiliki tekstur yang tepat - renyah di luar namun tetap lembut di dalam. Suhu minyak harus dijaga
                        dengan baik untuk mendapatkan hasil yang optimal.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Nilai Gizi dan Manfaat</h2>
                    <p>Sebagai makanan berbahan dasar singkong, getuk goreng memiliki kandungan karbohidrat yang cukup
                        tinggi. Dalam 100 gram getuk goreng, terkandung sekitar:</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Kalori: 220-250 kkal</li>
                                        <li>Karbohidrat: 40-45 gram</li>
                                        <li>Protein: 1-2 gram</li>
                                        <li>Lemak: 5-8 gram</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Serat: 2-3 gram</li>
                                        <li>Kalsium: 30-40 mg</li>
                                        <li>Zat Besi: 0.5-1 mg</li>
                                        <li>Vitamin C: 15-20 mg</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Meski getuk goreng mengandung gula yang cukup tinggi, singkong sebagai bahan utamanya memiliki indeks
                        glikemik yang lebih rendah dibandingkan nasi atau roti, sehingga pelepasan gulanya ke dalam darah
                        lebih lambat.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Tips Menikmati dan Menyimpan Getuk Goreng</h2>
                    <p>Untuk mendapatkan pengalaman terbaik saat menikmati getuk goreng:</p>
                    <ul class="mb-4">
                        <li>Getuk goreng paling nikmat dinikmati dalam keadaan hangat untuk merasakan kontras antara bagian
                            luar yang renyah dan bagian dalam yang lembut.</li>
                        <li>Jika ingin menyimpan getuk goreng lebih lama, simpan dalam wadah kedap udara dan tempatkan di
                            lemari pendingin.</li>
                        <li>Untuk menghangatkan kembali, getuk goreng bisa dipanaskan sebentar di microwave atau dipanggang
                            ringan di oven.</li>
                        <li>Getuk goreng bisa dinikmati sebagai teman minum teh atau kopi di pagi atau sore hari.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
