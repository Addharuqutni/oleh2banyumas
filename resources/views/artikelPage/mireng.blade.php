@extends('layouts.index')

@section('title', 'Mireng - Kuliner Tradisional Khas Banyumas')

@section('content')
    <div class="container py-5">
        <article>
            <!-- Header -->
            <header class="mb-5">
                <h1 class="fw-bold text-center mb-4 judul">Mireng: Kuliner Tradisional Khas Banyumas</h1>
                <div class="text-center" style="width: 100%; height: 500px;">
                    <img src="https://img-global.cpcdn.com/recipes/90b64d32722fa3b0/1200x630cq70/photo.jpg"
                        alt="Mireng Banyumas" class="img-fluid rounded shadow-sm" style="width: 100%; height: 100%; object-fit: cover;">
                    <p class="text-muted fst-italic">Mireng - Jajanan tradisional khas Banyumas</p>
                </div>
            </header>

            <!-- Introduction -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Penjelasan</h2>
                <div class="lead">
                    <p>Mireng adalah makanan tradisional khas Banyumas yang terbuat dari beras ketan yang dicampur dengan
                        parutan kelapa dan diberi isian berupa campuran gula merah dan kelapa, kemudian dibungkus dengan
                        daun pisang dan dikukus hingga matang. Makanan ini memiliki bentuk seperti lontong dengan ukuran
                        yang lebih kecil dan pipih, dengan panjang sekitar 7-10 cm.</p>

                    <p>Cita rasa mireng sangat khas, dengan perpaduan antara ketan yang gurih dan isian yang manis legit
                        dari gula merah. Teksturnya kenyal dan lengket khas ketan, sementara isiannya lembut dan manis.
                        Aroma daun pisang yang digunakan sebagai pembungkus juga menambah kekhasan mireng, memberikan aroma
                        alami yang menggugah selera.</p>

                    <p>Di Banyumas, mireng termasuk jajanan tradisional yang mulai langka ditemui. Biasanya mireng dijual di
                        pasar-pasar tradisional atau oleh pedagang keliling di pagi hari. Harganya sangat terjangkau,
                        berkisar antara Rp 2.000 hingga Rp 3.000 per buah. Mireng biasanya dinikmati sebagai sarapan atau
                        camilan di sore hari, seringkali ditemani dengan secangkir teh atau kopi.</p>
                </div>
            </section>

            <!-- History -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Sejarah</h2>
                <div class="lead">
                    <p>Sejarah mireng di Banyumas memiliki cerita yang menarik dan berkaitan erat dengan kehidupan agraris
                        masyarakat setempat. Konon, mireng sudah ada sejak puluhan tahun lalu dan menjadi salah satu makanan
                        yang biasa dibawa oleh para petani saat bekerja di sawah. Bentuknya yang praktis dan tahan lama
                        menjadikan mireng pilihan yang tepat sebagai bekal.</p>

                    <div class="alert alert-info my-4">
                        <p class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Nama "mireng" dalam bahasa Banyumasan berarti "miring" atau "tidak tegak lurus". Hal ini merujuk
                            pada bentuk makanan ini yang pipih dan tidak bulat sempurna seperti lontong pada umumnya.</p>
                    </div>

                    <p>Pada masa lalu, mireng sering dijadikan sebagai salah satu komponen dalam berbagai upacara adat atau
                        selamatan di Banyumas, seperti dalam tradisi tingkeban (tujuh bulanan kehamilan) atau selamatan
                        panen. Makanan ini melambangkan harapan akan kehidupan yang manis dan berlimpah, seperti isian gula
                        merah yang manis di dalamnya.</p>
                </div>
            </section>

            <!-- Ingredients and Preparation -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Bahan dan Cara Pembuatan</h2>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-header bg-primary text-white">
                                <h3 class="h5 mb-0">Bahan Utama</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">500 gram beras ketan, rendam selama 2-3 jam</li>
                                    <li class="list-group-item">200 gram kelapa parut</li>
                                    <li class="list-group-item">1 sendok teh garam</li>
                                    <li class="list-group-item">Daun pisang untuk membungkus</li>
                                    <li class="list-group-item">Lidi atau tali untuk mengikat</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-header bg-success text-white">
                                <h3 class="h5 mb-0">Bahan Isian</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">250 gram gula merah, sisir halus</li>
                                    <li class="list-group-item">100 gram kelapa parut</li>
                                    <li class="list-group-item">1/4 sendok teh garam</li>
                                    <li class="list-group-item">2-3 lembar daun pandan</li>
                                    <li class="list-group-item">50 ml air</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lead">
                    <h3 class="h4 mb-3">Cara Membuat</h3>
                    <ol class="list-group list-group-numbered mb-4">
                        <li class="list-group-item">Cuci bersih beras ketan yang sudah direndam, tiriskan. Campurkan dengan kelapa parut dan garam,
                            aduk rata.</li>
                        <li class="list-group-item">Masak gula merah, kelapa parut, garam, daun pandan, dan air dengan api kecil hingga gula larut
                            dan mengental. Dinginkan.</li>
                        <li class="list-group-item">Bersihkan daun pisang, lap hingga kering, lalu panggang sebentar di atas api agar lemas dan
                            mudah dilipat.</li>
                        <li class="list-group-item">Ambil selembar daun pisang, letakkan sekitar 2-3 sendok makan campuran beras ketan, pipihkan,
                            beri isian di tengahnya, lalu tutup dengan campuran beras ketan lagi. Bungkus membentuk persegi
                            panjang pipih, kemudian ikat dengan lidi atau tali.</li>
                        <li class="list-group-item">Kukus mireng dalam dandang atau panci pengukus selama kurang lebih 45-60 menit hingga matang.
                        </li>
                        <li class="list-group-item">Angkat mireng yang sudah matang, dinginkan sebentar sebelum disajikan.</li>
                    </ol>

                    <div class="alert alert-warning">
                        <p class="mb-0"><i class="bi bi-lightbulb-fill me-2"></i><strong>Tip:</strong> Kunci utama dalam membuat mireng yang lezat adalah kualitas bahan baku,
                            terutama beras ketan dan gula merah. Beras ketan yang baik akan menghasilkan tekstur yang kenyal
                            dan tidak mudah hancur, sementara gula merah berkualitas akan memberikan rasa manis yang alami
                            dan aroma yang khas.</p>
                    </div>
                </div>
            </section>

            <!-- Variations -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Variasi</h2>
                <div class="lead">
                    <p>Meskipun mireng tradisional memiliki isian gula merah dan kelapa, seiring perkembangan zaman,
                        terdapat beberapa variasi mireng yang bisa ditemui:</p>

                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5">Mireng Original</h3>
                                    <p class="card-text">Dengan isian gula merah dan kelapa, versi paling autentik.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5">Mireng Asin</h3>
                                    <p class="card-text">Tanpa isian manis, lebih gurih dengan tambahan bumbu-bumbu seperti bawang merah, bawang
                                        putih, dan daun bawang.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5">Mireng Daging</h3>
                                    <p class="card-text">Diisi dengan campuran daging cincang yang dibumbui, variasi yang lebih modern.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5">Mireng Durian</h3>
                                    <p class="card-text">Isian gula merah dicampur dengan daging buah durian untuk aroma dan rasa yang lebih kaya.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5">Mireng Mini</h3>
                                    <p class="card-text">Versi lebih kecil yang biasanya disajikan untuk acara-acara khusus atau selamatan.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Meskipun terdapat berbagai variasi, mireng dengan isian gula merah dan kelapa tetap menjadi yang
                        paling dikenal dan dianggap sebagai mireng autentik khas Banyumas.</p>
                </div>
            </section>

            <!-- Tips -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Tips Menikmati</h2>
                <div class="lead">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-1-circle-fill text-success me-2"></i>Waktu Terbaik</h5>
                                    <p class="card-text">Mireng paling nikmat dinikmati dalam keadaan hangat, bisa dipanaskan sebentar dengan cara
                                        dikukus jika sudah dingin.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-2-circle-fill text-success me-2"></i>Paduan Minuman</h5>
                                    <p class="card-text">Mireng cocok disantap bersama teh atau kopi, terutama di pagi hari atau sore hari.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-3-circle-fill text-success me-2"></i>Penyimpanan</h5>
                                    <p class="card-text">Untuk menyimpan mireng, biarkan dalam keadaan terbungkus daun pisang dan simpan di tempat
                                        sejuk. Mireng bisa bertahan 1-2 hari pada suhu ruangan.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-4-circle-fill text-success me-2"></i>Penyimpanan Lama</h5>
                                    <p class="card-text">Jika ingin menyimpan lebih lama, mireng bisa dimasukkan ke dalam lemari pendingin dan
                                        dipanaskan kembali saat akan dikonsumsi.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-5-circle-fill text-success me-2"></i>Menghangatkan Kembali</h5>
                                    <p class="card-text">Saat menghangatkan kembali, sebaiknya gunakan cara dikukus daripada dipanaskan dengan
                                        microwave untuk menjaga tekstur dan kelembaban mireng.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </article>
    </div>
@endsection
