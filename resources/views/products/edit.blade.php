@extends('layouts.app2')

@section('content')
<div class="container mt-5 p-4 bg-light shadow rounded">
    <h2 class="text-center mb-4">Edit Product</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <!-- Description Field -->
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Price Field -->
        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <!-- Stock Field -->
        <div class="form-group mb-3">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}">
        </div>

        <!-- Image Upload Field -->
        <div class="form-group mb-4">
            <label for="image">Product Image</label>
            <input type="file" class="form-control-file" id="image" name="image">

            <!-- Display Current Image if Available -->
            @if($product->image)
                <small class="d-block mt-2">Current Image:</small>
                <img src="{{ asset($product->image) }}" alt="Current Product Image" width="100" class="border rounded mt-1">
            @else
                <small class="d-block mt-2">No image uploaded</small>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
</div>
@endsection
