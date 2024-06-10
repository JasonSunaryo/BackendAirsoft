@extends('layouts.storage')

@section('body')
    <h1 class="mb-0">Detail Product</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Cost Price</label>
            <input type="text" name="cost_price" class="form-control" placeholder="Cost Price" value="{{ $product->cost_price }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" placeholder="Stock" value="{{ $product->stock }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" placeholder="Type" value="{{ $product->type }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Description" readonly>{{ $product->description }}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Image</label>
            <div>
                <img src="{{ Storage::url($product->image) }}" class="img-fluid" alt="{{ $product->title }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $product->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $product->updated_at }}" readonly>
        </div>
    </div>
@endsection
