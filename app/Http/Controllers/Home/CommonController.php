<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class CommonController extends Controller
{
    function __construct()
    {
        $home = Auth::user();
        view()->share([
            'home' => $home,
        ]);
    }
}
