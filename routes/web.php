<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;


// Log In and Register
Route::redirect('/', 'loginPage');
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // admin
    // Route::group(['middleware' => 'admin_auth', 'prefix' => 'category', 'namespace' => 'admin'], function () { });

    Route::middleware(['admin_auth'])->group(function () {

        // admin -> category
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'list'])->name('category#list');
            Route::get('create/page', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::post('update', [CategoryController::class, 'update'])->name('category#update');
        });

        Route::prefix('admin')->group(function () {
            Route::get('password/changePage', [AuthController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
            Route::post('change/password', [AuthController::class, 'changePassword'])->name('admin#changePassword');
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




