@extends('layouts.adminlayout')

@section('title', 'All Orders')

@section('content')
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            @include('admin.adminmessage')
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">All Order</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">All Orders</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>                   
            <div class="ecommerce-widget">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <div class="row">     
                            <div class="table-responsive">
                                <table class="table table-light table-hover">
                                    <thead>
                                        <tr>
                                            <th><a href="{{ route('admin.orders', ['sortBy' => 'orderid', 'order' => $sortBy == 'orderid' && $order == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">Order ID</a></th>
                                            <th><a href="{{ route('admin.orders', ['sortBy' => 'userid', 'order' => $sortBy == 'userid' && $order == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">Customer ID</a></th>
                                            <th><a href="{{ route('admin.orders', ['sortBy' => 'purchaseid', 'order' => $sortBy == 'purchaseid' && $order == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">Purchase ID</a></th>
                                            <th><a href="{{ route('admin.orders', ['sortBy' => 'orderdate', 'order' => $sortBy == 'orderdate' && $order == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">Order Date</a></th>
                                            <th><a href="{{ route('admin.orders', ['sortBy' => 'orderstatus', 'order' => $sortBy == 'orderstatus' && $order == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">Order Status</a></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="col-md-2">{{ $order->orderid }}</td>
                                                <td class="col-md-2">{{ $order->userid }}</td>
                                                <td class="col-md-3">{{ $order->purchaseid }}</td>
                                                <td class="col-md-3">{{ $order->orderdate }}</td>
                                                <td class="col-md-3">
                                                    <span class="badge-dot badge-{{ $order->orderstatus == 'Preparing' ? 'secondary' : ($order->orderstatus == 'Shipped' ? 'brand' : 'success') }} mr-1"></span>
                                                    {{ $order->orderstatus }}
                                                </td>
                                                <td class="col-md-2"><a href="{{ route('admin.orders.manage', ['orderid' => $order->orderid, 'purchaseid' => $order->purchaseid]) }}" class="btn btn-outline-dark">Manage</a></td>
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
</div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

<script>
function submitSort(column) {
let currentSortBy = document.getElementById("sortBy").value;
let currentOrder = document.getElementById("order").value;
let newOrder = (currentSortBy === column && currentOrder === "asc") ? "desc" : "asc";
document.getElementById("sortBy").value = column;
document.getElementById("order").value = newOrder;
document.getElementById("sortForm").submit();
}
</script>

@endsection