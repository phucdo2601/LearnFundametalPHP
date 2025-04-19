<?php

use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\WishListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestExportCustomExcelController;
use App\Http\Controllers\TestExportPdfController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
    Route::get('/account-orders', [UserController::class, 'orders'])->name('user.orders');
    Route::get('/account-order/{orderId}/details', [UserController::class, 'order_details'])->name('user.order.details');
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

    // coupons
    Route::get('/admin/coupons', [AdminCouponController::class, "coupons"])->name('admin.coupons');
    Route::get('/admin/coupons/add', [AdminCouponController::class, "coupon_add"])->name('admin.coupon.add');
    Route::post('/admin/coupons/store', [AdminCouponController::class, "coupon_store"])->name('admin.coupon.store');
    Route::get('/admin/coupon/{id}/edit', [AdminCouponController::class, 'coupon_edit'])->name('admin.coupon.edit');
    Route::put('/admin/coupon/update', [AdminCouponController::class, 'coupon_update'])->name('admin.coupon.update');
    Route::delete('/admin/coupon/{id}/delete', [AdminCouponController::class, 'coupon_delete'])->name('admin.coupon.delete');

    // orders
    Route::get('/admin/orders', [AdminOrderController::class, 'orders'])->name('admin.orders');
    Route::get('/admin/order/{orderId}/details', [AdminOrderController::class, 'order_details'])->name('admin.order.details');
    Route::put('/admin/order/update-status', [AdminOrderController::class, 'update_order_status'])->name('admin.order.status.update');

    // Slides
    Route::get('/admin/slides', [AdminSlideController::class, 'slides'])->name('admin.slides');
    Route::get('/admin/slide/add', [AdminSlideController::class, 'slide_add'])->name('admin.slide.add');
});

// Shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
// Shop-details
Route::get('/shop/{product_slug}', [ShopController::class, 'product_details'])->name('shop.product.details');

// Shopping Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Shopping Cart: Add functionality
Route::post('/cart/add', [CartController::class, 'add_to_cart'])->name('cart.add');

// Shopping Cart: Increase cart quantity
Route::put('/cart/increase/{rowId}', [CartController::class, 'increase_cart_quantity'])->name('cart.qty.increase');

// Shopping Cart: Decrease cart quantity
Route::put('/cart/decrease/{rowId}', [CartController::class, 'decrease_cart_quantity'])->name('cart.qty.decrease');

// Shopping Cart: Remove cart functionality
Route::delete('/cart/remove/{rowId}', [CartController::class, 'remove_item'])->name('cart.item.remove');

// Shopping Cart: Destroy cart
Route::delete('/cart/clear', [CartController::class, 'empty_cart'])->name('cart.empty');

// wishlist
Route::post('/wishlist/add', [WishListController::class, 'add_to_wishlist'])->name('wishlist.add');

// wishlist: get list all wishlist
Route::get('/wishlist', [WishListController::class, 'index'])->name('wishlist.index');

// wishlist: reomve wishlist item
Route::delete("/wishlist/item/remove/{rowId}", [WishListController::class, 'remove_item'])->name('wishlist.item.remove');

// wishlist: remove all wishlists
Route::delete('/wishlist/clear', [WishListController::class, 'empty_wishlist'])->name('wishlist.items.clear');

// move product in wishlist to cart
Route::post('/wishlist/move_to_cart/{rowId}', [WishListController::class, 'move_to_cart'])->name('wishlist.move.to.cart');

// Add coupon
Route::post('/cart/apply-coupon', [CartController::class, 'apply_coupon_code'])->name('cart.coupon.apply');

// Remove coupon on cart
Route::delete('/cart/remove-coupon', [CartController::class, 'remove_coupon_code'])->name('cart.coupon.remove');

// checkout page
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::post('/place-an-order', [CartController::class, 'place_an_order'])->name('cart.place.an.order');

Route::get('/order-confirmation', [CartController::class, 'order_confirmation'])->name('cart.order.confirmation');

Route::put('/account-order/cancel-order', [UserController::class, 'order_cancel'])->name('user.order.cancel');

Route::get('/test-export-pdf', [TestExportPdfController::class, 'testExportPdf'])->name('testexportpdf');
Route::get('/test-export-excel', [TestExportCustomExcelController::class, 'downloadExcel01'])->name('downloadExcel');
