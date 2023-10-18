<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
        'products' => ProductController::class,
        'categories' => CategoryController::class,
        'tags' => TagController::class,
        'orders' => OrderController::class
    ]);

    Route::get('products/{product}/sizes', [ProductController::class, 'indexsizes'])->name('products.sizes.index');
    Route::post('products/{product}/sizes/store', [ProductController::class, 'storesizes'])->name('products.sizes.store');
    Route::get('categories/{category}/sizes', [CategoryController::class, 'categorysizes'])->name('categories.sizes.index');
    Route::post('categories/{category}/sizes/store', [CategoryController::class, 'storesize'])->name('categories.sizes.store');
    Route::delete('categories/{category}/sizes/{size}destroy', [CategoryController::class, 'deletesize'])->name('categories.sizes.delete');
});
