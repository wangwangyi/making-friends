<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class CommonController extends Controller
{
    function __construct()
    {
        $admin = Auth::guard('admin')->user();
        view()->share([
            'admin' => $admin,
            'systems'   => config('xSystem.systems'),
        ]);
        $this->bibel();
    }

    private function bibel()
    {
        @$bibels = file('Bibel.txt');
        $size = count($bibels) / 2 - 1;
        $rand = rand(0, $size) * 2;
        $bibel = array(
            'cn' => $bibels[$rand + 1],
            'en' => $bibels[$rand]
        );

        view()->share('bibel', $bibel);
    }
}
