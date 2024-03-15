<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get("posts", [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);
Route::post('posts', [PostController::class, 'store']);
Route::get("posts/{id}", [PostController::class, "show"]);
Route::get("posts/edit/{id}", [PostController::class, "edit"]);
Route::patch("posts/{id}", [PostController::class, "update"]);
Route::delete("posts/{id}", [PostController::class, "destroy"]);

// Product Routes
Route::get("/products", [ProductController::class, "index"]);
Route::post("/products", [ProductController::class, "store"]);
Route::get("products/{id}", [ProductController::class, "show"]);
Route::get("/products/add", [ProductController::class, "create"]);
Route::get("products/edit/{id}", [ProductController::class, "edit"]);
Route::patch("products/edit/{id}", [ProductController::class, "update"]);
Route::delete("/products/{id}", [ProductController::class, "destroy"]);

// Profiel Routes

Route::get("profile", [ProfileController::class, "index"]);
