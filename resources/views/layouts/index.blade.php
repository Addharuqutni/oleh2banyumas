<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-X4Q0WXFPMD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-X4Q0WXFPMD');
    </script>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description"
        content="Website Oleh Oleh Makanan Ringan Khas Banyumas - Temukan berbagai toko oleh-oleh makanan khas Banyumas">
    <meta name="theme-color" content="#2e7d32">
    <title>@yield('title', 'Oleh-Oleh Banyumas')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ secure_url('images/Logo.png') }}">
    <link rel="apple-touch-icon" href="{{ secure_url('images/Logo.png') }}">

    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

    <!-- Preload key assets -->
    <link rel="preload" href="{{ secure_url('styles/style.css') }}" as="style">
    <link rel="preload" href="{{ secure_url('images/Logo.png') }}" as="image">
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" as="font"
        crossorigin>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ secure_url('styles/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
        }

        /* CSS Variables for consistent coloring */
        :root {
            --primary-green: #2e7d32;
            --dark-green: #1b5e20;
            --light-green: #e8f5e9;
            --medium-green: #c8e6c9;
            --light-bg: #DBEAD9;
            --white: #ffffff;
            --text-dark: #333333;
            --text-muted: #6c757d;
            --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 6px 12px rgba(0, 0, 0, 0.15);
            --shadow-lg: 0 10px 20px rgba(0, 0, 0, 0.15);
            --radius-sm: 4px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --transition-standard: all 0.3s ease;
            --transition-fast: all 0.2s ease;
            --transition-slow: all 0.5s ease;
            --animation-duration: 0.3s;
            --animation-timing: ease;
        }

        /* Global Typography */
        .judul {
            color: var(--dark-green);
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .subjudul {
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        /* Section Styling */
        .section-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .section-container {
            margin-bottom: 3rem;
        }

        .section-title {
            color: var(--dark-green);
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
            padding-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-green);
            border-radius: 3px;
        }

        /* Breadcrumb styling */
        .breadcrumb {
            background: none;
            padding: 0.5rem 0;
            margin-bottom: 1.5rem;
        }

        .breadcrumb-item {
            color: var(--primary-green);
            font-size: 0.9rem;
        }

        .breadcrumb-item a {
            color: var(--primary-green);
            text-decoration: none;
            position: relative;
            transition: var(--transition-fast);
        }

        .breadcrumb-item a:hover {
            color: var(--dark-green);
        }

        .breadcrumb-item a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background-color: var(--dark-green);
            transition: width 0.3s ease;
        }

        .breadcrumb-item a:hover::after {
            width: 100%;
        }

        .breadcrumb-item.active {
            color: var(--text-muted);
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: var(--text-muted);
            content: ">";
            font-size: 0.8rem;
        }

        /* Button Styling */
        .btn-detail {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: var(--light-green);
            color: var(--primary-green);
            border-radius: var(--radius-sm);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: var(--transition-standard);
            border: 1px solid transparent;
            text-align: center;
        }

        .btn-detail:hover,
        .btn-detail:focus {
            background-color: var(--medium-green);
            color: var(--dark-green);
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .btn-success {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
            transition: var(--transition-standard);
        }

        .btn-success:hover,
        .btn-success:focus {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .btn-outline-success {
            color: var(--primary-green);
            border-color: var(--primary-green);
            transition: var(--transition-standard);
        }

        .btn-outline-success:hover,
        .btn-outline-success:focus {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .btn-link {
            transition: var(--transition-standard);
        }

        .btn-link:hover,
        .btn-link:focus {
            transform: translateX(-3px);
        }

        /* Card Styles */
        .card-img-container {
            padding-top: 100%;
            /* 1:1 Aspect Ratio */
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-md);
        }

        .card-img-top,
        .card-img {
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

        .card-img-container:hover .card-img-top,
        .card-img-container:hover .card-img {
            transform: scale(1.05);
        }

        .card-img-container:hover .hover-overlay {
            opacity: 1 !important;
        }

        /* Store Card Styling */
        .store-card {
            background-color: var(--white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            height: 100%;
            transition: var(--transition-standard);
            position: relative;
            z-index: 1;
        }

        .store-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .store-card .card-img-container {
            width: 100%;
            height: 180px;
            overflow: hidden;
            position: relative;
        }

        .store-card .card-img-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.3), transparent);
            opacity: 0;
            transition: var(--transition-standard);
        }

        .store-card:hover .card-img-container::after {
            opacity: 1;
        }

        .store-card .card-content {
            padding: 1.25rem;
        }

        .store-card .card-title {
            font-weight: 600;
            color: var(--primary-green);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
            transition: var(--transition-fast);
        }

        .store-card:hover .card-title {
            color: var(--dark-green);
        }

        .store-card .card-address {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        /* Product Card Styling */
        .product-card {
            background-color: var(--white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            height: 100%;
            transition: var(--transition-standard);
            position: relative;
            z-index: 1;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .product-card .product-img-container {
            width: 100%;
            height: 180px;
            overflow: hidden;
            position: relative;
        }

        .product-card .product-img-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.3), transparent);
            opacity: 0;
            transition: var(--transition-standard);
        }

        .product-card:hover .product-img-container::after {
            opacity: 1;
        }

        .product-card .product-body {
            padding: 1.25rem;
        }

        .product-card .product-title {
            font-weight: 600;
            color: var(--primary-green);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
            transition: var(--transition-fast);
        }

        .product-card:hover .product-title {
            color: var(--dark-green);
        }

        .product-card .product-price {
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        /* Badge Styling */
        .category-badges {
            position: absolute;
            bottom: 10px;
            left: 10px;
            z-index: 2;
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .category-badges .badge {
            font-size: 0.7rem;
            font-weight: 500;
            padding: 0.35em 0.65em;
            opacity: 0.9;
            transition: var(--transition-fast);
        }

        .product-card:hover .category-badges .badge,
        .store-card:hover .category-badges .badge {
            opacity: 1;
            transform: translateY(-3px);
        }

        .badge {
            font-weight: normal;
        }

        /* Pagination Styling */
        .pagination .page-link {
            color: var(--primary-green);
            border-color: #dee2e6;
            transition: var(--transition-fast);
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
            color: var(--white);
        }

        .pagination .page-link:hover {
            background-color: var(--light-green);
            color: var(--dark-green);
            border-color: var(--medium-green);
        }

        .pagination .page-item.disabled .page-link {
            color: var(--text-muted);
            background-color: #f8f9fa;
        }

        /* Map Container */
        .map-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
        }

        #map {
            width: 100%;
            height: 70vh;
        }

        .map-loading {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 100;
        }

        .map-loading .spinner-border {
            color: var(--primary-green) !important;
            width: 3rem;
            height: 3rem;
            margin-bottom: 1rem;
        }

        .map-loading p {
            color: var(--primary-green);
            font-weight: 500;
        }

        .navigation-btn-container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .navigation-btn {
            background-color: var(--primary-green);
            color: var(--white);
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-md);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            font-weight: 500;
            box-shadow: var(--shadow-md);
            transition: var(--transition-standard);
        }

        .navigation-btn:hover {
            background-color: var(--dark-green);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            color: var(--white);
        }

        /* Icon Styling */
        .icon-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            background-color: var(--light-green);
            color: var(--primary-green);
        }

        /* Goal Card */
        .goal-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .goal-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Footer Styling */
        .footer-logo {
            transition: var(--transition-standard);
            display: block;
        }

        .footer-logo:hover {
            transform: scale(1.05);
        }

        .footer-links {
            margin-top: 1rem;
        }

        .footer-link {
            color: var(--text-dark);
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease;
            text-decoration: none;
            padding: 0.25rem 0;
        }

        .footer-link:hover {
            color: var(--primary-green);
        }

        .footer-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-green);
            transition: width 0.3s ease;
        }

        .footer-link:hover::after {
            width: 100%;
        }

        footer hr {
            border-color: rgba(0, 0, 0, 0.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            #map {
                height: 50vh;
            }

            .judul {
                font-size: 1.75rem;
            }

            .subjudul {
                font-size: 1.35rem;
            }

            .lead {
                font-size: 1rem;
            }

            .card-img-container {
                height: 150px;
            }
        }

        /* Empty Results */
        .empty-results {
            padding: 3rem 2rem;
            text-align: center;
            background-color: var(--white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
        }

        .empty-results i {
            font-size: 3rem;
            color: var(--text-muted);
            margin-bottom: 1rem;
            display: block;
        }

        .empty-results h5 {
            color: var(--primary-green);
            margin-bottom: 1rem;
        }

        .empty-results p {
            color: var(--text-muted);
            max-width: 80%;
            margin: 0 auto 1.5rem;
        }

        /* Form Styling */
        .search-input-group .form-control {
            border-color: #dee2e6;
            box-shadow: none;
            font-size: 0.95rem;
        }

        .search-input-group .form-control:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.25rem rgba(46, 125, 50, 0.15);
        }

        .search-input-group .input-group-text {
            border-color: #dee2e6;
        }

        .search-input-group .form-control:focus+.input-group-text,
        .search-input-group .input-group-text+.form-control:focus {
            border-color: var(--primary-green);
        }

        .category-select {
            border-color: #dee2e6;
            box-shadow: none;
            font-size: 0.95rem;
        }

        .category-select:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.25rem rgba(46, 125, 50, 0.15);
        }

        /* Article Styling */
        article {
            max-width: 100%;
            margin: 0 auto;
        }

        article section {
            margin-bottom: 2.5rem;
        }

        article h1 {
            color: var(--dark-green);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        article h2 {
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 1.2rem;
        }

        article h3 {
            color: var(--primary-green);
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        article p {
            color: var(--text-dark);
            line-height: 1.8;
            margin-bottom: 1.2rem;
            font-size: 1rem;
        }

        article .lead p {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--text-dark);
        }

        article .alert {
            margin: 1.5rem 0;
            border-radius: var(--radius-md);
        }

        article .card {
            border-radius: var(--radius-md);
            overflow: hidden;
            transition: var(--transition-standard);
        }

        article .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        article .list-group-item {
            line-height: 1.6;
            padding: 0.75rem 1.25rem;
            color: var(--text-dark);
        }

        article img {
            max-width: 100%;
            border-radius: var(--radius-md);
        }

        article .card-title {
            color: var(--primary-green);
            font-weight: 600;
        }

        article .card-text {
            color: var(--text-dark);
            font-size: 0.95rem;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    @stack('script')
</body>

</html>
