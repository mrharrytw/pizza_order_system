@extends('admin.layouts.master')
@section('title', 'Create Products')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-6 offset-3">
                    <div class=" text-end">
                        <a href="{{ route('products#productslist') }}">
                            <button class="btn btn-danger text-white mb-3 px-4">
                                <i class="fa-solid fa-backward"></i> &nbsp; Products List
                            </button>
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Products</h3>
                            </div>
                            <hr>

                            <form action="{{ route('products#createProduct') }}" method="post" novalidate="novalidate"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group my-4">
                                    <label for="" class="control-label mb-1">Name</label>
                                    <input name="productName" type="text" value="{{ old('productName') }}"
                                        class="form-control @error('productName') is-invalid  @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Products Name..."
                                        autofocus />
                                    @error('productName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group my-4">
                                    <label for="" class="control-label mb-1">Category</label>
                                    <select name="category" id=""
                                        class="form-control @error('category') is-invalid  @enderror">
                                        <option value="{{ old('category') }}" selected disabled>Choose a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group my-4">
                                    <label for="" class="control-label mb-1">Description</label>
                                    <textarea name="productdescription" class="form-control @error('productdescription') is-invalid  @enderror"
                                        cols="30" rows="3" placeholder="Product Description...">{{ old('productdescription') }}</textarea>
                                    @error('productdescription')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group my-4">
                                    <label for="" class="control-label mb-1">Image</label>
                                    <input name="productimage" type="file" value=""
                                        class="form-control @error('productimage') is-invalid  @enderror"
                                        aria-required="true" aria-invalid="false" />
                                    @error('productimage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group my-4">
                                    <label for="" class="control-label mb-1">Waiting Time</label>
                                    <input name="waitingTime" type="number" value="{{ old('waitingTime') }}"
                                        class="form-control @error('waitingTime') is-invalid  @enderror"
                                        aria-required="true" aria-invalid="false"
                                        placeholder="Enter Waiting Time in Minutes..." />
                                    @error('waitingTime')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group my-4">
                                    <label for="" class="control-label mb-1">Price</label>
                                    <input name="productPrice" type="number" value="{{ old('productPrice') }}"
                                        class="form-control @error('productPrice') is-invalid  @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Products Price..." />
                                    @error('productPrice')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-danger btn-block">
                                        <span id="payment-button-amount">Create</span>
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
