@extends('layouts.index')

@section('title', 'Artikel - Snack Banyumas')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 col-lg-8 mx-auto text-center">
                    <h1 class="fw-bold mb-3">Oleh-oleh khas Banyumas</h1>
                    <p>Apa aja sih oleh-oleh makanan ringan khas dari Banyumas? Berikut pilihannya</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Produk -->
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="/artikel/getukgoreng" class="text-decoration-none">
                        <div class="product-wrapper">
                            <div class="image-container">
                                <img src="https://radarbanyumas.disway.id/upload/21f2411871cc16ea65d41cc9f6f10379.jpg"
                                    alt="Getuk Goreng" class="rounded shadow product-img">
                                <div class="hover-alt">
                                    <span>Getuk Goreng</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="/artikel/jenangjaket" class="text-decoration-none">
                        <div class="product-wrapper">
                            <div class="image-container">
                                <img src="https://radarbanyumas.disway.id//upload/600a36d2ce150a861848b8cad106f2ee.jpg"
                                    alt="Jenang Jaket" class="rounded shadow product-img">
                                <div class="hover-alt">
                                    <span>Jenang Jaket</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="/artikel/nopia" class="text-decoration-none">
                    <div class="product-wrapper">
                        <div class="image-container">
                            <img src="https://visitjawatengah.jatengprov.go.id/assets/images/c55b5229-9b76-4248-b4dd-07eb530d03b5.jpg"
                                alt="Nopia" class="rounded shadow product-img">
                            <div class="hover-alt">
                                <span>Nopia</span>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="product-wrapper">
                        <div class="image-container">
                            <img src="https://turisian.com/wp-content/uploads/2022/05/Keripik-Tempe-Banyumas.jpg"
                                alt="Keripik Tempe" class="rounded shadow product-img">
                            <div class="hover-alt">
                                <span>Keripik Tempe</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="product-wrapper">
                        <div class="image-container">
                            <img src="https://down-id.img.susercontent.com/file/2244ce68d5cc9d5b5456131a4edbed17"
                                alt="Lanting" class="rounded shadow product-img">
                            <div class="hover-alt">
                                <span>Lanting</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="product-wrapper">
                        <div class="image-container">
                            <img src="https://asset.kompas.com/crops/cvwZM6TsV5OEyqGufj_E8HNPk7M=/0x0:0x0/1200x800/data/photo/2021/10/30/617cf46654ed1.jpg"
                                alt="Mendoan" class="rounded shadow product-img">
                            <div class="hover-alt">
                                <span>Mendoan</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="product-wrapper">
                        <div class="image-container">
                            <img src="https://radarbanyumas.disway.id/upload/large/8c7049cb62b18e8f1179b1aeb2ad2d82.jpg"
                                alt="Cimplung" class="rounded shadow product-img">
                            <div class="hover-alt">
                                <span>Cimplung</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="product-wrapper">
                        <div class="image-container">
                            <img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/6/11/f3bc55db-5dd0-4b80-b77a-3dc5b15db9a3.jpg"
                                alt="Mireng" class="rounded shadow product-img">
                            <div class="hover-alt">
                                <span>Mireng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 text-center">
                    <a href="#selengkapnya"
                        class="fw-semibold btn border rounded shadow-regular d-inline-flex justify-content-center align-items-center"
                        style="height: 50px; width: 120px; background: #ffffff;">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .product-wrapper {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container {
            position: relative;
            width: 100%;
            padding-top: 100%;
            /* 1:1 Aspect Ratio */
            overflow: hidden;
            border-radius: 0.25rem;
        }

        .product-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
            border-radius: 0.25rem;
        }

        .product-img:hover {
            transform: scale(1.05);
        }

        .hover-alt {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 0.25rem;
        }

        .hover-alt span {
            font-weight: 500;
            font-size: 1.25rem;
            text-align: center;
        }

        .image-container:hover .hover-alt {
            opacity: 1;
        }

        .image-container:hover .product-img {
            transform: scale(1.05);
        }
    </style>
@endsection
