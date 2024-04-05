@extends('user.layouts.master')
@section('title', 'My Cart')
@section('content')
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0 datatable" id="datatable">
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
                        @foreach ($cartlists as $cartitem)
                            <tr class="shadow">
                                <td class="text-start ps-lg-5">
                                    <img src="{{ asset('storage/' . $cartitem->product_image) }}" style="width: 50px;">
                                    <span class="ms-1">{{ $cartitem->product_name }}</span>
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
                                    <button class="btn btn-sm btn-danger btn-remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                                <input type="hidden" class="product-price" value="{{ $cartitem->product_price }}">
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
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
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">
                            Proceed To Checkout
                            <i class="fa-solid fa-square-arrow-up-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

            // for row delete
            $(document).on('click', '.btn-remove', function() {
                $(this).closest('tr').remove();

                summaryCalculation();

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

        });
    </script>
@endsection
