@extends('admin.layouts.master')
@section('title', 'Message Detail')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30 pb-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-lg-8 offset-2 shadow-sm px-5 py-3 bg-light">
                        <div class="mb-3">
                            <button class="btn btn-danger btn-sm rounded-0 text-white pe-md-4" onclick="history.back()">
                                <i class="fa-solid fa-chevron-left me-2"></i> Back
                            </button>
                        </div>
                        @foreach ($messages as $message)
                            <div class="card w-50">
                                <div class="card-body">
                                    <div class="text-danger">
                                        Name : {{ $message->username }}
                                    </div>
                                    <div class="text-danger">
                                        Email : {{ $message->useremail }}
                                    </div>
                                    <div class="text-danger">
                                        Phone : {{ $message->userphone }}
                                    </div>
                                    <div class="text-danger">
                                        Address : {{ $message->useraddress }}
                                    </div>
                                </div>
                            </div>

                            {{-- Title and Date --}}
                            <div class="d-flex justify-content-between mb-3">
                                <h3 class="">
                                    Subjects : {{ $message->subject }}
                                </h3>
                                <small class="fw-bold">
                                    <i class="fa-regular fa-calendar-check me-2"></i>
                                    {{ $message->created_at->format('d M Y') }}
                                </small>
                            </div>

                            {{-- Message --}}
                            <div class="mb-3">
                                <p class="" style="text-align: justify;">{{ $message->message }}</p>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('jQueryScript')
    <script></script>

@endsection
