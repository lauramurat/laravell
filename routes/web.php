<?php

use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\CosmeticController;
use App\Http\Controllers\Emp\UserController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Emp\RoleController;
use App\Http\Controllers\Emp\OpinionController as EmpOpinionController;
use App\Http\Controllers\Emp\CategoryController;
use App\Http\Controllers\LangController;



Route::get('/', function(){
    return redirect()->route('cosmetics.index');
});

Route::get('lang/{lang}', [LangController::class, 'switchLang'])->name('switch.lang');

Route::middleware('auth')->group(function (){
    Route::resource('/cosmetics', CosmeticController::class)->except('index', 'show');
    Route::resource('/opinions',OpinionController::class)->only('store', 'destroy', 'update', 'edit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
////    Route::get('/cosmetics', [CosmeticController::class, 'Cartindex'])->name('carts.Cartindex');

    Route::post('/cosmetics{cosmetic}rate', [CosmeticController::class, 'rate'])->name('cosmetics.rate');
    Route::post('/cosmetics{cosmetic}unrate', [CosmeticController::class, 'unrate'])->name('cosmetics.unrate');

    Route::post('/cart{cosmetic}/putToCart', [CartController::class, 'putToCart'])->name('cart.putToCart');
    Route::post('/cart/{cosmetic}/deleteFromCart', [CartController::class, 'deleteFromCart'])->name('cart.deletefromcart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'buy'])->name('cart.buy');
    Route::get('/cart/view', [CartController::class, 'view'])->name('cart.view');

    Route::get('/balance{user}', [RegisterController::class, 'balance'])->name('users.balance');
    Route::put('/balance/{user}/update', [RegisterController::class, 'addBalance'])->name('balance.update');

    Route::get('/order', [UserController::class, 'order'])->name('user.order');

//    Route::get('/carts', [CosmeticController::class, 'indexCart'])->name('carts.indexCart');
//    Route::post('/cosmetics{cosmetic}addCart', [CosmeticController::class, 'addCart'])->name('carts.addCart');
//    Route::post('/cosmetics/{cosmetic}/deleteCart', [CosmeticController::class, 'deleteCart'])->name('carts.deleteCart');




    Route::prefix('emp')->as('emp.')->middleware('hasrole:admin,moderator')->group(function (){
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
        Route::put('/users{user}/ban', [UserController::class, 'ban'])->name('users.ban');
        Route::put('/users{user}/unban', [UserController::class, 'unban'])->name('users.unban');
        Route::get('/cart', [UserController::class, 'cart'])->name('cart.index');
        Route::put('/cart/{cart}/confirm', [UserController::class, 'confirm'])->name('cart.confirm');

        Route::get('/cosmetics', [CosmeticController::class, 'view'])->name('cosmetics.view');

        Route::get('/roles/create', [RoleController::class,  'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

        Route::get('/opinions', [EmpOpinionController::class, 'index'])->name('opinions.index');
        Route::delete('/opinions/{opinion}', [EmpOpinionController::class, 'destroy'])->name('opinions.destroy');
        Route::get('/opinions/search', [EmpOpinionController::class, 'index'])->name('opinions.search');

        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::delete('/categories{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

});

Route::resource('cosmetics', CosmeticController::class)->only('index', 'show');
Route::get('/cosmetics/bycat/{category}',[CosmeticController::class, 'cosmeticsByCat'])->name('cosmetics.category');
//Route::resource('opinions', OpinionController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
