@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Reports</div>

                    <div class="card-body">
                        <a href="{{ route('reports.create') }}" class="btn btn-success mb-3">Create New Report</a>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Profit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>{{ $report->id }}</td>
                                        <td>{{ $report->start_date }}</td>
                                        <td>{{ $report->end_date }}</td>
                                        <td>{{ $report->total_profit }}</td>
                                        <td>
                                            <form action="{{ route('reports.destroy',$report->id) }}" method="POST">
                                                <a href="{{ route('reports.show', $report->id) }}" class="btn btn-info">Detail</a>
                                                <a class="btn btn-primary" href="{{ route('reports.edit',$report->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection