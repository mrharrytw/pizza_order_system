@extends('admin.layouts.master')
@section('title', 'Order List')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30 pb-3">
            <div class="container-fluid">
                <div class="col-12">
                    <!-- Order Status Search Start -->
                    <div class="mb-5">
                        <form action="{{ route('order#searchbystatus') }}" method="get">
                            @csrf
                            <div class=" d-flex">
                                <div>
                                    <span class="h3 text-danger m-2">Order List : </span>
                                </div>

                                <div class="input-group w-25">
                                    <select name="orderstatus" id="orderstatus" class="form-select">
                                        <option value="" @if (request('orderstatus') == '') selected @endif>All
                                        </option>
                                        <option value="0" @if (request('orderstatus') == '0') selected @endif>Pending
                                        </option>
                                        <option value="1" @if (request('orderstatus') == '1') selected @endif>Success
                                        </option>
                                        <option value="2" @if (request('orderstatus') == '2') selected @endif>Reject
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-lg-square btn-danger">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Order Status Search End -->

                    {{-- search key and search box --}}
                    <div class="row">
                        <div class="col-lg-4">
                            <span class="lead">Search Key :</span>
                            <span class="text-danger border-bottom border-danger">{{ request('searchkey') }}</span>
                        </div>
                        <div class="col-lg-5">
                            <span class="lead ms-lg-4">Total Orders - {{ count($orders) }}</span>
                        </div>
                        <div class="mb-2 col-lg-3">
                            <form action="{{ route('order#orderlist') }}" method="get">
                                <div class="input-group">
                                    <input class="form-control" name="searchkey" value="{{ request('searchkey') }}"
                                        type="search" placeholder="Search Orders..." aria-label="Search">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- search key and search box end --}}

                    <div class="table-responsive table-responsive-data2">

                        @if (count($orders) != 0)
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th class="text-danger">User ID</th>
                                        <th class="text-danger">User Name</th>
                                        <th class="text-danger">Order Date</th>
                                        <th class="text-danger">Order Code</th>
                                        <th class="text-danger">Amount</th>
                                        <th class="text-danger">Status</th>

                                    </tr>
                                </thead>
                                <tbody id="datalist">
                                    @foreach ($orders as $order)
                                        <tr class="tr-shadow">
                                            <input type="hidden" class="orderId" value="{{ $order->id }}">

                                            <td>{{ $order->user_id }}</td>

                                            <td>{{ $order->user_name }}</td>

                                            <td>{{ $order->created_at->format('d M Y') }}</td>

                                            <td>{{ $order->order_code }}</td>

                                            <td class="amount">{{ $order->total_price }} Kyats</td>

                                            <td>
                                                <select name="status" class="form-select changestatusindb">
                                                    <option value="0"
                                                        @if ($order->status == 0) selected @endif>Pending</option>
                                                    <option value="1"
                                                        @if ($order->status == 1) selected @endif>Success</option>
                                                    <option value="2"
                                                        @if ($order->status == 2) selected @endif>Reject</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            {{-- pagination Link --}}
                            <div class="mt-2">
                                {{ $orders->appends(request()->query())->links() }}
                            </div>
                        @else
                            <div class="alert alert-danger h3 text-center  mt-5 col-8 m-auto ">
                                There is no result to show !
                            </div>
                        @endif

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

            // $('#orderstatus').change(function() {
            //     $status = $(this).val();
            //     // console.log($status);

            //     $.ajax({
            //         type: 'get',
            //         url: 'http://127.0.0.1:8000/order/ajax_status',
            //         data: {
            //             'status': $status
            //         },
            //         datatype: 'json',
            //         success: function(response) {

            //             $list = '';

            //             for ($i = 0; $i < response.length; $i++) {

            //                 let dbdate = new Date(response[$i].created_at);

            //                 // Array of month names
            //                 let monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
            //                     "Aug", "Sep", "Oct", "Nov", "Dec"
            //                 ];

            //                 let getday = dbdate.getDate();
            //                 let getmonth = dbdate.getMonth();
            //                 let getyear = dbdate.getFullYear();
            //                 let jsdate = getday + ' ' + monthNames[getmonth] + ' ' +
            //                     getyear;

            //                 $list += `
        //                 <tr class="tr-shadow">

        //                                 <input type="hidden" class="orderId" value="${response[$i].id}">

        //                                 <td>${response[$i].user_id}</td>

        //                                 <td>${response[$i].user_name}</td>

        //                                 <td>${jsdate}</td>

        //                                 <td>${response[$i].order_code}</td>

        //                                 <td>${response[$i].total_price } Kyats</td>

        //                                 <td>
        //                                     <select name="status" class="form-select changestatusindb">
        //                                         <option value="0" ${response[$i].status == 0 ? 'selected' : ''}>Pending</option>
        //                                         <option value="1" ${response[$i].status == 1 ? 'selected' : ''}>Success</option>
        //                                         <option value="2" ${response[$i].status == 2 ? 'selected' : ''}>Reject</option>
        //                                     </select>
        //                                 </td>
        //                             </tr>
        //                 `;
            //             }
            //             $('#datalist').html($list);
            //         },
            //         error: function(xhr, status, error) {
            //             // check any error
            //             console.error(xhr.responseText);
            //         }
            //     });
            // });

            $('.changestatusindb').change(function() {
                let parentNode = $(this).parents('tr');
                let orderId = parentNode.find('.orderId').val();
                let status = $(this).val();

                $.ajax({
                    type: 'get',
                    url: 'http://127.0.0.1:8000/order/ajax_statuschange',
                    data: {
                        'orderId': orderId,
                        'status': status
                    },
                    datatype: 'json',
                    success: function(response) {

                    }
                })

            });
        });
    </script>

@endsection
