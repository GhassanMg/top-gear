<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\CarController;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class , 'welcome'])->name('home');

Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

Route::post('/contact', [MessageController::class, 'store'])->name('messages.store');

Route::get('/admin/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/admin/messages/{message}', [MessageController::class, 'show'])->name('messages.show');

Route::get('/admin/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/admin/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::get('/admin/cars/{car}', [CarController::class, 'show'])->name('cars.show');
Route::post('/admin/cars', [CarController::class, 'store'])->name('cars.store');

Route::get('/admin/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/admin/cars/{car}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/admin/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
