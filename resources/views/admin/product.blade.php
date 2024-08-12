@extends('layouts.adminlayout')

@section('title', 'All Products')

@section('content')
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            @include('admin.adminmessage')
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                            <h2 class="pageheader-title">List of Product</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">All Products</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="col-10">
                            </div>
                            <div class="col-2">
                                <a class="btn btn-outline-dark mt-2" href="{{route('product.add')}}" role="button">Add new product</a>
                            </div>

                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td class="col-md-1">{{ $product->productid }}</td>
                                            <td class="col-md-3">
                                                <img src="{{ asset('products/' . $product->image1) }}" style="width: 100px; height:100px;">
                                            </td>
                                            <td class="col-md-6">
                                                <a href="{{ route('admin.product.view', ['productid' => $product->productid]) }}">{{ $product->name }}</a>
                                            </td>
                                            <td class="col-md-2">
                                                <a class="btn btn-dark" href="{{ route('admin.product.edit', ['productid' => $product->productid]) }}" role="button">Edit</a>
                                                <form action="{{ route('admin.product.delete', ['productid' => $product->productid]) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-dark">Delete</button>
                                                </form></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection