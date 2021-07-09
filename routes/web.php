<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CategoryController;

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


Route::get('/category/create', [CategoryController::class, 'create'])->name('category-create');

Route::post('/category/create', [CategoryController::class, 'store'])->name('category-store');

Route::get('/category', [CategoryController::class, 'index'])->name('category-index');

Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');


Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category-update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category-destroy');



/**
 * TODO: This section for food route
 */

Route::get('/food/create', [FoodController::class, 'create'])->name('food-create');

Route::post('/food/create', [FoodController::class, 'store'])->name('food-store');

Route::get('/food', [FoodController::class, 'index'])->name('food-index');

Route::get('/food/edit/{id}', [FoodController::class, 'edit'])->name('food-edit');

Route::delete('/food/{id}', [FoodController::class, 'destroy'])->name('food-destroy');

Route::put('/food/{id}', [FoodController::class, 'update'])->name('food-update');

Route::get('/food/list', [FoodController::class, 'listFood'])->name('food-list');

Route::get('/food/detail/{id}', [FoodController::class, 'detail'])->name('food-detail');