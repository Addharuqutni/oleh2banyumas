@extends('layouts.index')

@section('title', 'Keripik Tempe - Camilan Gurih Khas Banyumas')

@section('content')
    <div class="container py-3">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none">Artikel</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Keripik Tempe</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="fw-bold mb-4 text-center">Keripik Tempe: Camilan Renyah Khas Banyumas</h1>

                <div class="mb-4 text-center">
                    <img src="https://thumb.viva.id/intipseleb/375x211/2022/05/19/6286511789855-cara-membuat-keripik-tempe.jpg"
                        alt="Keripik Tempe Banyumas" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Apa itu Keripik Tempe Banyumas?</h2>
                    <p>Keripik Tempe Banyumas adalah makanan ringan yang terbuat dari tempe yang diiris tipis kemudian dibalut dengan adonan tepung berbumbu dan digoreng hingga renyah. Berbeda dengan keripik tempe dari daerah lain, keripik tempe khas Banyumas memiliki ciri khas berupa irisan yang sangat tipis dan rasa bumbu yang lebih kompleks dengan perpaduan rempah-rempah tradisional.</p>
                    <p>Keripik tempe Banyumas memiliki tekstur yang sangat renyah dan gurih dengan cita rasa yang khas. Warnanya kecoklatan keemasan dengan aroma yang menggugah selera. Keripik ini biasanya tersedia dalam beberapa varian rasa, mulai dari original, pedas, hingga manis gurih, meskipun versi original tetap menjadi favorit banyak orang.</p>
                    <p>Di Banyumas, keripik tempe menjadi salah satu oleh-oleh populer yang banyak dicari wisatawan. Harganya bervariasi mulai dari Rp 15.000 hingga Rp 30.000 per bungkus, tergantung ukuran dan produsennya. Keripik tempe Banyumas memiliki daya tahan yang cukup lama, bisa mencapai 1-2 bulan jika disimpan dalam wadah kedap udara dan terhindar dari kelembaban.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Sejarah Keripik Tempe di Banyumas</h2>
                    <p>Sejarah keripik tempe di Banyumas tidak terlepas dari keberadaan tempe sebagai makanan yang telah lama dikenal di tanah Jawa. Tempe sendiri merupakan makanan fermentasi kedelai yang sudah ada di Jawa sejak berabad-abad lalu. Sementara pengolahan tempe menjadi keripik diperkirakan mulai berkembang di Banyumas sekitar tahun 1970-an.</p>
                    <p>Awalnya, keripik tempe hanya dibuat sebagai cara untuk mengawetkan tempe yang merupakan makanan yang cepat rusak. Para ibu rumah tangga di Banyumas kemudian mengembangkan resep keripik tempe dengan bumbu-bumbu khas yang menjadikannya berbeda dari keripik tempe daerah lain. Keunikan keripik tempe Banyumas terletak pada ketipisan irisannya dan penggunaan bumbu tradisional seperti ketumbar, bawang putih, dan kemiri yang memberikan cita rasa gurih yang khas.</p>
                    <p>Seiring berjalannya waktu, keripik tempe Banyumas mulai diproduksi secara komersial oleh industri rumahan dan berkembang menjadi salah satu produk unggulan UMKM di Banyumas. Perkembangan pariwisata di daerah Banyumas juga turut meningkatkan popularitas keripik tempe sebagai oleh-oleh khas yang wajib dibawa pulang oleh wisatawan.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Bahan dan Cara Pembuatan</h2>
                    <p>Pembuatan keripik tempe Banyumas membutuhkan ketelitian terutama dalam proses pengirisan dan penggorengan. Berikut adalah tahapan pembuatannya:</p>

                    <ol class="mb-4">
                        <li class="mb-2">Persiapan tempe: Tempe yang digunakan harus berkualitas baik dan padat. Tempe diiris sangat tipis dengan ketebalan sekitar 1-2 mm, biasanya menggunakan alat pemotong khusus untuk mendapatkan ketebalan yang seragam.</li>
                        <li class="mb-2">Pembuatan bumbu: Bumbu dasar terdiri dari bawang putih, ketumbar, kemiri, garam, dan sedikit gula yang dihaluskan hingga benar-benar halus.</li>
                        <li class="mb-2">Pembuatan adonan tepung: Tepung beras dan tepung tapioka dicampur dengan bumbu halus dan air secukupnya hingga membentuk adonan yang tidak terlalu kental dan tidak terlalu encer.</li>
                        <li class="mb-2">Pelapisan tempe: Irisan tempe dicelupkan ke dalam adonan tepung berbumbu hingga seluruh permukaan terlapisi rata.</li>
                        <li class="mb-2">Penggorengan: Tempe yang sudah dilapisi adonan digoreng dalam minyak panas dengan api sedang hingga berwarna kecoklatan dan renyah.</li>
                        <li class="mb-2">Penirisan dan pendinginan: Keripik tempe yang sudah matang ditiriskan dan didinginkan sebelum dikemas untuk memastikan teksturnya tetap renyah.</li>
                    </ol>

                    <p>Kunci utama dalam pembuatan keripik tempe Banyumas yang berkualitas adalah ketipisan irisan tempe, kualitas bumbu, dan teknik penggorengan yang tepat. Minyak yang digunakan harus banyak (deep frying) dan panas merata agar keripik matang sempurna dan renyah. Beberapa produsen juga menambahkan daun jeruk purut atau serai pada minyak goreng untuk memberikan aroma yang lebih harum pada keripik tempe.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Variasi Keripik Tempe Banyumas</h2>
                    <p>Seiring perkembangan selera konsumen, keripik tempe Banyumas kini hadir dalam beberapa varian:</p>
                    <ul class="mb-4">
                        <li>Keripik Tempe Original: Dengan bumbu tradisional yang gurih dan aroma rempah yang khas.</li>
                        <li>Keripik Tempe Pedas: Ditambahkan cabai dalam adonan tepungnya sehingga memiliki rasa pedas yang menggugah selera.</li>
                        <li>Keripik Tempe Manis: Ditambahkan gula lebih banyak dalam adonan untuk menciptakan rasa manis gurih.</li>
                        <li>Keripik Tempe Balado: Setelah digoreng, keripik tempe ditaburi atau dibalut dengan bumbu balado yang pedas.</li>
                        <li>Keripik Tempe BBQ: Variasi modern dengan tambahan bumbu barbecue yang memiliki rasa asam manis.</li>
                    </ul>
                    <p>Meskipun tersedia berbagai variasi, keripik tempe original tetap menjadi yang paling digemari karena mampu mempertahankan cita rasa asli tempe yang dipadukan dengan bumbu tradisional khas Banyumas.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Nilai Gizi dan Manfaat</h2>
                    <p>Sebagai makanan yang terbuat dari tempe, keripik tempe Banyumas memiliki kandungan nutrisi sebagai berikut (dalam perkiraan per 100 gram):</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Kalori: 450-500 kkal</li>
                                        <li>Karbohidrat: 40-45 gram</li>
                                        <li>Protein: 15-20 gram</li>
                                        <li>Lemak: 25-30 gram</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Serat: 3-5 gram</li>
                                        <li>Kalsium: 100-120 mg</li>
                                        <li>Zat Besi: 2-3 mg</li>
                                        <li>Vitamin B12: 0.8-1.0 mcg</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Meskipun keripik tempe mengalami proses penggorengan yang menambah kandungan lemak, namun bahan dasarnya yaitu tempe tetap menyumbangkan nilai gizi yang baik. Tempe merupakan sumber protein nabati yang baik dan mengandung isoflavon yang bermanfaat bagi kesehatan. Namun, karena proses penggorengan, keripik tempe sebaiknya dikonsumsi secukupnya, terutama bagi mereka yang sedang menjaga asupan lemak dan kalori.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Tips Menikmati dan Menyimpan Keripik Tempe</h2>
                    <p>Untuk mendapatkan pengalaman terbaik saat menikmati keripik tempe Banyumas:</p>
                    <ul class="mb-4">
                        <li>Keripik tempe paling nikmat dinikmati dalam keadaan segar dan renyah, segera setelah dibuka dari kemasannya.</li>
                        <li>Untuk menjaga kerenyahan, simpan keripik tempe dalam wadah kedap udara setelah kemasan dibuka.</li>
                        <li>Hindari menyimpan keripik tempe di tempat yang lembab karena akan mempercepat kelembaban dan mengurangi kerenyahannya.</li>
                        <li>Jika keripik tempe sudah mulai melempem, Anda bisa mengembalikan kerenyahannya dengan cara memanaskannya sebentar di oven atau microwave.</li>
                        <li>Keripik tempe bisa menjadi camilan pendamping saat bersantai, teman makan nasi, atau sebagai topping untuk hidangan seperti gado-gado atau pecel.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
