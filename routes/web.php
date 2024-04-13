<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductAuthController;
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

// routes Auth Start
Route::get("/logout", [AuthController::class, "logout"]);

Route::get("/login", [AuthController::class, "login"]);
Route::post("/login", [AuthController::class, "authenticate"]);

Route::get("/register", [AuthController::class, "register"]);
Route::post("/register", [AuthController::class, "createUser"]);
// routes Auth end
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
Route::get("/products/add", [ProductController::class, "create"]);
Route::get("products/{id}", [ProductController::class, "show"]);
Route::get("products/edit/{id}", [ProductController::class, "edit"]);
Route::patch("products/edit/{id}", [ProductController::class, "update"]);
Route::delete("/products/{id}", [ProductController::class, "destroy"]);

// product auth routes start

Route::get('/loginpage', [ProductAuthController::class, "login"]);
Route::post('/loginpage', [ProductAuthController::class, "loginUser"]);

// product auth routes end

// Profiel Routes

Route::get("profile", [ProfileController::class, "index"]);
