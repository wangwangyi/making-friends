<?php

namespace App\Http\Controllers\System;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\System;
class ConfigController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_set' => 'active']);
    }

    public function index()
    {
        $system = System::find(1);
        return view('system.config.index')->with('system',$system);
    }
}
