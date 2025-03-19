@extends('layouts.index')

@section('title', 'Cimplung - Kuliner Tradisional Khas Banyumas')

@section('content')
    <div class="container py-3">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none">Artikel</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Cimplung</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="fw-bold mb-4 text-center">Cimplung: Jajanan Tradisional Gurih Khas Banyumas</h1>

                <div class="mb-4 text-center">
                    <img src="https://imgcdn.espos.id/@espos/images/2022/01/Cimplung-khas-Banyumas.jpg"
                        alt="Cimplung Banyumas" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Apa itu Cimplung?</h2>
                    <p>Cimplung adalah makanan tradisional khas Banyumas yang terbuat dari singkong parut yang dibentuk bulat dan digoreng hingga kecoklatan. Makanan ini memiliki tekstur yang kenyal di bagian dalam dan renyah di bagian luar. Cimplung biasanya disajikan dengan sambal kacang atau sambal pecel yang memberikan cita rasa gurih, manis, dan sedikit pedas.</p>
                    <p>Nama "cimplung" konon berasal dari suara yang dihasilkan ketika adonan dimasukkan ke dalam minyak panas, yaitu "plung". Makanan ini menjadi salah satu jajanan tradisional yang masih bertahan di tengah gempuran makanan modern dan menjadi bagian dari warisan kuliner Banyumas.</p>
                    <p>Di Banyumas, cimplung sering dijual di pasar tradisional, warung-warung kecil, atau pedagang kaki lima. Harganya sangat terjangkau, berkisar antara Rp 1.000 hingga Rp 2.000 per buah, tergantung ukurannya. Cimplung juga sering disajikan sebagai camilan saat acara kumpul keluarga atau hajatan di daerah Banyumas.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Sejarah Cimplung</h2>
                    <p>Cimplung telah menjadi bagian dari kuliner tradisional Banyumas sejak puluhan tahun lalu. Makanan ini bermula sebagai makanan rakyat yang sederhana, memanfaatkan singkong yang melimpah di daerah Banyumas. Pada masa lalu, ketika beras masih menjadi makanan mewah, masyarakat memanfaatkan singkong sebagai bahan pangan alternatif.</p>
                    <p>Sejarah pasti kapan cimplung pertama kali dibuat memang tidak tercatat dengan jelas. Namun, menurut cerita turun-temurun, cimplung sudah ada sejak zaman penjajahan Belanda. Makanan ini menjadi alternatif pangan yang murah dan mengenyangkan bagi masyarakat lokal pada masa itu.</p>
                    <p>Meskipun sekarang banyak makanan modern yang masuk ke Banyumas, cimplung tetap bertahan dan menjadi salah satu kuliner yang dicari oleh wisatawan yang berkunjung ke daerah ini. Beberapa festival kuliner tradisional di Banyumas juga sering menampilkan cimplung sebagai salah satu makanan yang diperkenalkan kepada generasi muda dan wisatawan.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Bahan dan Cara Pembuatan</h2>
                    <p>Pembuatan cimplung relatif sederhana namun membutuhkan ketelitian untuk mendapatkan tekstur yang tepat. Berikut adalah tahapan pembuatannya:</p>

                    <ol class="mb-4">
                        <li class="mb-2">Persiapan bahan: Singkong segar dikupas, dicuci bersih, lalu diparut halus.</li>
                        <li class="mb-2">Pengeringan: Hasil parutan singkong diperas untuk mengurangi kadar airnya. Air perasan tidak dibuang karena akan menghasilkan pati singkong yang berguna untuk adonan.</li>
                        <li class="mb-2">Pembuatan adonan: Singkong parut dicampur dengan pati singkong, garam, bawang putih halus, ketumbar, dan daun bawang cincang.</li>
                        <li class="mb-2">Pembentukan: Adonan diambil secukupnya dan dibentuk bulat atau lonjong sesuai selera.</li>
                        <li class="mb-2">Penggorengan: Adonan digoreng dalam minyak panas hingga berwarna kecoklatan dan matang.</li>
                        <li class="mb-2">Penyajian: Cimplung disajikan hangat dengan sambal kacang atau sambal pecel.</li>
                    </ol>

                    <p>Bahan-bahan utama untuk membuat cimplung:</p>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Bahan Utama</h5>
                                    <ul>
                                        <li>500 gram singkong</li>
                                        <li>1 sendok teh garam</li>
                                        <li>3 siung bawang putih (dihaluskan)</li>
                                        <li>1/2 sendok teh ketumbar bubuk</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Bahan Sambal</h5>
                                    <ul>
                                        <li>100 gram kacang tanah (goreng)</li>
                                        <li>5 buah cabai merah</li>
                                        <li>2 siung bawang putih</li>
                                        <li>Gula merah dan garam secukupnya</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Dalam proses pembuatan, perbandingan antara singkong parut dan pati singkong harus tepat untuk mendapatkan tekstur cimplung yang kenyal namun tidak keras. Terlalu banyak pati akan membuat cimplung menjadi keras, sementara terlalu sedikit pati akan membuat cimplung mudah hancur saat digoreng.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Nilai Gizi dan Manfaat</h2>
                    <p>Sebagai makanan berbahan dasar singkong, cimplung memiliki kandungan nutrisi sebagai berikut (dalam perkiraan per 100 gram):</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Kalori: 170-200 kkal</li>
                                        <li>Karbohidrat: 35-40 gram</li>
                                        <li>Protein: 1-2 gram</li>
                                        <li>Lemak: 4-6 gram</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Serat: 2-3 gram</li>
                                        <li>Vitamin C: 15-20 mg</li>
                                        <li>Kalsium: 25-30 mg</li>
                                        <li>Zat Besi: 0.5-1 mg</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Meskipun cimplung digoreng, makanan ini memiliki beberapa manfaat kesehatan karena bahan dasarnya adalah singkong yang mengandung pati resisten. Pati resisten ini berfungsi seperti serat yang baik untuk pencernaan. Namun, karena digoreng, konsumsinya tetap harus dalam jumlah yang wajar, terutama bagi yang sedang menjaga asupan lemak.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Variasi Cimplung di Banyumas</h2>
                    <p>Meskipun resep dasarnya sama, cimplung di berbagai daerah di Banyumas memiliki beberapa variasi:</p>
                    <ul class="mb-4">
                        <li>Cimplung Purwokerto: Memiliki ukuran yang lebih kecil dan biasanya disajikan dengan sambal kacang yang lebih pedas.</li>
                        <li>Cimplung Sokaraja: Memiliki tambahan daun bawang yang lebih banyak dan terkadang dicampur dengan sedikit tepung tapioka untuk tekstur yang lebih kenyal.</li>
                        <li>Cimplung Wangon: Memiliki bentuk yang lebih pipih dan terkadang ditambahkan ebi (udang kering) untuk aroma yang lebih kuat.</li>
                        <li>Cimplung Isi: Variasi modern di mana cimplung diisi dengan abon, oncom, atau tempe yang dihaluskan.</li>
                    </ul>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Tips Menikmati Cimplung</h2>
                    <p>Untuk mendapatkan pengalaman terbaik saat menikmati cimplung:</p>
                    <ul class="mb-4">
                        <li>Cimplung paling nikmat disantap dalam keadaan hangat agar tekstur kenyalnya terasa maksimal.</li>
                        <li>Celupkan cimplung ke dalam sambal kacang atau sambal pecel secukupnya, jangan terlalu banyak agar rasa asli cimplung tetap terasa.</li>
                        <li>Cimplung cocok dinikmati sebagai camilan sore hari bersama teh atau kopi.</li>
                        <li>Untuk pengalaman kuliner yang lebih lengkap, nikmati cimplung bersama dengan jajanan tradisional Banyumas lainnya seperti mendoan atau sroto.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
