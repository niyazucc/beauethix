@extends('layouts.adminlayout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            @include('admin.adminmessage')
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        @if(isset($product)) <h2 class="pageheader-title">Edit Product</h2> 
                        @else <h2 class="pageheader-title">Add New Product</h2>
                        @endif
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">Admin Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ route('admin.product') }}" class="breadcrumb-link">All Products</a></li>
                                    @if(isset($product))
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Edit: {{ $product->name }}</a></li>
                                        @else
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Add New Product</a></li>
                                    @endif
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    
                    <form action="{{ isset($product) ? route('product.update',['productid' => $product->productid]) : route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name ?? old('name') }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ $product->description ?? old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image1" class="form-label">Product Image 1</label>
                                    <input type="file" name="image1" id="image1" class="form-control">
                                    @if(isset($product->image1))
                                        <img src="{{ asset('products/' . $product->image1) }}" class="img-thumbnail mt-2" style="width:100%;height: 180px;" alt="Product Image 1">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="image2" class="form-label">Product Image 2</label>
                                    <input type="file" name="image2" id="image2" class="form-control">
                                    @if(isset($product->image2))
                                        <img src="{{ asset('products/' . $product->image2) }}" class="img-thumbnail mt-2" style="width:100%;height: 180px;" alt="Product Image 2">
                                        <a href="#" class="btn btn-danger mt-2" data-toggle="modal" data-target="#deleteimage2">
                                            Delete Image 
                                        </a>
                                        @endif
                                </div>
                                <div class="mb-3">
                                    <label for="image3" class="form-label">Product Image 3</label>
                                    <input type="file" name="image3" id="image3" class="form-control">
                                    @if(isset($product->image3))
                                        <img src="{{ asset('products/' . $product->image3) }}" class="img-thumbnail mt-2" style="width:100%;height: 180px;" alt="Product Image 3">
                                        <a href="#" class="btn btn-danger mt-2" data-toggle="modal" data-target="#deleteimage3">
                                            Delete Image 
                                        </a>
                                        @endif
                                </div>
                                
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock ?? old('stock') }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $product->price ?? old('price') }}" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    @if(isset($product)) Update Product @else Add Product @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteimage3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">  
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabe1l">Confirmation Message</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this image?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                @if(isset($product->image3))
                <form action="{{ route('admin.product.deleteImage', ['productid' => $product->productid, 'image' => 'image3']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Image</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteimage2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">  
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this image?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                @if(isset($product->image2))
                <form action="{{ route('admin.product.deleteImage', ['productid' => $product->productid, 'image' => 'image2']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Delete Image 2</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection