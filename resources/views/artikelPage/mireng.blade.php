@extends('layouts.index')

@section('title', 'Mireng - Kuliner Tradisional Khas Banyumas')

@section('content')
    <div class="container py-3">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none">Artikel</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Mireng</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="fw-bold mb-4 text-center">Mireng: Kuliner Tradisional Khas Banyumas yang Nyaris Terlupakan</h1>

                <div class="mb-4 text-center">
                    <img src="https://img-global.cpcdn.com/recipes/90b64d32722fa3b0/1200x630cq70/photo.jpg"
                        alt="Mireng Banyumas" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Apa itu Mireng?</h2>
                    <p>Mireng adalah makanan tradisional khas Banyumas yang terbuat dari beras ketan yang dicampur dengan parutan kelapa dan diberi isian berupa campuran gula merah dan kelapa, kemudian dibungkus dengan daun pisang dan dikukus hingga matang. Makanan ini memiliki bentuk seperti lontong dengan ukuran yang lebih kecil dan pipih, dengan panjang sekitar 7-10 cm.</p>
                    <p>Cita rasa mireng sangat khas, dengan perpaduan antara ketan yang gurih dan isian yang manis legit dari gula merah. Teksturnya kenyal dan lengket khas ketan, sementara isiannya lembut dan manis. Aroma daun pisang yang digunakan sebagai pembungkus juga menambah kekhasan mireng, memberikan aroma alami yang menggugah selera.</p>
                    <p>Di Banyumas, mireng termasuk jajanan tradisional yang mulai langka ditemui. Biasanya mireng dijual di pasar-pasar tradisional atau oleh pedagang keliling di pagi hari. Harganya sangat terjangkau, berkisar antara Rp 2.000 hingga Rp 3.000 per buah. Mireng biasanya dinikmati sebagai sarapan atau camilan di sore hari, seringkali ditemani dengan secangkir teh atau kopi.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Sejarah dan Asal-Usul Mireng</h2>
                    <p>Sejarah mireng di Banyumas memiliki cerita yang menarik dan berkaitan erat dengan kehidupan agraris masyarakat setempat. Konon, mireng sudah ada sejak puluhan tahun lalu dan menjadi salah satu makanan yang biasa dibawa oleh para petani saat bekerja di sawah. Bentuknya yang praktis dan tahan lama menjadikan mireng pilihan yang tepat sebagai bekal.</p>
                    <p>Nama "mireng" sendiri dalam bahasa Banyumasan berarti "miring" atau "tidak tegak lurus". Hal ini merujuk pada bentuk makanan ini yang pipih dan tidak bulat sempurna seperti lontong pada umumnya. Ada juga yang mengatakan bahwa nama mireng berasal dari cara memakannya yang digigit dari samping atau "miring".</p>
                    <p>Pada masa lalu, mireng sering dijadikan sebagai salah satu komponen dalam berbagai upacara adat atau selamatan di Banyumas, seperti dalam tradisi tingkeban (tujuh bulanan kehamilan) atau selamatan panen. Makanan ini melambangkan harapan akan kehidupan yang manis dan berlimpah, seperti isian gula merah yang manis di dalamnya.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Bahan dan Cara Pembuatan</h2>
                    <p>Pembuatan mireng membutuhkan ketelatenan terutama dalam proses membungkus. Berikut adalah bahan-bahan dan cara pembuatannya:</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Bahan Utama</h5>
                                    <ul>
                                        <li>500 gram beras ketan, rendam selama 2-3 jam</li>
                                        <li>200 gram kelapa parut</li>
                                        <li>1 sendok teh garam</li>
                                        <li>Daun pisang untuk membungkus</li>
                                        <li>Lidi atau tali untuk mengikat</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Bahan Isian</h5>
                                    <ul>
                                        <li>250 gram gula merah, sisir halus</li>
                                        <li>100 gram kelapa parut</li>
                                        <li>1/4 sendok teh garam</li>
                                        <li>2-3 lembar daun pandan</li>
                                        <li>50 ml air</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Langkah-langkah pembuatan mireng:</p>
                    <ol class="mb-4">
                        <li class="mb-2">Persiapan bahan: Cuci bersih beras ketan yang sudah direndam, tiriskan. Campurkan dengan kelapa parut dan garam, aduk rata.</li>
                        <li class="mb-2">Pembuatan isian: Masak gula merah, kelapa parut, garam, daun pandan, dan air dengan api kecil hingga gula larut dan mengental. Dinginkan.</li>
                        <li class="mb-2">Persiapan daun: Bersihkan daun pisang, lap hingga kering, lalu panggang sebentar di atas api agar lemas dan mudah dilipat.</li>
                        <li class="mb-2">Pembungkusan: Ambil selembar daun pisang, letakkan sekitar 2-3 sendok makan campuran beras ketan, pipihkan, beri isian di tengahnya, lalu tutup dengan campuran beras ketan lagi. Bungkus membentuk persegi panjang pipih, kemudian ikat dengan lidi atau tali.</li>
                        <li class="mb-2">Pengukusan: Kukus mireng dalam dandang atau panci pengukus selama kurang lebih 45-60 menit hingga matang.</li>
                        <li class="mb-2">Pendinginan: Angkat mireng yang sudah matang, dinginkan sebentar sebelum disajikan.</li>
                    </ol>

                    <p>Kunci utama dalam membuat mireng yang lezat adalah kualitas bahan baku, terutama beras ketan dan gula merah. Beras ketan yang baik akan menghasilkan tekstur yang kenyal dan tidak mudah hancur, sementara gula merah berkualitas akan memberikan rasa manis yang alami dan aroma yang khas.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Variasi Mireng</h2>
                    <p>Meskipun mireng tradisional memiliki isian gula merah dan kelapa, seiring perkembangan zaman, terdapat beberapa variasi mireng yang bisa ditemui:</p>
                    <ul class="mb-4">
                        <li>Mireng Original: Dengan isian gula merah dan kelapa, versi paling autentik.</li>
                        <li>Mireng Asin: Tanpa isian manis, lebih gurih dengan tambahan bumbu-bumbu seperti bawang merah, bawang putih, dan daun bawang.</li>
                        <li>Mireng Daging: Diisi dengan campuran daging cincang yang dibumbui, variasi yang lebih modern.</li>
                        <li>Mireng Durian: Isian gula merah dicampur dengan daging buah durian untuk aroma dan rasa yang lebih kaya.</li>
                        <li>Mireng Mini: Versi lebih kecil yang biasanya disajikan untuk acara-acara khusus atau selamatan.</li>
                    </ul>
                    <p>Meskipun terdapat berbagai variasi, mireng dengan isian gula merah dan kelapa tetap menjadi yang paling dikenal dan dianggap sebagai mireng autentik khas Banyumas.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Nilai Gizi dan Manfaat</h2>
                    <p>Sebagai makanan berbahan dasar beras ketan dan kelapa, mireng memiliki kandungan nutrisi sebagai berikut (dalam perkiraan per buah):</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Kalori: 200-250 kkal</li>
                                        <li>Karbohidrat: 40-45 gram</li>
                                        <li>Protein: 3-5 gram</li>
                                        <li>Lemak: 5-8 gram</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Serat: 1-2 gram</li>
                                        <li>Kalsium: 30-40 mg</li>
                                        <li>Zat Besi: 1-1.5 mg</li>
                                        <li>Kalium: 100-120 mg</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Beras ketan yang menjadi bahan utama mireng mengandung karbohidrat kompleks yang memberikan energi tahan lama. Kelapa yang digunakan juga menyumbangkan lemak sehat dan serat. Gula merah sebagai isian mengandung beberapa mineral seperti zat besi, kalsium, dan kalium yang bermanfaat bagi tubuh.</p>
                    <p>Meskipun mireng memiliki nilai gizi yang cukup baik, tetapi karena kandungan karbohidrat dan gulanya yang tinggi, disarankan untuk mengonsumsinya secukupnya, terutama bagi penderita diabetes atau yang sedang menjaga berat badan.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Mireng dalam Budaya Banyumas</h2>
                    <p>Mireng memiliki peran penting dalam budaya kuliner dan tradisi masyarakat Banyumas:</p>
                    <ul class="mb-4">
                        <li>Makanan Ritual: Dalam beberapa upacara adat Banyumas, mireng sering dijadikan sebagai salah satu komponen sesaji atau hidangan yang disajikan, terutama dalam upacara yang berkaitan dengan siklus hidup manusia atau pertanian.</li>
                        <li>Simbol Kebersamaan: Proses pembuatan mireng yang biasanya dilakukan bersama-sama, terutama saat ada hajatan, mencerminkan nilai gotong royong yang masih dijunjung tinggi oleh masyarakat Banyumas.</li>
                        <li>Warisan Kuliner: Mireng menjadi salah satu warisan kuliner yang menunjukkan kekayaan dan keberagaman makanan tradisional Indonesia, khususnya dari wilayah Banyumas.</li>
                        <li>Identitas Lokal: Bagi masyarakat Banyumas, mireng bukan sekadar makanan, tetapi juga bagian dari identitas budaya lokal yang membedakan mereka dari daerah lain.</li>
                    </ul>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Tips Menikmati dan Menyimpan Mireng</h2>
                    <p>Untuk mendapatkan pengalaman terbaik saat menikmati mireng:</p>
                    <ul class="mb-4">
                        <li>Mireng paling nikmat dinikmati dalam keadaan hangat, bisa dipanaskan sebentar dengan cara dikukus jika sudah dingin.</li>
                        <li>Mireng cocok disantap bersama teh atau kopi, terutama di pagi hari atau sore hari.</li>
                        <li>Untuk menyimpan mireng, biarkan dalam keadaan terbungkus daun pisang dan simpan di tempat sejuk. Mireng bisa bertahan 1-2 hari pada suhu ruangan.</li>
                        <li>Jika ingin menyimpan lebih lama, mireng bisa dimasukkan ke dalam lemari pendingin dan dipanaskan kembali saat akan dikonsumsi.</li>
                        <li>Saat menghangatkan kembali, sebaiknya gunakan cara dikukus daripada dipanaskan dengan microwave untuk menjaga tekstur dan kelembaban mireng.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
