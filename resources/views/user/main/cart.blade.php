@extends('user.layouts.master')
@section('title', 'My Cart')
@section('content')
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-">

                {{-- Data table start --}}
                <table class="table table-light table-borderless table-hover text-center datatable" id="datatable">
                    <thead class="thead-danger">
                        <tr class="shadow">
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        {{-- foreach looping start --}}
                        @foreach ($cartlists as $cartitem)
                            <tr class="shadow">
                                <td class="text-start ps-lg-5">
                                    <img src="{{ asset('storage/' . $cartitem->product_image) }}" style="width: 50px;">
                                    <span class="ms-1">{{ $cartitem->product_name }}</span>
                                    <input type="hidden" class="orderID" value="{{ $cartitem->id }}">
                                    <input type="hidden" class="userID" value="{{ $cartitem->user_id }}">
                                    <input type="hidden" class="productID" value="{{ $cartitem->product_id }}">
                                </td>
                                <td class="align-middle">{{ number_format($cartitem->product_price) }} Ks</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>

                                        <input type="text"
                                            class="form-control form-control-sm bg-secondary border-0 text-center qty"
                                            value="{{ $cartitem->qty }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle total" id="total">
                                    {{ number_format($cartitem->product_price * $cartitem->qty) }} Ks
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-sm btn-danger btn-remove" id="btn-remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                                <input type="hidden" class="product-price" value="{{ $cartitem->product_price }}">
                            </tr>
                        @endforeach
                        {{-- foreach looping End --}}
                    </tbody>
                </table>
                {{-- Data table end --}}

                <div class="text-center">
                    Want to add more to cart... <a href="{{ route('user#home') }}"
                        class="text-danger text-decoration-none">Click Here</a>.
                </div>

            </div>

            {{-- Cart Summary Start --}}
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">
                        Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5 shadow-sm">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6 id="subtotal">{{ number_format($subtotal) }} Ks</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Delivery Fees</h6>
                            <h6 class="font-weight-medium">{{ number_format(3000) }} Ks</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="finaltotal">{{ number_format($subtotal + 3000) }} Ks</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" id="checkout-btn">
                            Proceed To Checkout
                            <i class="fa-solid fa-square-arrow-up-right ms-2"></i>
                        </button>
                        <button class="btn btn-block btn-danger font-weight-bold my-3 py-3" id="clearcart-btn">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i>
                            Clear Cart
                        </button>
                    </div>
                </div>
            </div>
            {{-- Cart Summary End --}}
        </div>
    </div>

    {{-- Delete Cart Item confirmation Modal --}}
    <div class="modal fade mt-5" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">
                        Remove Item
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body my-3">
                    <i class="fa-solid fa-triangle-exclamation text-danger mx-2"></i>
                    Are you sure you want to remove this item from your cart?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm px-3 btn-secondary" data-bs-dismiss="modal">
                        No
                    </button>
                    <button type="button" class="btn btn-sm px-3 btn-danger" id="confirmYes">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Cart Item confirmation Modal End --}}

    {{-- Clear Cart confirmation Modal --}}
    <div class="modal fade mt-5" id="clearConfirmationModal" tabindex="-1" aria-labelledby="clearConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clearConfirmationModalLabel">
                        Clear Cart
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body my-3">
                    <i class="fa-solid fa-triangle-exclamation text-danger mx-2"></i>
                    Are you sure you want to clear all items from your cart?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm px-3 btn-secondary" data-bs-dismiss="modal">
                        No
                    </button>
                    <button type="button" class="btn btn-sm px-3 btn-danger" id="clearYes">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Clear Cart confirmation Modal End --}}

    <!-- Cart End -->
@endsection


@section('ajax_Script_Section')
    <script>
        $(document).ready(function() {
            // event delegation for plus button
            $(document).on('click', '.btn-plus', function() {
                $parentNode = $(this).closest('tr');
                $price = $parentNode.find('.product-price').val();
                $qty = $parentNode.find('.qty').val();
                $total = $price * $qty;
                $total = $total.toLocaleString();
                $parentNode.find('.total').html(`${$total} Ks`);

                summaryCalculation();

            });

            // event delegation for minus button
            $(document).on('click', '.btn-minus', function() {
                $parentNode = $(this).closest('tr');
                $price = $parentNode.find('.product-price').val();
                $qty = $parentNode.find('.qty').val();
                $total = $price * $qty;
                $total = $total.toLocaleString();
                $parentNode.find('.total').html(`${$total} Ks`);

                summaryCalculation();

            });


            // for row delete with confirm modal box and delete item form cart table in DB with ajax
            $(document).on('click', '#btn-remove', function() {

                $('#confirmationModal').modal('show');

                $itemToRemove = $(this).parents('tr');

                $('#confirmYes').click(function() {

                    var $productID = $itemToRemove.find('.productID').val();
                    var $orderID = $itemToRemove.find('.orderID').val();

                    // console.log($productID, $orderID);

                    $.ajax({
                        type: 'get',
                        url: '/ajax/delete_item',
                        data: {
                            'productId': $productID,
                            'orderId': $orderID
                        },
                        datatype: 'json',

                    });

                    $itemToRemove.remove();
                    summaryCalculation();
                    $('#confirmationModal').modal('hide');
                });

            });


            // for summary calculation
            function summaryCalculation() {
                $totalprice = 0;
                $('.datatable tr').each(function(index, row) {
                    $price = $(row).find('#total').text().replace(',', '').replace('Ks', '').trim();
                    $price = Number($price);
                    $totalprice += $price;
                })

                $totalpricetoDisplay = $totalprice.toLocaleString();
                $('#subtotal').text(`${$totalpricetoDisplay} Ks`);

                $finaltotal = $totalprice + 3000;
                $finaltotaltoDisplay = $finaltotal.toLocaleString();
                $('#finaltotal').text(`${$finaltotaltoDisplay} Ks`);
            }


            // to checkout with ajax
            $('#checkout-btn').click(function() {

                $randomNum = Math.floor(Math.random() * 100000001)
                $orderlist = []
                $('#datatable tbody tr').each(function(index, row) {
                    $orderlist.push({
                        'userID': $(row).find('.userID').val(),
                        'productID': $(row).find('.productID').val(),
                        'qty': $(row).find('.qty').val(),
                        'total': $(row).find('#total').text().replace(',', '').replace('Ks',
                            '').trim(),
                        'orderCode': 'POS' + $randomNum
                    })
                })
                // console.log($orderlist);

                $.ajax({
                    type: 'get',
                    url: '/ajax/checkout',
                    data: Object.assign({}, $orderlist),
                    datatype: 'json',
                    success: function(response) {
                        if (response.status == 'true') {
                            window.location.href = '/user/home';
                        }
                    }
                });

            });


            // for clearing all cart items with confirm modal box and delete all datas form cart table in DB with ajax
            $(document).on('click', '#clearcart-btn', function() {
                $('#clearConfirmationModal').modal('show');

                $('#clearYes').click(function() {
                    $('#datatable tbody tr').remove();
                    $('#subtotal').html('0 Ks');
                    $('#finaltotal').html('0 Ks');
                    $('#clearConfirmationModal').modal('hide');

                    $.ajax({
                        type: 'get',
                        url: '/ajax/clear_cart',
                        datatype: 'json',
                    })
                });

            });

        });
    </script>
@endsection
