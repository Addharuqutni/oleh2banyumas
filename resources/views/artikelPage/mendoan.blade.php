@extends('layouts.index')

@section('title', 'Mendoan - Kuliner Legendaris Khas Banyumas')

@section('content')
    <div class="container py-3">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none">Artikel</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Mendoan</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="fw-bold mb-4 text-center">Mendoan: Gorengan Setengah Matang Khas Banyumas</h1>

                <div class="mb-4 text-center">
                    <img src="https://imgcdn.espos.id/@espos/images/2019/12/mendoan.jpg?quality=60"
                        alt="Mendoan Banyumas" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Apa itu Mendoan?</h2>
                    <p>Mendoan adalah hidangan khas Banyumas yang terbuat dari tempe yang diiris tipis, dicelupkan ke dalam adonan tepung berbumbu, lalu digoreng setengah matang. Ciri khas mendoan yang paling menonjol adalah teksturnya yang lembut dan lembab di bagian dalam, namun tetap renyah di bagian luar. Berbeda dengan tempe goreng pada umumnya yang digoreng hingga kering dan renyah, mendoan sengaja digoreng dengan waktu yang singkat sehingga bagian dalamnya masih lembab.</p>
                    <p>Nama "mendoan" berasal dari bahasa Banyumasan "mendo" yang berarti setengah matang atau lembek. Hal ini merujuk pada cara menggorengnya yang tidak sampai kering benar. Mendoan biasanya disajikan panas-panas dengan cabai rawit segar atau sambal kecap sebagai pelengkap. Aromanya yang harum dan rasanya yang gurih membuat mendoan menjadi camilan favorit masyarakat Banyumas dan kini telah populer di berbagai daerah di Indonesia.</p>
                    <p>Di Banyumas, mendoan tidak hanya sekadar camilan tetapi telah menjadi bagian dari identitas kuliner daerah tersebut. Mendoan biasa dinikmati sebagai camilan sore hari, lauk pendamping nasi, atau sebagai hidangan pembuka. Harganya sangat terjangkau, berkisar antara Rp 1.000 hingga Rp 2.000 per potong di warung-warung kecil, atau Rp 10.000 hingga Rp 15.000 per porsi di rumah makan.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Sejarah Mendoan</h2>
                    <p>Sejarah mendoan tidak terlepas dari budaya kuliner masyarakat Banyumas yang gemar mengolah tempe sebagai bahan makanan. Menurut cerita turun-temurun, mendoan sudah ada sejak abad ke-19 dan menjadi makanan sehari-hari masyarakat Banyumas, khususnya di daerah Sokaraja dan Purwokerto.</p>
                    <p>Pada awalnya, mendoan dibuat sebagai alternatif cara menikmati tempe yang lebih lembut untuk orang tua atau anak-anak yang kesulitan mengunyah tempe goreng yang keras. Seiring berjalannya waktu, cara menggoreng tempe yang tidak terlalu kering ini justru disukai banyak orang karena rasanya yang lebih gurih dan teksturnya yang unik.</p>
                    <p>Popularitas mendoan semakin meningkat pada tahun 1970-an ketika banyak mahasiswa dari Banyumas yang kuliah di kota-kota besar mulai memperkenalkan makanan ini kepada teman-teman mereka. Saat ini, mendoan tidak hanya dapat ditemukan di Banyumas, tetapi juga di berbagai kota besar di Indonesia. Meskipun demikian, mendoan asli Banyumas tetap memiliki cita rasa yang khas dan tidak tergantikan.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Bahan dan Cara Pembuatan</h2>
                    <p>Membuat mendoan terlihat sederhana, namun diperlukan teknik khusus untuk mendapatkan tekstur yang tepat. Berikut adalah bahan-bahan dan cara pembuatannya:</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Bahan Utama</h5>
                                    <ul>
                                        <li>Tempe segar (diiris tipis, sekitar 0.5-1 cm)</li>
                                        <li>Tepung terigu</li>
                                        <li>Tepung beras</li>
                                        <li>Daun bawang (diiris halus)</li>
                                        <li>Air</li>
                                        <li>Minyak untuk menggoreng</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Bumbu</h5>
                                    <ul>
                                        <li>Bawang putih (dihaluskan)</li>
                                        <li>Ketumbar (dihaluskan)</li>
                                        <li>Kunyit (secukupnya, dihaluskan)</li>
                                        <li>Daun kucai (diiris halus)</li>
                                        <li>Garam</li>
                                        <li>Kaldu bubuk (opsional)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Langkah-langkah pembuatan mendoan:</p>
                    <ol class="mb-4">
                        <li class="mb-2">Persiapan tempe: Tempe segar diiris tipis dengan ketebalan sekitar 0.5-1 cm. Irisan yang terlalu tebal akan sulit matang di bagian dalam, sementara yang terlalu tipis akan cepat kering saat digoreng.</li>
                        <li class="mb-2">Pembuatan adonan tepung: Campurkan tepung terigu dan tepung beras dengan perbandingan 2:1. Tambahkan bumbu halus, daun bawang, daun kucai, garam, dan kaldu bubuk. Tuangkan air secukupnya sambil diaduk hingga menjadi adonan yang tidak terlalu kental dan tidak terlalu encer.</li>
                        <li class="mb-2">Pelapisan tempe: Celupkan irisan tempe ke dalam adonan tepung hingga seluruh permukaan terlapisi rata.</li>
                        <li class="mb-2">Penggorengan: Panaskan minyak dalam wajan dengan api sedang. Goreng tempe yang sudah dilapisi adonan tepung selama 2-3 menit saja atau hingga bagian luarnya sedikit kecoklatan. Penting untuk tidak menggoreng terlalu lama agar tetap mendapatkan tekstur mendoan yang khas.</li>
                        <li class="mb-2">Penirisan: Angkat mendoan dan tiriskan untuk mengurangi minyak berlebih.</li>
                        <li class="mb-2">Penyajian: Sajikan mendoan selagi hangat dengan cabai rawit atau sambal kecap sebagai pelengkap.</li>
                    </ol>

                    <p>Kunci utama dalam membuat mendoan yang autentik adalah waktu penggorengan yang tepat dan adonan tepung yang tidak terlalu kental. Mendoan asli Banyumas biasanya menggunakan daun kucai yang memberikan aroma khas, namun saat ini banyak yang menggantinya dengan daun bawang karena lebih mudah didapat.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Variasi Mendoan</h2>
                    <p>Meskipun mendoan tradisional terbuat dari tempe, seiring perkembangan kuliner, kini terdapat beberapa variasi mendoan:</p>
                    <ul class="mb-4">
                        <li>Mendoan Tempe: Versi original dan paling populer.</li>
                        <li>Mendoan Tahu: Menggunakan tahu sebagai pengganti tempe, memiliki tekstur yang lebih lembut.</li>
                        <li>Mendoan Jamur: Menggunakan jamur tiram yang diiris tipis, cocok untuk vegetarian.</li>
                        <li>Mendoan Pedas: Adonan tepung dicampur dengan cabai halus untuk memberikan sensasi pedas.</li>
                        <li>Mendoan Keju: Variasi modern di mana adonan tepung dicampur dengan keju parut.</li>
                    </ul>
                    <p>Meskipun terdapat berbagai variasi, mendoan tempe tetap menjadi yang paling autentik dan digemari, terutama oleh masyarakat Banyumas yang menjunjung tinggi keaslian kuliner tradisional mereka.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Nilai Gizi dan Manfaat</h2>
                    <p>Sebagai makanan berbahan dasar tempe, mendoan memiliki kandungan nutrisi yang cukup baik, meskipun melalui proses penggorengan. Berikut perkiraan kandungan gizi dalam satu porsi mendoan (3-4 potong):</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Kalori: 250-300 kkal</li>
                                        <li>Karbohidrat: 25-30 gram</li>
                                        <li>Protein: 10-15 gram</li>
                                        <li>Lemak: 12-15 gram</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Serat: 3-5 gram</li>
                                        <li>Kalsium: 80-100 mg</li>
                                        <li>Zat Besi: 2-3 mg</li>
                                        <li>Isoflavon: 20-25 mg</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Tempe sebagai bahan utama mendoan mengandung protein nabati berkualitas tinggi dan isoflavon yang bermanfaat untuk kesehatan. Isoflavon dalam tempe memiliki sifat antioksidan yang dapat membantu mengurangi risiko penyakit jantung dan beberapa jenis kanker. Selain itu, proses fermentasi pada tempe membuat nutrisinya lebih mudah diserap oleh tubuh.</p>
                    <p>Meskipun mendoan digoreng, cara menggorengnya yang sebentar (setengah matang) membuat penyerapan minyak tidak sebanyak gorengan yang dimasak hingga kering. Namun, tetap disarankan untuk mengonsumsi mendoan secukupnya, terutama bagi yang sedang menjaga asupan lemak.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Mendoan dalam Budaya Banyumas</h2>
                    <p>Mendoan bukan sekadar makanan di Banyumas, tetapi telah menjadi bagian dari identitas budaya masyarakatnya. Beberapa aspek budaya terkait mendoan antara lain:</p>
                    <ul class="mb-4">
                        <li>Mendoan sebagai simbol keramahan: Di Banyumas, mendoan sering disajikan sebagai suguhan untuk tamu, mencerminkan keramahan dan kehangatan masyarakat setempat.</li>
                        <li>Tradisi ngapak: Mendoan sering dikaitkan dengan budaya "ngapak" (logat Banyumasan) dan menjadi salah satu kebanggaan masyarakat Banyumas.</li>
                        <li>Festival Mendoan: Beberapa daerah di Banyumas rutin mengadakan festival mendoan untuk mempromosikan kuliner khas ini dan menarik wisatawan.</li>
                        <li>Ekonomi kreatif: Mendoan telah menjadi sumber pendapatan bagi banyak UMKM di Banyumas, baik dalam bentuk warung makan maupun produsen mendoan beku yang dipasarkan lebih luas.</li>
                    </ul>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Tips Menikmati Mendoan</h2>
                    <p>Untuk mendapatkan pengalaman terbaik saat menikmati mendoan:</p>
                    <ul class="mb-4">
                        <li>Nikmati mendoan selagi hangat untuk merasakan teksturnya yang lembut di dalam dan sedikit renyah di luar.</li>
                        <li>Mendoan paling nikmat disantap dengan cabai rawit segar atau dicocol ke dalam sambal kecap.</li>
                        <li>Mendoan bisa dinikmati sebagai camilan dengan teh hangat atau sebagai lauk pendamping nasi.</li>
                        <li>Jika membuat mendoan di rumah, pastikan minyak cukup panas sebelum menggoreng agar adonan tepung tidak menyerap terlalu banyak minyak.</li>
                        <li>Untuk pengalaman kuliner yang lebih lengkap, nikmati mendoan bersama dengan kuliner khas Banyumas lainnya seperti sroto atau sate Ambal.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
