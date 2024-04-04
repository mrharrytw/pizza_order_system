<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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



