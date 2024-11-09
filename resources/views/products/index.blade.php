@extends('layouts.app')

@section('content')


<div class="container mt-5 p-4 bg-light shadow rounded">
    <h2 class="mb-4 text-center">Product List</h2>

    <!-- Add Product Button -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-success">+Add Product</a>
    </div>

    <!-- Search and Sort Forms -->
    <form action="{{ route('products.index') }}" method="GET" class="form-inline mb-3 d-flex">
        <input type="text" name="search" placeholder="Search by Name or ID" class="form-control me-2" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary me-3">Search</button>
    </form>

    <form action="{{ route('products.index') }}" method="GET" class="form-inline mb-3 d-flex">
        <select name="sort" class="form-control me-2">
            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Sort by Name</option>
            <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Sort by Price</option>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <!-- Check if products exist -->
    @if($products->isEmpty())
        <div class="alert alert-warning">No Data Found</div>
    @else
        <!-- Products Table -->
        <table class="table table-striped table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Product ID</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                    <td>{{ $product->product_id }}</td>
                    <td class="description-column" data-full-description="{{ $product->description }}">
                        {{ Str::limit($product->description, 10) }}
                    </td>

                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="Product Image" width="50" height="50">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Update</a>
                        <form id="delete-product-form{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="post" style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                        <button onclick="confirmation(event, {{ $product->id }})" class="btn btn-danger btn-sm" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-end">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection

@section('styles')
<style>
    /* Table header styles */
    .thead-dark th {
        background-color: #343a40;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    /* Table row hover effect */
    tr:hover {
        background-color: #f8f9fa;
    }

    /* Styling for Add Product button */
    .btn-success {
        font-size: 16px;
    }

    /* Table cell styling */
    td, th {
        text-align: center;
        vertical-align: middle;
    }

    /* Image styling inside table */
    img {
        border-radius: 5px;
    }
</style>


@endsection
