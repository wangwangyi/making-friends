<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

class SeenController extends CommonController
{
    public function index()
    {
        return view('home.seen.index')->with( '_seen' ,'active');
    }
}
