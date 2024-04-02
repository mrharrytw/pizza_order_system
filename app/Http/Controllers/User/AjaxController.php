<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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
        return response()->json($ajaxData);

    }
}



