@extends('admin.layouts.master')
@section('title', 'Admins List')
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
                                <h2 class="title-1 text-danger">Admin List</h2>

                            </div>
                        </div>
                    </div>

                    {{-- alert message start --}}
                    <div class="mt-3 col-5 offset-7">
                        @if (session('deleteList'))
                            <div class="alert alert-danger text-small text-center alert-dismissible fade show"
                                role="alert">
                                <small>{{ session('deleteList') }}</small>
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
                            <span class="h5 ms-5">
                                There are <span class="text-danger">{{ $admins->total() }}</span> admins.

                            </span>
                        </div>
                        <div class="mb-2 col-3 ">
                            <form action="{{ route('admin#adminlist') }}" method="get">
                                <div class="input-group">
                                    <input class="form-control" name="searchkey" value="{{ request('searchkey') }}"
                                        type="search" placeholder="Search admin..." aria-label="Search">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- search key and search box end --}}

                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th class="text-danger">Image</th>
                                    <th class="text-danger">Name</th>
                                    <th class="text-danger">Gender</th>
                                    <th class="text-danger">Email</th>
                                    <th class="text-danger">Phone</th>
                                    <th class="text-danger">Address</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr class="tr-shadow">
                                        <td class="col-2">
                                            @if ($admin->image != null)
                                                <img style="max-width:200px" src="{{ asset('storage/' . $admin->image) }}"
                                                    class="img-thumbnail shadow-sm" />
                                            @else
                                                @if ($admin->gender == 'male')
                                                    <img style="max-width:200px"
                                                        src="{{ asset('image/male_default_user.png') }}"
                                                        class="img-thumbnail shadow-sm" />
                                                @else
                                                    <img style="max-width:200px"
                                                        src="{{ asset('image/female_default_user.png') }}"
                                                        class="img-thumbnail shadow-sm" />
                                                @endif
                                            @endif
                                        </td>

                                        <td class="col-2">{{ $admin->name }}</td>

                                        <td class="col-1">{{ $admin->gender }}</td>

                                        <td class="col-2">{{ $admin->email }}</td>

                                        <td class="col-1">{{ $admin->phone }}</td>

                                        <td class="col-3">{{ $admin->address }}</td>

                                        <td class="col-3">
                                            <div class="table-data-feature">
                                                @if (Auth::user()->id == $admin->id)
                                                @else
                                                    <a href="{{ route('admin#changerole', $admin->id) }}">
                                                        <button class="item mx-2" data-toggle="tooltip" data-placement="top"
                                                            title="Role Change">
                                                            <i class="fa-solid fa-people-arrows text-danger"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('admin#listdelete', $admin->id) }}">
                                                        <button class="item mx-2" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete text-danger"></i>
                                                        </button>
                                                    </a>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{-- pagination Link --}}
                        <div class="mt-2">
                            {{ $admins->appends(request()->query())->links() }}
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
