@extends('layouts.master')
@section('title', 'Register Page')
@section('content')
    <div class="login-form">
        <form action="{{ route('register') }}" method="post">
            @csrf

            @error('terms')
                <small class="text-danger">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    {{ $message }}
                </small>
            @enderror

            <div class="form-group">
                <label>Username</label>
                <input class="au-input au-input--full @error('name') is-invalid @enderror" type="text" name="name"
                    placeholder="Username...">
                @error('name')
                    <small class="text-danger">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ $message }}
                    </small>
                @enderror
            </div>


            <div class="form-group">
                <label>Email Address</label>
                <input class="au-input au-input--full" type="email" name="email" placeholder="Email...">
                @error('email')
                    <small class="text-danger">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ $message }}
                    </small>
                @enderror
            </div>


            <div class="form-group">
                <label>Phone Number</label>
                <input class="au-input au-input--full" type="text" name="phone" placeholder="Phone...">
                @error('phone')
                    <small class="text-danger">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="au-input au-input--full form-control-sm">
                    <option value="" selected disabled>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                @error('gender')
                    <small class="text-danger">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group">
                <label>Full Address</label>
                <input class="au-input au-input--full" type="text" name="address" placeholder="Full Address...">
                @error('address')
                    <small class="text-danger">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ $message }}
                    </small>
                @enderror
            </div>


            <div class="form-group">
                <label>Password</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="Password...">
                @error('password')
                    <small class="text-danger">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ $message }}
                    </small>
                @enderror
            </div>


            <div class="form-group">
                <label>Confirm Password</label>
                <input class="au-input au-input--full" type="password" name="password_confirmation"
                    placeholder="Confirm Password...">
                @error('password_confirmation')
                    <small class="text-danger">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <button class="au-btn au-btn--block au-btn--dark m-b-20" type="submit">register</button>

        </form>
        <div class="register-link">
            <p>
                Already have account?
                <a href="{{ route('auth#loginPage') }}">Sign In</a>
            </p>
        </div>
    </div>
@endsection
