<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Mail;
use Auth;
use DB;
use Hash;
class UserController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share([
            '_user' => 'nav-active',
            'education_status' => config('info.education_status'),
            'salary_status' => config('info.salary_status'),
            'nation_status' => config('info.nation_status'),
            'house_status' => config('info.house_status'),
            'auto_status' => config('info.auto_status'),
            'blood_type' => config('info.blood_type'),
        ]);
    }
    public function photoUpload()
    {
        return view('home.user.uploadPhoto');
    }

    public function send($id)
    {
        $user =  User::findOrFail($id);
        $imgPath = 'http://laravel52.app/assets/bootstrap/img/boy.jpg';
        Mail::send('auth.emails.reminder',['user' => $user,'imgPath'=>$imgPath],function($message) use($user){
            $message->to($user->email, $user->name)->subject('测试邮件');

        });
    }

    public function userInfo()
    {
        $info =  Auth::user();
        return view('home/user/userInfo')->with('info',$info)->with( '_info' ,'active');
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $user = User::find($request->id);
        $user ->update([
            'name' =>$request->name,
            'height' =>$request->height,
            'marital_status' =>$request->marital_status,
            'education' =>$request->education,
            'salary' =>$request->salary,
            'house' =>$request->house,
            'auto' =>$request->auto,
            'blood' =>$request->blood,
        ]);
    }

    public function changePassword()
    {
        return view('home.user.change_password')->with( '_password' ,'active');
    }

    public function updatePassword(Request $request)
    {
        $home = Auth::user();
        if(!Hash::check($request->old_password,$home->password)){
            return back()->with('msg','原始密码错误~');
        }
        $this->validate($request,['old_password' => 'required',
            'password' => 'required|min:6|confirmed']);
        $home = User::find($home->id);
        $home->fill(['password' => bcrypt($request->password),
            'name' => $request->input('name')])->save();
        return back();
    }

}
