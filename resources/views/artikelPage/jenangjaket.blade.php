@extends('layouts.index')

@section('title', 'Jenang Jaket - Kuliner Manis Legendaris Khas Banyumas')

@section('content')
    <div class="container py-5">
        <article>
            <!-- Header -->
            <header class="mb-5">
                <h1 class="fw-bold text-center mb-4 judul">Jenang Jaket: Kuliner Tradisional Khas Banyumas</h1>
                <div class="text-center" style="width: 100%; height: 500px;">
                    <img src="https://dolanbanyumas.banyumaskab.go.id/assets/gambar_objek/jenang-jaket.jpg"
                        alt="Jenang Jaket Banyumas" class="img-fluid rounded shadow-sm" style="width: 100%; height: 100%; object-fit: cover;">
                    <p class="text-muted fst-italic">Jenang Jaket - Makanan tradisional khas Banyumas</p>
                </div>
            </header>

            <!-- Introduction -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Penjelasan</h2>
                <div class="lead">
                    <p>Jenang Jaket adalah makanan tradisional khas Banyumas yang berasal dari daerah Mersi, Purwokerto.
                        Nama "Jaket" merupakan singkatan dari "Jenang Asli Ketan", yang menunjukkan bahan utama pembuatannya
                        yaitu tepung beras ketan. Makanan ini berbentuk seperti dodol dengan tekstur yang kenyal, lembut,
                        dan tidak mudah lengket di tangan meskipun tidak dibungkus.</p>

                    <p>Cita rasa Jenang Jaket sangat khas, dengan perpaduan manis dari gula merah, gurih dari santan kelapa,
                        dan aroma khas dari tepung ketan yang membuatnya begitu menggugah selera. Teksturnya yang kenyal
                        namun lembut memberikan sensasi yang menyenangkan saat dinikmati. Jenang ini hadir dalam dua variasi
                        utama, yaitu polos (tanpa tambahan) dan dengan taburan biji wijen yang menambah tekstur dan cita
                        rasa.</p>

                    <p>Di Banyumas, Jenang Jaket telah menjadi salah satu oleh-oleh favorit dan identitas kuliner daerah.
                        Sentra produksi Jenang Jaket terletak di kawasan Mersi, Purwokerto, dengan beberapa produsen
                        terkenal seperti Mukti Sari yang telah memproduksi jenang ini secara turun-temurun. Harganya
                        terjangkau, berkisar antara Rp 16.000 hingga Rp 25.000 per kemasan, biasanya berisi 16-20 potong
                        jenang. Makanan ini sering dinikmati sebagai camilan pendamping teh atau kopi, dan kerap hadir dalam
                        berbagai acara tradisional.</p>
                </div>
            </section>

            <!-- History -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Sejarah</h2>
                <div class="lead">
                    <p>Sejarah Jenang Jaket di Banyumas telah berlangsung sejak puluhan tahun yang lalu sebagai bagian dari
                        kekayaan kuliner tradisional Jawa. Meskipun tidak ada catatan pasti tentang awal pembuatannya,
                        beberapa produsen seperti Jenang Jaket Pertama telah memproduksi makanan ini sejak tahun 1979,
                        menunjukkan bahwa makanan ini telah ada dalam masyarakat Banyumas setidaknya sejak paruh kedua abad
                        ke-20.</p>

                    <div class="alert alert-info my-4">
                        <p class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Dalam tradisi masyarakat Jawa, jenang memiliki makna filosofis yang dalam. Jenang Jaket, dengan
                            teksturnya yang kenyal dan lengket, sering dijadikan simbol dalam upacara pernikahan dengan
                            harapan bahwa pasangan pengantin akan "lengket" satu sama lain dalam menjalani kehidupan rumah
                            tangga, serta sebagai simbol kerekatan hubungan antar keluarga kedua mempelai.</p>
                    </div>

                    <p>Proses pembuatan Jenang Jaket yang membutuhkan ketelatenan dan keterampilan khusus menjadikannya
                        tidak hanya sekadar makanan, tetapi juga warisan budaya yang dilestarikan melalui pengetahuan yang
                        diwariskan dari generasi ke generasi. Di Mersi, Purwokerto, beberapa sentra produksi Jenang Jaket
                        telah bertahan selama puluhan tahun, dengan resep yang tetap dijaga keasliannya meskipun telah
                        mengalami beberapa penyesuaian dalam proses produksinya untuk memenuhi permintaan pasar modern.</p>
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
                                        1 kg tepung beras ketan
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        750 gram gula merah, sisir halus
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        3-4 buah kelapa (untuk santan kental)
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        1/2 sendok teh garam
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
                                        100 gram biji wijen (untuk varian wijen)
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        Daun pisang atau plastik untuk pembungkus
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        Minyak goreng secukupnya (untuk olesan)
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        Air secukupnya
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="mt-4 mb-3">Cara Membuat</h3>
                <ol class="list-group list-group-numbered mb-4">
                    <li class="list-group-item">Buat santan kental dari kelapa yang sudah diparut. Saring agar bersih dari ampas.</li>
                    <li class="list-group-item">Masukkan santan ke dalam kuali atau wajan besar, kemudian didihkan dengan api sedang.</li>
                    <li class="list-group-item">Setelah santan mendidih, masukkan tepung beras ketan sedikit demi sedikit sambil terus diaduk
                        agar tidak menggumpal.</li>
                    <li class="list-group-item">Masukkan gula merah yang sudah disisir dan garam, aduk terus hingga tercampur rata.</li>
                    <li class="list-group-item">Kecilkan api, terus aduk adonan selama sekitar 3-4 jam hingga adonan menjadi kental, berwarna
                        kecoklatan, dan tidak lengket di tangan. Proses pengadukan ini membutuhkan kesabaran dan
                        ketelatenan.</li>
                    <li class="list-group-item">Untuk varian wijen, tambahkan biji wijen saat adonan sudah mulai kental dan tercampur rata.</li>
                    <li class="list-group-item">Setelah matang, angkat dan tuang adonan ke dalam loyang atau nampan yang sudah diolesi minyak
                        goreng agar tidak lengket.</li>
                    <li class="list-group-item">Ratakan dan diamkan hingga dingin dan mengeras.</li>
                    <li class="list-group-item">Setelah dingin, potong-potong sesuai ukuran yang diinginkan, biasanya berbentuk persegi panjang.</li>
                    <li class="list-group-item">Kemas Jenang Jaket menggunakan daun pisang atau plastik sesuai kebutuhan.</li>
                </ol>

                <div class="alert alert-success">
                    <p class="mb-0"><i class="bi bi-lightbulb-fill me-2"></i><strong>Tip:</strong> Kunci utama dalam membuat Jenang Jaket yang lezat adalah kesabaran dalam
                        proses pengadukan yang bisa memakan waktu berjam-jam. Adonan harus terus diaduk dengan api kecil
                        agar matang merata dan tidak gosong di bagian bawah. Penggunaan gula merah berkualitas juga
                        sangat mempengaruhi cita rasa akhir dari Jenang Jaket.</p>
                </div>
            </section>

            <!-- Variations -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Variasi</h2>
                <div class="lead">
                    <p>Meskipun Jenang Jaket merupakan makanan tradisional yang tetap menjaga keaslian resepnya, terdapat
                        beberapa variasi yang bisa ditemui:</p>

                    <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Jenang Jaket Polos</h5>
                                    <p class="card-text">Versi original tanpa tambahan, menampilkan cita rasa murni dari perpaduan tepung ketan, gula
                                        merah, dan santan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Jenang Jaket Wijen</h5>
                                    <p class="card-text">Ditaburi biji wijen yang memberikan tekstur renyah dan aroma khas, menjadi varian yang paling
                                        populer.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Jenang Jaket Mini</h5>
                                    <p class="card-text">Ukuran lebih kecil yang biasanya disajikan untuk acara-acara khusus atau sebagai suguhan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Jenang Jaket Mukti Sari</h5>
                                    <p class="card-text">Produksi dari salah satu produsen terkenal di Mersi, dengan cita rasa khas yang telah
                                        dipertahankan selama puluhan tahun.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Jenang Jaket Kemasan Modern</h5>
                                    <p class="card-text">Dikemas dalam berbagai ukuran dan kemasan yang lebih modern, memudahkan untuk dibawa sebagai
                                        oleh-oleh.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Meskipun terdapat beberapa variasi dalam penyajian dan kemasan, Jenang Jaket tetap mempertahankan
                        cita rasa tradisionalnya yang khas. Perbedaan utama biasanya terletak pada tingkat kemanisan,
                        tekstur, dan penambahan wijen. Beberapa produsen mungkin memiliki "rahasia dapur" tersendiri yang
                        membuat jenang produksi mereka memiliki karakteristik khusus yang membedakannya dari produsen lain.
                    </p>
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
                                    <p class="card-text">Jenang Jaket paling nikmat dinikmati sebagai teman minum teh atau kopi. Kombinasi rasa manis
                                        jenang dengan pahitnya kopi menciptakan perpaduan yang harmonis.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-2-circle-fill text-success me-2"></i>Tempat Terbaik</h5>
                                    <p class="card-text">Untuk mendapatkan Jenang Jaket terbaik, kunjungi langsung sentra produksi di daerah Mersi,
                                        Purwokerto. Beberapa produsen terkenal seperti Mukti Sari telah memproduksi jenang ini
                                        secara turun-temurun dengan resep yang terjaga.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-3-circle-fill text-success me-2"></i>Penyimpanan</h5>
                                    <p class="card-text">Simpan Jenang Jaket dalam wadah tertutup rapat pada suhu ruangan. Jenang ini bisa bertahan
                                        hingga 1-2 minggu, bahkan lebih lama jika disimpan dalam lemari pendingin.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-4-circle-fill text-success me-2"></i>Pemanasan Kembali</h5>
                                    <p class="card-text">Jika Jenang Jaket mengeras, panaskan sebentar dalam microwave atau dengan cara dikukus
                                        sebentar untuk mengembalikan kelembutan teksturnya.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-5-circle-fill text-success me-2"></i>Mencoba Variasi</h5>
                                    <p class="card-text">Cobalah kedua varian Jenang Jaket (polos dan wijen) untuk merasakan perbedaan tekstur dan
                                        cita rasanya. Varian wijen memberikan sensasi renyah yang menarik saat dikunyah.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </div>
@endsection
