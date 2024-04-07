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
                            <a href="{{ route('user#filtercategory', $category->id) }}" class="text-decoration-none">
                                <span class="text-dark" id="category_filter">{{ $category->name }}</span>
                            </a>
                            <span class="badge bg-warning border font-weight-normal text-dark">
                                {{ $category->products->count() }}
                            </span>
                        </div>
                    @endforeach
                    <div class="d-flex align-items-center justify-content-between mb-3 px-4 pb-1">
                        <a href="{{ route('user#home') }}" class="text-decoration-none">
                            <span class="text-dark" id="category_filter">Show All</span>
                        </a>
                    </div>

                </div>
                <!-- Categories End -->

                <!-- Order Button -->
                <div class="mb-3">
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
                                <a href="{{ route('user#mycart') }}">
                                    <button type="button" class="btn btn-light position-relative">
                                        <i class="fa-solid fa-cart-shopping text-danger"></i>
                                        <span
                                            class="badge position-absolute top-0 start-100 translate-middle bg-danger p-1">
                                            {{-- {{ count($cart ?? []) }} --}}
                                            {{ count($cart) }}
                                        </span>
                                    </button>
                                </a>
                            </div>

                            <div class=" d-flex">
                                <div class="mt-1 me-3">
                                    <button class="btn btn-sm btn-light" title="List-View">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                </div>
                                <div>
                                    <select name="sorting" id="sorting" class="form-select mb-3" aria-label="Sorting">
                                        <option value="" disabled selected>Sorting</option>
                                        <option value="asc" class="mb-3">Ascending</option>
                                        <option value="desc" class="mb-3">Descending</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row" id="productslist">
                        @if (count($products) != 0)
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" style="height: 230px"
                                                src="{{ asset('storage/' . $product->image) }}" alt="product image">
                                            <div class="product-action">
                                                {{-- <a href="#" class="btn btn-outline-dark btn-square"
                                                    title="Add to Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a> --}}
                                                <a href="{{ route('user#productdetails', $product->id) }}"
                                                    class="btn btn-outline-dark btn-square" title="See Details">
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
                                                {{-- <h6 class="text-muted ml-2"><del>25000</del></h6> --}}
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
                        @else
                            <div
                                class=" alert alert-warning text-center text-danger fs-5 col-lg-8 offset-lg-2 p-lg-4 mt-lg-5">
                                Sorry! There is no product for this category yet.
                            </div>
                        @endif

                    </div>

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection

@section('ajax_Script_Section')
    <script>
        $(document).ready(function() {

            $('#sorting').change(function() {
                $sorting = $('#sorting').val();
                // console.log($sorting);

                if ($sorting == 'asc') {
                    // console.log('This is Ascending');
                    $.ajax({
                        type: 'get',
                        url: 'http://127.0.0.1:8000/ajax/pizza_list',
                        data: {
                            'status': 'asc'
                        },
                        datatype: 'json',
                        success: function(response) {
                            $productlist = ''
                            for ($idx = 0; $idx < response.length; $idx++) {
                                $productlist += `
                                <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                <div class="product-item bg-light mb-4">
                                    <div class="product-img position-relative overflow-hidden">
                                        <img class="img-fluid w-100" style="height: 230px"
                                            src="{{ asset('storage/${response[$idx].image}') }}" alt="product image">
                                        <div class="product-action">
                                            <a href="#" class="btn btn-outline-dark btn-square" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a href="{{ route('user#productdetails', $product->id) }}" class="btn btn-outline-dark btn-square" title="See Details">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center py-4">
                                        <a href="#" class="h6 text-decoration-none text-truncate">
                                            ${response[$idx].name}
                                        </a>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h5> ${response[$idx].price} kyats</h5>
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
                            </div> `;

                            }
                            // console.log(response)
                            $('#productslist').html($productlist);
                        }
                    });

                } else {
                    // console.log('This is Decending');
                    $.ajax({
                        type: 'get',
                        url: 'http://127.0.0.1:8000/ajax/pizza_list',
                        data: {
                            'status': 'desc'
                        },
                        datatype: 'json',
                        success: function(response) {
                            $productlist = ''
                            for ($idx = 0; $idx < response.length; $idx++) {
                                $productlist += `
                                <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                <div class="product-item bg-light mb-4">
                                    <div class="product-img position-relative overflow-hidden">
                                        <img class="img-fluid w-100" style="height: 230px"
                                            src="{{ asset('storage/${response[$idx].image}') }}" alt="product image">
                                        <div class="product-action">
                                            <a href="#" class="btn btn-outline-dark btn-square" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a href="{{ route('user#productdetails', $product->id) }}" class="btn btn-outline-dark btn-square" title="See Details">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center py-4">
                                        <a href="#" class="h6 text-decoration-none text-truncate">
                                            ${response[$idx].name}
                                        </a>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h5> ${response[$idx].price} kyats</h5>
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
                            </div> `;

                            }
                            // console.log(response)
                            $('#productslist').html($productlist);
                        }
                    });

                }

            })


        })
    </script>
@endsection
