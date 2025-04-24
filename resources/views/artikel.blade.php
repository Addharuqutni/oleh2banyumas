@extends('layouts.index')

@section('title', 'Artikel - Oleh Oleh Banyumas')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 col-lg-8 mx-auto text-center">
                    <div class="section-header">
                        <h1 class="fw-bold judul">Oleh Oleh Makanan Ringan Banyumas</h1>
                        <p class="text-muted">Apa aja sih oleh-oleh makanan ringan khas dari Banyumas? Berikut pilihannya</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Produk -->
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="{{ route('artikel.getukgoreng') }}" class="text-decoration-none">
                        <div class="card border-0 h-100 bg-transparent product-card">
                            <div class="card-img-container position-relative overflow-hidden rounded shadow-sm">
                                <img src="https://radarbanyumas.disway.id/upload/21f2411871cc16ea65d41cc9f6f10379.jpg"
                                    alt="Getuk Goreng" class="card-img-top">
                                <div class="card-img-overlay d-flex align-items-end text-white opacity-0 hover-overlay">
                                    <h5 class="fw-bold">Getuk Goreng</h5>
                                </div>
                            </div>
                            <div class="card-body text-center p-2">
                                <h5 class="card-title subjudul">Getuk Goreng</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="{{ route('artikel.jenangjaket') }}" class="text-decoration-none">
                        <div class="card border-0 h-100 bg-transparent product-card">
                            <div class="card-img-container position-relative overflow-hidden rounded shadow-sm">
                                <img src="https://radarbanyumas.disway.id//upload/600a36d2ce150a861848b8cad106f2ee.jpg"
                                    alt="Jenang Jaket" class="card-img-top">
                                <div class="card-img-overlay d-flex align-items-end text-white opacity-0 hover-overlay">
                                    <h5 class="fw-bold">Jenang Jaket</h5>
                                </div>
                            </div>
                            <div class="card-body text-center p-2">
                                <h5 class="card-title subjudul">Jenang Jaket</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="{{ route('artikel.nopia') }}" class="text-decoration-none">
                        <div class="card border-0 h-100 bg-transparent product-card">
                            <div class="card-img-container position-relative overflow-hidden rounded shadow-sm">
                                <img src="https://visitjawatengah.jatengprov.go.id/assets/images/c55b5229-9b76-4248-b4dd-07eb530d03b5.jpg"
                                    alt="Nopia" class="card-img-top">
                                <div class="card-img-overlay d-flex align-items-end text-white opacity-0 hover-overlay">
                                    <h5 class="fw-bold">Nopia</h5>
                                </div>
                            </div>
                            <div class="card-body text-center p-2">
                                <h5 class="card-title subjudul">Nopia</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="{{ route('artikel.keripiktempe') }}" class="text-decoration-none">
                        <div class="card border-0 h-100 bg-transparent product-card">
                            <div class="card-img-container position-relative overflow-hidden rounded shadow-sm">
                                <img src="https://turisian.com/wp-content/uploads/2022/05/Keripik-Tempe-Banyumas.jpg"
                                    alt="Keripik Tempe" class="card-img-top">
                                <div class="card-img-overlay d-flex align-items-end text-white opacity-0 hover-overlay">
                                    <h5 class="fw-bold">Keripik Tempe</h5>
                                </div>
                            </div>
                            <div class="card-body text-center p-2">
                                <h5 class="card-title subjudul">Keripik Tempe</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="{{ route('artikel.lanting') }}" class="text-decoration-none">
                        <div class="card border-0 h-100 bg-transparent product-card">
                            <div class="card-img-container position-relative overflow-hidden rounded shadow-sm">
                                <img src="https://down-id.img.susercontent.com/file/2244ce68d5cc9d5b5456131a4edbed17"
                                    alt="Lanting" class="card-img-top">
                                <div class="card-img-overlay d-flex align-items-end text-white opacity-0 hover-overlay">
                                    <h5 class="fw-bold">Lanting</h5>
                                </div>
                            </div>
                            <div class="card-body text-center p-2">
                                <h5 class="card-title subjudul">Lanting</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="{{ route('artikel.mendoan') }}" class="text-decoration-none">
                        <div class="card border-0 h-100 bg-transparent product-card">
                            <div class="card-img-container position-relative overflow-hidden rounded shadow-sm">
                                <img src="https://asset.kompas.com/crops/cvwZM6TsV5OEyqGufj_E8HNPk7M=/0x0:0x0/1200x800/data/photo/2021/10/30/617cf46654ed1.jpg"
                                    alt="Mendoan" class="card-img-top">
                                <div class="card-img-overlay d-flex align-items-end text-white opacity-0 hover-overlay">
                                    <h5 class="fw-bold">Mendoan</h5>
                                </div>
                            </div>
                            <div class="card-body text-center p-2">
                                <h5 class="card-title subjudul">Mendoan</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="{{ route('artikel.cimplung') }}" class="text-decoration-none">
                        <div class="card border-0 h-100 bg-transparent product-card">
                            <div class="card-img-container position-relative overflow-hidden rounded shadow-sm">
                                <img src="https://radarbanyumas.disway.id/upload/large/8c7049cb62b18e8f1179b1aeb2ad2d82.jpg"
                                    alt="Cimplung" class="card-img-top">
                                <div class="card-img-overlay d-flex align-items-end text-white opacity-0 hover-overlay">
                                    <h5 class="fw-bold">Cimplung</h5>
                                </div>
                            </div>
                            <div class="card-body text-center p-2">
                                <h5 class="card-title subjudul">Cimplung</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="{{ route('artikel.mireng') }}" class="text-decoration-none">
                        <div class="card border-0 h-100 bg-transparent product-card">
                            <div class="card-img-container position-relative overflow-hidden rounded shadow-sm">
                                <img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/6/11/f3bc55db-5dd0-4b80-b77a-3dc5b15db9a3.jpg"
                                    alt="Mireng" class="card-img-top">
                                <div class="card-img-overlay d-flex align-items-end text-white opacity-0 hover-overlay">
                                    <h5 class="fw-bold">Mireng</h5>
                                </div>
                            </div>
                            <div class="card-body text-center p-2">
                                <h5 class="card-title subjudul">Mireng</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-12 text-center">
                    <a href="{{ route('shops.index') }}" class="btn btn-outline-success rounded-pill px-4 py-2 d-inline-flex align-items-center justify-content-center">
                        <span class="me-2">Lihat Toko Oleh-oleh</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Styling untuk Section */
        .section-header {
            margin-bottom: 2rem;
        }
        
        /* Styling untuk Cards */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
        }
        
        .card-img-container {
            padding-top: 100%; /* 1:1 Aspect Ratio */
        }
        
        .card-img-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .hover-overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            transition: opacity 0.3s ease;
        }
        
        .card-img-container:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .card-img-container:hover .hover-overlay {
            opacity: 1 !important;
        }
    </style>
@endsection
