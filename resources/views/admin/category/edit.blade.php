@extends('admin.layouts.master')
@section('title', 'Create Category')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-6 offset-3">
                    <div class=" text-end">
                        <a href="{{ route('category#list') }}">
                            <button class="btn btn-dark text-white my-3 px-4">
                                <i class="fa-solid fa-backward"></i> &nbsp; Category List
                            </button>
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Category Name</h3>
                            </div>
                            <hr>

                            <form action="{{ route('category#update') }}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group my-4">
                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                    <span class="float-right me-2 text-primary">
                                        Category Id: {{ $category->id }}
                                    </span>
                                    <input type="hidden" name="categoryId" value="{{ $category->id }}">
                                    <input id="cc-pament" name="categoryName" type="text"
                                        value="{{ old('categoryName', $category->name) }}"
                                        class="form-control @error('categoryName') is-invalid  @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Category Name..."
                                        autofocus />
                                    @error('categoryName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-dark btn-block">
                                        <span id="payment-button-amount">Update</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        <i class="fa-solid fa-circle-up"></i>
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
