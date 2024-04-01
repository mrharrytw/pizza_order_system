@extends('admin.layouts.master')
@section('title', 'Change Password')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-6 offset-3">

                    <div class=" text-end">
                        <a href="{{ route('category#list') }}">
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

                            <form action="{{ route('admin#changePassword') }}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group my-4">
                                    <label for="cc-payment" class="control-label mb-1">Current Password</label>
                                    <input id="cc-pament" name="currentpassword" type="password"
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
                                    <label for="cc-payment" class="control-label mb-1">New Password</label>
                                    <input id="cc-pament" name="newpassword" type="password"
                                        class="form-control @error('newpassword') is-invalid  @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Enter new password..." />
                                    @error('newpassword')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group my-4">
                                    <label for="cc-payment" class="control-label mb-1">Confirm Password</label>
                                    <input id="cc-pament" name="confirmpassword" type="password"
                                        class="form-control @error('confirmpassword') is-invalid  @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Confirm password..." />
                                    @error('confirmpassword')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>

                                <input type="checkbox" id="showPW" class="mb-3" onclick="myFunction()">
                                <label for="showPW" style="font-size: 15px; user-select: none;">Show Password</label>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-sm btn-danger btn-block">
                                        <span id="payment-button-amount">
                                            <i class="zmdi zmdi-key me-2"></i> Change Password
                                        </span>
                                    </button>
                                </div>

                            </form>

                        </div>
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
    <!-- END MAIN CONTENT-->
@endsection
