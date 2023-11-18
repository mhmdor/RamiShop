<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showlogin');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/storage', [StorageController::class, 'index'])->name('storage');

Route::get('/addProduct', [StorageController::class, 'add'])->name('showAddProduct');

Route::post('/addProduct', [StorageController::class, 'store'])->name('addProduct');

Route::post('/editProduct', [StorageController::class, 'edit'])->name('showEditProduct');

Route::post('/updateProduct', [StorageController::class, 'update'])->name('editProduct');

Route::post('/deleteProduct', [StorageController::class, 'delete'])->name('deleteProduct');

Route::get('/indexItem', [CartController::class, 'index'])->name('indexItem');

Route::post('/store', [CartController::class, 'store'])->name('storeItem');

Route::get('/cart', [CartController::class, 'indexCart'])->name('cart');

Route::post('/deleteItem', [CartController::class, 'deleteItem'])->name('deleteItem');

Route::post('/editCount', [CartController::class, 'editCount'])->name('editCount');

Route::post('/deleteCart', [CartController::class, 'deleteCart'])->name('deleteCart');

Route::post('/confirmCart', [CartController::class, 'confirmCart'])->name('confirmCart');
// Route::get('/storage', function () {
//     return view('storage');
// });