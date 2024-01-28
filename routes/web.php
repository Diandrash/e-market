<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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
    // Alert::success('Success', 'Halo');
    return view('welcome', [
        'title' => 'Home Page'
    ]);
});

Route::get('/home', function () {
    // Alert::success('Success', 'Halo');
    return view('welcome', [
        'title' => 'Home Page'
    ]);
});

Route::get('/myproducts/create', function() {
    return view('products.create', [
        'title' => 'Create New Product'
    ]);
});

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'auth']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);

// Route::resource('/products', ProductController::class);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::post('/products/search', [ProductController::class, 'search']);
Route::post('/products/category', [ProductController::class, 'category']);
Route::get('/product', [ProductController::class, 'show']);

Route::get('/myproducts', [ProductController::class, 'myProducts']);
Route::get('/myproducts/{product}', [ProductController::class, 'showMyProduct']);
Route::post('/myproducts/store', [ProductController::class, 'store']);
Route::get('/myproducts/{product}/edit', [ProductController::class, 'edit']);
Route::put('/myproducts/{product}/edit', [ProductController::class, 'update']);
Route::delete('/myproducts/{product}/delete', [ProductController::class, 'destroy']);

Route::post('/products/{product}/checkout', [OrderController::class, 'checkout']);
Route::post('/products/{product}/checkout/confirm', [OrderController::class, 'store']);
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/ordersfromcustomer', [OrderController::class, 'indexOrders']);
Route::put('/ordersfromcustomer', [OrderController::class, 'update']);