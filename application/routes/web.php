<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookShelfsController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/add', [UserController::class, 'add']);
Route::post('/users/add', [UserController::class, 'insert']);

Route::get('/bookshelfs', [BookShelfsController::class, 'index']);
Route::get('/bookshelfs/add', [BookShelfsController::class, 'add']);
Route::post('/bookshelfs/add', [BookShelfsController::class, 'insert']);
Route::get('/bookshelfs/edit/{id}', [BookShelfsController::class, 'edit']);
Route::put('/bookshelfs/edit/{id}', [BookShelfsController::class, 'update']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/detail/{id}', [BookController::class, 'get']);
Route::get('/books/add', [BookController::class, 'add']);
Route::post('/books/add', [BookController::class, 'insert']);
Route::get('/books/edit/{id}', [BookController::class, 'edit']);
Route::put('/books/edit/{id}', [BookController::class, 'update']);

Route::get('/transactions/borrow', [TransactionController::class, 'borrow']);
Route::get('/transactions/return', [TransactionController::class, 'return']);

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/logout', [ConfigurationController::class, 'logout']);
