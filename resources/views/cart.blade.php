<!-- resources/views/cart/index.blade.php -->

@extends('layouts.app')
@section('title', 'My Cart')

@section('content')
<!-- Hero Start -->
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">My Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">My Cart</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Hero End -->

<!-- Cart Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="text-primary mb-3"><span class="fw-light text-dark">Your</span> Cart</h1>
            <p class="mb-5">Review and manage the items in your cart below.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-12 mx-auto">
                <!-- Cart Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->product->price, 2) }}</td>
                                <td>${{ number_format($item->quantity * $item->product->price, 2) }}</td>
                                <td>
                                    <!-- Add action buttons such as remove or update quantity -->
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total</strong></td>
                            <td>${{ number_format($cartItems->sum(fn($item) => $item->quantity * $item->product->price), 2) }}</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>

                <!-- Checkout Button -->
                <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection
