@extends('layouts.index')

@section('title', 'Jenang Jaket - Kuliner Manis Khas Banyumas')

@section('content')
    <div class="container py-3">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none">Artikel</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Jenang Jaket</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="fw-bold mb-4 text-center">Jenang Jaket: Kuliner Manis Legit Khas Banyumas</h1>

                <div class="mb-4 text-center">
                    <img src="https://radarbanyumas.disway.id//upload/600a36d2ce150a861848b8cad106f2ee.jpg"
                        alt="Jenang Jaket Banyumas" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Apa itu Jenang Jaket?</h2>
                    <p>Jenang Jaket adalah makanan tradisional khas Banyumas yang terbuat dari tepung beras dan gula merah
                        yang dilapisi atau "dijaket" dengan adonan tepung ketan. Makanan ini memiliki tekstur yang unik,
                        dengan bagian dalam yang lembut dan manis serta bagian luar yang kenyal. Rasa manis dari gula merah
                        yang dipadukan dengan kelezatan tepung ketan membuat jenang jaket menjadi salah satu kudapan favorit
                        masyarakat Banyumas.</p>
                    <p>Nama "jaket" pada jenang ini merujuk pada lapisan tepung ketan yang membungkus bagian dalam jenang,
                        mirip seperti jaket yang membungkus tubuh. Jenang jaket biasanya berbentuk bulat pipih atau persegi,
                        dengan warna cokelat kehitaman dari gula merah pada bagian dalamnya dan putih dari tepung ketan pada
                        bagian luarnya.</p>
                    <p>Di Banyumas, jenang jaket biasa disajikan pada acara-acara tradisional seperti selamatan, hajatan,
                        atau sebagai suguhan untuk tamu. Harganya berkisar antara Rp 10.000 hingga Rp 15.000 per kotak,
                        tergantung ukuran dan produsennya. Jenang jaket juga sering dijadikan sebagai buah tangan oleh
                        wisatawan yang berkunjung ke Banyumas.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Sejarah Jenang Jaket</h2>
                    <p>Jenang jaket telah menjadi bagian dari kuliner tradisional Banyumas sejak puluhan tahun silam.
                        Asal-usul jenang jaket tidak terlepas dari kultur masyarakat Jawa yang gemar membuat aneka jenis
                        jenang atau dodol sebagai makanan dalam berbagai acara adat dan ritual.</p>
                    <p>Menurut cerita turun-temurun, jenang jaket pertama kali dibuat oleh para ibu rumah tangga di Banyumas
                        sekitar abad ke-19. Pada masa itu, gula merah dari nira kelapa sangat melimpah di daerah Banyumas,
                        sehingga masyarakat memanfaatkannya untuk membuat berbagai jenis makanan manis, termasuk jenang
                        jaket.</p>
                    <p>Awalnya, jenang jaket hanya dibuat untuk konsumsi keluarga dan acara-acara tertentu. Namun seiring
                        berjalannya waktu, jenang jaket mulai diproduksi secara komersial dan menjadi salah satu makanan
                        khas yang identik dengan Banyumas. Meskipun saat ini banyak makanan modern yang masuk ke Banyumas,
                        jenang jaket tetap dipertahankan sebagai warisan kuliner yang memiliki nilai budaya tinggi.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Bahan dan Cara Pembuatan</h2>
                    <p>Pembuatan jenang jaket membutuhkan kesabaran dan ketelatenan karena prosesnya yang cukup panjang.
                        Berikut adalah tahapan pembuatannya:</p>

                    <ol class="mb-4">
                        <li class="mb-2">Persiapan bahan isian: Tepung beras dicampur dengan gula merah yang sudah disisir
                            halus dan sedikit garam.</li>
                        <li class="mb-2">Pemasakan isian: Campuran tepung beras dan gula merah dimasak dengan api kecil
                            sambil diaduk terus menerus hingga mengental. Proses ini bisa memakan waktu 1-2 jam.</li>
                        <li class="mb-2">Pendinginan isian: Adonan isian yang sudah matang didinginkan dan kemudian
                            dibentuk bulat pipih atau persegi.</li>
                        <li class="mb-2">Pembuatan "jaket": Tepung ketan dicampur dengan sedikit garam dan air hangat,
                            kemudian diuleni hingga kalis.</li>
                        <li class="mb-2">Pembungkusan: Adonan tepung ketan dipipihkan dan digunakan untuk membungkus isian
                            jenang yang sudah dibentuk.</li>
                        <li class="mb-2">Pengukusan: Jenang yang sudah dibungkus dengan adonan tepung ketan dikukus selama
                            kurang lebih 30 menit hingga matang.</li>
                        <li class="mb-2">Pendinginan dan pemotongan: Setelah matang, jenang jaket didinginkan dan kemudian
                            dipotong sesuai selera.</li>
                    </ol>

                    <p>Proses pembuatan jenang jaket membutuhkan keahlian khusus, terutama saat memasak isian agar tidak
                        gosong dan saat membungkus isian dengan tepung ketan agar tidak pecah. Kesabaran dalam mengaduk
                        adonan isian sangat diperlukan untuk mendapatkan tekstur yang pas dan rasa yang merata.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Nilai Gizi dan Manfaat</h2>
                    <p>Sebagai makanan tradisional berbahan dasar tepung beras, tepung ketan, dan gula merah, jenang jaket
                        memiliki kandungan nutrisi sebagai berikut (dalam perkiraan per 100 gram):</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Kalori: 250-300 kkal</li>
                                        <li>Karbohidrat: 50-60 gram</li>
                                        <li>Protein: 2-3 gram</li>
                                        <li>Lemak: 1-2 gram</li>
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
                                        <li>Zat Besi: 1-2 mg</li>
                                        <li>Kalium: 100-150 mg</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Meskipun jenang jaket tinggi karbohidrat dan gula, gula merah yang digunakan memiliki beberapa
                        kelebihan dibandingkan gula putih. Gula merah mengandung mineral seperti zat besi, kalium, dan
                        magnesium yang bermanfaat bagi tubuh. Tepung ketan juga memiliki indeks glikemik yang lebih rendah
                        dibandingkan tepung beras biasa, sehingga pelepasan gula ke dalam darah lebih lambat. Namun, tetap
                        disarankan untuk mengonsumsi jenang jaket secukupnya, terutama bagi penderita diabetes atau yang
                        sedang menjaga berat badan.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Variasi Jenang Jaket</h2>
                    <p>Seiring perkembangan zaman, jenang jaket mengalami beberapa variasi dalam pembuatannya:</p>
                    <ul class="mb-4">
                        <li>Jenang Jaket Durian: Ditambahkan daging buah durian pada isian untuk aroma dan rasa yang lebih
                            kaya.</li>
                        <li>Jenang Jaket Pandan: Adonan tepung ketan diberi ekstrak daun pandan sehingga berwarna hijau dan
                            beraroma wangi.</li>
                        <li>Jenang Jaket Mini: Versi lebih kecil yang biasanya disajikan sebagai camilan atau untuk
                            acara-acara khusus.</li>
                        <li>Jenang Jaket Modern: Menggunakan bahan tambahan seperti keju, cokelat, atau kacang sebagai
                            variasi rasa.</li>
                    </ul>
                    <p>Meskipun terdapat berbagai variasi, jenang jaket tradisional dengan isian gula merah tetap menjadi
                        yang paling populer dan digemari oleh masyarakat Banyumas.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Tips Menikmati dan Menyimpan Jenang Jaket</h2>
                    <p>Untuk mendapatkan pengalaman terbaik saat menikmati jenang jaket:</p>
                    <ul class="mb-4">
                        <li>Jenang jaket paling nikmat dinikmati dalam suhu ruangan, tidak terlalu dingin atau panas.</li>
                        <li>Potong jenang jaket menjadi ukuran yang lebih kecil untuk memudahkan konsumsi.</li>
                        <li>Jenang jaket sangat cocok disantap bersama teh atau kopi pahit untuk menyeimbangkan rasanya yang
                            manis.</li>
                        <li>Untuk menyimpan jenang jaket, letakkan dalam wadah kedap udara dan simpan di tempat sejuk.
                            Jenang jaket dapat bertahan 3-5 hari pada suhu ruangan dan hingga seminggu jika disimpan dalam
                            lemari pendingin.</li>
                        <li>Jika jenang jaket mulai mengeras, hangatkan sebentar dengan cara dikukus selama beberapa menit
                            untuk mengembalikan teksturnya yang kenyal.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
