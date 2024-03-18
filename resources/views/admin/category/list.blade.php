    @extends('admin.layouts.master')
    @section('title', 'Category List')
    @section('content')
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-12">
                        <!-- DATA TABLE -->
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Category List</h2>

                                </div>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{ route('category#createPage') }}">
                                    <button class="au-btn au-btn-icon au-btn--dark au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add category
                                    </button>
                                </a>
                                <button class="au-btn au-btn-icon au-btn--dark au-btn--small">
                                    CSV download
                                </button>
                            </div>
                        </div>

                        {{-- alert message start --}}
                        <div class="mt-3 col-5 offset-7">
                            @if (session('deleteCategory'))
                                <div class="alert alert-danger text-small text-center alert-dismissible fade show"
                                    role="alert">
                                    <small>{{ session('deleteCategory') }}</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('updateCategory'))
                                <div class="alert alert-success text-small text-center alert-dismissible fade show"
                                    role="alert">
                                    <small>{{ session('updateCategory') }}</small>
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
                                <span class="h5 ms-5">Total Categories - {{ $categories->total() }}</span>
                            </div>
                            <div class="mb-2 col-3 ">
                                <form action="{{ route('category#list') }}" method="get">
                                    <div class="input-group">
                                        <input class="form-control" name="searchkey" value="{{ request('searchkey') }}"
                                            type="search" placeholder="Search category..." aria-label="Search">
                                        <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- search key and search box end --}}

                        <div class="table-responsive table-responsive-data2">

                            @if (count($categories) != 0)
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Created Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr class="tr-shadow">
                                                <td>{{ $category->id }}</td>

                                                <td class="desc">{{ $category->name }}</td>

                                                <td>{{ $category->created_at->format('d-M-Y | n:i A') }}</td>

                                                <td>
                                                    <div class="table-data-feature">
                                                        {{-- <button class="item mx-2" data-toggle="tooltip" data-placement="top"
                                                            title="view">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </button> --}}
                                                        <a href="{{ route('category#edit', $category->id) }}">
                                                            <button class="item mx-2" data-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('category#delete', $category->id) }}">
                                                            <button class="item mx-2" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
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
                                    {{ $categories->appends(request()->query())->links() }}
                                </div>
                            @else
                                <div class="alert alert-danger h3 text-center  mt-5 col-8 m-auto ">
                                    THERE IS NO CATEGORY HERE!
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
