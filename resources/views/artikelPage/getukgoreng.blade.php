@extends('layouts.index')

@section('title', 'Getuk Goreng - Kuliner Manis Khas Banyumas')

@section('content')
    <div class="article-container container">
        <article class="article-content">
            <!-- Header -->
            <header class="article-header">
                <h1>Getuk Goreng: Kuliner Tradisional Khas Banyumas</h1>
                <div class="article-featured-image">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Getuk_goreng_Sokaraja.jpg/1200px-Getuk_goreng_Sokaraja.jpg"
                        alt="Getuk Goreng Banyumas">
                    <span class="image-caption">Getuk Goreng - Oleh-oleh legendaris khas Sokaraja, Banyumas</span>
                </div>
            </header>

            <!-- Introduction -->
            <section class="article-section">
                <h2>Penjelasan</h2>
                <div class="article-text">
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
            <section class="article-section">
                <h2>Sejarah</h2>
                <div class="article-text">
                    <p>Getuk goreng memiliki sejarah panjang yang bermula pada tahun 1918. Makanan ini pertama kali
                        ditemukan secara tidak sengaja oleh Sanpirngad, seorang pedagang nasi rames keliling di daerah
                        Sokaraja. Awalnya, ia membuat getuk biasa (tidak digoreng) sebagai salah satu menu dagangannya,
                        namun getuk basah ini cepat basi dalam hitungan satu hari.</p>

                    <div class="article-highlight">
                        <p>Suatu hari, ketika getuk basah tidak habis terjual, Sanpirngad mencoba menggorengnya untuk
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
            <section class="article-section">
                <h2>Bahan dan Cara Pembuatan</h2>

                <div class="ingredient-container">
                    <div class="ingredient-card">
                        <h3>Bahan Utama</h3>
                        <ul>
                            <li>1 kg singkong berkualitas baik</li>
                            <li>200-250 gram gula merah, sisir halus</li>
                            <li>200 gram kelapa parut (setengah tua)</li>
                            <li>1/2 sendok teh garam</li>
                            <li>Minyak goreng secukupnya</li>
                        </ul>
                    </div>

                    <div class="ingredient-card">
                        <h3>Bahan Tambahan</h3>
                        <ul>
                            <li>75 gram tepung beras</li>
                            <li>3 sendok makan tepung terigu</li>
                            <li>1/4 sendok teh vanili (opsional)</li>
                            <li>2-3 lembar daun pandan</li>
                            <li>Kayu manis (opsional)</li>
                        </ul>
                    </div>
                </div>

                <div class="article-text">
                    <h3>Cara Membuat</h3>
                    <ol class="preparation-steps">
                        <li>Kupas singkong, cuci bersih, dan potong-potong menjadi ukuran sedang. Buang bagian serat
                            tengahnya agar tidak mempengaruhi tekstur.</li>
                        <li>Kukus singkong dan kelapa parut hingga empuk dan matang, sekitar 30-45 menit.</li>
                        <li>Selagi singkong masih panas, tumbuk atau haluskan hingga lembut. Tekstur yang halus tanpa
                            gumpalan sangat penting untuk kualitas getuk yang baik.</li>
                        <li>Tambahkan gula merah sisir, kelapa parut, dan garam ke dalam singkong yang sudah ditumbuk. Uleni
                            hingga semua bahan tercampur rata dan adonan bisa dibentuk.</li>
                        <li>Bentuk adonan menjadi bulatan-bulatan atau silinder kecil dengan ukuran sesuai selera.</li>
                        <li>Campurkan tepung beras dan tepung terigu dalam wadah terpisah sebagai bahan pelapis.</li>
                        <li>Gulingkan bulatan getuk ke dalam campuran tepung hingga semua permukaannya terlapisi.</li>
                        <li>Panaskan minyak dalam wajan dengan api sedang. Goreng getuk hingga berwarna keemasan dan renyah
                            di bagian luar. Jangan terlalu lama agar bagian dalam tetap lembut.</li>
                        <li>Angkat getuk goreng, tiriskan minyaknya, dan dinginkan sebelum disajikan atau dikemas.</li>
                    </ol>

                    <div class="article-tip">
                        <p><strong>Tip:</strong> Kunci utama dalam membuat getuk goreng yang lezat adalah kualitas singkong
                            dan gula merah. Pilih singkong yang baik, tidak terlalu tua dan tidak berkayu agar menghasilkan
                            tekstur yang lembut. Gunakan gula merah khas Banyumas yang memiliki aroma dan rasa yang khas
                            untuk mendapatkan cita rasa autentik getuk goreng Sokaraja.</p>
                    </div>
                </div>
            </section>

            <!-- Variations -->
            <section class="article-section">
                <h2>Variasi</h2>
                <div class="article-text">
                    <p>Meskipun getuk goreng tradisional memiliki rasa gula merah yang khas, seiring perkembangan zaman,
                        terdapat beberapa variasi getuk goreng yang bisa ditemui di Sokaraja:</p>

                    <div class="variation-cards">
                        <div class="variation-card">
                            <h3>Getuk Goreng Original</h3>
                            <p>Menggunakan gula merah khas Banyumas yang memberikan rasa manis dengan aroma khas, ini adalah
                                versi paling autentik dan populer.</p>
                        </div>
                        <div class="variation-card">
                            <h3>Getuk Goreng Durian</h3>
                            <p>Adonan getuk dicampur dengan daging buah durian, menciptakan kombinasi rasa manis dan aroma
                                durian yang khas.</p>
                        </div>
                        <div class="variation-card">
                            <h3>Getuk Goreng Nangka</h3>
                            <p>Varian yang dicampur dengan potongan buah nangka, memberikan aroma dan rasa buah yang segar
                                dalam getuk.</p>
                        </div>
                        <div class="variation-card">
                            <h3>Getuk Goreng Mini</h3>
                            <p>Versi lebih kecil yang mudah dimakan dalam sekali gigitan, sering dijadikan camilan praktis.
                            </p>
                        </div>
                        <div class="variation-card">
                            <h3>Getuk Goreng Premium</h3>
                            <p>Dibuat dengan formulasi khusus dan bahan-bahan berkualitas tinggi, biasanya diproduksi oleh
                                merek-merek terkenal seperti Haji Tohirin.</p>
                        </div>
                    </div>

                    <p>Selain variasi rasa, getuk goreng juga hadir dalam berbagai merek dan produsen. Beberapa nama yang
                        terkenal antara lain Getuk Goreng Haji Tohirin, Sari Murni, dan Eka yang masing-masing memiliki
                        karakter dan penggemar setia tersendiri. Meskipun demikian, getuk goreng dengan rasa gula merah
                        original tetap menjadi pilihan utama bagi kebanyakan penikmat makanan khas ini.</p>
                </div>
            </section>

            <!-- Tips -->
            <section class="article-section">
                <h2>Tips Menikmati</h2>
                <div class="article-text">
                    <div class="tips-container">
                        <div class="tip-item">
                            <span class="tip-number">01</span>
                            <p>Getuk goreng paling nikmat dinikmati saat masih hangat, ketika bagian luarnya masih renyah
                                dan bagian dalamnya lembut. Jika sudah dingin, panaskan sebentar dalam oven atau air fryer
                                untuk mendapatkan kembali tekstur yang renyah.</p>
                        </div>
                        <div class="tip-item">
                            <span class="tip-number">02</span>
                            <p>Sajikan getuk goreng dengan teh atau kopi hitam tanpa gula untuk menyeimbangkan rasa manis
                                dari getuk. Kombinasi ini menjadi paduan sempurna untuk camilan sore hari.</p>
                        </div>
                        <div class="tip-item">
                            <span class="tip-number">03</span>
                            <p>Untuk menjaga kesegaran getuk goreng, simpan dalam wadah kedap udara pada suhu ruangan. Getuk
                                goreng dapat bertahan 3-5 hari, meskipun teksturnya akan berubah seiring waktu.</p>
                        </div>
                        <div class="tip-item">
                            <span class="tip-number">04</span>
                            <p>Jika membeli sebagai oleh-oleh, carilah produsen yang mengemas getuk goreng dengan baik dan
                                mencantumkan tanggal produksi. Pilih yang baru dibuat untuk mendapatkan kualitas terbaik.
                            </p>
                        </div>
                        <div class="tip-item">
                            <span class="tip-number">05</span>
                            <p>Saat berkunjung ke Sokaraja, Banyumas, kunjungi langsung sentra getuk goreng di sepanjang
                                Jalan Jenderal Sudirman, Sokaraja, untuk mencicipi beragam varian dari berbagai produsen
                                legendaris seperti Haji Tohirin yang telah berdiri sejak 1918.</p>
                        </div>
                    </div>
                </div>

            </section>

        </article>
    </div>
@endsection
