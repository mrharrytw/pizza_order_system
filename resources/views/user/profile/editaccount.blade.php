@extends('user.layouts.master')
@section('title', 'Edit Profile')
@section('content')

    <div class="col-lg-10 offset-lg-1">
        <div class="card">

            <div class="card-body">

                <div class="card-title">
                    <div class="row">
                        <div class="col-3 ps-2">
                            <a href="{{ route('user#viewaccount') }}">
                                <button class="btn btn-danger btn-sm rounded-0 text-white pe-md-4">
                                    <i class="fa-solid fa-chevron-left ps-md-2 me-md-2"></i>
                                    Back
                                </button>
                            </a>
                        </div>
                        <div class="col-7">
                            <h3 class="text-center text-danger title-2"><i class="fa-regular fa-pen-to-square me-2"></i>
                                Edit Profile
                            </h3>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row no-gutters">
                    <div class="col-lg-3 offset-lg-1">
                        <div class="text-center m-0">
                            @if (Auth::user()->image != null)
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" class="img-thumbnail"
                                    alt="Profile Image" />
                            @else
                                @if (Auth::user()->gender == 'male')
                                    <img src="{{ asset('image/male_default_user.png') }}" class="img-thumbnail"
                                        alt="Profile Image" />
                                @else
                                    <img src="{{ asset('image/female_default_user.png') }}" class="img-thumbnail"
                                        alt="Profile Image" />
                                @endif
                            @endif
                        </div>
                        <div class="text-center mt-2">
                            <span class="text-danger">
                                <i class="fa-solid fa-user me-2"></i>{{ ucfirst(Auth::user()->role) }}
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-6 ms-lg-5 mr-3">
                        <form action="{{ route('user#updateaccount', Auth::user()->id) }}" method="post"
                            novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="cc-payment" class="control-label mb-1">Name</label>
                                <input type="text" id="cc-pament" name="name"
                                    value="{{ old('name', Auth::user()->name) }}"
                                    class="form-control @error('name') is-invalid  @enderror" aria-required="true"
                                    aria-invalid="false" placeholder="Name..." autofocus />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="cc-payment" class="control-label mb-1">Gender</label>
                                <select name="gender" class="form-select @error('gender') is-invalid  @enderror">
                                    <option value="male" @if (Auth::user()->gender == 'male') selected @endif>
                                        Male
                                    </option>
                                    <option value="female" @if (Auth::user()->gender == 'female') selected @endif>
                                        Female
                                    </option>
                                    <option value="other" @if (Auth::user()->gender == 'other') selected @endif>
                                        Other
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="cc-payment" class="control-label mb-1">Email</label>
                                <input type="text" id="cc-pament" name="email"
                                    value="{{ old('email', Auth::user()->email) }}"
                                    class="form-control @error('email') is-invalid  @enderror" aria-required="true"
                                    aria-invalid="false" placeholder="Email..." />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="cc-payment" class="control-label mb-1">Phone</label>
                                <input type="text" id="cc-pament" name="phone"
                                    value="{{ old('phone', Auth::user()->phone) }}"
                                    class="form-control @error('phone') is-invalid  @enderror" aria-required="true"
                                    aria-invalid="false" placeholder="Phone Number..." />
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="cc-payment" class="control-label mb-1">Address</label>
                                <textarea id="cc-pament" name="address" class="form-control @error('address') is-invalid  @enderror" cols="30"
                                    rows="3" placeholder="Address...">{{ old('address', Auth::user()->address) }}
                            </textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="cc-payment" class="control-label mb-1">
                                    Upload New Profile Image
                                </label>
                                <input id="cc-pament" name="image" type="file"
                                    class="form-control @error('image') is-invalid  @enderror" aria-required="true"
                                    aria-invalid="false" />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-sm btn-danger btn-block">
                                    Update <i class="fa-solid fa-circle-up"></i>
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
@endsection
