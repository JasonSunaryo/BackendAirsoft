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
                <th>Cost Price</th>
                <th>Price</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stockLogs as $log)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $log->product ? $log->product->title : 'Deleted Product' }}</td>
                <td class="align-middle">{{ $log->change > 0 ? "+{$log->change}" : $log->change }}</td>
                <td class="align-middle">{{ $log->product ? $log->price : 'N/A' }}</td>
                <td class="align-middle">{{ $log->product ? $log->cost_price : 'N/A' }}</td>
                <td class="align-middle">{{ $log->product ? $log->type : 'N/A' }}</td>
                <td class="align-middle">
                    <form action="{{ route('stocklogs.updateDate', $log->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <input type="date" name="date" value="{{ $log->created_at->format('Y-m-d') }}" class="form-control d-inline" style="width: auto;">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </form>
                </td>
            </tr>
            
            @empty
                <tr>
                    <td class="text-center" colspan="7">No history found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection