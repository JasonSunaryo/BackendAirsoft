@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Laporan</h1>

        <form action="{{ route('reports.update', $report->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="start_date">Dari Tanggal:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $report->start_date }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">Sampai Tanggal:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $report->end_date }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
