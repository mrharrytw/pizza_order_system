<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // direct view category list page
    public function list()
    {
        $categories = Category::orderBy('category_id', 'desc')->get();
        return view('admin.category.list', compact('categories'));
    }

    // direct view category create page
    public function createPage()
    {
        return view('admin.category.create');
    }

    // create category
    public function create(Request $request)
    {
        // dd($request->all());
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route('category#list');
    }

    // category validation check
    private function categoryValidationCheck($request)
    {
        Validator::make(
            $request->all(),
            [
                'categoryName' => 'required|unique:categories,name'
            ],
            [
                // Custom Validation Message
                'categoryName.required' => 'Category name is required.',
                'categoryName.unique' => 'This category name is already exist.'
            ]
        )->validate();
    }

    // request category data to Array
    private function requestCategoryData($request)
    {
        return [
            'name' => $request->categoryName
        ];
    }

}
