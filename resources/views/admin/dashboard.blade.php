@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('styles')
<style>
    .stats-card {
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        transition: all 0.2s ease;
    }
    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.12);
    }
    .stats-icon {
        font-size: 1.8rem;
        opacity: 0.8;
    }
    .chart-container {
        position: relative;
        height: 280px;
        margin-bottom: 1rem;
    }
    .table-simple th, .table-simple td {
        padding: 0.5rem;
    }
    .card-header {
        background-color: rgba(0, 0, 0, 0.02);
    }
</style>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Dashboard</h1>
        <a href="{{ route('admin.reviews.pending') }}" class="btn btn-sm btn-primary">
            Ulasan Pending <span class="badge bg-light text-dark ms-1">{{ $stats['pendingReviews'] }}</span>
        </a>
    </div>
    
    <!-- Statistik Utama -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stats-card border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle text-muted mb-1">Total Kunjungan</h6>
                        <h3 class="mb-0">{{ number_format($stats['totalVisits']) }}</h3>
                    </div>
                    <div class="stats-icon text-primary">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stats-card border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle text-muted mb-1">Total Toko</h6>
                        <h3 class="mb-0">{{ number_format($stats['totalShops']) }}</h3>
                    </div>
                    <div class="stats-icon text-danger">
                        <i class="fas fa-store"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stats-card border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle text-muted mb-1">Total Produk</h6>
                        <h3 class="mb-0">{{ number_format($stats['totalProducts']) }}</h3>
                    </div>
                    <div class="stats-icon text-success">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stats-card border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle text-muted mb-1">Total Kategori</h6>
                        <h3 class="mb-0">{{ number_format($stats['totalCategories']) }}</h3>
                    </div>
                    <div class="stats-icon text-info">
                        <i class="fas fa-tag"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Baris Tambahan untuk Total Ulasan -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stats-card border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle text-muted mb-1">Total Ulasan</h6>
                        <h3 class="mb-0">{{ number_format($stats['totalReviews']) }}</h3>
                    </div>
                    <div class="stats-icon text-warning">
                        <i class="fas fa-comment"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Grafik dan Tabel -->
    <div class="row mb-4">
        <div class="col-lg-8 mb-3">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="card-title mb-0">Tren Kunjungan (30 Hari Terakhir)</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="visitorChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card h-100">
                <div class="card-header py-3">
                    <h5 class="card-title mb-0">Toko Populer</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-simple">
                            <thead>
                                <tr>
                                    <th>Nama Toko</th>
                                    <th class="text-end">Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularShops as $shop)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.shops.show', $shop) }}" class="text-decoration-none">
                                            {{ $shop->name }}
                                        </a>
                                    </td>
                                    <td class="text-end">{{ number_format($shop->visitor_logs_count) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pencarian dan Kategori -->
    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="card-title mb-0">Pencarian Populer</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-simple">
                            <thead>
                                <tr>
                                    <th>Kata Kunci</th>
                                    <th class="text-end">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularSearches as $search)
                                <tr>
                                    <td>{{ $search->query }}</td>
                                    <td class="text-end">{{ number_format($search->count) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="card-title mb-0">Kategori Populer</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-simple">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th class="text-end">Jumlah Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularCategories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-end">{{ number_format($category->products_count) }}</td>
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
        var visitorDates = visitorData.map(item => {
            // Format tanggal menjadi lebih singkat (contoh: 01 Jan)
            var date = new Date(item.date);
            return date.getDate() + '/' + (date.getMonth() + 1);
        });
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
                    tension: 0.3,
                    fill: true
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
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Kunjungan: ' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection