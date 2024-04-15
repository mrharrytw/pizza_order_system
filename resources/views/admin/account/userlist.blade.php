@extends('admin.layouts.master')
@section('title', 'Users List')
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
                                <h2 class="title-1 text-danger">User List</h2>

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
                            <span class="lead">Search Key :</span>
                            <span class="text-danger border-bottom border-danger">{{ request('searchkey') }}</span>
                        </div>
                        <div class="col-6">
                            <span class="lead ms-5">
                                There are <span class="text-danger">{{ $users->total() }}</span> members.

                            </span>
                        </div>
                        <div class="mb-2 col-3 ">
                            <form action="{{ route('admin#userlist') }}" method="get">
                                <div class="input-group">
                                    <input class="form-control" name="searchkey" value="{{ request('searchkey') }}"
                                        type="search" placeholder="Search user..." aria-label="Search">
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
                                    <th class="text-danger p-2 text-center">Image</th>
                                    <th class="text-danger p-2 text-center">Name</th>
                                    <th class="text-danger p-2 text-center">Gender</th>
                                    <th class="text-danger p-2 text-center">Email</th>
                                    <th class="text-danger p-2 text-center">Phone</th>
                                    <th class="text-danger p-2">Address</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="tr-shadow">
                                        <input type="hidden" class="userId" value="{{ $user->id }}">
                                        <td class="col-1 p-3">
                                            @if ($user->image != null)
                                                <img style="max-width:100px" src="{{ asset('storage/' . $user->image) }}"
                                                    class="img-thumbnail shadow-sm" />
                                            @else
                                                @if ($user->gender == 'male')
                                                    <img style="max-width:100px"
                                                        src="{{ asset('image/male_default_user.png') }}"
                                                        class="img-thumbnail shadow-sm" />
                                                @else
                                                    <img style="max-width:100px"
                                                        src="{{ asset('image/female_default_user.png') }}"
                                                        class="img-thumbnail shadow-sm" />
                                                @endif
                                            @endif
                                        </td>

                                        <td class="col-2 p-3">{{ $user->name }}</td>

                                        <td class="col-1 p-2">{{ $user->gender }}</td>

                                        <td class="col-1 p-2">{{ $user->email }}</td>

                                        <td class="col-1 p-3">{{ $user->phone }}</td>

                                        <td class="col-3 p-2">{{ $user->address }}</td>

                                        <td class="col-3 p-0">
                                            <div class="table-data-feature d-flex justify-content-around">

                                                <select name="status" id="rolechange"
                                                    class=" form-select form-select-sm changerole" data-toggle="tooltip"
                                                    data-placement="top" title="User Role Change" style="width: 120px">
                                                    <option value="admin"
                                                        @if ($user->role == 'admin') selected @endif>Admin</option>
                                                    <option value="user"
                                                        @if ($user->role == 'user') selected @endif>User</option>
                                                </select>

                                                <a href="{{ route('admin#userdelete', $user->id) }}">
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
                            {{ $users->appends(request()->query())->links() }}
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('jQueryScript')
    <script>
        $(document).ready(function() {
            $('.changerole').change(function() {
                let currentRole = $(this).val();
                let parentNode = $(this).parents('tr');
                let userId = parentNode.find('.userId').val();

                $.ajax({
                    type: 'get',
                    url: '/admin/ajax_userrolechange',
                    data: {
                        'userId': userId,
                        'currentRole': currentRole
                    },
                    datatype: 'json',
                    success: function(response) {
                        location.reload();
                    }
                })


            })
        });
    </script>
@endsection
