@extends('layouts.index')

@section('title', 'Keripik Tempe - Camilan Renyah Khas Banyumas')

@section('content')
    <div class="container py-5">
        <article>
            <!-- Header -->
            <header class="mb-5">
                <h1 class="fw-bold text-center mb-4 judul">Keripik Tempe: Kuliner Tradisional Khas Banyumas</h1>
                <div class="text-center" style="width: 100%; height: 500px;">
                    <img src="https://dolanbanyumas.banyumaskab.go.id/assets/gambar_objek/keripik-tempe.jpg"
                        alt="Keripik Tempe Banyumas" class="img-fluid rounded shadow-sm" style="width: 100%; height: 100%; object-fit: cover;">
                    <p class="text-muted fst-italic">Keripik Tempe - Camilan renyah khas Banyumas</p>
                </div>
            </header>

            <!-- Introduction -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Penjelasan</h2>
                <div class="lead">
                    <p>Keripik Tempe adalah makanan tradisional khas Banyumas yang terbuat dari tempe yang diiris tipis,
                        dilapisi dengan adonan tepung berbumbu, kemudian digoreng hingga renyah dan kering. Keripik ini
                        terbuat dari bahan baku yang sama dengan mendoan, yakni tempe yang dibuat dari kedelai, namun dengan
                        cara pengolahan yang berbeda sehingga menghasilkan tekstur yang renyah dan tahan lama.</p>

                    <p>Cita rasa Keripik Tempe Banyumas sangat khas, dengan perpaduan gurih dari tempe, renyah dari proses
                        penggorengan, dan aroma rempah dari bumbu-bumbu yang digunakan. Teksturnya yang renyah namun tetap
                        mempertahankan rasa tempe yang khas menjadikannya camilan yang sangat digemari. Keripik tempe
                        biasanya berbentuk lembaran tipis dengan ketebalan sekitar 0,5 - 1 mm, yang menghasilkan kerenyahan
                        optimal saat dinikmati.</p>

                    <p>Di Banyumas, Keripik Tempe telah menjadi salah satu oleh-oleh khas dan identitas kuliner daerah.
                        Beberapa merek terkenal seperti Niti, Intisari, dan Mba Ucih telah memproduksi keripik tempe ini
                        secara komersial dan menjadi favorit wisatawan. Harganya berkisar antara Rp 25.000 hingga Rp 45.000
                        per kemasan, tergantung pada ukuran dan merek. Keripik tempe ini sangat cocok dinikmati sebagai
                        camilan pendamping teh atau kopi, dan juga sebagai lauk pendamping nasi.</p>
                </div>
            </section>

            <!-- History -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Sejarah</h2>
                <div class="lead">
                    <p>Sejarah Keripik Tempe Banyumas tidak terlepas dari sejarah tempe itu sendiri di wilayah Banyumas.
                        Tempe telah menjadi makanan populer di wilayah ini sejak lama, dan keripik tempe muncul sebagai
                        inovasi untuk mengawetkan tempe yang memiliki masa simpan relatif singkat. Dengan menggorengnya
                        hingga kering, tempe dapat disimpan lebih lama dan tetap mempertahankan rasanya.</p>

                    <div class="alert alert-info my-4">
                        <p class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Keripik Tempe Banyumas memiliki keterkaitan erat dengan Tempe Mendoan yang lebih terkenal.
                            Keduanya menggunakan bahan dasar yang sama, namun mendoan digoreng setengah matang agar tetap
                            lembek di dalam, sementara keripik tempe digoreng hingga benar-benar kering dan renyah.
                            Perbedaan ini mencerminkan variasi kuliner yang kaya dalam tradisi makanan Banyumas.</p>
                    </div>

                    <p>Seiring berkembangnya waktu, Keripik Tempe Banyumas semakin populer dan menjadi salah satu oleh-oleh
                        khas daerah yang dicari wisatawan. Beberapa produsen keripik tempe telah berdiri puluhan tahun,
                        menjaga resep tradisional namun juga berinovasi dengan varian rasa baru untuk menarik konsumen.
                        Kecamatan Purwokerto Selatan bahkan dikenal sebagai salah satu sentra industri keripik tempe di
                        Kabupaten Banyumas, sehingga memperkuat identitas Banyumas sebagai "kota keripik tempe" di kalangan
                        wisatawan.</p>
                </div>
            </section>

            <!-- Ingredients and Preparation -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Bahan dan Cara Pembuatan</h2>
                <div class="lead">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Bahan Utama</h5>
                                    <ul class="card-text">
                                        <li><small>500 gram tempe kedelai berkualitas baik</small></li>
                                        <li><small>200 gram tepung beras</small></li>
                                        <li><small>150 gram tepung tapioka</small></li>
                                        <li><small>1 sendok teh baking powder</small></li>
                                        <li><small>Minyak goreng baru secukupnya</small></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Bumbu</h5>
                                    <ul class="card-text">
                                        <li><small>5 siung bawang putih, haluskan</small></li>
                                        <li><small>2 sendok teh ketumbar bubuk</small></li>
                                        <li><small>5 lembar daun jeruk, iris halus</small></li>
                                        <li><small>1 sendok teh garam</small></li>
                                        <li><small>1/2 sendok teh merica bubuk</small></li>
                                        <li><small>1 sendok teh kaldu bubuk</small></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mb-3">Cara Membuat</h3>
                    <ol class="list-group list-group-numbered mb-4">
                        <li class="list-group-item border-0 bg-transparent"><small>Pilih tempe dengan kualitas baik dan tanpa jamur berlebih. Iris tipis tempe dengan ketebalan
                            sekitar 0,5 - 1 mm. Direkomendasikan untuk mengiris tempe saat akan digoreng saja karena jamur
                            tempe dapat berkembang dengan cepat.</small></li>
                        <li class="list-group-item border-0 bg-transparent"><small>Siapkan adonan tepung dengan mencampurkan tepung beras, tepung tapioka, baking powder, dan semua
                            bumbu dalam wadah. Aduk rata.</small></li>
                        <li class="list-group-item border-0 bg-transparent"><small>Tambahkan air secukupnya ke dalam campuran tepung hingga membentuk adonan yang tidak terlalu
                            kental dan tidak terlalu encer. Konsistensinya harus bisa melapisi tempe dengan baik.</small></li>
                        <li class="list-group-item border-0 bg-transparent"><small>Celupkan irisan tempe ke dalam adonan tepung berbumbu hingga seluruh permukaan terlapisi rata.</small></li>
                        <li class="list-group-item border-0 bg-transparent"><small>Panaskan minyak dalam wajan dengan api sedang. Pastikan menggunakan minyak yang baru untuk hasil
                            yang maksimal.</small></li>
                        <li class="list-group-item border-0 bg-transparent"><small>Goreng tempe yang sudah dilapisi adonan hingga setengah matang, kemudian angkat dan tiriskan.</small></li>
                        <li class="list-group-item border-0 bg-transparent"><small>Setelah semua tempe digoreng tahap pertama, goreng kembali tempe untuk kedua kalinya hingga
                            berwarna kecoklatan dan benar-benar renyah.</small></li>
                        <li class="list-group-item border-0 bg-transparent">Angkat keripik tempe, tiriskan minyaknya, dan dinginkan sebelum dikemas agar tetap renyah.</li>
                    </ol>

                    <div class="alert alert-warning">
                        <p class="mb-0"><i class="bi bi-lightbulb-fill me-2"></i><strong>Tip:</strong> Kunci utama dalam membuat Keripik Tempe Banyumas yang renyah adalah
                            ketebalan irisan tempe yang konsisten, penggunaan minyak baru, dan penggorengan dua kali.
                            Pastikan tempe benar-benar kering setelah digoreng kedua kali untuk mendapatkan tekstur renyah
                            yang tahan lama. Jika ingin membuat varian rasa, tambahkan bumbu seperti bubuk cabai untuk rasa
                            pedas atau gula untuk rasa manis setelah keripik diangkat dari penggorengan kedua.</p>
                    </div>
                </div>
            </section>

            <!-- Variations -->
            <section class="mb-5 bg-light p-4 rounded shadow-sm">
                <h2 class="subjudul mb-4 border-bottom pb-2">Variasi</h2>
                <div class="lead">
                    <p>Meskipun Keripik Tempe Banyumas secara tradisional memiliki cita rasa gurih alami, seiring
                        perkembangan zaman, terdapat beberapa variasi yang bisa ditemui:</p>

                    <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Keripik Tempe Original</h5>
                                    <p class="card-text">Versi klasik dengan rasa gurih alami dari tempe dan bumbu sederhana, memberikan pengalaman
                                        autentik dari cita rasa keripik tempe tradisional.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Keripik Tempe Pedas</h5>
                                    <p class="card-text">Ditambahkan cabai bubuk atau bumbu pedas lainnya untuk memberikan sensasi pedas yang
                                        menggugah selera bagi penggemar pedas.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Keripik Tempe Manis</h5>
                                    <p class="card-text">Diberi tambahan gula atau karamel yang memberikan cita rasa manis dan sedikit gurih, cocok
                                        sebagai camilan ringan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Keripik Tempe Dage</h5>
                                    <p class="card-text">Menggunakan tempe gembus atau dage (ampas tahu) sebagai bahan dasar, memberikan tekstur dan
                                        rasa yang berbeda dari keripik tempe biasa.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Keripik Teechi (Tempe Aci)</h5>
                                    <p class="card-text">Variasi yang menggabungkan tempe dengan tepung sagu (aci), menghasilkan keripik dengan
                                        tekstur lebih renyah dan cita rasa unik.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Selain variasi rasa dan bahan, Keripik Tempe Banyumas juga hadir dalam berbagai merek dengan
                        karakteristik berbeda. Merek-merek terkenal seperti Niti, Intisari, dan Mba Ucih telah menjadi ikon
                        keripik tempe di wilayah Banyumas. Masing-masing produsen memiliki resep rahasia yang membuat produk
                        mereka memiliki cita rasa khas dan telah mendapatkan penggemar setia masing-masing.</p>
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
                                    <p class="card-text">Keripik Tempe Banyumas paling nikmat dinikmati sebagai camilan saat minum teh atau kopi.
                                        Kombinasi antara kerenyahan keripik dengan hangatnya minuman menciptakan pengalaman makan
                                        yang menyenangkan.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-2-circle-fill text-success me-2"></i>Sebagai Lauk</h5>
                                    <p class="card-text">Selain sebagai camilan, keripik tempe juga bisa dijadikan sebagai lauk pendamping nasi.
                                        Cobalah menambahkan sambal atau saus favorit untuk variasi rasa yang lebih kaya.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-3-circle-fill text-success me-2"></i>Penyimpanan</h5>
                                    <p class="card-text">Untuk menjaga kerenyahan keripik tempe, simpan dalam wadah kedap udara segera setelah kemasan
                                        dibuka. Hindari menyimpan di tempat lembab karena dapat membuat keripik tempe melempem.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-4-circle-fill text-success me-2"></i>Memilih Oleh-oleh</h5>
                                    <p class="card-text">Saat membeli keripik tempe sebagai oleh-oleh, carilah produsen yang telah terkenal seperti
                                        Niti, Intisari, atau Mba Ucih yang menjamin kualitas dan keaslian cita rasa keripik tempe
                                        Banyumas.</p>
                                </div>
                            </div>
                            
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-5-circle-fill text-success me-2"></i>Kualitas Produk</h5>
                                    <p class="card-text">Keripik tempe yang berkualitas baik memiliki warna kecoklatan merata, tekstur renyah, dan
                                        tidak berminyak. Perhatikan juga tanggal produksi dan masa kedaluwarsa saat membeli untuk
                                        mendapatkan produk yang masih segar.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </div>
@endsection
