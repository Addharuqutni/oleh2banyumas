@extends('layouts.index')

@section('title', 'Cimplung - Kuliner Tradisional Khas Banyumas')

@section('content')
    <div class="container py-5">
        <article>
            <!-- Header -->
            <header class="mb-5">
                <h1 class="fw-bold text-center mb-4 judul">Cimplung: Kuliner Tradisional Khas Banyumas</h1>
                <div class="text-center" style="width: 100%; height: 500px;">
                    <img src="https://radarbanyumas.disway.id//upload/c3c7e39bf7020830310c57bdaadea511.jpg"
                        alt="Cimpulng Banyumas" class="img-fluid rounded shadow-sm" style="width: 100%; height: 100%; object-fit: cover;">
                    <p class="text-muted fst-italic">Cimplung - Jajanan tradisional khas Banyumas</p>
                </div>
            </header>

            <!-- Introduction -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Penjelasan</h2>
                <div class="lead">
                    <p>Cimplung adalah makanan tradisional khas Banyumas yang terbuat dari singkong atau ubi yang direbus dalam air nira kelapa (badheg) atau larutan gula merah. Camilan ini memiliki tekstur yang lembut dan empuk dengan rasa manis alami yang khas. Ukurannya bervariasi tergantung pada potongan singkong yang digunakan, biasanya berukuran sedang agar mudah disantap dalam beberapa gigitan.</p>

                    <p>Cita rasa cimplung sangat khas, dengan perpaduan manis alami dari gula merah atau nira kelapa yang meresap ke dalam singkong. Teksturnya lembut dan kenyal, dengan rasa manis yang sempurna tanpa terasa berlebihan. Aroma gula merah dan daun pandan yang digunakan dalam proses pembuatan juga memberikan dimensi aroma yang khas pada cimplung.</p>

                    <p>Di Banyumas, cimplung termasuk jajanan tradisional yang mulai langka ditemui. Saat ini, cimplung biasanya dijual di pasar-pasar tradisional atau oleh pedagang keliling di pagi hari. Harganya sangat terjangkau, berkisar antara Rp 2.000 hingga Rp 3.000 per bungkus. Cimplung biasanya dinikmati sebagai camilan di pagi atau sore hari, seringkali ditemani dengan secangkir teh atau kopi hangat.</p>
                </div>
            </section>

            <!-- History -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Sejarah</h2>
                <div class="lead">
                    <p>Sejarah cimplung di Banyumas berkaitan erat dengan kehidupan agraris masyarakat setempat yang memanfaatkan hasil bumi secara maksimal. Konon, cimplung sudah ada sejak puluhan tahun lalu sebagai makanan sederhana yang memanfaatkan singkong, yang merupakan bahan pangan yang melimpah di daerah Banyumas, dan nira kelapa yang juga mudah didapat.</p>

                    <div class="alert alert-info my-4">
                        <p class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Nama "cimplung" berasal dari kata "cemplung" dalam bahasa Jawa yang berarti memasukkan atau mencemplungkan sesuatu ke dalam air. Hal ini merujuk pada cara pembuatannya di mana potongan singkong dicemplungkan ke dalam rebusan air nira atau larutan gula merah yang mendidih, sehingga mengeluarkan bunyi "plung".</p>
                    </div>

                    <p>Secara filosofi, cimplung mencerminkan kebersahajaan dan kekayaan alam Banyumas. Proses memasaknya yang tradisional mengajarkan kesabaran, sementara rasanya yang manis melambangkan kebahagiaan dan keberlimpahan. Di desa Banjarpanepen, Kecamatan Sumpiuh, cimplung bahkan menjadi salah satu makanan khas yang identik dengan kehidupan masyarakat lokal dan sering hadir dalam berbagai acara tradisional.</p>
                </div>
            </section>

            <!-- Ingredients and Preparation -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Bahan dan Cara Pembuatan</h2>

                <div class="row mb-4 g-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header text-white bg-secondary">
                                <h5 class=" mb-0">Bahan Utama</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        500 gram singkong berkualitas baik
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        250 gram gula merah, sisir halus
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        3 sendok makan gula pasir
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1/4 sendok teh garam
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1 liter air
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header text-white bg-secondary">
                                <h5 class="mb-0">Bahan Tambahan</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        2-3 lembar daun pandan
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1 batang kayu manis
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1 batang serai, geprek
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        Santan kelapa (opsional)
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        Wijen atau kacang tanah untuk taburan (opsional)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lead">
                    <h4 class="subjudul mb-3">Cara Membuat</h4>
                    <ol class="list-group list-group-numbered mb-4 shadow-sm">
                        <li class="list-group-item">Kupas singkong dan cuci bersih, lalu potong-potong sesuai selera. Pilih singkong yang bagus dan tidak terlalu tua agar hasilnya lembut.</li>
                        <li class="list-group-item">Siapkan panci dan tuang air, masukkan daun pandan, kayu manis, dan serai. Didihkan.</li>
                        <li class="list-group-item">Setelah air mendidih, masukkan potongan singkong, rebus hingga setengah matang.</li>
                        <li class="list-group-item">Tambahkan gula merah, gula pasir, dan garam. Aduk rata dan masak dengan api kecil.</li>
                        <li class="list-group-item">Jika ingin lebih kaya rasa, tambahkan santan kelapa secukupnya.</li>
                        <li class="list-group-item">Masak hingga air menyusut dan gula meresap ke dalam singkong, sekitar 30-45 menit. Singkong yang sudah empuk menandakan cimplung sudah matang.</li>
                    </ol>

                    <div class="alert alert-warning mt-3">
                        <p class="mb-0"><i class="bi bi-lightbulb-fill me-2"></i><strong>Tip:</strong> Kunci utama dalam membuat cimplung yang lezat adalah kualitas singkong dan gula merah. Singkong yang baik akan menghasilkan tekstur yang lembut, sementara gula merah berkualitas akan memberikan rasa manis alami yang khas. Jika tidak ada air nira (badheg), kombinasi gula merah dan air biasa sudah cukup untuk memberikan cita rasa yang mirip.</p>
                    </div>
                </div>
            </section>

            <!-- Variations -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Variasi</h2>
                <div class="lead">
                    <p>Meskipun cimplung tradisional terbuat dari singkong yang direbus dalam air nira atau larutan gula merah, seiring perkembangan zaman, terdapat beberapa variasi cimplung yang bisa ditemui:</p>

                    <div class="row g-4 mt-3">
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="subjudul">Cimplung Singkong</h5>
                                    <p class="card-text">Versi klasik dan paling autentik, terbuat dari singkong yang direbus dengan gula merah.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="subjudul">Cimplung Pisang</h5>
                                    <p class="card-text">Menggunakan pisang (sebaiknya yang belum terlalu matang) sebagai bahan utama pengganti singkong.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="subjudul">Cimplung Ubi</h5>
                                    <p class="card-text">Menggunakan ubi jalar sebagai bahan utama untuk variasi rasa dan warna yang berbeda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="subjudul">Cimplung Goreng</h5>
                                    <p class="card-text">Cimplung yang sudah jadi kemudian digoreng, sehingga memiliki tekstur luar yang renyah dan bagian dalam yang lembut.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="subjudul">Cimplung Wijen</h5>
                                    <p class="card-text">Ditaburi dengan wijen atau kacang tanah untuk menambah variasi tekstur dan rasa.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="mt-4">Meskipun terdapat berbagai variasi, cimplung singkong dengan rebusan gula merah tetap menjadi yang paling dikenal dan dianggap sebagai cimplung autentik khas Banyumas.</p>
                </div>
            </section>

            <!-- Tips -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Tips Menikmati</h2>
                <div class="lead">
                    <div class="row mb-4 g-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-header text-white bg-secondary">
                                    <h5 class="mb-0">Waktu Terbaik</h5>
                                </div>
                                <div class="card-body">
                                    <p>Cimplung paling nikmat dinikmati dalam keadaan hangat setelah dimasak, saat gula merah masih lembut dan sedikit lengket.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-header text-white bg-secondary">
                                    <h5 class="mb-0">Paduan Minuman</h5>
                                </div>
                                <div class="card-body">
                                    <p>Sajikan cimplung dengan teh tawar atau kopi untuk menyeimbangkan rasa manisnya. Kombinasi ini sempurna untuk camilan sore hari.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-header text-white bg-secondary">
                                    <h5 class="mb-0">Variasi Tekstur</h5>
                                </div>
                                <div class="card-body">
                                    <p>Untuk variasi tekstur, coba goreng cimplung yang sudah jadi. Tekstur luar yang renyah dengan bagian dalam yang lembut menciptakan pengalaman makan yang berbeda.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-header text-white bg-secondary">
                                    <h5 class="mb-0">Penyimpanan</h5>
                                </div>
                                <div class="card-body">
                                    <p>Cimplung dapat disimpan hingga 3 hari di dalam lemari es. Simpan dalam wadah tertutup rapat untuk menjaga kesegaran dan kelembaban.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-header text-white bg-secondary">
                                    <h5 class="mb-0">Menghangatkan Kembali</h5>
                                </div>
                                <div class="card-body">
                                    <p>Saat menghangatkan kembali, kukus sebentar cimplung yang sudah dingin untuk mengembalikan tekstur lembut dan kelembabannya, jangan gunakan microwave yang bisa membuat teksturnya keras.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </article>
    </div>
@endsection
