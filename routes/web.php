<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClickLinkController;

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

Route::get('/register', [UserController::class, 'registerForm'])->name('auth.register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'loginForm'])->name('auth.login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/links', [LinkController::class, 'index'])->name('links.index');
Route::post('/links', [LinkController::class, 'store'])->name('links.store');
Route::delete('/links/{id}', [LinkController::class, 'destroy'])->name('links.destroy');
Route::get('/links/{id}/stats', [LinkController::class, 'stats'])->name('links.stats');
Route::get('/{code}', [ClickLinkController::class, 'click'])->where('code', '[A-Za-z0-9]{6}');
