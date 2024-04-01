@extends('user.layouts.master')
@section('title', 'User Profile')
@section('content')
    <div class="col-lg-10 offset-1">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center text-danger title-2"><i class="fa-regular fa-address-card"></i>
                        User Profile</h3>
                </div>
                <hr>
                {{-- Account Update Alert --}}
                <div class="col-12">
                    @if (session('accountInfoChanged'))
                        <div class="alert alert-success text-small text-center alert-dismissible fade show" role="alert">
                            <small>{{ session('accountInfoChanged') }}</small>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                {{-- Account Update Alert End --}}

                <div class="row">
                    <div class="col-3 offset-1">
                        <div class="image">
                            @if (Auth::user()->image != null)
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Image" />
                            @else
                                @if (Auth::user()->gender == 'male')
                                    <img src="{{ asset('image/male_default_user.png') }}" alt="Profile Image" />
                                @else
                                    <img src="{{ asset('image/female_default_user.png') }}" alt="Profile Image" />
                                @endif
                            @endif
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('user#editaccount', Auth::user()->id) }}" class="d-grid text-decoration-none">
                                <button class="btn btn-danger btn-sm rounded-0 text-white px-4">
                                    <i class="fa-regular fa-pen-to-square me-2"></i>Edit Profile
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-7">
                        <ul class="mt-1 list-unstyled">
                            <li class="mb-2">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-secondary opacity-75 text-start" style="width: 120px">Name
                                    </button>
                                    <button class="btn btn-sm btn-light text-start" style="width: 400px">
                                        {{ ucfirst(Auth::user()->name) }}
                                    </button>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-secondary opacity-75 text-start"
                                        style="width: 120px">Gender
                                    </button>
                                    <button class="btn btn-sm btn-light text-start" style="width: 400px">
                                        {{ ucfirst(Auth::user()->gender) }}
                                    </button>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-secondary opacity-75 text-start"
                                        style="width: 120px">Email
                                    </button>
                                    <button class="btn btn-sm btn-light text-start" style="width: 400px">
                                        {{ strtolower(Auth::user()->email) }}
                                    </button>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-secondary opacity-75 text-start"
                                        style="width: 120px">Phone
                                    </button>
                                    <button class="btn btn-sm btn-light text-start" style="width: 400px">
                                        {{ Auth::user()->phone }}
                                    </button>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-secondary opacity-75 text-start" style="width: 120px">
                                        Address
                                    </button>
                                    <button class="btn btn-sm btn-light text-start" style="width: 400px">
                                        {{ Auth::user()->address }}
                                    </button>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-secondary opacity-75 text-start"
                                        style="width: 120px">Member Since
                                    </button>
                                    <button class="btn btn-sm btn-light text-start" style="width: 400px">
                                        {{ Auth::user()->created_at->format('j F Y') }}
                                    </button>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-secondary opacity-75 text-start" style="width: 120px">Role
                                    </button>
                                    <button class="btn btn-sm btn-light text-start" style="width: 400px">
                                        {{ ucfirst(Auth::user()->role) }}
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card-footer">

                <div class="text-end">
                    <a href="{{ route('user#home') }}">
                        <button class="btn btn-danger btn-sm rounded-0 text-white px-4">
                            Back
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
