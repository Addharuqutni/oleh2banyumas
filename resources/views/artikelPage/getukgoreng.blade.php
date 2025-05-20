@extends('layouts.index')

@section('title', 'Getuk Goreng - Kuliner Manis Khas Banyumas')

@section('content')
    <div class="container py-5">
        <article>
            <!-- Header -->
            <header class="mb-5">
                <h1 class="fw-bold text-center mb-4 judul">Getuk Goreng: Kuliner Tradisional Khas Banyumas</h1>
                <div class="text-center" style="width: 100%; height: 500px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Getuk_goreng_Sokaraja.jpg/1200px-Getuk_goreng_Sokaraja.jpg"
                        alt="Getuk Goreng Banyumas" class="img-fluid rounded shadow-sm mb-2" style="width: 100%; height: 100%; object-fit: cover;">
                    <p class="text-muted fst-italic">Getuk Goreng - Oleh-oleh legendaris khas Sokaraja, Banyumas</p>
                </div>
            </header>

            <!-- Introduction -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Penjelasan</h2>
                <div class="lead">
                    <p>Getuk goreng adalah makanan tradisional khas Sokaraja, Banyumas yang terbuat dari singkong atau yang
                        biasa disebut masyarakat Banyumas dengan sebutan "boled". Singkong dipadukan dengan gula merah,
                        dibentuk, kemudian digoreng hingga berwarna keemasan. Makanan ini memiliki tekstur yang unik, dengan
                        bagian luar yang sedikit renyah dan bagian dalam yang lembut dan legit.</p>

                    <p>Cita rasa getuk goreng sangat khas, dengan perpaduan manis alami dari gula merah dan sedikit gurih.
                        Teksturnya lembut di dalam namun sedikit renyah di bagian luar karena proses penggorengan. Getuk
                        goreng Sokaraja hadir dalam berbagai varian rasa, meskipun rasa gula merah tetap menjadi yang paling
                        autentik dan populer.</p>

                    <p>Di Banyumas, getuk goreng telah menjadi ikon kuliner dan oleh-oleh wajib bagi para wisatawan. Sentra
                        produksi getuk goreng terletak di kawasan Sokaraja, dengan puluhan produsen yang tersebar di
                        sepanjang jalan utama. Harganya terjangkau, mulai dari Rp 20.000 hingga Rp 30.000 per kemasan,
                        tergantung ukuran dan merek. Getuk goreng biasanya dinikmati sebagai camilan pendamping teh atau
                        kopi, dan sering dijadikan buah tangan khas Banyumas.</p>
                </div>
            </section>

            <!-- History -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Sejarah</h2>
                <div class="lead">
                    <p>Getuk goreng memiliki sejarah panjang yang bermula pada tahun 1918. Makanan ini pertama kali
                        ditemukan secara tidak sengaja oleh Sanpirngad, seorang pedagang nasi rames keliling di daerah
                        Sokaraja. Awalnya, ia membuat getuk biasa (tidak digoreng) sebagai salah satu menu dagangannya,
                        namun getuk basah ini cepat basi dalam hitungan satu hari.</p>

                    <div class="alert alert-info my-4">
                        <p class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Suatu hari, ketika getuk basah tidak habis terjual, Sanpirngad mencoba menggorengnya untuk
                            memperpanjang masa simpan. Ternyata, getuk yang digoreng ini justru memiliki cita rasa yang
                            lebih lezat dan tekstur yang unik. Ia pun mulai menawarkan getuk goreng ini kepada pelanggannya,
                            dan segera mendapat sambutan positif.</p>
                    </div>

                    <p>Seiring berjalannya waktu, popularitas getuk goreng terus meningkat. Pada tahun 1937, Haji Tohirin,
                        menantu Sanpirngad, mulai mengembangkan usaha getuk goreng dengan membuka toko pertama di Sokaraja.
                        Toko "Getuk Goreng Haji Tohirin" ini kemudian menjadi pelopor dan ikon getuk goreng Sokaraja hingga
                        saat ini. Kini, setelah lebih dari seabad, getuk goreng telah menjadi warisan kuliner yang tak
                        terpisahkan dari identitas budaya Banyumas dan bahkan diakui sebagai warisan budaya nasional.</p>
                </div>
            </section>

            <!-- Ingredients and Preparation -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Bahan dan Cara Pembuatan</h2>

                <div class="row mb-4 g-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header text-white bg-secondary">
                                <h5 class="mb-0">Bahan Utama</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1 kg singkong berkualitas baik
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        200-250 gram gula merah, sisir halus
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        200 gram kelapa parut (setengah tua)
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1/2 sendok teh garam
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        Minyak goreng secukupnya
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header text-white bg-secondary">
                                <h5 class="mb-0">Bahan Tambahan</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        75 gram tepung beras
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        3 sendok makan tepung terigu
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1/4 sendok teh vanili (opsional)
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        2-3 lembar daun pandan
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        Kayu manis (opsional)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lead">
                    <h3 class="subjudul mb-3">Cara Membuat</h3>
                    <ol class="list-group list-group-numbered mb-4">
                        <li class="list-group-item">Kupas singkong, cuci bersih, dan potong-potong menjadi ukuran sedang. Buang bagian serat
                            tengahnya agar tidak mempengaruhi tekstur.</li>
                        <li class="list-group-item">Kukus singkong dan kelapa parut hingga empuk dan matang, sekitar 30-45 menit.</li>
                        <li class="list-group-item">Selagi singkong masih panas, tumbuk atau haluskan hingga lembut. Tekstur yang halus tanpa
                            gumpalan sangat penting untuk kualitas getuk yang baik.</li>
                        <li class="list-group-item">Tambahkan gula merah sisir, kelapa parut, dan garam ke dalam singkong yang sudah ditumbuk. Uleni
                            hingga semua bahan tercampur rata dan adonan bisa dibentuk.</li>
                        <li class="list-group-item">Bentuk adonan menjadi bulatan-bulatan atau silinder kecil dengan ukuran sesuai selera.</li>
                        <li class="list-group-item">Campurkan tepung beras dan tepung terigu dalam wadah terpisah sebagai bahan pelapis.</li>
                        <li class="list-group-item">Gulingkan bulatan getuk ke dalam campuran tepung hingga semua permukaannya terlapisi.</li>
                        <li class="list-group-item">Panaskan minyak dalam wajan dengan api sedang. Goreng getuk hingga berwarna keemasan dan renyah
                            di bagian luar. Jangan terlalu lama agar bagian dalam tetap lembut.</li>
                        <li class="list-group-item">Angkat getuk goreng, tiriskan minyaknya, dan dinginkan sebelum disajikan atau dikemas.</li>
                    </ol>

                    <div class="alert alert-success my-4">
                        <p class="mb-0"><i class="bi bi-lightbulb-fill me-2"></i><strong>Tip:</strong> Kunci utama dalam membuat getuk goreng yang lezat adalah kualitas singkong
                            dan gula merah. Pilih singkong yang baik, tidak terlalu tua dan tidak berkayu agar menghasilkan
                            tekstur yang lembut. Gunakan gula merah khas Banyumas yang memiliki aroma dan rasa yang khas
                            untuk mendapatkan cita rasa autentik getuk goreng Sokaraja.</p>
                    </div>
                </div>
            </section>

            <!-- Variations -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Variasi</h2>
                <div class="lead">
                    <p>Meskipun getuk goreng tradisional memiliki rasa gula merah yang khas, seiring perkembangan zaman,
                        terdapat beberapa variasi getuk goreng yang bisa ditemui di Sokaraja:</p>

                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Getuk Goreng Original</h5>
                                    <p class="card-text">Menggunakan gula merah khas Banyumas yang memberikan rasa manis dengan aroma khas, ini adalah
                                        versi paling autentik dan populer.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Getuk Goreng Durian</h5>
                                    <p class="card-text">Adonan getuk dicampur dengan daging buah durian, menciptakan kombinasi rasa manis dan aroma
                                        durian yang khas.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Getuk Goreng Nangka</h5>
                                    <p class="card-text">Varian yang dicampur dengan potongan buah nangka, memberikan aroma dan rasa buah yang segar
                                        dalam getuk.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Getuk Goreng Mini</h5>
                                    <p class="card-text">Versi lebih kecil yang mudah dimakan dalam sekali gigitan, sering dijadikan camilan praktis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </article>
    </div>
@endsection
