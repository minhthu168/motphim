<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('pages.changePassword');
    }

   public function store(Request $request)
   {
       $user = $request->session()->get('user');
       $request->validate([
           'current_password' => ['required'],
           'new_password' => ['required'],
           'new_confirm_password' => ['same:new_password'],
       ]);
       $new_pass = $request->new_password;
       $old_pass = $request->current_password;
       if(strcmp($old_pass, $user->user_pass)==0){
           DB::table('tbuser')->where('user_id', $user->user_id)->update(["user_pass" => $new_pass]);
           return redirect('pages/login')->with("message", "Sửa mật khẩu thành công! Vui lòng đăng nhập lại!");
       }else{
           return redirect()->back()->with("message","Mật khẩu không đúng! Vui lòng nhập lại");
       }
   }
}
