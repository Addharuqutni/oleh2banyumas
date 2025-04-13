@extends('layouts.index')

@section('title', 'Mireng - Kuliner Tradisional Khas Banyumas')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/article.css') }}">
@endsection

@section('content')
    <div class="article-container container">
        <article class="article-content">
            <!-- Header -->
            <header class="article-header">
                <h1>Mireng: Kuliner Tradisional Khas Banyumas</h1>
                <div class="article-featured-image">
                    <img src="https://img-global.cpcdn.com/recipes/90b64d32722fa3b0/1200x630cq70/photo.jpg"
                        alt="Mireng Banyumas">
                    <span class="image-caption">Mireng - Jajanan tradisional khas Banyumas</span>
                </div>
            </header>

            <!-- Introduction -->
            <section class="article-section">
                <h2>Penjelasan</h2>
                <div class="article-text">
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
            <section class="article-section">
                <h2>Sejarah</h2>
                <div class="article-text">
                    <p>Sejarah mireng di Banyumas memiliki cerita yang menarik dan berkaitan erat dengan kehidupan agraris
                        masyarakat setempat. Konon, mireng sudah ada sejak puluhan tahun lalu dan menjadi salah satu makanan
                        yang biasa dibawa oleh para petani saat bekerja di sawah. Bentuknya yang praktis dan tahan lama
                        menjadikan mireng pilihan yang tepat sebagai bekal.</p>

                    <div class="article-highlight">
                        <p>Nama "mireng" dalam bahasa Banyumasan berarti "miring" atau "tidak tegak lurus". Hal ini merujuk
                            pada bentuk makanan ini yang pipih dan tidak bulat sempurna seperti lontong pada umumnya.</p>
                    </div>

                    <p>Pada masa lalu, mireng sering dijadikan sebagai salah satu komponen dalam berbagai upacara adat atau
                        selamatan di Banyumas, seperti dalam tradisi tingkeban (tujuh bulanan kehamilan) atau selamatan
                        panen. Makanan ini melambangkan harapan akan kehidupan yang manis dan berlimpah, seperti isian gula
                        merah yang manis di dalamnya.</p>
                </div>
            </section>

            <!-- Ingredients and Preparation -->
            <section class="article-section">
                <h2>Bahan dan Cara Pembuatan</h2>

                <div class="ingredient-container">
                    <div class="ingredient-card">
                        <h3>Bahan Utama</h3>
                        <ul>
                            <li>500 gram beras ketan, rendam selama 2-3 jam</li>
                            <li>200 gram kelapa parut</li>
                            <li>1 sendok teh garam</li>
                            <li>Daun pisang untuk membungkus</li>
                            <li>Lidi atau tali untuk mengikat</li>
                        </ul>
                    </div>

                    <div class="ingredient-card">
                        <h3>Bahan Isian</h3>
                        <ul>
                            <li>250 gram gula merah, sisir halus</li>
                            <li>100 gram kelapa parut</li>
                            <li>1/4 sendok teh garam</li>
                            <li>2-3 lembar daun pandan</li>
                            <li>50 ml air</li>
                        </ul>
                    </div>
                </div>

                <div class="article-text">
                    <h3>Cara Membuat</h3>
                    <ol class="preparation-steps">
                        <li>Cuci bersih beras ketan yang sudah direndam, tiriskan. Campurkan dengan kelapa parut dan garam,
                            aduk rata.</li>
                        <li>Masak gula merah, kelapa parut, garam, daun pandan, dan air dengan api kecil hingga gula larut
                            dan mengental. Dinginkan.</li>
                        <li>Bersihkan daun pisang, lap hingga kering, lalu panggang sebentar di atas api agar lemas dan
                            mudah dilipat.</li>
                        <li>Ambil selembar daun pisang, letakkan sekitar 2-3 sendok makan campuran beras ketan, pipihkan,
                            beri isian di tengahnya, lalu tutup dengan campuran beras ketan lagi. Bungkus membentuk persegi
                            panjang pipih, kemudian ikat dengan lidi atau tali.</li>
                        <li>Kukus mireng dalam dandang atau panci pengukus selama kurang lebih 45-60 menit hingga matang.
                        </li>
                        <li>Angkat mireng yang sudah matang, dinginkan sebentar sebelum disajikan.</li>
                    </ol>

                    <div class="article-tip">
                        <p><strong>Tip:</strong> Kunci utama dalam membuat mireng yang lezat adalah kualitas bahan baku,
                            terutama beras ketan dan gula merah. Beras ketan yang baik akan menghasilkan tekstur yang kenyal
                            dan tidak mudah hancur, sementara gula merah berkualitas akan memberikan rasa manis yang alami
                            dan aroma yang khas.</p>
                    </div>
                </div>
            </section>

            <!-- Variations -->
            <section class="article-section">
                <h2>Variasi</h2>
                <div class="article-text">
                    <p>Meskipun mireng tradisional memiliki isian gula merah dan kelapa, seiring perkembangan zaman,
                        terdapat beberapa variasi mireng yang bisa ditemui:</p>

                    <div class="variation-cards">
                        <div class="variation-card">
                            <h3>Mireng Original</h3>
                            <p>Dengan isian gula merah dan kelapa, versi paling autentik.</p>
                        </div>
                        <div class="variation-card">
                            <h3>Mireng Asin</h3>
                            <p>Tanpa isian manis, lebih gurih dengan tambahan bumbu-bumbu seperti bawang merah, bawang
                                putih, dan daun bawang.</p>
                        </div>
                        <div class="variation-card">
                            <h3>Mireng Daging</h3>
                            <p>Diisi dengan campuran daging cincang yang dibumbui, variasi yang lebih modern.</p>
                        </div>
                        <div class="variation-card">
                            <h3>Mireng Durian</h3>
                            <p>Isian gula merah dicampur dengan daging buah durian untuk aroma dan rasa yang lebih kaya.</p>
                        </div>
                        <div class="variation-card">
                            <h3>Mireng Mini</h3>
                            <p>Versi lebih kecil yang biasanya disajikan untuk acara-acara khusus atau selamatan.</p>
                        </div>
                    </div>

                    <p>Meskipun terdapat berbagai variasi, mireng dengan isian gula merah dan kelapa tetap menjadi yang
                        paling dikenal dan dianggap sebagai mireng autentik khas Banyumas.</p>
                </div>
            </section>

            <!-- Tips -->
            <section class="article-section">
                <h2>Tips Menikmati</h2>
                <div class="article-text">
                    <div class="tips-container">
                        <div class="tip-item">
                            <span class="tip-number">01</span>
                            <p>Mireng paling nikmat dinikmati dalam keadaan hangat, bisa dipanaskan sebentar dengan cara
                                dikukus jika sudah dingin.</p>
                        </div>
                        <div class="tip-item">
                            <span class="tip-number">02</span>
                            <p>Mireng cocok disantap bersama teh atau kopi, terutama di pagi hari atau sore hari.</p>
                        </div>
                        <div class="tip-item">
                            <span class="tip-number">03</span>
                            <p>Untuk menyimpan mireng, biarkan dalam keadaan terbungkus daun pisang dan simpan di tempat
                                sejuk. Mireng bisa bertahan 1-2 hari pada suhu ruangan.</p>
                        </div>
                        <div class="tip-item">
                            <span class="tip-number">04</span>
                            <p>Jika ingin menyimpan lebih lama, mireng bisa dimasukkan ke dalam lemari pendingin dan
                                dipanaskan kembali saat akan dikonsumsi.</p>
                        </div>
                        <div class="tip-item">
                            <span class="tip-number">05</span>
                            <p>Saat menghangatkan kembali, sebaiknya gunakan cara dikukus daripada dipanaskan dengan
                                microwave untuk menjaga tekstur dan kelembaban mireng.</p>
                        </div>
                    </div>
                </div>
            </section>
            
        </article>
    </div>
@endsection
