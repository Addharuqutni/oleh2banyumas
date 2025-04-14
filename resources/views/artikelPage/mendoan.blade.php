@extends('layouts.index')

@section('title', 'Mendoan - Kuliner Legendaris Khas Banyumas')

@section('content')
    <div class="container py-5">
        <article>
            <!-- Header -->
            <header class="mb-5">
                <h1 class="fw-bold text-center mb-4 judul">Mendoan: Kuliner Tradisional Khas Banyumas</h1>
                <div class="text-center" style="width: 100%; height: 500px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Mendoan.jpg/1200px-Mendoan.jpg"
                        alt="Mendoan Banyumas" class="img-fluid rounded shadow-sm" style="width: 100%; height: 100%; object-fit: cover;">
                    <p class="text-muted fst-italic">Mendoan - Gorengan tempe setengah matang khas Banyumas</p>
                </div>
            </header>

            <!-- Introduction -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Penjelasan</h2>
                <div class="lead">
                    <p>Mendoan adalah makanan tradisional khas Banyumas yang terbuat dari tempe tipis yang dicelupkan ke
                        dalam adonan tepung berbumbu, kemudian digoreng dengan cara khusus hingga setengah matang. Nama
                        "mendoan" berasal dari kata "mendo" dalam bahasa Banyumasan yang berarti setengah matang atau
                        lembek. Makanan ini memiliki tekstur yang unik, dengan bagian dalam yang lembut dan lembab,
                        sementara bagian luar memiliki lapisan tepung yang tipis namun tetap lembut.</p>

                    <p>Cita rasa mendoan sangat khas, dengan perpaduan gurih dari tempe, aroma wangi dari daun bawang dan
                        bumbu rempah seperti ketumbar, bawang putih, dan kadang ditambahkan kencur. Tempe yang digunakan
                        untuk mendoan biasanya memiliki bentuk yang lebih tipis dan lebar dibandingkan tempe biasa, yang di
                        Banyumas dikenal dengan istilah "tempe dobel" (tempe berlapis dua). Karena proses penggorengan yang
                        singkat, mendoan memiliki tekstur yang lebih lembut dan lembab dibandingkan dengan tempe goreng pada
                        umumnya.</p>

                    <p>Di Banyumas, mendoan telah menjadi identitas kuliner yang kuat dan diakui sebagai Warisan Budaya Tak
                        Benda Indonesia. Makanan ini bisa ditemui di berbagai tempat, dari warung kecil di pinggir jalan
                        hingga restoran. Mendoan biasanya disajikan dengan cabai rawit atau sambal kecap sebagai pelengkap.
                        Makanan ini menjadi camilan favorit saat hujan, pendamping minum teh atau kopi di sore hari, dan
                        juga sering hadir sebagai lauk dalam hidangan utama.</p>
                </div>
            </section>

            <!-- History -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Sejarah</h2>
                <div class="lead">
                    <p>Sejarah mendoan berkaitan erat dengan masuknya kedelai ke Indonesia. Tempe sendiri mulai dikenal di
                        Indonesia sekitar abad ke-16, ketika migrasi dari Asia Tengah membawa kedelai ke Asia Tenggara.
                        Kemudian, kreativitas masyarakat Banyumas mengolah tempe dengan cara unik melahirkan kuliner yang
                        kini dikenal sebagai mendoan. Konon, mendoan sudah ada sejak lebih dari satu abad lalu, berkembang
                        bersamaan dengan populernya tempe sebagai sumber protein nabati di masyarakat.</p>

                    <div class="alert alert-info my-4">
                        <p class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Secara komersial, mendoan mulai dijual secara luas di Banyumas sejak tahun 1960-an. Kala itu,
                            mendoan menjadi makanan sederhana namun mengenyangkan yang digemari oleh masyarakat dari
                            berbagai kalangan. Keunikan cara memasaknya yang setengah matang menjadi pembeda mendoan dari
                            olahan tempe lainnya di Indonesia. Kata "mendoan" sendiri mencerminkan filosofi masyarakat
                            Banyumas yang luwes dan tidak kaku, karena "mendo" berarti lembek atau tidak keras.</p>
                    </div>

                    <p>Pada tanggal 30 Oktober 2021, mendoan resmi ditetapkan sebagai Warisan Budaya Tak Benda Indonesia
                        oleh Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi. Pengakuan ini semakin menegaskan
                        posisi mendoan sebagai aset kuliner nasional yang berakar kuat dari tradisi Banyumas. Selain nilai
                        kulinernya, mendoan juga memiliki makna sosial dan budaya bagi masyarakat Banyumas. Proses memakan
                        mendoan yang biasanya dilakukan bersama-sama melambangkan kebersamaan dan kehangatan, menjadikannya
                        lebih dari sekadar makanan, tetapi juga simbol interaksi sosial dan keramahtamahan.</p>
                </div>
            </section>

            <!-- Ingredients and Preparation -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Bahan dan Cara Pembuatan</h2>
                <div class="lead">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h3 class="h5 fw-bold">Bahan Utama</h3>
                            <ul>
                                <li>10 lembar tempe khusus mendoan (tipis dan lebar)</li>
                                <li>250 gram tepung terigu</li>
                                <li>100 gram tepung beras</li>
                                <li>2 batang daun bawang, iris halus</li>
                                <li>Minyak untuk menggoreng</li>
                                <li>Air secukupnya</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3 class="h5 fw-bold">Bumbu Halus</h3>
                            <ul>
                                <li>5 siung bawang putih</li>
                                <li>3 cm kunyit</li>
                                <li>2 sendok teh ketumbar</li>
                                <li>1 cm kencur (opsional, untuk rasa lebih autentik)</li>
                                <li>1 sendok teh garam</li>
                                <li>1/2 sendok teh kaldu bubuk (opsional)</li>
                            </ul>
                        </div>
                    </div>

                    <h3 class="h5 fw-bold">Cara Membuat</h3>
                    <ol>
                        <li>Campurkan tepung terigu dan tepung beras dalam sebuah wadah besar, aduk rata.</li>
                        <li>Tambahkan bumbu halus ke dalam campuran tepung, aduk hingga tercampur merata.</li>
                        <li>Tuangkan air sedikit demi sedikit sambil terus diaduk hingga terbentuk adonan yang tidak terlalu
                            kental dan tidak terlalu encer. Konsistensinya harus cukup kental untuk menempel pada tempe
                            tetapi cukup encer untuk menghasilkan lapisan tipis.</li>
                        <li>Masukkan irisan daun bawang ke dalam adonan, aduk rata.</li>
                        <li>Panaskan minyak dalam wajan dengan api sedang hingga cukup panas. Perlu diingat, jumlah minyak
                            harus cukup banyak agar mendoan terendam saat digoreng.</li>
                        <li>Celupkan lembar tempe ke dalam adonan tepung hingga seluruh permukaannya terlapisi.</li>
                        <li>Goreng tempe dalam minyak panas dengan waktu yang singkat, hanya sekitar 1-2 menit atau hingga
                            warnanya berubah menjadi kuning keemasan tetapi bagian dalam masih lembut. Inilah kunci utama
                            mendoan yang autentik - penggorengan yang tidak terlalu lama.</li>
                        <li>Angkat dan tiriskan mendoan, lalu sajikan selagi hangat dengan pelengkap sambal atau cabai
                            rawit.</li>
                    </ol>

                    <div class="alert alert-warning my-4">
                        <p class="mb-0"><i class="bi bi-lightbulb-fill me-2"></i><strong>Tip:</strong> Kunci utama membuat mendoan yang autentik terletak pada dua hal: adonan
                            tepung yang tepat dan waktu penggorengan yang singkat. Adonan tidak boleh terlalu kental agar
                            tidak menghasilkan lapisan tepung yang tebal. Sementara itu, penggorengan yang terlalu lama akan
                            membuat mendoan kehilangan karakteristik "mendo" atau lembek yang menjadi ciri khasnya.
                            Tambahkan sedikit kencur dalam bumbu halus untuk mendapatkan aroma khas mendoan Banyumas yang
                            lebih autentik.</p>
                    </div>
                </div>
            </section>

            <!-- Variations -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Variasi</h2>
                <div class="lead">
                    <p>Meskipun mendoan dari Banyumas memiliki karakteristik yang khas, seiring perkembangan waktu, terdapat
                        beberapa variasi yang bisa ditemui:</p>

                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5 fw-bold">Mendoan Tradisional</h3>
                                    <p class="card-text">Versi autentik dari Banyumas dengan tekstur yang lembut dan setengah matang, digoreng dalam
                                        waktu singkat untuk mempertahankan kelembaban di bagian dalam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5 fw-bold">Mendoan Krispi</h3>
                                    <p class="card-text">Variasi yang digoreng lebih lama hingga bagian luarnya lebih renyah, lebih cocok bagi mereka
                                        yang menyukai tekstur garing pada gorengan tempe.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5 fw-bold">Mendoan Kunyit</h3>
                                    <p class="card-text">Variasi dengan penambahan kunyit yang lebih banyak, menghasilkan warna kuning yang lebih
                                        cerah dan aroma rempah yang lebih kuat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5 fw-bold">Sushi Mendoan</h3>
                                    <p class="card-text">Kreasi modern di mana mendoan digulung dengan nasi dan bahan lain seperti sayuran atau
                                        daging, menggabungkan cita rasa tradisional dengan presentasi internasional.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5 fw-bold">Mendoan Isi</h3>
                                    <p class="card-text">Variasi dimana tempe dibelah dan diisi dengan bahan lain seperti sambal oncom atau tahu
                                        sebelum dicelup ke dalam adonan tepung dan digoreng.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Selain variasi dalam cara pengolahan, terdapat juga perbedaan mendoan berdasarkan daerah. Mendoan
                        dari Banyumas cenderung memiliki aroma rempah yang khas karena penggunaan kencur, sementara di
                        daerah lain di Jawa Tengah, kencur mungkin tidak digunakan atau digantikan dengan bumbu lain.
                        Ketebalan adonan tepung juga bisa berbeda-beda, dengan beberapa tempat lebih menyukai lapisan tepung
                        yang lebih tebal sementara yang lain lebih tipis.</p>
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
                                    <h5 class="card-title"><i class="bi bi-1-circle-fill text-success me-2"></i>Sajikan Hangat</h5>
                                    <p class="card-text">Mendoan paling nikmat dinikmati selagi hangat, langsung setelah digoreng. Jangan biarkan terlalu lama karena tekstur khasnya akan berubah saat sudah dingin. Jika harus dipanaskan kembali, lebih baik dipanaskan dengan cara mengukus agar tidak menjadi terlalu kering.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-2-circle-fill text-success me-2"></i>Pendamping Autentik</h5>
                                    <p class="card-text">Cara tradisional menikmati mendoan di Banyumas adalah dengan cabai rawit yang dimakan langsung atau sambal kecap yang dibuat dari kecap manis, potongan cabai rawit, dan sedikit jeruk limau. Cobalah menikmati mendoan dengan kedua pendamping ini untuk pengalaman autentik.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-3-circle-fill text-success me-2"></i>Kombinasi Makanan</h5>
                                    <p class="card-text">Mendoan juga bisa dinikmati sebagai pendamping makanan berkuah seperti soto atau bakso. Kelembutan mendoan memberikan kontras tekstur yang menarik dengan kuah yang gurih, menciptakan kombinasi rasa yang harmonis.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-4-circle-fill text-success me-2"></i>Momen Tepat</h5>
                                    <p class="card-text">Di Purwokerto, mendoan sering dinikmati pada sore hari saat hujan, ditemani dengan secangkir teh atau kopi. Kombinasi ini sangat populer dan telah menjadi rutinitas wajib bagi banyak warga lokal, menciptakan momen kehangatan di tengah cuaca dingin.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-5-circle-fill text-success me-2"></i>Tempat Terbaik</h5>
                                    <p class="card-text">Untuk mencicipi mendoan paling autentik di Banyumas, kunjungi warung-warung lokal seperti Warung Ripah, Sawangan, Mendoan Gang Kecil, dan Roda Mas yang telah lama dikenal dengan mendoan berkualitas tinggi. Mendoan terbaik seringkali ditemukan di tempat sederhana yang telah menjaga resep tradisional selama bertahun-tahun.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </article>
    </div>
@endsection
