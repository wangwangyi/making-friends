<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share([
            '_system' => 'index',
            '_index' => 'am-active',
        ]);
    }

    public function index()
    {
        return view('system.index.index');
    }
}
