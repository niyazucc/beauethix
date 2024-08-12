@extends('layouts.adminlayout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                            <h2 class="pageheader-title">Admin Dashboard</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Admin Dashboard</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">
                <c:if test="${staff!=null}">
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- sales  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Book Registered</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">${bookCount}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end sales  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- new customer  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Pending Orders</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">${orderCount} </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end new customer  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- visitor  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Sales for the past 1 month</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">RM${String.format("%.2f", totalSales)}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================================== -->
                        <!-- end visitor  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- total orders  -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- end total orders  -->
                        <!-- ============================================================== -->
                    </div>
                    <div class="row">
                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Recent Orders</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><a href="javascript:void(0)" onclick="submitSort('orderid')" class="text-decoration-none text-dark">Order ID <i class="bi bi-sort-alpha-down"></i></a></th>
                                                    <th><a href="javascript:void(0)" onclick="submitSort('userid')" class="text-decoration-none text-dark">Customer ID <i class="bi bi-sort-alpha-down"></i></a></th>
                                                    <th><a href="javascript:void(0)" onclick="submitSort('purchaseid')" class="text-decoration-none text-dark">Purchase ID <i class="bi bi-sort-alpha-down"></i></a></th>
                                                    <th><a href="javascript:void(0)" onclick="submitSort('orderdate')" class="text-decoration-none text-dark">Date <i class="bi bi-sort-alpha-down"></i></a></th>
                                                    <th><a href="javascript:void(0)" onclick="submitSort('orderstatus')" class="text-decoration-none text-dark">Status <i class="bi bi-sort-alpha-down"></i></a></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <c:set var="counter" value="0" />
                                                <c:forEach var="order" items="${orders}">
                                                    <c:if test="${counter < 4}">
                                                        <tr>
                                                            <td class="col-md-2">${counter + 1}</td>
                                                            <td class="col-md-2">${order.getOrderid()}</td>
                                                            <td class="col-md-2">${order.getUserid()}</td>
                                                            <td class="col-md-2">${order.getPurchaseid()}</td>
                                                            <td class="col-md-2">${order.getOrderdate()}</td>
                                                            <td class="col-md-4"><c:if test="${order.getOrderstatus()=='Preparing'}"><span class="badge-dot badge-secondary mr-1"></span></c:if>
                                                                <c:if test="${order.getOrderstatus()=='Shipped'}"><span class="badge-dot badge-brand mr-1"></span></c:if>
                                                                <c:if test="${order.getOrderstatus()=='Completed'}"><span class="badge-dot badge-success mr-1"></span></c:if>${order.getOrderstatus()}</td>
                                                            </tr>
                                                        <c:set var="counter" value="${counter + 1}" />
                                                    </c:if>
                                                </c:forEach>
                                                <tr>
                                                    <td colspan="9"><a href="AdminServlet?action=viewOrder" class="btn btn-outline-light float-right">View Details</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card low-stock-card">
                                <h5 class="card-header">Books with Lowest Stock</h5>
                                <div class="card-body py-0">
                                    <c:forEach var="book" items="${lowestbook}">
                                        <h5><i class="fas fa-exclamation-triangle icon"></i> Low Stock Alert</h5>
                                        <p><strong>Book ID:</strong> ${book.bookid}</p>
                                        <p><strong>Title:</strong> <a href="AdminServlet?action=viewBook&bookid=${book.bookid}">${book.title}</a></p>
                                        <p><strong>Quantity:</strong> ${book.stockcount}</p>
                                        <hr>
                                    </c:forEach>
                                </div>
                            </div>
                        </div>
                    </div>
                </c:if>
                <c:if test="${admin!=null}">
                    <div class="row">
                        <!-- Card for Managing Customers -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-users"></i> Manage Customers</h5>
                                    <p class="card-text">Customers Registered: ${custCount} </p>
                                    <p class="card-text">Click here to manage customer information.</p>
                                    <a href="#" class="btn btn-primary">Go to Customers</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card for Managing Staff -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-user-md"></i> Manage Staff</h5>
                                    <p class="card-text">Staff Registered: ${staffCount} </p>
                                    <p class="card-text">Click here to manage staff information.</p>
                                    <a href="#" class="btn btn-primary">Go to Staff</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </c:if>
            </div>
        </div>
    </div>
</div>
@endsection
