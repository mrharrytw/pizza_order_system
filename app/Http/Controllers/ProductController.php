<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //direct view productslist
    public function productslist()
    {
        $products = Product::select('products.*', 'categories.name as category_name')
            ->when(request('searchkey'), function ($queryforsearch) {
                $queryforsearch->where('products.name', 'like', '%' . request('searchkey') . '%');
            })
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->orderBy('products.id', 'desc')->paginate(5);
        return view('admin.products.productslist', compact('products'));
    }

    //direct view create products Page with category id and name
    public function createpage()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.products.createproductsPage', compact('categories'));
    }

    //create product
    public function createproducts(Request $request)
    {
        $this->productValidationCheck($request, 'create');

        $data = $this->requestProductInfo($request);

        $imageName = uniqid() . "_products_" . $request->file('productimage')->getClientOriginalName();
        $request->file('productimage')->storeAs('public', $imageName);
        $data['image'] = $imageName;

        Product::create($data);
        return redirect()->route('products#productslist');
    }
    // detail product
    public function productDetail($id)
    {
        $productDetail = Product::find($id);
        return view('admin.products.detailProduct', compact('productDetail'));
    }

    // edit product
    public function editProduct($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('admin.products.editAndUpdateProduct', compact('product', 'categories'));
    }

    // update product
    public function updateProduct(Request $request)
    {
        $this->productValidationCheck($request, 'update');
        $data = $this->requestProductInfo($request);

        if ($request->hasFile('productimage')) {
            $oldImageName = Product::where('id', $request->productId)->first();
            $oldImageName = $oldImageName->image;
            if ($oldImageName != null) {
                Storage::delete('public/' . $oldImageName);
            }

            $newImageName = uniqid() . "_products_" . $request->file('productimage')->getClientOriginalName();
            $request->file('productimage')->storeAs('public', $newImageName);
            $data['image'] = $newImageName;

        }
        Product::where('id', $request->productId)->update($data);
        return redirect()->route('products#productslist')->with(['updateProduct' => 'You have updated a product!']);
    }

    // delete product
    public function productDelete($id)
    {
        Product::find($id)->delete();
        return back()->with(['deleteProduct' => 'You have deleted a product!']);
    }

    private function productValidationCheck($request, $action)
    {
        $validationRules = [
            'productName' => 'required|unique:products,name,' . $request->productId,
            'category' => 'required',
            'productdescription' => 'required',
            'waitingTime' => 'required|numeric',
            'productPrice' => 'required|numeric',
        ];

        $validationRules['productimage'] = $action == 'create' ? 'required|mimes:png,jpg,jpeg,webp|file' : 'mimes:png,jpg,jpeg,webp|file';

        Validator::make($request->all(), $validationRules)->validate();
    }

    private function requestProductInfo($request)
    {
        return [
            'name' => $request->productName,
            'category_id' => $request->category,
            'description' => $request->productdescription,
            'waiting_time' => $request->waitingTime,
            'price' => $request->productPrice
        ];
    }
}
