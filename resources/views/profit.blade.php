@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Laporan Profit</h1>

        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('profit.index') }}" method="GET" class="form-inline">
                    <div class="form-group">
                        <label for="start_date" class="mr-2">Dari Tanggal:</label>
                        <input type="date" class="form-control mr-2" id="start_date" name="start_date" value="{{ $startDate }}" required>

                        <label for="end_date" class="mr-2">Sampai Tanggal:</label>
                        <input type="date" class="form-control mr-2" id="end_date" name="end_date" value="{{ $endDate }}" required>

                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>Rentang Tanggal: {{ $startDate }} s/d {{ $endDate }}</h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <!-- Tambahkan kode untuk menampilkan grafik profit atau tabel profit di sini -->
                <canvas id="profitChart"></canvas>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <a href="{{ route('reports.create') }}" class="btn btn-primary">Buat Laporan</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('profitChart').getContext('2d');
    
        // Data dari controller
        var profitData = @json($profitData);
        var allDates = @json($allDates); // Semua tanggal dalam rentang
    
        // Siapkan datasets untuk Chart.js
        var datasets = Object.keys(profitData).map(function (type) {
            // Data profit untuk setiap tipe barang sesuai urutan tanggal
            var data = allDates.map(function (date) {
                return profitData[type][date] || 0; // Nilai default 0 jika tidak ada profit
            });
    
            return {
                label: type,
                data: data,
                fill: false,
                borderColor: '#' + Math.floor(Math.random() * 16777215).toString(16), // Warna acak
                tension: 0.1 // Garis lebih halus
            };
        });
    
        // Buat chart
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: allDates, // Tanggal pada sumbu X
                datasets: datasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Profit'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    }
                }
            }
        });
    </script>
    
@endsection
