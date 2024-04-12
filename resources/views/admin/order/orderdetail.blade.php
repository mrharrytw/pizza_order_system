@extends('admin.layouts.master')
@section('title', 'Order Detail')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30 pb-3">
            <div class="container-fluid">
                <div class="col-12">
                    <!-- DATA TABLE -->
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <button class="btn btn-danger btn-sm rounded-0 text-white pe-md-4" onclick="history.back()">
                                <i class="fa-solid fa-chevron-left me-2"></i> Back
                            </button>
                        </div>
                        <div class="col-lg-6 ms-lg-5">
                            <h2 class="title-1 text-danger">Order Detail</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-header text-center text-danger">
                                    <i class="fa-regular fa-clipboard me-2"></i>
                                    <span>Order Summary</span>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-1"><i class="fa-solid fa-user me-2"></i></div>
                                        <div class="col-6">Customer Name :</div>
                                        <div class="col-5">{{ $orderdetails[0]->user_name }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-1"><i class="fa-solid fa-barcode me-2"></i></div>
                                        <div class="col-6">Order Code :</div>
                                        <div class="col-5">{{ $orderdetails[0]->order_code }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-1"><i class="fa-solid fa-dollar-sign me-2"></i></div>
                                        <div class="col-6">Total Amount :</div>
                                        <div class="col-5">{{ $order->total_price }} Kyats</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-1"><i class="fa-solid fa-clock me-2"></i></div>
                                        <div class="col-6">Order Date :</div>
                                        <div class="col-5">{{ $orderdetails[0]->created_at->format('d M Y') }}</div>
                                    </div>
                                    <td></td>
                                </div>
                                <div class="card-footer text-center">
                                    <span class="text-danger">
                                        <i class="fa-solid fa-triangle-exclamation me-2"></i>
                                        Include Tax and Delivery Charges.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th class="text-danger">Order ID</th>
                                    <th class="text-danger">Image</th>
                                    <th class="text-danger">Product Name</th>
                                    <th class="text-danger">Price</th>
                                    <th class="text-danger">Quantity </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderdetails as $orderdetail)
                                    <tr class="tr-shadow">
                                        <td class="align-content-center">{{ $orderdetail->id }}</td>

                                        <td><img style="max-width:100px" src="{{ asset('storage/' . $orderdetail->image) }}"
                                                class="img-thumbnail shadow-sm" /></td>

                                        <td>{{ $orderdetail->product_name }}</td>

                                        <td>{{ $orderdetail->total }} Kyats</td>

                                        <td>{{ $orderdetail->qty }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
@endsection
