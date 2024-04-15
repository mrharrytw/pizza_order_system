@extends('admin.layouts.master')
@section('title', 'Inbox')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30 pb-3">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="text-center">
                        <span class="border-bottom border-danger text-danger lead mb-3 d-inline-block">
                            Message Inbox
                        </span>
                    </div>

                    <div class="table-responsive table-responsive-data2">

                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th class="col-1 text-danger">User ID</th>
                                    <th class="col-2 text-danger">User Name</th>
                                    <th class="col-2 text-danger px-2">Subject</th>
                                    <th class="col-5 text-danger px-2">Message</th>
                                    <th class="col-2 text-danger">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mesgdata as $mesg)
                                    <tr class="tr-shadow">
                                        <input type="hidden" class="messageId" value="{{ $mesg->id }}">
                                        <td class="align-content-center">{{ $mesg->user_id }}</td>
                                        <td>{{ $mesg->username }}</td>
                                        <td class="px-2">{{ $mesg->subject }}</td>
                                        <td class="px-2">
                                            {{ Str::words($mesg->message, 9, ' .....') }}
                                            <a href="{{ route('admin#readmore', $mesg->id) }}"
                                                class="text-decoration-none mx-2">
                                                Read More
                                                <i class="fa-solid fa-angles-right"></i>
                                            </a>
                                        </td>
                                        <td class=" ps-2">
                                            <div class=" d-flex justify-content-around">
                                                <span class="me-2 status">{{ $mesg->status }}</span>
                                                <div>
                                                    <input type="checkbox" name="mesgstatus" id="mesgstatus"
                                                        class="form-check mesgstatus"
                                                        @if ($mesg->status === 'read') checked @endif
                                                        data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('jQueryScript')
    <script>
        $(document).ready(function() {

            // Save original status for each message
            $('.status').each(function() {
                let $status = $(this);
                $status.data('original-status', $status.text());
            });

            $('.mesgstatus').change(function() {
                let parentNode = $(this).parents('tr');
                let messageId = parentNode.find('.messageId').val();
                let $status = parentNode.find('.status');
                let updatestatus = $(this).is(':checked') ? 'read' : 'unread';

                $.ajax({
                    type: "get",
                    url: "/admin/contact/ajaxChangeStatus",
                    data: {
                        'message_id': messageId,
                        'updatestatus': updatestatus
                    },
                    datatype: 'json',
                    success: function(response) {
                        location.reload();
                    }
                });

                if ($(this).is(':checked')) {
                    $status.text('read');
                } else {
                    let originalStatus = $status.data('original-status');
                    $status.text(originalStatus);
                }
            });

        });
    </script>

@endsection
