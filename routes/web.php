<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\SaleReturnController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showlogin');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');
    
    
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/storage', [StorageController::class, 'index'])->name('storage');

    Route::get('/getAddUser', [UserController::class, 'getStore'])->name('getAddUser');

    Route::post('/addUser', [UserController::class, 'store'])->name('addUser');

    Route::get('/getUser', [UserController::class, 'index'])->name('getUser');
    
    Route::get('/addProduct', [StorageController::class, 'add'])->name('showAddProduct');
    
    Route::post('/addProduct', [BuyController::class, 'store'])->name('addProduct');
    
    Route::get('/getBuy', [BuyController::class, 'index'])->name('getBuy');

    Route::post('/editProduct', [StorageController::class, 'edit'])->name('showEditProduct');
    
    Route::post('/updateProduct', [StorageController::class, 'update'])->name('editProduct');
    
    Route::post('/deleteProduct', [StorageController::class, 'delete'])->name('deleteProduct');
    
    Route::get('/indexItem', [CartController::class, 'index'])->name('indexItem');
    
    Route::post('/store', [CartController::class, 'store'])->name('storeItem');
    
    Route::get('/cart', [CartController::class, 'indexCart'])->name('cart');

    Route::get('/getCarts', [CartController::class, 'getCart'])->name('getCarts');
    
    Route::post('/deleteItem', [CartController::class, 'deleteItem'])->name('deleteItem');
    
    Route::post('/editCount', [CartController::class, 'editCount'])->name('editCount');
    
    Route::post('/deleteCart', [CartController::class, 'deleteCart'])->name('deleteCart');
    
    Route::post('/confirmCart', [CartController::class, 'confirmCart'])->name('confirmCart');

    Route::post('/confirmCart1', [CartController::class, 'confirmCart1'])->name('confirmCart1');

    
    Route::get('/indexStorage', [SaleReturnController::class, 'indexStorage'])->name('indexStorage');
    
    Route::get('/indexNotRemove', [SaleReturnController::class, 'index'])->name('indexNotRemove');
    
    Route::get('/indexRemove', [SaleReturnController::class, 'indexRemove'])->name('indexRemove');
    
    Route::post('/storeReturned', [SaleReturnController::class, 'store'])->name('storeReturned');
    
    Route::get('/box', [BoxController::class, 'index'])->name('box');
    
    Route::post('/updateBox', [BoxController::class, 'updateBox'])->name('updateBox');
    
    Route::get('/distributor', [DistributorController::class, 'index'])->name('distributor');
    
    Route::get('/getAddDistributor', [DistributorController::class, 'getStore'])->name('getAddDistributor');
    
    Route::post('/addDistributor', [DistributorController::class, 'Store'])->name('addDistributor');
    
    Route::get('/editDistributor/{id}', [DistributorController::class, 'edit'])->name('editDistributor');
    
    Route::post('/updateDistributor', [DistributorController::class, 'update'])->name('updateDistributor');
    
    Route::get('/Client', [ClientController::class, 'index'])->name('Client');
    
    Route::get('/getAddClient', [ClientController::class, 'getStore'])->name('getAddClient');
    
    Route::post('/addClient', [ClientController::class, 'Store'])->name('addClient');
    
    Route::get('/editClient/{id}', [ClientController::class, 'edit'])->name('editClient');
    
    Route::post('/updateClient', [ClientController::class, 'update'])->name('updateClient');
    
    Route::get('/debtClient', [DebtController::class, 'getClientDebt'])->name('debtClient');
    
    Route::get('/getAddDebtClient', [DebtController::class, 'getAddClientDebt'])->name('getAddDebtClient');
    
    Route::post('/addDebtClient', [DebtController::class, 'addClientDebt'])->name('addDebtClient');
    
    Route::post('/updateDebtClient', [DebtController::class, 'updateClientDebt'])->name('updateDebtClient');

    Route::get('/debtDistributor', [DebtController::class, 'getDistributorDebt'])->name('debtDistributor');
    
    Route::get('/getAddDebtDistributor', [DebtController::class, 'getAddDistributorDebt'])->name('getAddDebtDistributor');
    
    Route::post('/addDebtDistributor', [DebtController::class, 'addDistributorDebt'])->name('addDebtDistributor');
    
    Route::post('/updateDebtDistributor', [DebtController::class, 'updateDistributorDebt'])->name('updateDebtDistributor');

    Route::get('/statics', [StatsController::class, 'index'])->name('statics');
});



// Route::get('/storage', function () {
//     return view('storage');
// });