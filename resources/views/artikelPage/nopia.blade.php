@extends('layouts.index')

@section('title', 'Nopia - Kue Tradisional Khas Banyumas')

@section('content')
    <div class="container py-3">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none">Artikel</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Nopia</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="fw-bold mb-4 text-center">Nopia: Kue Legendaris Khas Banyumas</h1>

                <div class="mb-4 text-center">
                    <img src="https://visitjawatengah.jatengprov.go.id/assets/images/c55b5229-9b76-4248-b4dd-07eb530d03b5.jpg"
                        alt="Nopia Banyumas" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Apa itu Nopia?</h2>
                    <p>Nopia adalah kue tradisional khas Banyumas yang terbuat dari tepung terigu dengan isian gula jawa atau gula aren. Kue ini memiliki bentuk bulat pipih dengan permukaan yang sedikit mengembang dan berwarna kecoklatan. Tekstur Nopia cukup unik, dengan bagian luar yang renyah namun bagian dalam yang lembut dan manis karena isian gula merahnya.</p>
                    <p>Nopia merupakan salah satu oleh-oleh paling terkenal dari Banyumas, khususnya dari kota Purwokerto. Kue ini memiliki cita rasa yang khas dengan perpaduan antara adonan kulit yang gurih dan isian yang manis dari gula merah. Aroma khas Nopia yang harum dan menggugah selera menjadi daya tarik tersendiri bagi penikmatnya.</p>
                    <p>Di Banyumas, Nopia biasanya dijual dalam kemasan kotak karton yang praktis untuk dijadikan buah tangan. Harganya berkisar antara Rp 20.000 hingga Rp 35.000 per kotak, tergantung ukuran dan produsennya. Nopia memiliki daya tahan yang cukup lama, bisa mencapai 2-3 minggu jika disimpan dengan baik dalam wadah kedap udara.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Sejarah Nopia</h2>
                    <p>Sejarah Nopia di Banyumas memiliki cerita yang menarik dan berkaitan erat dengan akulturasi budaya. Konon, Nopia pertama kali diperkenalkan oleh pedagang Tionghoa yang menetap di Banyumas pada akhir abad ke-19. Kue ini merupakan adaptasi dari kue khas Tiongkok yang kemudian disesuaikan dengan bahan-bahan dan selera lokal.</p>
                    <p>Nama "Nopia" sendiri diduga berasal dari kata "Pia" dalam bahasa Hokkian yang berarti kue. Seiring waktu, masyarakat Banyumas menambahkan awalan "No" sehingga menjadi "Nopia". Beberapa sumber juga menyebutkan bahwa nama Nopia adalah singkatan dari "Noto Pia" yang dalam bahasa Jawa berarti kue yang tertata atau teratur.</p>
                    <p>Pada awalnya, Nopia hanya dibuat untuk acara-acara khusus seperti pernikahan atau perayaan hari besar. Namun, seiring berjalannya waktu, Nopia mulai diproduksi secara komersial dan menjadi identitas kuliner Banyumas. Perkembangan pariwisata di Banyumas juga turut meningkatkan popularitas Nopia sebagai oleh-oleh khas yang wajib dibawa pulang oleh wisatawan.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Bahan dan Cara Pembuatan</h2>
                    <p>Pembuatan Nopia membutuhkan ketelitian dan kesabaran karena prosesnya yang cukup rumit. Berikut adalah tahapan pembuatannya:</p>

                    <ol class="mb-4">
                        <li class="mb-2">Persiapan bahan kulit: Tepung terigu, air, minyak goreng, dan sedikit garam dicampur hingga menjadi adonan yang kalis.</li>
                        <li class="mb-2">Persiapan isian: Gula merah atau gula aren disisir halus dan dicampur dengan sedikit tepung terigu sebagai pengikat.</li>
                        <li class="mb-2">Pembentukan: Adonan kulit dibagi menjadi beberapa bagian kecil, kemudian dipipihkan dan diberi isian gula merah di tengahnya.</li>
                        <li class="mb-2">Penutupan: Adonan kulit dilipat untuk menutupi isian, lalu dibentuk bulat pipih.</li>
                        <li class="mb-2">Pencetakan: Adonan yang sudah diisi dicetak dengan cetakan khusus Nopia untuk mendapatkan bentuk yang seragam dan motif khas di permukaannya.</li>
                        <li class="mb-2">Pemanggangan: Nopia dipanggang dalam oven tradisional dengan api sedang hingga matang dan berwarna kecoklatan.</li>
                        <li class="mb-2">Pendinginan: Setelah matang, Nopia didinginkan sebelum dikemas untuk menjaga teksturnya tetap renyah.</li>
                    </ol>

                    <p>Dalam pembuatan Nopia tradisional, oven yang digunakan biasanya adalah oven tanah liat dengan bahan bakar kayu, yang memberikan aroma khas pada kue. Namun, beberapa produsen modern telah beralih ke oven gas atau listrik untuk efisiensi produksi, meskipun ada yang berpendapat bahwa hal ini sedikit mengurangi keaslian aroma Nopia.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Variasi Nopia</h2>
                    <p>Seiring berkembangnya selera konsumen, Nopia kini hadir dalam beberapa variasi:</p>
                    <ul class="mb-4">
                        <li>Nopia Original: Dengan isian gula merah atau gula aren tradisional.</li>
                        <li>Nopia Putih: Menggunakan gula pasir sebagai isian, sehingga memiliki rasa yang lebih ringan.</li>
                        <li>Nopia Kacang: Isian gula merah dicampur dengan kacang tanah yang sudah disangrai dan dihaluskan.</li>
                        <li>Nopia Durian: Menambahkan aroma dan rasa durian pada isiannya.</li>
                        <li>Nopia Mini: Versi lebih kecil dari Nopia biasa, biasanya dijual dalam kemasan yang lebih besar dengan jumlah yang lebih banyak.</li>
                    </ul>
                    <p>Meskipun tersedia berbagai variasi, Nopia dengan isian gula merah tetap menjadi yang paling populer dan dianggap sebagai Nopia autentik khas Banyumas.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Nilai Gizi dan Manfaat</h2>
                    <p>Sebagai kue tradisional berbahan dasar tepung terigu dan gula merah, Nopia memiliki kandungan nutrisi sebagai berikut (dalam perkiraan per 100 gram):</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul>
                                        <li>Kalori: 300-350 kkal</li>
                                        <li>Karbohidrat: 60-65 gram</li>
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
                                        <li>Kalsium: 40-50 mg</li>
                                        <li>Zat Besi: 1.5-2 mg</li>
                                        <li>Kalium: 120-150 mg</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Meskipun Nopia tinggi kalori dan karbohidrat, gula merah yang digunakan sebagai isian memiliki beberapa kelebihan dibandingkan gula putih. Gula merah mengandung mineral seperti zat besi, kalsium, dan kalium yang bermanfaat bagi tubuh. Namun, tetap disarankan untuk mengonsumsi Nopia secukupnya, terutama bagi penderita diabetes atau yang sedang menjaga berat badan.</p>
                </div>

                <div class="mb-5">
                    <h2 class="fw-semibold mb-3">Tips Menikmati dan Menyimpan Nopia</h2>
                    <p>Untuk mendapatkan pengalaman terbaik saat menikmati Nopia:</p>
                    <ul class="mb-4">
                        <li>Nopia paling nikmat dinikmati dengan teh hangat atau kopi, terutama di sore hari.</li>
                        <li>Untuk menjaga kerenyahan Nopia, simpan dalam wadah kedap udara pada suhu ruangan.</li>
                        <li>Jika Nopia mulai melembut, Anda bisa menghangatkannya sebentar dalam oven dengan suhu rendah untuk mengembalikan tekstur renyahnya.</li>
                        <li>Hindari menyimpan Nopia di tempat yang lembab karena akan mempercepat pelunakan teksturnya.</li>
                        <li>Nopia bisa bertahan hingga 2-3 minggu jika disimpan dengan baik, menjadikannya oleh-oleh yang praktis untuk dibawa dalam perjalanan jauh.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
