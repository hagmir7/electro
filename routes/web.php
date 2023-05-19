<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {

    if (Auth::check()) {
        if (!auth()->user()->cart) {
            Cart::create([
                'user_id' => auth()->user()->id,
                'total' => 0
            ]);
            return redirect('/');
        }
        
    }


    return view('index', [
        'products' => Product::paginate(15),
        'categories' => Category::paginate(10)
    ]);
});


Route::get('/thanks', function () {
    return view('thanks');
})->name('thanks');

Route::get('/about', function () {
    return view('about');
})->name('about');



Route::prefix('/product')->group(function () {
    Route::get('create', [ProductController::class, 'create'])->name('product.create');
    Route::post('store', [ProductController::class, 'store'])->name('product.store');
    Route::get('list', [ProductController::class, 'list'])->name('product.list');
    Route::get('list/admin', [ProductController::class, 'listAdmin'])->name('product.list.admin');
    Route::get('update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('{product}', [ProductController::class, 'product'])->name('product');
    Route::put('update/store/{product}', [ProductController::class, 'updateStore'])->name('product.update.store');
    Route::get('delete/{product}', [ProductController::class, 'delete'])->name('product.delete')->middleware('auth');

});


Route::prefix('/image')->group(function(){
    Route::get('delete/{image}', [ProductImagesController::class, 'delete'])->name('image.delete');
    Route::get('list', [ProductImagesController::class, 'list'])->name('image.list');
});

Route::get('/dashboard', function(){


    $today = Order::whereDate('created_at', Carbon::today())->count();
    $yesterday = Order::whereDate('created_at', Carbon::yesterday())->count();
    $lastSevenDays = Order::where('created_at', '>=', Carbon::now()->subDays(7))->count();
    $thisMonth = Order::whereYear('created_at', Carbon::now()->year)
                      ->whereMonth('created_at', Carbon::now()->month)
                      ->count();


    return view('dashboard',[
        'contacts' => Contact::all(),
        'users' => User::all(),
        'orders' => Order::all(),
        'products' => Product::all(),
        'categories' => Category::all(),
        'brands' => Brand::all(),
        'today' => $today,
        'yesterday' => $yesterday,
        'last7Days' => $lastSevenDays,
        'thisMonth' => $thisMonth,
    ]);
})->name('dashboard')->middleware('auth');





Route::prefix('/contact')->group(function(){
    Route::get('', [ContactController::class, 'create'])->name('contact.create');
    Route::get('list', [ContactController::class, 'list'])->name('contact.list')->middleware('auth');

    Route::post('store', [ContactController::class, 'store'])->name('contact.store')->middleware('auth');
    Route::get('show/{contact}', [ContactController::class, 'show'])->name('contact.show');
});



Route::prefix('/user')->group(function(){
    Route::get('list', [UserController::class, 'list'])->name('user.list')->middleware('auth');
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('store', [UserController::class, 'store'])->name('store_user');
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login-store', [UserController::class, 'loginStore'])->name('login.store');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('delete/{user}', [UserController::class, 'delete'])->name('user.delete')->middleware('auth');
    Route::get('{user}', [UserController::class, 'show'])->name('user.show')->middleware('auth');
    Route::get('update/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
    Route::put('update/store/{user}', [UserController::class, 'updateStore'])->name('user.update.store')->middleware('auth');
});



Route::prefix('/category')->group(function(){
    Route::get('create', [CategoryController::class, 'create'])->name('category.create')->middleware('auth');
    Route::get('list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('{category}', [CategoryController::class, 'category'])->name('category');
    Route::get('list/admin', [CategoryController::class, 'listAdmin'])->name('category.list.admin')->middleware('auth');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');
    Route::get('update/{category}', [CategoryController::class, 'update'])->name('category.update')->middleware('auth');
    Route::put('update/store{category}', [CategoryController::class, 'updateStore'])->name('category.update.store')->middleware('auth');
    Route::get('delete/{category}', [CategoryController::class, 'delete'])->name('category.delete')->middleware('auth');
});


Route::prefix('/cart')->group(function(){
    Route::get('', [CartController::class, 'list'])->name('cart.list')->middleware('auth');
    Route::post('create', [CartDetailController::class, 'create'])->name('cart.create')->middleware('auth');
    Route::get('delete/{cartDetail}', [CartController::class, 'delete'])->name('cart.delete')->middleware('auth');
});



Route::prefix('/order')->group(function(){
    Route::get('create', [OrderController::class, 'create'])->name('order.create');
    Route::get('store', [OrderController::class, 'store'])->name('order.store');
    Route::get('list', [OrderController::class, 'list'])->name('order.list')->middleware('auth');
    Route::get('valid/{order}', [OrderController::class, 'valid'])->name('order.valid')->middleware('auth');
    Route::get('cancel/{order}', [OrderController::class, 'cancel'])->name('order.cancel')->middleware('auth');
    Route::get('{order}', [OrderController::class, 'show'])->name('order.show');
    Route::get('delete/{order}', [OrderController::class, 'delete'])->name('order.delete');
    Route::post('add/{order}/{product}', [OrderController::class, 'orderItem'])->name('order.add');
});



Route::prefix('/brand')->group(function(){
    Route::get('create', [BrandController::class, 'create'])->name('brand.create')->middleware('auth');
    Route::get('list', [BrandController::class, 'list'])->name('brand.list');
    Route::get('{brand}', [BrandController::class, 'brand'])->name('brand');
    Route::get('list/admin', [BrandController::class, 'listAdmin'])->name('brand.list.admin')->middleware('auth');
    Route::post('store', [BrandController::class, 'store'])->name('brand.store')->middleware('auth');
    Route::get('update/{brand}', [BrandController::class, 'update'])->name('brand.update')->middleware('auth');
    Route::put('update/store{brand}', [BrandController::class, 'updateStore'])->name('brand.update.store')->middleware('auth');
    Route::get('delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete')->middleware('auth');
});
