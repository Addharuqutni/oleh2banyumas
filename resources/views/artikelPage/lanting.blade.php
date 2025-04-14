@extends('layouts.index')

@section('title', 'Lanting - Camilan Tradisional Khas Banyumas')

@section('content')
    <div class="container py-5">
        <article>
            <!-- Header -->
            <header class="mb-5">
                <h1 class="fw-bold text-center mb-4 judul">Lanting: Kuliner Tradisional Khas Banyumas</h1>
                <div class="text-center" style="width: 100%; height: 500px;">
                    <img src="https://radarbanyumas.disway.id/upload/fb90d540edccdbd9ddbec97968628571.jpg"
                        alt="Lanting Banyumas" class="img-fluid rounded shadow-sm" style="width: 100%; height: 100%; object-fit: cover;">
                    <p class="text-muted fst-italic">Lanting - Camilan renyah khas Banyumas</p>
                </div>
            </header>

            <!-- Introduction -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Penjelasan</h2>
                <div class="lead">
                    <p>Lanting, yang juga sering disebut Klanting, adalah makanan tradisional khas Banyumas yang terbuat
                        dari singkong yang diolah menjadi camilan renyah dan gurih. Camilan ini berbentuk bulat seperti
                        cincin atau angka 8, dengan tekstur renyah di luar dan sedikit kenyal di dalam. Lanting dibuat dari
                        bahan dasar singkong pilihan yang diparut atau dihaluskan, dicampur dengan bumbu, dibentuk,
                        dikeringkan, dan kemudian digoreng hingga berwarna kuning kecokelatan.</p>

                    <p>Cita rasa Lanting Banyumas sangat khas, dengan dominasi rasa gurih dari singkong yang dipadu dengan
                        bumbu-bumbu tradisional. Teksturnya yang renyah dan tidak mudah melempem menjadikan Lanting digemari
                        sebagai camilan sehari-hari maupun oleh-oleh khas Banyumas. Dalam perkembangannya, Lanting kini
                        hadir dalam berbagai varian rasa, mulai dari original, pedas, keju, hingga jagung manis yang semakin
                        memperkaya pilihan bagi penikmatnya.</p>

                    <p>Di Banyumas, Lanting telah menjadi bagian dari identitas kuliner lokal dan sering dijadikan sebagai
                        buah tangan. Camilan tradisional ini bisa dengan mudah ditemukan di pasar tradisional, toko
                        oleh-oleh, bahkan warung-warung kecil di berbagai sudut kota. Harganya sangat terjangkau, berkisar
                        antara Rp 10.000 hingga Rp 25.000 per kemasan, menjadikannya oleh-oleh yang ekonomis namun tetap
                        memiliki cita rasa autentik Banyumas.</p>
                </div>
            </section>

            <!-- History -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Sejarah</h2>
                <div class="lead">
                    <p>Sejarah Lanting memiliki beberapa versi cerita yang berbeda. Salah satu versi menyebutkan bahwa asal
                        mula Lanting bermula dari Kecamatan Kuwarasan di Kebumen, yang berbatasan dengan Banyumas. Sebanyak
                        111 desa di kecamatan ini memiliki industri Lanting kecil, yang kemudian menyebar ke wilayah
                        Banyumas dan sekitarnya. Sebagai makanan tradisional, Lanting telah menjadi bagian dari budaya
                        kuliner masyarakat Jawa Tengah selama beberapa generasi.</p>

                    <div class="alert alert-info my-4">
                        <p class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Ada cerita menarik tentang asal nama "Lanting". Konon, nama ini berasal dari masa kolonial
                            Belanda, ketika ada orang asing yang terkagum-kagum dengan kepandaian orang-orang di wilayah
                            tersebut dalam membuat makanan dari singkong. Mereka menyebut wilayah ini sebagai "Land Think"
                            (tanah pemikir), yang kemudian dalam pelafalan lokal berubah menjadi "Lanting". Meski sulit
                            diverifikasi, cerita ini telah menjadi bagian dari folklor lanting yang diturunkan dari generasi
                            ke generasi.</p>
                    </div>

                    <p>Lanting awalnya dibuat sebagai upaya untuk memanfaatkan singkong yang melimpah di daerah Banyumas dan
                        sekitarnya. Kemampuan singkong untuk tumbuh di berbagai kondisi tanah menjadikannya bahan pangan
                        yang mudah didapat. Melalui proses pengolahan yang kreatif, singkong yang relatif hambar diubah
                        menjadi camilan gurih yang tahan lama. Proses pembuatan yang membutuhkan kesabaran dan ketelatenan
                        menjadikan Lanting lebih dari sekadar makanan, tetapi juga sebagai wujud kearifan lokal dalam
                        mengolah sumber daya alam yang tersedia.</p>
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
                                        1 kg singkong segar, pilih yang tidak terlalu tua
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1 sendok teh garam
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        Air secukupnya untuk merebus
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
                                <h5 class="mb-0">Bumbu</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        3-4 siung bawang putih, haluskan
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1 sendok teh ketumbar bubuk
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1/2 sendok teh merica bubuk (opsional)
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1/2 sendok teh kaldu bubuk (opsional)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header text-white bg-secondary">
                        <h5 class="mb-0">Cara Membuat</h5>
                    </div>
                    <div class="card-body">
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item">Kupas singkong, cuci bersih, dan potong-potong. Rendam dalam air bersih selama sekitar 1 jam
                                untuk mengurangi kandungan HCN.</li>
                            <li class="list-group-item">Rebus atau kukus singkong hingga empuk tetapi jangan terlalu lunak. Angkat dan tiriskan,
                                kemudian buang serat kayu yang ada di tengah singkong.</li>
                            <li class="list-group-item">Selagi masih hangat, tumbuk atau haluskan singkong hingga menjadi adonan yang lembut dan kalis.</li>
                            <li class="list-group-item">Campurkan bumbu-bumbu yang telah dihaluskan ke dalam adonan singkong. Aduk hingga rata.</li>
                            <li class="list-group-item">Ambil sedikit adonan, bentuk menjadi bulatan kecil kemudian pilin menjadi bentuk tali. Satukan
                                kedua ujungnya hingga membentuk cincin atau bentuk angka 8 sesuai selera.</li>
                            <li class="list-group-item">Jemur Lanting di bawah sinar matahari langsung selama 1-2 hari hingga benar-benar kering. Proses
                                penjemuran sangat penting untuk mendapatkan tekstur yang renyah.</li>
                            <li class="list-group-item">Setelah kering, goreng Lanting dalam minyak panas dengan api sedang hingga berwarna kuning
                                kecoklatan. Aduk secara perlahan agar matang merata.</li>
                            <li class="list-group-item">Angkat, tiriskan hingga dingin, dan Lanting siap disajikan atau diberi bumbu tambahan sesuai
                                selera.</li>
                        </ol>
                    </div>
                </div>

                <div class="alert alert-warning">
                    <h5 class="alert-heading"><i class="bi bi-lightbulb-fill me-2"></i>Tip:</h5>
                    <p class="mb-0">Kunci utama dalam membuat Lanting yang renyah adalah proses pengeringan
                        yang sempurna sebelum digoreng. Pastikan Lanting benar-benar kering untuk mendapatkan hasil yang
                        optimal. Untuk varian rasa, Anda bisa menambahkan bumbu tabur seperti bumbu balado, bubuk keju,
                        atau gula untuk rasa manis setelah Lanting digoreng dan masih dalam keadaan hangat.</p>
                </div>
            </section>

            <!-- Variations -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Variasi</h2>
                <div class="lead">
                    <p>Meskipun Lanting tradisional Banyumas memiliki cita rasa gurih original, seiring perkembangan zaman,
                        terdapat beberapa variasi yang bisa ditemui:</p>

                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Lanting Original</h5>
                                    <p class="card-text">Versi tradisional dengan cita rasa gurih dan renyah dari perpaduan singkong dan bumbu
                                        sederhana seperti bawang putih dan ketumbar.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Lanting Pedas</h5>
                                    <p class="card-text">Ditambahkan cabai bubuk atau bumbu balado yang memberikan sensasi pedas, sangat cocok bagi
                                        pecinta makanan pedas.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Lanting Keju</h5>
                                    <p class="card-text">Diberi taburan bubuk keju yang memberikan cita rasa gurih dan creamy, menjadi favorit
                                        anak-anak dan kaum milenial.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Lanting Jagung Manis</h5>
                                    <p class="card-text">Varian dengan rasa jagung manis yang memberi sentuhan manis pada lanting, menciptakan
                                        perpaduan manis dan gurih yang unik.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Lanting Getuk</h5>
                                    <p class="card-text">Variasi yang sedikit berbeda dalam proses pembuatan, mirip dengan getuk (makanan dari
                                        singkong yang ditumbuk) namun dikeringkan dan digoreng seperti lanting.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Selain varian rasa, Lanting juga memiliki beragam bentuk. Di Banyumas, Lanting sering berbentuk
                        cincin, sementara di Kebumen lebih dikenal dengan bentuk angka 8. Beberapa produsen juga membuat
                        Lanting dalam bentuk yang lebih kecil atau dengan ketebalan yang berbeda-beda. Variasi bentuk dan
                        ketebalan ini mempengaruhi tekstur dan pengalaman mencicipi Lanting, dengan versi yang lebih tipis
                        cenderung lebih renyah sementara yang lebih tebal memiliki tekstur yang sedikit kenyal di bagian
                        dalam.</p>
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
                                    <h5 class="card-title"><i class="bi bi-1-circle-fill text-success me-2"></i>Dengan Minuman Hangat</h5>
                                    <p class="card-text">Lanting paling nikmat dinikmati sebagai camilan dengan secangkir teh atau kopi hangat.
                                        Kombinasi antara gurihnya Lanting dengan minuman hangat menciptakan harmoni rasa yang
                                        sempurna.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-2-circle-fill text-success me-2"></i>Pendamping Makanan Berkuah</h5>
                                    <p class="card-text">Selain sebagai camilan, Lanting juga bisa disajikan sebagai pendamping menu berkuah seperti
                                        soto atau bakso. Teksturnya yang renyah memberikan dimensi tambahan pada sajian berkuah.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-3-circle-fill text-success me-2"></i>Menjaga Kerenyahan</h5>
                                    <p class="card-text">Untuk menjaga kerenyahan Lanting, simpan dalam wadah kedap udara segera setelah kemasan
                                        dibuka. Jika Lanting mulai melempem, panaskan sebentar dalam oven atau wajan tanpa minyak
                                        untuk mengembalikan kerenyahannya.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-4-circle-fill text-success me-2"></i>Memilih Lanting Berkualitas</h5>
                                    <p class="card-text">Saat membeli Lanting sebagai oleh-oleh, pilihlah yang dikemas dengan baik dan kedap udara.
                                        Lanting berkualitas baik memiliki warna keemasan merata, tekstur renyah, dan tidak
                                        berminyak.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-5-circle-fill text-success me-2"></i>Eksplorasi Varian</h5>
                                    <p class="card-text">Jelajahi berbagai varian rasa Lanting untuk menemukan favorit Anda. Beberapa tempat terkenal
                                        untuk membeli Lanting berkualitas di Banyumas antara lain pasar tradisional di Purwokerto
                                        dan toko oleh-oleh sepanjang jalan utama menuju Sokaraja.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </article>
    </div>
@endsection
