<?php

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


Route::get('/', function () {
    return view('welcome');
})->name('Home');


Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::post('/contact', function (Request $Request) {

    $Request->validate([
        'name' => 'required|min:3|max:255',
        'email'=> 'required|email',
        'phone'=> 'required|starts_with:9639|digits_between:12,12',
        'content'=> 'required|string|min:5'
    ]);

    $message = new Message();
    $message->name = $Request->name;
    $message->email = $Request->email;
    $message->phone = $Request->phone;
    $message->content = $Request->content;
    $message->save();

    return redirect('/admin/messages');
})->name('contact');

Route::get('/admin/messages', function () {
    $messages = Message::all();
    // $messages = Message::where('name',$message->name);
    return view('messages.index',compact('messages'));
})->name('messages.all');

Route::get('/admin/messages/{message}', function (Message $message) {
    return view('messages.show',compact('message'));
})->name('messages.show');
