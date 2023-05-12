<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImagesController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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
    $electronics = Product::where('category', 2)->paginate(4);
    $clothing = Product::where('category', 1)->paginate(4);
    return view('index',[
        'products' => Product::paginate(15),
        'electronics' => $electronics,
        'clothing' => $clothing,
        'categories' => Category::paginate(8)
    ]);
});



Route::prefix('/product')->group(function () {
    Route::get('create', [ProductController::class, 'create'])->name('product.create');
    Route::post('store', [ProductController::class, 'store'])->name('product.store');
    Route::get('list', [ProductController::class, 'list'])->name('porduct.list');
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
    return view('dashboard',[
        'contacts' => Contact::query()->count(),
        'admins' => User::query()->count(),
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
});



Route::prefix('/category')->group(function(){
    Route::get('list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('{category}', [CategoryController::class, 'category'])->name('category');
    Route::get('list/admin', [CategoryController::class, 'list'])->name('category.list.admin')->middleware('auth');
    Route::get('create', [CategoryController::class, 'create'])->name('category.create')->middleware('auth');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');
    Route::get('update/{category}', [CategoryController::class, 'update'])->name('category.update')->middleware('auth');
    Route::get('update/store{category}', [CategoryController::class, 'updateStore'])->name('category.update.store')->middleware('auth');
    Route::get('delete/{category}', [CategoryController::class, 'delete'])->name('category.delete')->middleware('auth');
});

