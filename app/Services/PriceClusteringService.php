<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;

class PriceClusteringService
{
    private int $k;
    private int $maxIterations;
    private float $tolerance;

    public function __construct(int $k = 3, int $maxIterations = 100, float $tolerance = 0.01)
    {
        $this->k = $k;
        $this->maxIterations = $maxIterations;
        $this->tolerance = $tolerance;
    }

    public function clusterByPrice(Collection $products): array
    {
        if ($products->isEmpty()) {
            return [];
        }

        $prices = $products->pluck('price')->toArray();
        $normalizedPrices = $this->normalizeData($prices);
        $clusters = $this->kMeans($normalizedPrices);

        // Kelompokkan produk
        $clusteredProducts = $this->groupProductsByClusters($products, $clusters);
        // Dapatkan informasi tentang cluster
        $clusterInfo = $this->getClusterInfo($clusteredProducts);

        return [
            'clusters' => $clusteredProducts,
            'cluster_info' => $clusterInfo,
            'total_products' => $products->count(),
            'k' => $this->k,
        ];
    }

    private function normalizeData(array $data): array
    {
        $min = min($data);
        $max = max($data);

        if ($max == $min) {
            return array_fill(0, count($data), 0.5);
        }

        return array_map(fn($value) => ($value - $min) / ($max - $min), $data);
    }

    private function initializeCentroids(array $data): array
    {
        $keys = array_rand($data, $this->k);
        $keys = is_array($keys) ? $keys : [$keys];

        return array_map(fn($key) => $data[$key], $keys);
    }

    private function kMeans(array $data): array
    {
        $n = count($data);
        $centroids = $this->initializeCentroids($data);
        $assignments = array_fill(0, $n, 0);

        for ($iteration = 0; $iteration < $this->maxIterations; $iteration++) {
            $newAssignments = [];

            // Assign data ke centroid terdekat
            foreach ($data as $i => $point) {
                $distances = array_map(fn($centroid) => abs($point - $centroid), $centroids);
                $newAssignments[$i] = array_keys($distances, min($distances))[0];
            }

            // Hitung centroid baru
            $newCentroids = [];
            for ($j = 0; $j < $this->k; $j++) {
                $pointsInCluster = array_values(array_filter(
                    array_map(fn($assignment, $value) => $assignment === $j ? $value : null, $newAssignments, $data)
                ));

                $newCentroids[$j] = !empty($pointsInCluster)
                    ? array_sum($pointsInCluster) / count($pointsInCluster)
                    : $centroids[$j]; // Tetap pakai centroid lama jika tidak ada anggota
            }

            // Cek konvergensi
            if (max(array_map(fn($old, $new) => abs($old - $new), $centroids, $newCentroids)) < $this->tolerance) {
                break;
            }

            $centroids = $newCentroids;
            $assignments = $newAssignments;
        }

        return $assignments;
    }

    private function groupProductsByClusters(Collection $products, array $assignments): array
    {
        $clustered = [];
        foreach ($products as $index => $product) {
            $clusterIndex = $assignments[$index];
            $clustered[$clusterIndex][] = $product;
        }

        return $clustered;
    }

    private function getClusterInfo(array $clusteredProducts): array
    {
        $clusterInfo = [];

        // Hitung rata-rata, min, max
        foreach ($clusteredProducts as $index => $products) {
            $prices = array_map(fn($product) => $product->price, $products);
            $avgPrice = array_sum($prices) / count($prices);

            $clusterInfo[] = [
                'index' => $index,
                'count' => count($products),
                'min_price' => min($prices),
                'max_price' => max($prices),
                'avg_price' => $avgPrice,
                'price_range' => 'Rp ' . number_format(min($prices), 0, ',', '.') . ' - Rp ' . number_format(max($prices), 0, ',', '.'),
            ];
        }

        // Urutkan cluster berdasarkan avg_price
        usort($clusterInfo, fn($a, $b) => $a['avg_price'] <=> $b['avg_price']);

        // Berikan label setelah sorting
        $labels = ['Ekonomis', 'Menengah', 'Tinggi'];
        foreach ($clusterInfo as $i => &$info) {
            $info['label'] = $labels[$i] ?? "Cluster " . ($i + 1);
        }

        return $clusterInfo;
    }

    public function getPriceCluster(float $price, array $clusterInfo): int
    {
        foreach ($clusterInfo as $info) {
            if ($price >= $info['min_price'] && $price <= $info['max_price']) {
                return $info['index'];
            }
        }

        // Jika tidak masuk range, cari yang paling dekat
        $closest = array_reduce($clusterInfo, function ($carry, $info) use ($price) {
            $distance = min(abs($price - $info['min_price']), abs($price - $info['max_price']));
            return $distance < $carry['distance'] ? ['index' => $info['index'], 'distance' => $distance] : $carry;
        }, ['index' => 0, 'distance' => PHP_FLOAT_MAX]);

        return $closest['index'];
    }
}
