@extends('admin.layouts.master')
@section('title', 'Products List')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30 pb-3">
            <div class="container-fluid">
                <div class="col-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1 text-danger">Products List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('products#createProductsPage') }}">
                                <button class="au-btn au-btn-icon au-btn--red au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add products
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--red au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>

                    {{-- alert message start --}}
                    <div class="mt-3 col-5 offset-7">
                        @if (session('deleteProduct'))
                            <div class="alert alert-danger text-small text-center alert-dismissible fade show"
                                role="alert">
                                <small>{{ session('deleteProduct') }}</small>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('updateProduct'))
                            <div class="alert alert-success text-small text-center alert-dismissible fade show"
                                role="alert">
                                <small>{{ session('updateProduct') }}</small>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    {{-- alert message end --}}

                    {{-- search key and search box --}}
                    <div class="row">
                        <div class="col-3">
                            <span class="h5">Search Key :</span>
                            <span class="text-danger">{{ request('searchkey') }}</span>
                        </div>
                        <div class="col-6">
                            <span class="h5 ms-5">Total Products - {{ $products->total() }}</span>
                        </div>
                        <div class="mb-2 col-3 ">
                            <form action="{{ route('products#productslist') }}" method="get">
                                <div class="input-group">
                                    <input class="form-control" name="searchkey" value="{{ request('searchkey') }}"
                                        type="search" placeholder="Search Products..." aria-label="Search">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- search key and search box end --}}

                    <div class="table-responsive table-responsive-data2">

                        @if (count($products) != 0)
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th class="text-danger">Image</th>
                                        <th class="text-danger">Name</th>
                                        <th class="text-danger">Price</th>
                                        <th class="text-danger">Category</th>
                                        <th class="text-danger">View Count</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="tr-shadow">
                                            <td class="col-3"><img style="max-width:200px"
                                                    src="{{ asset('storage/' . $product->image) }}"
                                                    class="img-thumbnail shadow-sm" /></td>

                                            <td class="col-3">{{ $product->name }}</td>

                                            <td class="col-2">{{ $product->price }} Kyats</td>

                                            <td class="col-2">{{ $product->category_id }}</td>

                                            <td class="col-2">{{ $product->view_count }}
                                            </td>

                                            <td class="col-3">
                                                <div class="table-data-feature">
                                                    <a href="{{ route('product#detail', $product->id) }}">
                                                        <button class="item mx-2" data-toggle="tooltip" data-placement="top"
                                                            title="View Detail">
                                                            <i class="fa-regular fa-eye text-danger"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('products#editProduct', $product->id) }}">
                                                        <button class="item mx-2" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit text-danger"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('products#delete', $product->id) }}">
                                                        <button class="item mx-2" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete text-danger"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            {{-- pagination Link --}}
                            <div class="mt-2">
                                {{ $products->appends(request()->query())->links() }}
                            </div>
                        @else
                            <div class="alert alert-danger h3 text-center  mt-5 col-8 m-auto ">
                                Products Not Found!
                            </div>
                        @endif

                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
