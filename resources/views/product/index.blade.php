@extends('layouts.storage')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>Cost Price</th>
                <th>Type</th>
                <th>Stock</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($products->count() > 0)
                @foreach($products as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->title }}</td>
                        <td class="align-middle">{{ $rs->price }}</td>
                        <td class="align-middle">{{ $rs->cost_price }}</td>
                        <td class="align-middle">{{ $rs->type }}</td>
                        <td class="align-middle">{{ $rs->stock }}</td>
                        <td class="align-middle">{{ $rs->description }}</td>
                        <td class="align-middle">
                            @if($rs->image)
                                <img src="{{ Storage::url($rs->image) }}" class="img-thumbnail" alt="{{ $rs->title }}" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('product.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('product.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('product.destroy', $rs->id) }}" method="POST" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @if($rs->stock > 0)
                                    <form action="{{ route('product.decrease', $rs->id) }}" method="POST" class="btn btn-danger p-0 ms-2">
                                        @csrf
                                        <button class="btn btn-danger m-0">Out</button>
                                    </form>
                                @endif
                                <form action="{{ route('product.increase', $rs->id) }}" method="POST" class="btn btn-success p-0 ms-2">
                                    @csrf
                                    <button class="btn btn-success m-0">In</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="9">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
