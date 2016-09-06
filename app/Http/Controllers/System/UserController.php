<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use DB;
use App\Models\Role_user;
class UserController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_set' => 'active']);
    }

    public function index()
    {
        $users = User::with('role_user')->get();
        //return $users;
        return view('system.user.index')->with('users',$users);
    }

    public function create()
    {
        return view('system.user.create');
    }

    public function store(Request $request)
    {
//验证邮箱是否存在。用户名密码不能为空
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        //插入users表

        /*$users =*/ User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'created_at' =>date('Y-m-d H:i:s'),
            'password' => bcrypt($request->input('password')),
        ]);
        // return DB::enableQueryLog();
       /* $role_id = $request->input('role_id');
        Role_user::insert([
            'role_id' => $role_id,
            'user_id' => $users->id,//获取本条新增id
        ]);*/
        return back()->with('msg','新增成功！');
    }

    public function edit($id)
    {
        $user = User::with('role_user')->find($id);
        return view('system.user.edit')->with('user',$user);
    }

    public function update(Request $request,$id)
    {
        $role_id = $request->role_id;
        DB::table('role_user')->where('user_id', $id)->update(['role_id' => $role_id]);
        return redirect(route('admin.user.index'))->with('msg','修改成功');
    }

    public function destroy($id)
    {
        User::destroy($id);
        Role_user::where("user_id",$id)->delete();
        return back()->with('msg', '删除成功');
    }

}
