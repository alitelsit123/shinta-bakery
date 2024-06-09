<?php

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

// Route::get('/admin', \App\Livewire\Admin\Dashboard::class);
Route::get('/', \App\Livewire\Home::class);
Route::get('/product', \App\Livewire\Product::class);
Route::get('/transaction', \App\Livewire\Transaction::class);
Route::get('/outlet', \App\Livewire\Outlet::class);


Route::post('/login', [\App\Http\Controllers\AuthController::class,'login']);
Route::post('/register', [\App\Http\Controllers\AuthController::class,'register']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class,'logout']);
