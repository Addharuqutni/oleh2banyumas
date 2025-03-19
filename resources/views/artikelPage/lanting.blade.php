@extends('layouts.index')

@section('title', 'Lanting - Camilan Tradisional Khas Banyumas')

@section('content')
    <div class="container py-3">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none">Artikel</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Lanting</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="fw-bold mb-4 text-center">Lanting: Camilan Renyah Legendaris dari Banyumas</h1>

                <div class="mb-4 text-center">
                    <img src="https://assets.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/indizone/2023/04/17/ersjZ7P/jajanan-lebaran-gurih-oleh-oleh-khas-kebumen-yuk-cobain-lanting44.jpg"
                        alt="Lanting Banyumas" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Apa itu Lanting?</h2>
                    <p>Lanting adalah makanan ringan tradisional khas Banyumas yang terbuat dari singkong yang diparut, dibentuk seperti cincin, kemudian dikeringkan dan digoreng hingga renyah. Camilan ini memiliki tekstur yang keras dan renyah dengan rasa gurih yang khas. Bentuknya yang menyerupai cincin atau gelang dengan diameter sekitar 3-5 cm menjadi ciri khas yang mudah dikenali.</p>
                    <p>Lanting merupakan salah satu camilan favorit masyarakat Banyumas yang biasa dinikmati sebagai teman minum teh atau kopi. Rasanya yang gurih dengan sedikit sentuhan manis alami dari singkong membuat lanting memiliki cita rasa yang unik. Aroma khas singkong yang tercium saat lanting digoreng juga menjadi daya tarik tersendiri.</p>
                    <p>Di Banyumas, khususnya di Kecamatan Sumpiuh, lanting menjadi produk unggulan yang banyak diproduksi oleh industri rumahan. Harga lanting relatif terjangkau, berkisar antara Rp 10.000 hingga Rp 25.000 per bungkus, tergantung ukuran dan kualitasnya. Lanting memiliki daya tahan yang cukup lama, bisa mencapai 2-3 bulan jika disimpan dalam wadah kedap udara.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Sejarah Lanting</h2>
                    <p>Sejarah lanting di Banyumas berkaitan erat dengan melimpahnya hasil panen singkong di daerah tersebut. Konon, lanting pertama kali dibuat pada masa paceklik sekitar tahun 1930-an, ketika masyarakat Banyumas harus memutar otak untuk mengolah singkong menjadi makanan yang tahan lama dan mengenyangkan.</p>
                    <p>Nama "lanting" sendiri dipercaya berasal dari bahasa Jawa "klanting" yang berarti terlempar atau terpental. Ini mungkin merujuk pada proses pembuatannya di mana adonan singkong dibentuk dengan cara diputar-putar hingga membentuk cincin, seolah-olah terlempar dari tangan pembuatnya. Ada juga yang mengatakan bahwa nama lanting terinspirasi dari bentuknya yang menyerupai gelang atau "gelang anting" yang kemudian disingkat menjadi "lanting".</p>
                    <p>Pada awalnya, lanting hanya dibuat untuk konsumsi keluarga atau sebagai camilan saat acara-acara tertentu. Namun seiring berjalannya waktu, lanting mulai diproduksi secara komersial dan menjadi salah satu ikon kuliner Banyumas. Desa Sumpiuh di Kabupaten Banyumas bahkan dikenal sebagai sentra produksi lanting, di mana hampir setiap rumah memproduksi camilan tradisional ini.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Bahan dan Cara Pembuatan</h2>
                    <p>Pembuatan lanting membutuhkan kesabaran dan ketelatenan karena prosesnya yang cukup panjang. Berikut adalah tahapan pembuatannya:</p>

                    <ol class="mb-4">
                        <li class="mb-2">Persiapan bahan: Singkong segar dikupas, dicuci bersih, lalu diparut halus.</li>
                        <li class="mb-2">Pemerasan: Hasil parutan singkong diperas untuk mengurangi kadar airnya. Air perasan tidak dibuang karena akan menghasilkan pati singkong yang berguna untuk adonan.</li>
                        <li class="mb-2">Pembuatan adonan: Singkong parut dicampur dengan pati singkong, garam, bawang putih halus, dan sedikit ketumbar. Adonan kemudian diuleni hingga kalis dan dapat dibentuk.</li>
                        <li class="mb-2">Pembentukan: Adonan diambil secukupnya, dibentuk menjadi bulatan panjang seperti tali, kemudian kedua ujungnya disatukan hingga membentuk cincin.</li>
                        <li class="mb-2">Pengeringan: Lanting yang sudah dibentuk dijemur di bawah sinar matahari selama 1-2 hari hingga benar-benar kering.</li>
                        <li class="mb-2">Penggorengan: Lanting kering digoreng dalam minyak panas hingga berwarna kecoklatan dan renyah.</li>
                        <li class="mb-2">Penirisan dan pendinginan: Lanting yang sudah matang ditiriskan dan didinginkan sebelum dikemas.</li>
                    </ol>

                    <p>Kunci utama dalam pembuatan lanting yang berkualitas adalah perbandingan singkong parut dan pati singkong yang tepat, serta proses pengeringan yang sempurna sebelum digoreng. Pengeringan yang kurang sempurna akan membuat lanting menjadi kurang renyah atau bahkan bisa meledak saat digoreng. Beberapa produsen juga menambahkan daun bawang atau seledri cincang pada adonan untuk memberikan aroma dan rasa yang lebih kaya.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Variasi Lanting</h2>
                    <p>Seiring perkembangan zaman, lanting kini hadir dalam beberapa variasi:</p>
                    <ul class="mb-4">
                        <li>Lanting Original: Dengan bumbu tradisional yang gurih dan aroma bawang yang khas.</li>
                        <li>Lanting Pedas: Ditambahkan cabai dalam adonannya sehingga memiliki rasa pedas yang menggugah selera.</li>
                        <li>Lanting Manis: Ditambahkan gula dalam adonan atau dilapisi dengan gula halus setelah digoreng.</li>
                        <li>Lanting Balado: Setelah digoreng, lanting ditaburi atau dibalut dengan bumbu balado yang pedas.</li>
                        <li>Lanting Keju: Variasi modern di mana lanting ditaburi bubuk keju setelah digoreng.</li>
                    </ul>
                    <p>Meskipun tersedia berbagai variasi, lanting original tetap menjadi yang paling populer karena mampu mempertahankan cita rasa autentik yang telah menjadi tradisi turun-temurun di Banyumas.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Nilai Gizi dan Manfaat</h2>
                    <p>Sebagai makanan berbahan dasar singkong, lanting memiliki kandungan nutrisi sebagai berikut (dalam perkiraan per 100 gram):</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Kalori: 350-400 kkal</li>
                                        <li>Karbohidrat: 60-65 gram</li>
                                        <li>Protein: 1-2 gram</li>
                                        <li>Lemak: 15-20 gram</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Serat: 2-3 gram</li>
                                        <li>Kalsium: 20-30 mg</li>
                                        <li>Zat Besi: 0.5-1 mg</li>
                                        <li>Vitamin C: 15-20 mg</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Meskipun lanting mengalami proses penggorengan yang menambah kandungan lemak, namun bahan dasarnya yaitu singkong tetap menyumbangkan beberapa nutrisi penting. Singkong mengandung pati resisten yang berfungsi seperti serat dan baik untuk pencernaan. Namun, karena proses penggorengan, lanting sebaiknya dikonsumsi secukupnya, terutama bagi mereka yang sedang menjaga asupan lemak dan kalori.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Sentra Produksi Lanting di Banyumas</h2>
                    <p>Banyumas memiliki beberapa daerah yang menjadi sentra produksi lanting, di antaranya:</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Desa Sumpiuh</h5>
                                    <p class="card-text">Dikenal sebagai pusat produksi lanting terbesar di Banyumas. Hampir setiap rumah di desa ini memproduksi lanting dengan resep yang diwariskan secara turun-temurun.</p>
                                    <p class="card-text"><small class="text-muted">Lokasi: Kecamatan Sumpiuh, Kabupaten Banyumas</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Desa Kemranjen</h5>
                                    <p class="card-text">Terkenal dengan lanting yang lebih tipis dan renyah. Para produsen lanting di desa ini juga mulai mengembangkan berbagai varian rasa untuk memenuhi selera konsumen.</p>
                                    <p class="card-text"><small class="text-muted">Lokasi: Kecamatan Kemranjen, Kabupaten Banyumas</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Tips Menikmati dan Menyimpan Lanting</h2>
                    <p>Untuk mendapatkan pengalaman terbaik saat menikmati lanting:</p>
                    <ul class="mb-4">
                        <li>Lanting paling nikmat dinikmati sebagai camilan saat bersantai, ditemani teh atau kopi hangat.</li>
                        <li>Untuk menjaga kerenyahan lanting, simpan dalam wadah kedap udara dan jauhkan dari kelembaban.</li>
                        <li>Jika lanting mulai melempem, Anda bisa mengembalikan kerenyahannya dengan cara memanaskannya sebentar di oven atau microwave.</li>
                        <li>Lanting juga bisa dikreasikan menjadi topping untuk hidangan seperti sup atau bubur untuk menambah tekstur renyah.</li>
                        <li>Lanting bisa bertahan hingga 2-3 bulan jika disimpan dengan baik, menjadikannya oleh-oleh yang praktis untuk dibawa dalam perjalanan jauh.</li>
                    </ul>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Lanting dalam Budaya Banyumas</h2>
                    <p>Lanting tidak hanya sekadar camilan di Banyumas, tetapi juga memiliki nilai budaya yang cukup penting. Dalam berbagai acara adat dan perayaan di Banyumas, lanting sering hadir sebagai salah satu hidangan yang wajib ada. Pada acara hajatan seperti pernikahan atau khitanan, lanting biasanya disajikan sebagai camilan untuk para tamu.</p>
                    <p>Selain itu, proses pembuatan lanting yang membutuhkan kerja sama dan gotong royong juga mencerminkan nilai-nilai sosial masyarakat Banyumas. Saat musim panen singkong tiba, warga biasanya berkumpul untuk membuat lanting bersama-sama, mulai dari memarut singkong hingga menjemur dan menggorengnya.</p>
                    <p>Dalam perkembangannya, lanting juga menjadi salah satu produk unggulan dalam program pemberdayaan ekonomi masyarakat di Banyumas. Berbagai pelatihan dan bantuan untuk meningkatkan kualitas dan pemasaran lanting telah dilakukan oleh pemerintah daerah untuk mendukung UMKM yang bergerak di bidang produksi lanting.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
