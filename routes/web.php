<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\CarController;
use Illuminate\Http\Request;
use App\Models\Message;
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

Route::get('/', [HomeController::Class , 'welcome'])->name('home');

Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

Route::post('/contact', [MessageController::Class, 'store'])->name('messages.store');

Route::get('/admin/messages', [MessageController::Class, 'index'])->name('messages.index');
Route::get('/admin/messages/{message}', [MessageController::Class, 'show'])->name('messages.show');

Route::get('/admin/cars', [CarController::Class, 'index'])->name('cars.index');
Route::get('/admin/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::get('/admin/cars/{car}', [CarController::Class, 'show'])->name('cars.show');
Route::post('/admin/cars', [CarController::Class, 'store'])->name('cars.store');
