@extends('user.layouts.master')
@section('title', 'Product Detail')
@section('content')
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="px-xl-5 mb-2">
            <a href="{{ route('user#home') }}">
                <button class="btn btn-danger btn-sm rounded-0 text-white pe-md-4">
                    <i class="fa-solid fa-chevron-left ps-md-2 me-md-2"></i>
                    Back
                </button>
            </a>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div class="">
                    <img class=" img-thumbnail" src="{{ asset('storage/' . $details->image) }}" alt="Product_Image">
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3 class="text-danger">{{ $details->name }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">{{ $details->view_count }} Views</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{ $details->price }} Kyats</h3>
                    <p class="mb-4">{{ $details->description }}</p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" id="ordercount" class="form-control bg-secondary border-0 text-center"
                                value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button id="addcartbtn" class="btn btn-primary px-3">
                            <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                        </button>

                    </div>
                    <div class="pt-3 text-center">
                        <strong class="text-danger mb-2">Hope you enjoyed the food.</strong> <br />

                        <strong class="text-danger mb-2">Thanks for giving us the opportunity to serve you!
                            <i class="fa-regular fa-face-smile"></i>
                        </strong><br />

                        <input type="hidden" name="userid" id="userid" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="productid" id="productid" value="{{ $details->id }}">
                        {{-- <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3"> You May Also Like</span>
        </h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($productdetails as $d)
                        <div class="product-item bg-light">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $d->image) }}" style="height: 200px"
                                    alt="Product_Image">
                                <div class="product-action">
                                    <a href="#" class="btn btn-outline-dark btn-square" title="Add to Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a href="{{ route('user#productdetails', $d->id) }}"
                                        class="btn btn-outline-dark btn-square" title="See Details">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{ $d->name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ $d->price }} Kyats</h5>
                                    <h6 class="text-muted ml-2"><del>30000 Kyats</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>{{ $d->view_count }} Views</small>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection

@section('ajax_Script_Section')
    <script>
        $(document).ready(function() {
            $('#addcartbtn').click(function() {

                $order_data = {
                    'count': $('#ordercount').val(),
                    'userid': $('#userid').val(),
                    'productid': $('#productid').val()
                }
                // console.log($order_data)

                $.ajax({
                    type: 'get',
                    url: 'http://127.0.0.1:8000/ajax/add_to_cart',
                    data: $order_data,
                    datatype: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = 'http://127.0.0.1:8000/user/mycart';
                        };
                    }

                });
            });


        })
    </script>
@endsection
