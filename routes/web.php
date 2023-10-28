<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\SearchController;
use App\Models\Favorite;
use App\Models\Purchase;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// AdminLoginController
Route::get('/admin/login', [AdminLoginController::class, 'adminlogin'])->name('adminlogin');

Route::get('/admin/register', [AdminLoginController::class, 'adminregister'])->name('adminregister');

Route::post('/admin/register', [AdminLoginController::class, 'adminregisterSubmit'])->name('adminregisterSubmit');

Route::get('/admin/dashboard', [AdminLoginController::class, 'admindash'])->name('admindash')->middleware('auth');

Route::post('/adminuserlist/{user}', [AdminLoginController::class, 'adminuserlist'])
    ->name('adminuserlist')->middleware('auth');

Route::get('/destroy/{item}', [AdminLoginController::class, 'admindestroy'])
    ->name('admindestroy')->where('item', '\d+')->middleware('auth');

Route::delete('/destroy/{item}', [AdminLoginController::class, 'admindestroy'])
    ->name('admindestroy')->where('item', '\d+')->middleware('auth');
// AdminLoginController


// SearchController
Route::post('/dashboard', [SearchController::class, 'searchItem'])->name('search')->middleware('auth');
// SearchController


// ここで表示させるだけの場合はここで書いてよいコントローラーいらない
// NavigationController
Route::get('/posts/dasha', [NavigationController::class, 'dasha'])
    ->name('dasha')->where('item', '\d+')->middleware('auth');

Route::get('/posts/dashb', [NavigationController::class, 'dashb'])
    ->name('dashb')->where('item', '\d+')->middleware('auth');

Route::get('/posts/dashc', [NavigationController::class, 'dashc'])
    ->name('dashc')->where('item', '\d+')->middleware('auth');

Route::get('/posts/dashd', [NavigationController::class, 'dashd'])
    ->name('dashd')->where('item', '\d+')->middleware('auth');

// NavigationController


// PostController
Route::get('/dashboard', [PostController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/posts/{item}', [PostController::class, 'show'])
    ->name('show')->where('item', '\d+')->middleware('auth');

Route::get('/posts/create', [PostController::class, 'create'])
    ->name('create')->middleware('auth');

Route::post('/posts/store', [PostController::class, 'store'])
    ->name('store')->middleware('auth');

Route::get('/posts/create/list', [PostController::class, 'createlist'])
    ->name('createlist')->middleware('auth');

Route::get('/posts/{item}/edit', [PostController::class, 'edit'])
    ->name('edit')->where('item', '\d+')->middleware('auth');

Route::patch('/posts/{item}/update', [PostController::class, 'update'])
    ->name('update')->where('item', '\d+')->middleware('auth');

Route::delete('/posts/{item}/destroy', [PostController::class, 'destroy'])
    ->name('destroy')->where('item', '\d+')->middleware('auth');
// PostController




// PurchaseController
Route::get('/posts/{item}/buy', [PurchaseController::class, 'buy'])
    ->name('buy')->where('item', '\d+')->middleware('auth');

Route::post('/posts/{item}/buy/complete', [PurchaseController::class, 'complete'])
    ->name('complete')->where('item', '\d+')->middleware('auth');

Route::get('/posts/purchase', [PurchaseController::class, 'purchase'])
    ->name('purchase')->middleware('auth');
// PurchaseController


// FavoriteController
Route::get('/posts/favorite', [FavoriteController::class, 'favorite'])
    ->name('favorite')->middleware('auth');

Route::post('/add-to-favorites/{item}', [FavoriteController::class, 'addToFavorites'])
    ->name('addToFavorites')->middleware('auth');

Route::post('/remove-from-favorites/{item}', [FavoriteController::class, 'removeFromFavorites'])
    ->name('removeFromFavorites')->middleware('auth');
// FavoriteController




require __DIR__ . '/auth.php';
