@extends('layouts.adminlayout')

@section('title', 'Product Details')

@section('content')
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            @include('admin.adminmessage')
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Product Details</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">Admin Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ route('admin.product') }}" class="breadcrumb-link">All Products</a></li>
                                    <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">View: {{ $product->name }}</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    
                    <form>
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label for="image1" class="form-label">Product Image</label>
                                <div class="card-body">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @if(!empty($product->image1))
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        @endif
                        @if(!empty($product->image2))
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        @endif
                        @if(!empty($product->image3))
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        @endif
                                    </ol>
                                    <div class="carousel-inner">
                                        @if(!empty($product->image1))
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('products/' . $product->image1) }}" style="width:100%;height: 400px;" alt="First slide">
                            </div>
                        @endif
                        @if(!empty($product->image2))
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('products/' . $product->image2) }}" style="width:100%;height: 400px;" alt="Second slide">
                            </div>
                        @endif
                        @if(!empty($product->image3))
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('products/' . $product->image3) }}" style="width:100%;height: 400px;" alt="Third slide">
                            </div>
                        @endif
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                       <span class="sr-only">Previous</span>  </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>  </a>
                                </div>
                            </div>
                        </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name ?? old('name') }}" disabled>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" disabled>{{ $product->description ?? old('description') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock ?? old('stock') }}" disabled>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $product->price ?? old('price') }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <a class="btn btn-primary" href="{{ route('admin.product.edit', ['productid' => $product->productid]) }}" role="button">Edit</a>    
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
