<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';

Route::redirect('/', 'products');

Route::resource('products', ProductController::class);

Route::put('products/{product}/removeImage', [ProductController::class, 'removeImage'])
    ->name('products.removeImage');
