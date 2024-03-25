@extends('admin.layouts.master')
@section('title', 'Product Detail')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-3 ps-2">
                                        <button class="btn btn-danger btn-sm rounded-0 text-white px-4"
                                            onclick="history.back()"> <i class="fa-solid fa-chevron-left me-2"></i> Back
                                        </button>
                                    </div>
                                    <div class="col-7">
                                        <h3 class="text-center text-danger title-2">
                                            Product Detail Info
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            {{-- Account Update Alert --}}
                            <div class="col-12">
                                @if (session('accountInfoChanged'))
                                    <div class="alert alert-success text-small text-center alert-dismissible fade show"
                                        role="alert">
                                        <small>{{ session('accountInfoChanged') }}</small>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                            {{-- Account Update Alert End --}}

                            <div class="row px-5">

                                <div class="col-3">
                                    <div class="image mb-2">
                                        <img src="{{ asset('storage/' . $productDetail->image) }}" alt="Product Image" />
                                    </div>
                                    <div class="mt-2">
                                        <a href="{{ route('products#editProduct', $productDetail->id) }}"
                                            class="d-grid text-decoration-none">
                                            <button class="btn btn-danger btn-sm rounded-0 text-white px-4">
                                                <i class="fa-regular fa-pen-to-square me-2"></i>Edit Product
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-9 mb-2">
                                    <div class="border-bottom border-2 border-danger">
                                        <span class="fs-2">{{ $productDetail->name }}</span>
                                    </div>
                                    <div class="mt-2 col-12">
                                        <button class="btn btn-danger rounded-3 me-2" data-toggle="tooltip"
                                            data-placement="top" title="Product Price">
                                            <i class="fa-solid fa-dollar-sign me-1"></i>{{ $productDetail->price }}
                                        </button>
                                        <button class="btn btn-danger rounded-3 me-2" data-toggle="tooltip"
                                            data-placement="top" title="Waiting Time">
                                            <i class="fa-regular fa-clock me-1"></i> {{ $productDetail->waiting_time }} mins
                                        </button>
                                        <button class="btn btn-danger rounded-3 me-2" data-toggle="tooltip"
                                            data-placement="top" title="View Count">
                                            <i class="fa-regular fa-eye me-1"></i> {{ $productDetail->view_count }}
                                        </button>

                                        <button class="btn btn-danger rounded-3 me-2" data-toggle="tooltip"
                                            data-placement="top" title="Created At">
                                            Added on : {{ $productDetail->created_at->format('d-M-Y') }}
                                        </button>
                                    </div>
                                    <div class="mt-3">
                                        <div><i class="fa-regular fa-file-lines"></i> Detail</div>
                                        <span>{{ $productDetail->description }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="text-end me-5">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
    @endsection
