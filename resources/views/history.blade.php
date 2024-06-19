@extends('layouts.storage')

@section('body')
    <h1 class="mb-0">Stock History</h1>
    <hr />

    {{-- Tombol Clear History --}}
    <form action="{{ route('stocklogs.clear') }}" method="POST" class="mb-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Clear History</button>
    </form>

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Change</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stockLogs as $log)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $log->product ? $log->product->title : 'Deleted Product' }}</td>
                    <td class="align-middle">{{ $log->change > 0 ? "+{$log->change}" : $log->change }}</td>
                    <td class="align-middle">{{ $log->product ? $log->product->price : 'N/A' }}</td>
                    <td class="align-middle">{{ $log->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="5">No history found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
