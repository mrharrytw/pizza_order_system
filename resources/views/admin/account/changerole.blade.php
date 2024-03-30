@extends('admin.layouts.master')
@section('title', 'Change Role')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-10 offset-1">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 ps-2">
                                    <button class="btn btn-danger btn-sm rounded-0 text-white px-4" onclick="history.back()">
                                        <i class="fa-solid fa-chevron-left me-2"></i> Back
                                    </button>
                                </div>
                                <div class="col-7">
                                    <h3 class="text-center text-danger title-2"><i
                                            class="fa-regular fa-pen-to-square me-2"></i>
                                        Change Role
                                    </h3>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-3 offset-1">
                                    <div class="image">
                                        @if ($accounts->image == null)
                                            @if ($accounts->gender == 'male')
                                                <img style="max-width:200px"
                                                    src="{{ asset('image/male_default_user.png') }}"
                                                    class="img-thumbnail shadow-sm" />
                                            @else
                                                <img style="max-width:200px"
                                                    src="{{ asset('image/female_default_user.png') }}"
                                                    class="img-thumbnail shadow-sm" />
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/' . $accounts->image) }}" alt="Profile Image" />
                                        @endif
                                    </div>
                                    <div class="text-center mt-2">
                                        <span class="text-danger">
                                            <i class="fa-solid fa-user me-2"></i>
                                            <span>Current Role = </span>
                                            {{ ucfirst($accounts->role) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 ms-5">
                                    <form action="{{ route('admin#roleUpdate', $accounts->id) }}" method="post"
                                        novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Select Role</label>
                                            <select name="role" class="form-select @error('role') is-invalid  @enderror">
                                                <option value="admin" @if ($accounts->role == 'admin') selected @endif>
                                                    Admin
                                                </option>
                                                <option value="user" @if ($accounts->role == 'user') selected @endif>
                                                    User
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Name</label>
                                            <input type="text" id="cc-pament" name="name"
                                                value="{{ old('name', $accounts->name) }}"
                                                class="form-control @error('name') is-invalid  @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Name..." disabled />
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Email</label>
                                            <input type="text" id="cc-pament" name="email"
                                                value="{{ old('email', $accounts->email) }}"
                                                class="form-control @error('email') is-invalid  @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Email..." disabled />
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cc-payment" class="control-label mb-1">Phone</label>
                                            <input type="text" id="cc-pament" name="phone"
                                                value="{{ old('phone', $accounts->phone) }}"
                                                class="form-control @error('phone') is-invalid  @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Phone Number..."
                                                disabled />
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-sm btn-danger btn-block">
                                                Change Role <i class="fa-solid fa-people-arrows"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
