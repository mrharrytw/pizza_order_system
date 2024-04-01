@extends('user.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-3">

                <div class=" text-end">
                    <a href="{{ route('user#home') }}">
                        <button class="btn btn-sm btn-danger text-white my-3 px-4">
                            <i class="fa-solid fa-xmark"></i> &nbsp;Cancle
                        </button>
                    </a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Change Password</h3>
                        </div>
                        <hr>

                        <form action="{{ route('user#changePassword') }}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="form-group my-4">
                                <label for="curt-pw" class="control-label mb-1">Current Password</label>
                                <input id="curt-pw" name="currentpassword" type="password"
                                    class="form-control @error('currentpassword') is-invalid  @enderror @if (session('pwNotMatch')) is-invalid @endif"
                                    aria-required="true" aria-invalid="false" placeholder="Enter current password..."
                                    autofocus />
                                @error('currentpassword')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                                @if (session('pwNotMatch'))
                                    <small class="text-danger">{{ session('pwNotMatch') }}</small>
                                @endif
                            </div>
                            <div class="form-group my-4">
                                <label for="nw-pw" class="control-label mb-1">New Password</label>
                                <input id="nw-pw" name="newpassword" type="password"
                                    class="form-control @error('newpassword') is-invalid  @enderror" aria-required="true"
                                    aria-invalid="false" placeholder="Enter new password..." />
                                @error('newpassword')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <label for="cf-pw" class="control-label mb-1">Confirm Password</label>
                                <input id="cf-pw" name="confirmpassword" type="password"
                                    class="form-control @error('confirmpassword') is-invalid  @enderror"
                                    aria-required="true" aria-invalid="false" placeholder="Confirm password..." />
                                @error('confirmpassword')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <input type="checkbox" id="showPW" class="mb-3" onclick="myFunction()">
                            <label for="showPW" style="font-size: 15px; user-select: none;">Show Password</label>

                            <div>
                                <button type="submit" class="btn btn-danger btn-block">
                                    <i class="fa-solid fa-key me-2"></i> Change Password
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var pw = document.querySelectorAll(".form-control");
            pw.forEach(function(input) {
                if (input.type === "password") {
                    input.type = "text";
                } else {
                    input.type = "password";
                }
            });
        }
    </script>
@endsection
