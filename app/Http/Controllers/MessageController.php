<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages.index',compact('messages'));
    }


    public function show(Message $message)
    {
        return view('messages.show',compact('message'));
    }


    public function store(Request $Request)
    {

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
    }
}
