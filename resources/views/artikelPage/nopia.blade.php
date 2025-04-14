@extends('layouts.index')

@section('title', 'Nopia - Kue Tradisional Legendaris Khas Banyumas')

@section('content')
    <div class="container py-5">
        <article>
            <!-- Header -->
            <header class="mb-5">
                <h1 class="fw-bold text-center mb-4 judul">Nopia: Kuliner Tradisional Khas Banyumas</h1>
                <div class="text-center" style="width: 100%; height: 500px;">
                    <img src="https://dolanbanyumas.banyumaskab.go.id/assets/gambar_objek/nopia.JPG"
                        alt="Nopia Banyumas" class="img-fluid rounded shadow-sm" style="width: 100%; height: 100%; object-fit: cover;">
                    <p class="text-muted fst-italic">Nopia - Kue tradisional khas Banyumas</p>
                </div>
            </header>

            <!-- Introduction -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Penjelasan</h2>
                <div class="lead">
                    <p>Nopia adalah kue tradisional khas Banyumas yang terbuat dari adonan tepung terigu dengan isian gula
                        merah (gula jawa). Bentuknya bulat atau lonjong seperti telur kecil dengan diameter sekitar 3-4 cm.
                        Kue ini memiliki tekstur kulit yang khas, sedikit keras di bagian luar namun tetap lembut di bagian
                        dalam, dengan isian yang manis dan lembut. Nopia sering dibandingkan dengan Bakpia dari Yogyakarta,
                        namun memiliki ciri khas tersendiri dalam tekstur, rasa, dan metode pembuatannya.</p>

                    <p>Cita rasa Nopia sangat khas, dengan perpaduan manis dari isian gula merah yang meluncur di lidah saat
                        digigit. Tekstur kulitnya yang unik merupakan hasil dari metode pemanggangan tradisional menggunakan
                        tungku tanah liat. Seiring perkembangan zaman, Nopia kini hadir dalam berbagai varian rasa, meskipun
                        yang paling autentik tetaplah varian dengan isian gula merah khas Banyumas.</p>

                    <p>Di Banyumas, Nopia telah menjadi identitas kuliner yang kuat dan sering dijadikan oleh-oleh bagi para
                        wisatawan. Sentra produksi Nopia terdapat di Kampoeng Nopia Mino di Desa Pekunden, Kecamatan
                        Banyumas. Kue ini memiliki daya tahan yang cukup lama, sehingga cocok dibawa sebagai buah tangan.
                        Harganya bervariasi, mulai dari Rp 10.000 hingga Rp 25.000 per kemasan, tergantung pada ukuran dan
                        merek produsen.</p>
                </div>
            </section>

            <!-- History -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Sejarah</h2>
                <div class="lead">
                    <p>Sejarah Nopia berkaitan erat dengan masuknya kuliner Tionghoa ke Indonesia. Nopia pertama kali
                        dipopulerkan oleh keluarga keturunan Tionghoa yang tinggal di Banyumas sekitar tahun 1880. Pada
                        awalnya, kue ini menggunakan isian yang berbeda, namun seiring berjalannya waktu, terjadi adaptasi
                        dengan menggunakan bahan lokal seperti gula merah atau gula kelapa yang melimpah di wilayah
                        Banyumas.</p>

                    <div class="alert alert-info my-4">
                        <p class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Menariknya, produksi Nopia tidak hanya dimonopoli oleh satu kelompok etnis saja. Berkat cita
                            rasanya yang diterima oleh berbagai kalangan masyarakat, Nopia berkembang menjadi makanan yang
                            menyatukan berbagai lapisan sosial. Tahun 1880 menjadi rujukan awal ketika Nopia dikenal luas
                            oleh publik dari semua kalangan, dan sejak saat itu Nopia terus berkembang menjadi salah satu
                            ikon kuliner Banyumas.</p>
                    </div>

                    <p>Seiring perkembangannya, Desa Pekunden di Kecamatan Banyumas menjadi sentra produksi Nopia yang
                        terkenal. Di sana berkembang Kampoeng Nopia Mino, sebuah kawasan yang menjadi pusat pembuatan dan
                        penjualan Nopia secara tradisional. Kampoeng ini tidak hanya menjadi tempat produksi, tetapi juga
                        destinasi wisata kuliner yang menarik bagi wisatawan yang ingin melihat langsung proses pembuatan
                        Nopia secara tradisional. Keberadaan Kampoeng Nopia Mino membantu melestarikan tradisi pembuatan
                        Nopia yang telah berlangsung selama lebih dari satu abad.</p>
                </div>
            </section>

            <!-- Ingredients and Preparation -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Bahan dan Cara Pembuatan</h2>
                <div class="lead">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header text-white bg-secondary">
                                    <h5 class="mb-0">Bahan Kulit</h5>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li>500 gram tepung terigu</li>
                                        <li>100 gram margarin atau mentega</li>
                                        <li>50 gram gula pasir</li>
                                        <li>1/2 sendok teh garam</li>
                                        <li>1/2 sendok teh vanili</li>
                                        <li>Air secukupnya</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header text-white bg-secondary">
                                    <h5 class="mb-0">Bahan Isian</h5>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li>250 gram gula merah/gula jawa, sisir halus</li>
                                        <li>50 gram tepung terigu yang telah disangrai</li>
                                        <li>50 gram margarin</li>
                                        <li>1/4 sendok teh garam</li>
                                        <li>Air secukupnya (jika diperlukan)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="h4 mb-3">Cara Membuat</h3>
                    <ol class="list-group list-group-numbered mb-4">
                        <li class="list-group-item">Persiapan isian: Campurkan gula merah yang telah disisir dengan margarin, aduk rata. Tambahkan
                            tepung terigu sangrai sedikit demi sedikit sambil terus diaduk hingga tercampur rata dan
                            membentuk adonan yang bisa dibentuk. Jika terlalu kering, tambahkan sedikit air. Sisihkan.</li>
                        <li class="list-group-item">Persiapan kulit: Campurkan tepung terigu, gula pasir, garam, dan vanili dalam wadah. Tambahkan
                            margarin, aduk hingga berbentuk seperti pasir. Tuangkan air sedikit demi sedikit sambil diuleni
                            hingga terbentuk adonan yang kalis dan tidak lengket.</li>
                        <li class="list-group-item">Diamkan adonan kulit selama sekitar 15-30 menit dan tutup dengan kain bersih agar tidak kering.
                        </li>
                        <li class="list-group-item">Setelah didiamkan, bagi adonan kulit menjadi beberapa bagian kecil dengan berat sekitar 20-25
                            gram. Bentuk menjadi bulatan, kemudian pipihkan.</li>
                        <li class="list-group-item">Ambil sedikit adonan isian (sekitar 10 gram), bentuk bulat, dan letakkan di tengah adonan kulit
                            yang sudah dipipihkan. Tutup dan bentuk kembali menjadi bulat atau lonjong seperti telur kecil.
                        </li>
                        <li class="list-group-item">Secara tradisional, Nopia dipanggang dengan cara ditempelkan di dinding dalam tungku tanah liat
                            yang sudah dipanaskan dengan bara api. Namun, di rumah bisa dipanggang dalam oven dengan suhu
                            160-170°C selama sekitar 15-20 menit atau hingga permukaannya berwarna kecokelatan.</li>
                        <li class="list-group-item">Dinginkan Nopia yang sudah matang sebelum dikemas atau disajikan.</li>
                    </ol>

                    <div class="alert alert-warning">
                        <p class="mb-0"><i class="bi bi-lightbulb-fill me-2"></i><strong>Tip:</strong> Kunci kesuksesan membuat Nopia terletak pada konsistensi adonan kulit dan
                            isian. Adonan kulit harus kalis namun tidak terlalu keras, sementara isian tidak boleh terlalu
                            basah atau terlalu kering. Metode pemanggangan tradisional dengan tungku tanah liat memberikan
                            cita rasa yang lebih autentik, namun oven modern tetap bisa menghasilkan Nopia yang lezat
                            asalkan suhu dan waktu pemanggangan diperhatikan dengan baik.</p>
                    </div>
                </div>
            </section>

            <!-- Variations -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Variasi</h2>
                <div class="lead">
                    <p>Seiring perkembangan zaman, Nopia hadir dalam berbagai variasi untuk memenuhi selera konsumen yang
                        beragam:</p>

                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5">Nopia Gula Jawa</h3>
                                    <p class="card-text">Varian original dan paling tradisional dengan isian gula merah khas Banyumas, memberikan rasa
                                        manis yang alami dan aroma khas.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5">Nopia Cokelat</h3>
                                    <p class="card-text">Inovasi modern dengan isian cokelat yang lebih disukai anak muda, menghasilkan perpaduan
                                        tekstur kulit khas Nopia dengan kelezatan cokelat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5">Nopia Durian</h3>
                                    <p class="card-text">Varian dengan isian pasta durian yang memberikan aroma khas dan rasa eksotis, menjadi favorit
                                        bagi pecinta buah durian.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5">Nopia Nanas</h3>
                                    <p class="card-text">Menggunakan isian selai nanas yang memberikan sensasi segar dan sedikit asam, menciptakan
                                        keseimbangan rasa dengan kulit yang cenderung netral.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title h5">Mino (Mini Nopia)</h3>
                                    <p class="card-text">Versi lebih kecil dari Nopia tradisional, berukuran sekitar separuh dari Nopia biasa, populer
                                        sebagai camilan ringan dan lebih praktis.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Selain variasi rasa, terdapat juga perbedaan dalam cara pengolahan dan pengemasan Nopia. Beberapa
                        produsen mempertahankan metode tradisional dengan tungku tanah liat, sementara yang lain mengadopsi
                        teknologi oven modern untuk produksi massal. Meski demikian, varian Nopia Gula Jawa tetap menjadi
                        yang paling digemari dan dianggap sebagai varian paling autentik yang mencerminkan cita rasa
                        tradisional Banyumas.</p>
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
                                    <p class="card-text">Nopia paling nikmat dinikmati dengan secangkir teh hangat atau kopi. Rasa manis dan tekstur
                                        khasnya menciptakan kombinasi yang sempurna dengan minuman hangat, terutama saat santai di
                                        sore hari.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-2-circle-fill text-success me-2"></i>Paduan Minuman</h5>
                                    <p class="card-text">Sajikan nopia dengan teh atau kopi hitam tanpa gula untuk menyeimbangkan rasa manis
                                        dari nopia. Kombinasi ini menjadi paduan sempurna untuk camilan sore hari.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-3-circle-fill text-success me-2"></i>Penyimpanan</h5>
                                    <p class="card-text">Nopia memiliki daya tahan yang cukup lama, bisa mencapai beberapa minggu jika disimpan dengan
                                        baik dalam wadah kedap udara. Namun, untuk menikmati cita rasa terbaiknya, sebaiknya
                                        dikonsumsi dalam 1-2 minggu setelah pembuatan.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-4-circle-fill text-success me-2"></i>Memilih Oleh-oleh</h5>
                                    <p class="card-text">Beberapa merek Nopia terkenal di Banyumas antara lain Nopia Narwan, Nopia Dua Jago, dan Nopia
                                        Bintang Jaya. Pilih yang baru dibuat dan dikemas dengan baik untuk mendapatkan kualitas terbaik.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-5-circle-fill text-success me-2"></i>Kunjungan ke Banyumas</h5>
                                    <p class="card-text">Saat berkunjung ke Banyumas, kunjungi langsung Kampoeng Nopia Mino di Desa Pekunden,
                                        Kecamatan Banyumas. Di sana Anda bisa menikmati Nopia yang masih hangat dan melihat langsung
                                        proses pembuatannya yang tradisional.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </article>
    </div>
@endsection
