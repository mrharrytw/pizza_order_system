@extends('admin.layouts.master')
@section('title', 'Edit And Update Product')
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
                                        <h3 class="text-center text-danger title-2"><i
                                                class="fa-regular fa-pen-to-square me-2"></i>
                                            Edit Product Information
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-3 offset-1">
                                    <div class="image">

                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Profile Image" />

                                    </div>
                                    <button class="btn btn-danger btn-sm btn-block rounded-0 mt-2" data-toggle="tooltip"
                                        data-placement="top" title="View Count">
                                        <i class="fa-regular fa-eye me-1"></i> {{ $product->view_count }}
                                    </button>
                                    <button class="btn btn-danger btn-sm btn-block rounded-0 mt-2" data-toggle="tooltip"
                                        data-placement="top" title="Created At">
                                        Added on : {{ $product->created_at->format('d-M-Y') }}
                                    </button>
                                </div>

                                <div class="col-6 ms-5">
                                    <form action="{{ route('product#update') }}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                        @csrf

                                        {{-- hidden ID --}}
                                        <input type="hidden" name="productId" value="{{ $product->id }}">

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Name</label>
                                            <input type="text" id="cc-pament" name="productName"
                                                value="{{ old('name', $product->name) }}"
                                                class="form-control @error('name') is-invalid  @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Name..." autofocus />
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Category</label>
                                            <select name="category"
                                                class="form-select @error('category') is-invalid  @enderror">
                                                <option value="" selected disabled>Choose a category
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($product->category_id == $category->id) selected @endif>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Price</label>
                                            <input type="text" id="cc-pament" name="productPrice"
                                                value="{{ old('productPrice', $product->price) }}"
                                                class="form-control @error('productPrice') is-invalid  @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Price..." />
                                            @error('productPrice')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Wating Time</label>
                                            <input type="text" id="cc-pament" name="waitingTime"
                                                value="{{ old('waitingTime', $product->waiting_time) }}"
                                                class="form-control @error('waitingTime') is-invalid  @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Waiting Time..." />
                                            @error('waitingTime"')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Description</label>
                                            <textarea id="cc-pament" name="productdescription"
                                                class="form-control @error('productdescription') is-invalid  @enderror" cols="30" rows="3"
                                                placeholder="Description...">{{ old('productdescription', $product->description) }}
                                            </textarea>
                                            @error('productdescription')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">
                                                Upload New Product Image
                                            </label>
                                            <input id="cc-pament" name="productimage" type="file"
                                                class="form-control @error('productimage') is-invalid  @enderror"
                                                aria-required="true" aria-invalid="false" />
                                            @error('productimage')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-sm btn-danger btn-block">
                                                Update <i class="fa-solid fa-circle-up"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-end">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
