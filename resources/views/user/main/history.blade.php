@extends('user.layouts.master')
@section('title', 'My Cart')
@section('content')
    <!-- Cart Start -->
    <div class="container-fluid" style="min-height: 400px;">
        <div class="text-center">
            <span class="border-bottom border-danger text-danger lead  mb-3 d-inline-block">
                Your Cart History
            </span>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-8 offset-2 table-responsive mb-">

                {{-- Data table start --}}
                <table class="table table-light table-borderless table-hover text-center datatable" id="datatable">
                    <thead class="thead-danger">
                        <tr class="shadow">
                            <th>Date</th>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        {{-- foreach looping start --}}
                        @foreach ($datas as $data)
                            <tr class="shadow">
                                <td class="align-middle">
                                    {{ $data->created_at->format('d M Y') }}
                                </td>
                                <td class="align-middle">
                                    {{ $data->order_code }}
                                </td>
                                <td class="align-middle">
                                    {{ number_format($data->total_price) }} Ks
                                </td>
                                <td class="align-middle">
                                    @if ($data->status == 0)
                                        <span class="text-warning">Pending</span>
                                    @elseif ($data->status == 1)
                                        <span class="text-success">Success</span>
                                    @elseif($data->status == 2)
                                        <span class="text-danger">Reject</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        {{-- foreach looping End --}}
                    </tbody>
                </table>
                {{-- Data table end --}}
                <div class="mt-2"> {{ $datas->appends(request()->query())->links() }}</div>

            </div>
        </div>
    </div>


    <!-- Cart End -->
@endsection


@section('ajax_Script_Section')
    <script>
        $(document).ready(function() {



        });
    </script>
@endsection
