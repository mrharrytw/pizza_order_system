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

            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Sign
                in</button>

        </form>
        <div class="register-link">
            <p>
                Don't you have account?
                <a href="{{ route('auth#registerPage') }}">Sign Up Here</a>
            </p>
        </div>
    </div>
@endsection
