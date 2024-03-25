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
        $categories = Category::when(request('searchkey'), function ($queryforsearch) {
            $queryforsearch->where('name', 'like', '%' . request('searchkey') . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(5);
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

    //edit category
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    // update category
    public function update(Request $request)
    {
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        Category::where('id', $request->categoryId)->update($data);
        return redirect()->route('category#list')->with(['updateCategory' => 'You have edited a category!']);
    }

    // delete category
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return back()->with(['deleteCategory' => 'You have deleted a category!']);
    }

    // category validation check
    private function categoryValidationCheck($request)
    {
        Validator::make(
            $request->all(),
            [
                'categoryName' => 'required|unique:categories,name,' . $request->categoryId
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
