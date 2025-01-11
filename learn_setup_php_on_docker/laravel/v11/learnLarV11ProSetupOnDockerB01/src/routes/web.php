<?php

use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
});

Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/brands', [AdminBrandController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brand/add', [AdminBrandController::class, 'add_brand'])->name('admin.brand.add');
    Route::post('/admin/brand/store', [AdminBrandController::class, 'brand_store'])->name('admin.brand.store');
    Route::get('/admin/brand/edit/{id}', [AdminBrandController::class, 'brand_edit'])->name('admin.brand.edit');
    Route::put('/admin/brand/update', [AdminBrandController::class, 'brand_update'])->name('admin.brand.update');
    Route::delete('/admin/brand/{id}/delete', [AdminBrandController::class, 'brand_delete'])->name('admin.brand.delete');

    Route::get('/admin/categories', [AdminCategoryController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/category/add', [AdminCategoryController::class, 'add_category'])->name('admin.category.add');
    Route::post('/admin/category/store', [AdminCategoryController::class, 'category_store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'category_edit'])->name('admin.category.edit');
    Route::put('/admin/category/update', [AdminCategoryController::class, 'category_update'])->name('admin.category.update');
    Route::delete('/admin/category/{id}/delete', [AdminCategoryController::class, 'category_delete'])->name('admin.category.delete');

    Route::get('/admin/products', [AdminProductController::class, 'products'])->name('admin.products');
    Route::get('/admin/product/add', [AdminProductController::class, 'products_add'])->name('admin.product.add');
    Route::post('/admin/product/store', [AdminProductController::class, 'product_store'])->name('admin.product.store');
    Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'product_edit'])->name('admin.product.edit');
    Route::put('/admin/product/update', [AdminProductController::class, 'product_update'])->name('admin.product.update');
    Route::delete('/admin/product/{id}/delete', [AdminProductController::class, 'product_delete'])->name('admin.product.delete');
});

// Shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
