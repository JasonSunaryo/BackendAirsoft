@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Laporan Profit</h1>

        <div class="row mb-4">
            <div class="col">
                <h5>Rentang Tanggal: {{ $report->start_date }} s/d {{ $report->end_date }}</h5>
            </div>
        </div>

        <!-- Tabel untuk menampilkan profit tiap tipe senjata -->
        <div class="row mb-4">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tipe Senjata</th>
                            <th>Profit</th>
                            <th>Jumlah Barang Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stockLogs as $log)
                            <tr>
                                <td>{{ $log->product->type }}</td>
                                <td>{{ abs($log->change) * ($log->product->price - $log->product->cost_price) }}</td>
                                <td>{{ abs($log->change) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="row">
            <div class="col">
                <a href="{{ route('reports.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
