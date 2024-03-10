<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/category/list');
    })->name('dashboard');

    Route::get('admin/category/list', [CategoryController::class, 'list'])->name('category#list');
});

// Log In and Register
Route::redirect('/', 'loginPage');
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');


// admin
// admin -> category
// Route::group(['prefix' => 'category'], function () {
//     Route::get('list', [CategoryController::class, 'list'])->name('category#list');

// });
