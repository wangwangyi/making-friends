<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

class MessageController extends CommonController
{
    public function myMessage()
    {
        return view('home.message.myMessage')->with('_myMessage','active');
    }

    public function systemMessage()
    {
        return view('home.message.systemMessage')->with('_systemMessage','active');
    }
}
