<?php

namespace App\Http\Controllers\System;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Cache;
use App\Admin;
use Auth;
use Hash;
class SettingController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_set' => 'active']);
    }

    public function index()
    {
       return view('system.setting.index');
    }

    public function change_password(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        if(!Hash::check($request->old_password,$admin->password)){
            return back()->with('msg','原始密码错误~');
        }
        $this->validate($request,['old_password' => 'required',
            'password' => 'required|min:6|confirmed']);
        $admin = Admin::find($admin->id);
        $admin->fill(['password' => bcrypt($request->password),
                      'name' => $request->input('name')])->save();

        return back()->with('msg','修改成功！');
    }

    public function clear_cache()
    {
        Cache::flush();
        return back()->with('msg', '缓存清除成功~');
    }
}
