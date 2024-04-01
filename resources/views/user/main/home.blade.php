@extends('user.layouts.master')

@section('content')
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">

            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">

                <!-- Categories Start -->
                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Filter By Categories</span>
                </h5>
                <div class="bg-light mb-3 pb-2">
                    <div class="bg-danger px-3 py-2 d-flex align-items-center justify-content-between mb-3">
                        <span class="text-white" for="price-all">All Categories</span>
                        <span class="badge border font-weight-normal">{{ count($categories) }}</span>
                    </div>
                    @foreach ($categories as $category)
                        <div class="d-flex align-items-center justify-content-between mb-3 px-4 pb-1">
                            <span class="text-dark">{{ $category->name }}</span>
                            <span class="badge border font-weight-normal text-dark"> # </span>
                        </div>
                    @endforeach
                </div>
                <!-- Categories End -->

                <!-- Order Button -->
                <div class="">
                    <button class="btn btn btn-warning w-100">Order</button>
                </div>

            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">

                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>

                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm px-3 dropdown-toggle"
                                        data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-primary rounded-0 mr-3 mt-1">
                                        <a class="dropdown-item" href="#">Ascending</a>
                                        <a class="dropdown-item" href="#">Descending</a>
                                    </div>
                                </div>
                                {{-- <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" style="height: 230px"
                                        src="{{ asset('storage/' . $product->image) }}" alt="product image">
                                    <div class="product-action">
                                        <a href="#" class="btn btn-outline-dark btn-square" title="Add to Cart">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-dark btn-square" title="See Details">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a href="#" class="h6 text-decoration-none text-truncate">
                                        {{ $product->name }}
                                    </a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>{{ $product->price }} kyats</h5>
                                        <h6 class="text-muted ml-2"><del>25000</del></h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
