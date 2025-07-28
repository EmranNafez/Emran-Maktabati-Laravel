<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\BookController as WebBookController;
use App\Http\Controllers\Web\CartController as WebCartController;
use App\Http\Controllers\Web\OrderController as WebOrderController;
use App\Http\Controllers\Web\AuthController;

Route::get('/', [WebBookController::class, 'index'])->name('home');

Route::get('/books/{id}', [WebBookController::class, 'show'])->name('books.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cart', [WebCartController::class, 'index'])->name('cart.index')->middleware('auth');

Route::post('/cart/add', [WebCartController::class, 'add'])->name('cart.add')->middleware('auth');

Route::get('/orders', [WebOrderController::class, 'index'])->name('orders.index')->middleware('auth');
