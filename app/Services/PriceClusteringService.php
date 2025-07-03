<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;

class PriceClusteringService
{
    /**
     * Jumlah cluster yang akan dibuat
     */
    private int $k;

    /**
     * Maksimum iterasi untuk algoritma K-means
     */
    private int $maxIterations;

    /**
     * Threshold untuk konvergensi
     */
    private float $tolerance;

    public function __construct(int $k = 3, int $maxIterations = 100, float $tolerance = 0.01)
    {
        $this->k = $k;
        $this->maxIterations = $maxIterations;
        $this->tolerance = $tolerance;
    }

    /**
     * Melakukan clustering K-means pada harga produk
     *
     * @param Collection $products
     * @return array
     */
    public function clusterByPrice(Collection $products): array
    {
        if ($products->isEmpty()) {
            return [];
        }

        // Ekstrak harga dari produk
        $prices = $products->pluck('price')->toArray();
        
        // Normalisasi harga untuk clustering yang lebih baik
        $normalizedPrices = $this->normalizeData($prices);
        
        // Lakukan K-means clustering
        $clusters = $this->kMeans($normalizedPrices);
        
        // Kelompokkan produk berdasarkan cluster
        $clusteredProducts = $this->groupProductsByClusters($products, $clusters, $prices);
        
        // Tambahkan informasi cluster
        $clusterInfo = $this->getClusterInfo($clusteredProducts, $prices);
        
        return [
            'clusters' => $clusteredProducts,
            'cluster_info' => $clusterInfo,
            'total_products' => $products->count(),
            'k' => $this->k
        ];
    }

    /**
     * Normalisasi data menggunakan min-max scaling
     *
     * @param array $data
     * @return array
     */
    private function normalizeData(array $data): array
    {
        $min = min($data);
        $max = max($data);
        
        if ($max == $min) {
            return array_fill(0, count($data), 0.5);
        }
        
        return array_map(function($value) use ($min, $max) {
            return ($value - $min) / ($max - $min);
        }, $data);
    }

    /**
     * Algoritma K-means clustering
     *
     * @param array $data
     * @return array
     */
    private function kMeans(array $data): array
    {
        $n = count($data);
        
        // Inisialisasi centroid secara random
        $centroids = $this->initializeCentroids($data);
        
        // Array untuk menyimpan assignment cluster
        $assignments = array_fill(0, $n, 0);
        
        for ($iteration = 0; $iteration < $this->maxIterations; $iteration++) {
            $newAssignments = [];
            
            // Assignment step: assign setiap data point ke centroid terdekat
            foreach ($data as $i => $point) {
                $minDistance = PHP_FLOAT_MAX;
                $closestCentroid = 0;
                
                foreach ($centroids as $j => $centroid) {
                    $distance = abs($point - $centroid);
                    if ($distance < $minDistance) {
                        $minDistance = $distance;
                        $closestCentroid = $j;
                    }
                }
                
                $newAssignments[$i] = $closestCentroid;
            }
            
            // Update step: hitung centroid baru
            $newCentroids = [];
            for ($j = 0; $j < $this->k; $j++) {
                $clusterPoints = [];
                foreach ($newAssignments as $i => $assignment) {
                    if ($assignment == $j) {
                        $clusterPoints[] = $data[$i];
                    }
                }
                
                if (!empty($clusterPoints)) {
                    $newCentroids[$j] = array_sum($clusterPoints) / count($clusterPoints);
                } else {
                    $newCentroids[$j] = $centroids[$j]; // Keep old centroid if no points assigned
                }
            }
            
            // Check for convergence
            $converged = true;
            for ($j = 0; $j < $this->k; $j++) {
                if (abs($centroids[$j] - $newCentroids[$j]) > $this->tolerance) {
                    $converged = false;
                    break;
                }
            }
            
            $centroids = $newCentroids;
            $assignments = $newAssignments;
            
            if ($converged) {
                break;
            }
        }
        
        return $assignments;
    }

    /**
     * Inisialisasi centroid secara random
     *
     * @param array $data
     * @return array
     */
    private function initializeCentroids(array $data): array
    {
        $min = min($data);
        $max = max($data);
        $centroids = [];
        
        for ($i = 0; $i < $this->k; $i++) {
            $centroids[$i] = $min + ($max - $min) * ($i / ($this->k - 1));
        }
        
        return $centroids;
    }

    /**
     * Kelompokkan produk berdasarkan hasil clustering
     *
     * @param Collection $products
     * @param array $clusters
     * @param array $originalPrices
     * @return array
     */
    private function groupProductsByClusters(Collection $products, array $clusters, array $originalPrices): array
    {
        $clusteredProducts = [];
        
        foreach ($products as $index => $product) {
            $clusterIndex = $clusters[$index];
            
            if (!isset($clusteredProducts[$clusterIndex])) {
                $clusteredProducts[$clusterIndex] = [];
            }
            
            $clusteredProducts[$clusterIndex][] = $product;
        }
        
        // Sort clusters by average price
        uksort($clusteredProducts, function($a, $b) use ($clusteredProducts, $originalPrices, $clusters) {
            $avgPriceA = $this->getClusterAveragePrice($clusteredProducts[$a]);
            $avgPriceB = $this->getClusterAveragePrice($clusteredProducts[$b]);
            return $avgPriceA <=> $avgPriceB;
        });
        
        return $clusteredProducts;
    }

    /**
     * Mendapatkan rata-rata harga dari cluster
     *
     * @param array $clusterProducts
     * @return float
     */
    private function getClusterAveragePrice(array $clusterProducts): float
    {
        if (empty($clusterProducts)) {
            return 0;
        }
        
        $totalPrice = array_sum(array_column($clusterProducts, 'price'));
        return $totalPrice / count($clusterProducts);
    }

    /**
     * Mendapatkan informasi tentang setiap cluster
     *
     * @param array $clusteredProducts
     * @param array $originalPrices
     * @return array
     */
    private function getClusterInfo(array $clusteredProducts, array $originalPrices): array
    {
        $clusterInfo = [];
        $labels = ['Harga Rendah', 'Harga Menengah', 'Harga Tinggi'];
        
        foreach ($clusteredProducts as $index => $products) {
            $prices = array_column($products, 'price');
            
            $clusterInfo[$index] = [
                'label' => $labels[$index] ?? "Cluster " . ($index + 1),
                'count' => count($products),
                'min_price' => min($prices),
                'max_price' => max($prices),
                'avg_price' => array_sum($prices) / count($prices),
                'price_range' => 'Rp ' . number_format(min($prices), 0, ',', '.') . ' - Rp ' . number_format(max($prices), 0, ',', '.')
            ];
        }
        
        return $clusterInfo;
    }

    /**
     * Mendapatkan cluster untuk harga tertentu
     *
     * @param float $price
     * @param array $clusterInfo
     * @return int
     */
    public function getPriceCluster(float $price, array $clusterInfo): int
    {
        foreach ($clusterInfo as $index => $info) {
            if ($price >= $info['min_price'] && $price <= $info['max_price']) {
                return $index;
            }
        }
        
        // Fallback: find closest cluster
        $minDistance = PHP_FLOAT_MAX;
        $closestCluster = 0;
        
        foreach ($clusterInfo as $index => $info) {
            $distance = min(
                abs($price - $info['min_price']),
                abs($price - $info['max_price'])
            );
            
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $closestCluster = $index;
            }
        }
        
        return $closestCluster;
    }
}