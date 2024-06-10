@extends('layouts.storage')

@section('body')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Cost Price</label>
                <input type="text" name="cost_price" class="form-control" placeholder="Cost Price" value="{{ $product->cost_price }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" placeholder="Stock" value="{{ $product->stock }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Type</label>
                <select class="form-select" name="type" required>
                    <option value="Handgun" {{ $product->type === 'Handgun' ? 'selected' : '' }}>Handgun</option>
                    <option value="Rifle" {{ $product->type === 'Rifle' ? 'selected' : '' }}>Rifle</option>
                    <option value="Shotgun" {{ $product->type === 'Shotgun' ? 'selected' : '' }}>Shotgun</option>
                    <option value="Sniper" {{ $product->type === 'Sniper' ? 'selected' : '' }}>Sniper</option>
                    <option value="SMG" {{ $product->type === 'SMG' ? 'selected' : '' }}>SMG</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Description" required>{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="product-image" class="form-label">Image</label>
                <input type="file" class="form-control" id="product-image" name="image">
                @if($product->image)
                    <img src="{{ Storage::url($product->image) }}" class="img-fluid mt-2" alt="{{ $product->title }}">
                @endif
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
