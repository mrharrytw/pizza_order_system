<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;


// Log In and Register
Route::middleware(['admin_auth'])->group(function () {
    Route::redirect('/', 'loginPage');
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
});


Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // admin
    // Route::group(['middleware' => 'admin_auth', 'prefix' => 'category', 'namespace' => 'admin'], function () { });

    Route::middleware(['admin_auth'])->group(function () {

        // admin -> account
        Route::prefix('admin')->group(function () {
            // Password
            Route::get('password/changePage', [AdminController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
            Route::post('change/password', [AdminController::class, 'changePassword'])->name('admin#changePassword');

            // account info
            Route::get('details', [AdminController::class, 'details'])->name('admin#details');
            Route::get('edit', [AdminController::class, 'edit'])->name('admin#edit');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('admin#update');
        });

        // admin -> category
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'list'])->name('category#list');
            Route::get('create/page', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::post('update', [CategoryController::class, 'update'])->name('category#update');
        });

        // admin -> products_list
        Route::prefix('products')->group(function () {
            Route::get('productslist', [ProductController::class, 'productslist'])->name('products#productslist');
            Route::get('create_page', [ProductController::class, 'createpage'])->name('products#createProductsPage');
            Route::post('create_product', [ProductController::class, 'createproducts'])->name('products#createProduct');
            Route::get('delete/{id}', [ProductController::class, 'productDelete'])->name('products#delete');
            Route::get('detail,{id}', [ProductController::class, 'productDetail'])->name('product#detail');
            Route::get('editProduct,{id}', [ProductController::class, 'editProduct'])->name('products#editProduct');
            Route::post('updateProduct', [ProductController::class, 'updateProduct'])->name('product#update');

        });
    });


    // User
    // User -> Home
    Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function () {
        Route::get('home', function () {
            return view('user.home');
        })->name('user#home');
    });

});




