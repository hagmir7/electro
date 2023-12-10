<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImagesController;
use App\Http\Controllers\UserController;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Example web.php
Route::group(['middleware' => ['web']], function () {
    Route::get('/', [ProductController::class, 'index'])->name('home');



    Route::get('/chart', [ChartController::class, 'viewsChart'])->name('product.chart');


    Route::get('/thanks', function () {
        return view('thanks');
    })->name('thanks');

    Route::get('/about', function () {
        return view('about');
    })->name('about');



    Route::prefix('/product')->middleware(['admin'])->group(function () {
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::get('list', [ProductController::class, 'list'])->name('product.list');
        Route::get('list/admin', [ProductController::class, 'listAdmin'])->name('product.list.admin');
        Route::get('update/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::put('update/store/{product}', [ProductController::class, 'updateStore'])->name('product.update.store');
        Route::get('delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
        Route::post('delete', [ProductController::class, 'deleteMultiple'])->name('product.delete.multiple');
    });

    Route::get('/product/{product}', [ProductController::class, 'product'])->name('product');


    Route::prefix('/image')->middleware('admin')->group(function(){
        Route::get('delete/{image}', [ProductImagesController::class, 'delete'])->name('image.delete');
        Route::get('list', [ProductImagesController::class, 'list'])->name('image.list');
    });





    Route::get('/dashboard', function(){
        !auth()->user()->role && abort(404);
        return view('dashboard',[
            'contacts' => Contact::all(),
            'users' => User::all()->count(),
            'orders' => Order::all(),
            'new_orders' => Order::where('status', null)->get(),
            'products' => Product::all(),
            'categories' => Category::all(),
            'users' => User::query()->count(),
        ]);


    })->name('dashboard')->middleware('admin');

    Route::get('/switch-locale/{locale}', [LocalController::class, 'switchLocale'])->name('switch_locale');


    Route::prefix('/contact')->group(function(){
        Route::get('', [ContactController::class, 'create'])->name('contact.create');
        Route::get('list', [ContactController::class, 'list'])->name('contact.list')->middleware('admin');
        Route::post('store', [ContactController::class, 'store'])->name('contact.store');
        Route::get('show/{contact}', [ContactController::class, 'show'])->name('contact.show')->middleware('admin');
    });



    Route::prefix('/user')->group(function(){
        Route::get('register', [UserController::class, 'create'])->name('register');
        Route::post('store', [UserController::class, 'store'])->name('store_user');
        Route::get('login', [UserController::class, 'login'])->name('login');
        Route::post('login-store', [UserController::class, 'loginStore'])->name('login.store');
        Route::get('logout', [UserController::class, 'logout'])->name('logout');


        Route::get('list', [UserController::class, 'list'])->name('user.list')->middleware('admin');
        Route::get('delete/{user}', [UserController::class, 'delete'])->name('user.delete')->middleware('admin');

        Route::get('{user}', [UserController::class, 'show'])->name('user.show')->middleware('auth');
        Route::get('update/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
        Route::put('update/store/{user}', [UserController::class, 'updateStore'])->name('user.update.store')->middleware('auth');

    });



    Route::prefix('/category')->group(function(){
        Route::get('create', [CategoryController::class, 'create'])->name('category.create')->middleware('admin');
        Route::get('list', [CategoryController::class, 'list'])->name('category.list');
        Route::get('{category}', [CategoryController::class, 'category'])->name('category');
        Route::get('list/admin', [CategoryController::class, 'listAdmin'])->name('category.list.admin')->middleware('admin');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store')->middleware('admin');
        Route::get('update/{category}', [CategoryController::class, 'update'])->name('category.update')->middleware('admin');
        Route::put('update/store{category}', [CategoryController::class, 'updateStore'])->name('category.update.store')->middleware('admin');
        Route::get('delete/{category}', [CategoryController::class, 'delete'])->name('category.delete')->middleware('admin');
        Route::post('delete', [CategoryController::class, 'deleteMultiple'])->name('category.delete.multiple')->middleware('admin');
    });


    Route::prefix('/cart')->group(function(){
        Route::get('', [CartController::class, 'list'])->name('cart.list')->middleware('auth');
        Route::post('create', [CartDetailController::class, 'create'])->name('cart.create')->middleware('auth');
        Route::get('delete/{cartDetail}', [CartController::class, 'delete'])->name('cart.delete')->middleware('auth');
    });


    // Command
    Route::prefix('/order')->group(function(){
        Route::get('create', [OrderController::class, 'create'])->name('order.create')->middleware('auth');
        Route::get('store', [OrderController::class, 'store'])->name('order.store')->middleware('auth');
        Route::get('product/{product}', [OrderController::class, 'productOrder'])->name('product.order');
        Route::post('product/store/{product}', [OrderController::class, 'productOrderStore'])->name('product.order.store');

        Route::get('list', [OrderController::class, 'list'])->name('order.list')->middleware('admin');
        Route::get('valid/{order}', [OrderController::class, 'valid'])->name('order.valid')->middleware('admin');
        Route::get('cancel/{order}', [OrderController::class, 'cancel'])->name('order.cancel')->middleware('admin');
        Route::get('{order}', [OrderController::class, 'show'])->name('order.show')->middleware('admin');
        Route::get('delete/{order}', [OrderController::class, 'delete'])->name('order.delete')->middleware('admin');
        Route::post('add/{order}/{product}', [OrderController::class, 'orderItem'])->name('order.add')->middleware('admin');
    });


    // Marque
    Route::prefix('/brand')->group(function(){
        Route::get('create', [BrandController::class, 'create'])->name('brand.create')->middleware('admin');
        Route::get('list', [BrandController::class, 'list'])->name('brand.list');
        Route::get('{brand}', [BrandController::class, 'brand'])->name('brand');
        Route::get('list/admin', [BrandController::class, 'listAdmin'])->name('brand.list.admin')->middleware('admin');
        Route::post('store', [BrandController::class, 'store'])->name('brand.store')->middleware('admin');
        Route::get('update/{brand}', [BrandController::class, 'update'])->name('brand.update')->middleware('admin');
        Route::put('update/store{brand}', [BrandController::class, 'updateStore'])->name('brand.update.store')->middleware('admin');
        Route::get('delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete')->middleware('admin');
    });



});
