@extends('layouts.index')

@section('title', 'Toko - Oleh Oleh')

@section('content')
    <div class="container-fluid py-4" style="background-color: #e8f5e9;">
        <div class="container">
            <!-- Back Button and Title -->
            <div class="container mb-4">
                <div class="row position-relative align-items-center">
                    <!-- Back Button (Left) -->
                    <div class="col-auto position-absolute start-0 d-flex align-items-center" style="z-index: 10;">
                        <a href="#" class="text-dark">
                            <i class="bi bi-chevron-left fs-4"></i>
                        </a>
                    </div>

                    <!-- Title (Center) -->
                    <div class="col-12 text-center">
                        <h1 class="mb-0 fw-bold">Toko Oleh Oleh Makanan Ringan Banyumas</h1>
                    </div>
                </div>
            </div>

            <!-- Search Bar (Center) -->
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-start" placeholder="Cari toko atau produk...">
                            <button class="btn btn-dark rounded-end" type="button">Cari</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Store Cards - Row 1 -->
            <div class="row g-4 mb-4">
                <!-- Store Card 1 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://asset.kompas.com/crops/WYVkY6Lk1HtXCw9uA5Cw-NJkBtw=/0x0:698x465/750x500/data/photo/2020/12/30/5fec4ca8f3fd9.jpg"
                                alt="Getuk Goreng Sokaraja" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Getuk Goreng Sokaraja</h5>
                            <p class="card-address">Jl. Raya Sokaraja, Banyumas</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>

                <!-- Store Card 2 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://visitjawatengah.jatengprov.go.id/assets/images/c55b5229-9b76-4248-b4dd-07eb530d03b5.jpg"
                                alt="Pusat Oleh-oleh Nopia" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Pusat Oleh-oleh Nopia</h5>
                            <p class="card-address">Jl. Suparjo Rustam, Purwokerto</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>

                <!-- Store Card 3 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://radarbanyumas.disway.id//upload/600a36d2ce150a861848b8cad106f2ee.jpg"
                                alt="Jenang Jaket Banyumas" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Jenang Jaket Banyumas</h5>
                            <p class="card-address">Jl. S. Parman, Purwokerto</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>

                <!-- Store Card 4 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://down-id.img.susercontent.com/file/2244ce68d5cc9d5b5456131a4edbed17"
                                alt="Toko Lanting Asli" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Toko Lanting Asli</h5>
                            <p class="card-address">Jl. Raya Baturraden, Banyumas</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Store Cards - Row 2 -->
            <div class="row g-4 mb-4">
                <!-- Store Card 5 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://asset.kompas.com/crops/cvwZM6TsV5OEyqGufj_E8HNPk7M=/0x0:0x0/1200x800/data/photo/2021/10/30/617cf46654ed1.jpg"
                                alt="Mendoan Banyumas" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Mendoan Banyumas</h5>
                            <p class="card-address">Jl. Dr. Angka, Purwokerto</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>

                <!-- Store Card 6 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://radarbanyumas.disway.id/upload/large/8c7049cb62b18e8f1179b1aeb2ad2d82.jpg"
                                alt="Cimplung Banyumas" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Cimplung Banyumas</h5>
                            <p class="card-address">Jl. Jenderal Sudirman, Purwokerto</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>

                <!-- Store Card 7 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/6/11/f3bc55db-5dd0-4b80-b77a-3dc5b15db9a3.jpg"
                                alt="Mireng Banyumas" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Mireng Banyumas</h5>
                            <p class="card-address">Jl. Overste Isdiman, Purwokerto</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>

                <!-- Store Card 8 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://turisian.com/wp-content/uploads/2022/05/Keripik-Tempe-Banyumas.jpg"
                                alt="Keripik Tempe Banyumas" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Keripik Tempe Banyumas</h5>
                            <p class="card-address">Jl. HR Bunyamin, Purwokerto</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Store Cards - Row 3 -->
            <div class="row g-4 mb-5">
                <!-- Store Card 9 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://cdn-cas.orami.co.id/parenting/images/Makanan-Khas-Purwokerto-2.width-800.jpg"
                                alt="Sroto Banyumas" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Sroto Banyumas</h5>
                            <p class="card-address">Jl. S. Parman, Purwokerto</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>

                <!-- Store Card 10 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://www.gotravelly.com/blog/wp-content/uploads/2018/11/kripik-tempe-banyumas.jpg"
                                alt="Oleh-oleh Khas Banyumas" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Oleh-oleh Khas Banyumas</h5>
                            <p class="card-address">Jl. Gatot Subroto, Purwokerto</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>

                <!-- Store Card 11 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://www.gotravelly.com/blog/wp-content/uploads/2018/11/tempe-mendoan.jpg"
                                alt="Mendoan Kriuk" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Mendoan Kriuk</h5>
                            <p class="card-address">Jl. Pahlawan, Purwokerto</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>

                <!-- Store Card 12 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="store-card">
                        <div class="card-img-container">
                            <img src="https://cdn0-production-images-kly.akamaized.net/Q93S_AK9CBn4OI5pNYOAu8sUebc=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3953759/original/055022800_1646103525-shutterstock_1993724253.jpg"
                                alt="Sate Blater" class="card-img">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">Sate Blater</h5>
                            <p class="card-address">Jl. Pemuda, Purwokerto</p>
                            <a href="#" class="btn-detail">Detail Toko</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* Background color */
        body {
            background-color: #e8f5e9;
        }

        /* Store Card Styling */
        .store-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .store-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-img-container {
            width: 100%;
            height: 180px;
            overflow: hidden;
        }

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .store-card:hover .card-img {
            transform: scale(1.05);
        }

        .card-content {
            padding: 1.25rem;
        }

        .card-title {
            font-weight: 600;
            color: #2e7d32;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .card-address {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .btn-detail {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #e8f5e9;
            color: #2e7d32;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        .btn-detail:hover {
            background-color: #c8e6c9;
        }

        /* Pagination Styling */
        .pagination {
            margin-top: 2rem;
        }

        .pagination .page-link {
            color: #2e7d32;
            border-color: #ddd;
            background-color: #fff;
        }

        .pagination .page-item.active .page-link {
            background-color: #555;
            border-color: #555;
            color: white;
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background-color: #e8f5e9;
        }

        /* Search Bar Styling */
        .input-group .form-control {
            border-right: none;
        }

        .input-group .btn {
            border-left: none;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            .card-img-container {
                height: 160px;
            }

            h1 {
                font-size: 1.8rem;
            }
        }
    </style>

@endsection
