<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- Halaman Statis --}}
    @foreach($staticPages as $page => $meta)
    <url>
        <loc>{{ $baseUrl }}/{{ $page }}</loc>
        <changefreq>{{ $meta['changefreq'] }}</changefreq>
        <priority>{{ $meta['priority'] }}</priority>
    </url>
    @endforeach

    {{-- Toko --}}
    @foreach($shops as $shop)
    <url>
        <loc>{{ $baseUrl }}/toko/{{ $shop->slug }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ $baseUrl }}/toko/detail-toko/{{ $shop->slug }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    {{-- Produk --}}
    @foreach($products as $product)
    <url>
        <loc>{{ $baseUrl }}/toko/detail-toko/{{ $product->shop->slug }}/produk/{{ $product->slug }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>