<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function pizzaList(Request $request)
    {
        if ($request->status == 'asc') {
            $ajaxData = Product::orderBy('id', 'asc')->get();
        } else {
            $ajaxData = Product::orderBy('id', 'desc')->get();
        }

        // return $ajaxData;
        return response()->json($ajaxData, 200);

    }

    // add to cart
    public function addToCart(Request $request)
    {
        $order_data = $this->getOrderData($request);
        Cart::create($order_data);
        $response = [
            'status' => 'success',
            'message' => 'Add to cart completed'
        ];
        return response()->json($response, 200);
    }


    // proceed to checkout
    public function checkout(Request $request)
    {
        $total = 0;
        foreach ($request->all() as $item) {
            $data = OrderList::create([
                'user_id' => $item['userID'],
                'product_id' => $item['productID'],
                'qty' => $item['qty'],
                'total' => $item['total'],
                'order_code' => $item['orderCode']
            ]);

            $total += $data->total;
            $orderCode = $data->order_code;
        }

        Cart::where('user_id', Auth::user()->id)->delete();

        Order::create([
            'user_id' => Auth::user()->id,
            'order_code' => $orderCode,
            'total_price' => $total + 3000
        ]);

        return response()->json([
            'status' => 'true',
            'message' => 'order completed'
        ], 200);

    }

    // Clear Cart
    public function clearCart()
    {
        Cart::where('user_id', Auth::user()->id)->delete();
    }

    // delete item from cart
    public function deleteItem(Request $request)
    {
        // logger($request->all());
        Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $request->productId)
            ->where('id', $request->orderId)
            ->delete();
    }

    // private function
    private function getOrderData($request)
    {
        return [
            'qty' => $request->count,
            'user_id' => $request->userid,
            'product_id' => $request->productid,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }



}



