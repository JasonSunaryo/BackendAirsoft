@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Laporan Profit</h1>

        <div class="row mb-4">
            <div class="col">
                <h5>Rentang Tanggal: {{ $report->start_date }} s/d {{ $report->end_date }}</h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Cost Price</th>
                            <th>Selling Price</th>
                            <th>Tipe Senjata</th>
                            <th>Jumlah Barang Keluar</th>
                            <th>Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalItems = 0;
                            $totalProfit = 0;
                        @endphp
                        @foreach ($stockLogs as $log)
                            <tr>
                                <td>{{ $log->product ? $log->product->title : 'Product Not Found' }}</td>
                                <td>{{ $log->product ? $log->product->cost_price : 'N/A' }}</td>
                                <td>{{ $log->product ? $log->product->price : 'N/A' }}</td>
                                <td>{{ $log->product ? $log->product->type : 'N/A' }}</td>
                                <td>{{ abs($log->change) }}</td>
                                <td>
                                    @php
                                        $profit = $log->product ? abs($log->change) * ($log->product->price - $log->product->cost_price) : 0;
                                        $totalProfit += $profit;
                                        $totalItems += abs($log->change);
                                    @endphp
                                    {{ $profit }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total</th>
                            <th>{{ $totalItems }}</th>
                            <th>{{ $totalProfit }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('reports.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection