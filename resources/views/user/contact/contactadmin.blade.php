@extends('user.layouts.master')
@section('title', 'Contact admin')
@section('content')
    <!-- contact  Start -->
    <div class="container-fluid" style="min-height: 400px;">
        <div class="row px-xl-5">
            <div class="col-lg-2 offset-lg-2">
                <button class="btn btn-danger btn-sm rounded-0 text-white pe-md-4" onclick="history.back()"> <i
                        class="fa-solid fa-chevron-left me-2"></i> Back
                </button>
            </div>
            <div class="col-lg-4 text-center">
                <span class="border-bottom border-danger text-danger lead  mb-3 d-inline-block">
                    Contact Admin
                </span>
            </div>
            <div class="col-lg-8 offset-lg-2 mt-3">
                <form action="{{ route('user#sendmessage') }}" method="post">
                    @csrf
                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">

                    <div class="form-group" style="width: 100%">
                        <label for="Subject" class="text-danger lead mb-1">Subject</label>
                        <input type="text" name="mesgsubject" id="mesgsubject" class="form-control" maxlength="50"
                            autofocus placeholder="Your message subject...">
                    </div>
                    <div class="form-group">
                        <label for="usermesg" class="text-danger lead mb-1">Message</label>
                        <textarea name="usermesg" id="usermesg" class="form-control" style="resize: none;" cols="30" rows="7"
                            maxlength="500" placeholder="Enter your messages..."></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span id="characounts"></span>
                        <button type="submit" class="btn btn-sm btn-danger" disabled>
                            Send Message<i class="fa-solid fa-paper-plane ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>


    <!-- Cart End -->
@endsection


@section('ajax_Script_Section')
    <script>
        $(document).ready(function() {

            let maxlength = $('#usermesg').attr("maxlength")

            $('#characounts').text(`${maxlength} characters are remaining.`)


            $('#usermesg').keyup(function() {
                let getsmslength = $(this).val().length;
                let remainingchars = maxlength - getsmslength;

                $('#characounts').text(`${remainingchars} characters are remaining.`)
            });

            // to enable send button when all feilds are filled.
            $('#mesgsubject, #usermesg').keyup(function() {
                if ($('#mesgsubject').val() !== '' && $('#usermesg').val() !== '') {
                    $('[type=submit]').removeAttr('disabled');
                } else {
                    $('[type=submit]').attr('disabled', true);
                }
            });
        });
    </script>
@endsection
