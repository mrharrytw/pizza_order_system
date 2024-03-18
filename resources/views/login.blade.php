@extends('layouts.master')
@section('title', 'Log In Page');
@section('content')
    <div class="login-form">
        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Email Address</label>
                <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                @error('email')
                    <small class="text-danger">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                @error('password')
                    <small class="text-danger">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <button class="au-btn au-btn--block au-btn--dark m-b-20" type="submit">
                Sign in
            </button>

        </form>

        <div class="register-link">
            <p>
                Don't you have account?
                <a href="{{ route('auth#registerPage') }}">Sign Up Here</a>
            </p>
        </div>
    </div>
    {{-- alert message start --}}
    <div class="mt-2 col-12">
        @if (session('pwChange'))
            <div class="alert alert-success text-small text-center alert-dismissible fade show" role="alert">
                <i class="fa-regular fa-circle-check"></i>
                <small>{{ session('pwChange') }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    {{-- alert message end --}}
@endsection
