@extends('layouts.app2')

<body class="bg-light">

<div class="container my-5 p-5 bg-white shadow rounded">
    <h1 class="text-center fs-3 fw-semibold text-dark border-bottom pb-3">Product Details</h1>

    <div class="row align-items-center mt-4">

        <!-- Product Image with Hover Effect and Click to Open in New Tab -->
        <div class="col-md-4">
            <a href="{{ $product->image ? asset($product->image) : asset('uploads/products/Untitled.png') }}" target="_blank">
                <img src="{{ $product->image ? asset($product->image) : asset('uploads/products/Untitled.png') }}"
                     alt="Product Image"
                     class="img-fluid rounded shadow product-image">
            </a>
        </div>

        <!-- Product Details -->
        <div class="col-md-8 mt-4 mt-md-0">
            <h2 class="fs-4 fw-bold text-dark mb-3">{{ $product->name }}</h2>

            <p class="text-secondary mb-2"><strong class="text-dark">Product ID:</strong> {{ $product->product_id }}</p>
            <p class="text-secondary mb-2"><strong class="text-dark">Price:</strong> <span class="text-success">{{ $product->price }}৳</span></p>
            <p class="text-secondary mb-2"><strong class="text-dark">Stock:</strong> {{ $product->stock }}</p>
            <p class="text-secondary mb-2"><strong class="text-dark">Description:</strong> {{ $product->description }}</p>

            <a href="{{ route('products.index') }}" class="btn btn-primary mt-4">
                <i class="fas fa-arrow-left me-2"></i> Back to Product List
            </a>
        </div>
    </div>
</div>

