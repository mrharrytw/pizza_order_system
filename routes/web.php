<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;


// Log In and Register
Route::redirect('/', 'loginPage');
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // admin
    // admin -> category
    Route::group(['prefix' => 'category', 'middleware' => 'admin_auth'], function () {

        //Get
        Route::get('list', [CategoryController::class, 'list'])->name('category#list');
        Route::get('create/page', [CategoryController::class, 'createPage'])->name('category#createPage');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');

        //Post
        Route::post('create', [CategoryController::class, 'create'])->name('category#create');
        Route::post('update', [CategoryController::class, 'update'])->name('category#update');

    });

    // User
    // User -> Home
    Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function () {
        Route::get('home', function () {
            return view('user.home');
        })->name('user#home');
    });

});




