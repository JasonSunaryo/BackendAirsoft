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
                <canvas id="profitChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('profitChart').getContext('2d');
        var profitData = @json($profitData);

        // Ambil label untuk chart dari keys profitData (tipe barang)
        var labels = Object.keys(profitData);

        var datasets = [];
        labels.forEach(function(label) {
            var data = Object.values(profitData[label]);
            datasets.push({
                label: label,
                data: data,
                fill: false,
                borderColor: '#' + (0x1000000 + (Math.random()) * 0xffffff).toString(16).substr(1, 6) // warna random
            });
        });

        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($allDates),
                datasets: datasets
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
