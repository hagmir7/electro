<?php

use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContratEController;
use App\Http\Controllers\ContratOController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Agence;
use App\Models\Client;
use App\Models\Contact;
use App\Models\ContratE;
use App\Models\ContratO;
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
    return view('index');
});

Route::get('/payment', function () {
    return view('payment');
});


Route::prefix('/product')->group(function () {
    Route::get('create', [ProductController::class, 'create'])->name('product.create');
    Route::post('store', [ProductController::class, 'store'])->name('product.store');
});


Route::get('/dashboard', function(){
    return view('dashboard',[
        'clients' => Client::query()->count(),
        'contacts' => Contact::query()->count(),
        'agences' => Agence::query()->count(),
        'electresitiare' => ContratE::query()->count(),
        'eau' => ContratO::query()->count(),
        'admins' => User::query()->count(),
    ]);


})->name('dashboard')->middleware('auth');


Route::prefix('/agence')->group(function(){
    Route::get('', [AgenceController::class, 'list'])->name('agence.list');
    Route::get('list', [AgenceController::class, 'adminList'])->name('agence.list.admin')->middleware('auth');
    Route::get('create', [AgenceController::class, 'create'])->name('agence.create')->middleware('auth');
    Route::post('store', [AgenceController::class, 'store'])->name('agence.store')->middleware('auth');
    Route::get('show/{agence}', [AgenceController::class, 'show'])->name('agence.show');
    Route::get('delete/{agence}', [AgenceController::class, 'delete'])->name('agence.delete')->middleware('auth');
});



Route::prefix('/contact')->group(function(){
    Route::get('', [ContactController::class, 'create'])->name('contact.create');
    Route::get('list', [ContactController::class, 'list'])->name('contact.list')->middleware('auth');

    Route::post('store', [ContactController::class, 'store'])->name('contact.store')->middleware('auth');
    Route::get('show/{contact}', [ContactController::class, 'show'])->name('contact.show');
});


Route::prefix('/client')->group(function(){
    Route::get('create', [ClientController::class, 'create'])->name('client.create');
    Route::get('', [ClientController::class, 'list'])->name('client.list');
    Route::get('delete/{client}', [ClientController::class, 'delete'])->name('client.delete');
    Route::post('store', [ClientController::class, 'store'])->name('client.store');
    Route::get('show/{client}', [ClientController::class, 'show'])->name('client.show');
})->middleware('auth');

Route::prefix('/user')->group(function(){
    Route::get('list', [UserController::class, 'list'])->name('user.list')->middleware('auth');
    Route::get('register', [UserController::class, 'create'])->name('register')->middleware('auth');
    Route::post('store', [UserController::class, 'store'])->name('store_user')->middleware('auth');
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login-store', [UserController::class, 'loginStore'])->name('login.store');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('delete/{user}', [UserController::class, 'delete'])->name('user.delete')->middleware('auth');
});


Route::prefix('/contrat/o')->group(function(){
    Route::get('create', [ContratOController::class, 'create'])->name('contrat.o.create');
    Route::get('list', [ContratOController::class, 'list'])->name('contrat.o.list');
    Route::get('delete/{contrat_o}', [ContratOController::class, 'delete'])->name('contrat.o.delete');
    Route::post('store', [ContratOController::class, 'store'])->name('contrat.o.store');
    Route::get('show/{contrat_o}', [ContratOController::class, 'show'])->name('client.show');
})->middleware('auth');


Route::prefix('/contrat/e')->group(function(){
    Route::get('create', [ContratEController::class, 'create'])->name('contrat.e.create');
    Route::get('list', [ContratEController::class, 'list'])->name('contrat.e.list');
    Route::get('delete/{contrat_e}', [ContratEController::class, 'delete'])->name('contrat.e.delete');
    Route::post('store', [ContratEController::class, 'store'])->name('contrat.e.store');
    Route::get('show/{contrat_e}', [ContratEController::class, 'show'])->name('client.show');
})->middleware('auth');



