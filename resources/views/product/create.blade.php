@extends('layouts.storage')

@section('body')
    <h1 class="mb-0">Add Product</h1>
    <hr />
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="cost_price" class="form-control" placeholder="Cost Price" required>
            </div>
            <div class="col">
                <input type="number" name="stock" class="form-control" placeholder="Stock" required>
            </div>
            <div class="col">
                <select class="form-select" name="type" id="type" required>
                    <option selected disabled>Select Type</option>
                    <option value="Handgun">Handgun</option>
                    <option value="Rifle">Rifle</option>
                    <option value="Shotgun">Shotgun</option>
                    <option value="sniper">Sniper</option>
                    <option value="SMG">SMG</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Description" required></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="product-image" class="form-label">Image</label>
                <input type="file" class="form-control" id="product-image" name="image" required>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
