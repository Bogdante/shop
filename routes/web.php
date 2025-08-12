<?php

use Illuminate\Support\Facades\Route;
use \App\Modules\Catalog\Controllers\CatalogController;

Route::get('/', [CatalogController::class, 'index'])->name('home');
Route::get('/products', [CatalogController::class, 'getProducts'])->name('products');
Route::get('/products/{product}', [CatalogController::class, 'getProduct'])->name('product');
