@extends('admin.layouts.app')

@section('title', 'Dashboard Statistik')

@section('styles')
<style>
    .stats-card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    .stats-card:hover {
        transform: translateY(-5px);
    }
    .stats-icon {
        font-size: 2rem;
        opacity: 0.8;
    }
    .chart-container {
        position: relative;
        height: 300px;
        margin-bottom: 2rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4">Dashboard Statistik</h1>
    
    <!-- Cards statistik -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card stats-card bg-primary text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Kunjungan</h5>
                        <h2 class="mb-0">{{ number_format($stats['totalVisits']) }}</h2>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card stats-card bg-success text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Pengunjung Unik</h5>
                        <h2 class="mb-0">{{ number_format($stats['uniqueVisitors']) }}</h2>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card stats-card bg-info text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Pencarian</h5>
                        <h2 class="mb-0">{{ number_format($stats['totalSearches']) }}</h2>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Grafik kunjungan -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Kunjungan Website (30 Hari Terakhir)</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="visitorChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Grafik pencarian -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Pencarian Website (30 Hari Terakhir)</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="searchChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Toko populer dan pencarian populer -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">Toko Paling Banyak Dikunjungi</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Toko</th>
                                    <th>Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularShops as $shop)
                                <tr>
                                    <td>{{ $shop->name }}</td>
                                    <td>{{ number_format($shop->visitor_logs_count) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">Pencarian Paling Populer</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kata Kunci</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularSearches as $search)
                                <tr>
                                    <td>{{ $search->query }}</td>
                                    <td>{{ number_format($search->count) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Kategori populer dan pencarian tanpa hasil -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">Kategori Produk Paling Populer</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularCategories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ number_format($category->products_count) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">Pencarian Tanpa Hasil</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kata Kunci</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($noResultSearches as $search)
                                <tr>
                                    <td>{{ $search->query }}</td>
                                    <td>{{ number_format($search->count) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data untuk grafik kunjungan
        var visitorData = @json($visitorStats);
        var visitorDates = visitorData.map(item => item.date);
        var visitorCounts = visitorData.map(item => item.count);
        
        // Chart kunjungan
        var visitorCtx = document.getElementById('visitorChart').getContext('2d');
        var visitorChart = new Chart(visitorCtx, {
            type: 'line',
            data: {
                labels: visitorDates,
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: visitorCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
        
        // Data untuk grafik pencarian
        var searchData = @json($searchStats);
        var searchDates = searchData.map(item => item.date);
        var searchCounts = searchData.map(item => item.count);
        
        // Chart pencarian
        var searchCtx = document.getElementById('searchChart').getContext('2d');
        var searchChart = new Chart(searchCtx, {
            type: 'line',
            data: {
                labels: searchDates,
                datasets: [{
                    label: 'Jumlah Pencarian',
                    data: searchCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection