<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Nguoidang;
use App\Models\Comment;

class AccountController extends Controller
{
     //tra ve view listing danh sach users
     public function index()
     {
         $ds = DB::table('tbuser')->get();
         foreach($ds as $item){
            $binhluan = DB::table('tbcomment')
            ->where('user_id',$item->user_id)//tìm bình luận của từng user
            ->count('comment_id');//đếm tất cả bình luận của từng user

            DB::table('tbuser')->where('user_id', $item->user_id)
            ->update(["comment" => $binhluan]);//save
         }

         return view("admin.users", compact('ds')); 
     }
     //tra ve view tao 1 tai khoan user moi
     public function signup()
     {
         return view("pages.signup");
     }
     //luu du lieu input tu form create-user vo database
     public function createPost(Request $request)
     {
         //lay du lieu tren form nhap tu bien $request
         $username = $request->username;
         $name = DB::table('tbuser')->where('username','like',$username)->get();
         if(count($name)==1){
            return redirect()->back()->with('message','Tên đăng nhập bị trùng. Bạn Vui lòng nhập tên khác!');
         }else{

         $user_pass = $request->user_pass;
         $user_email = $request->user_email;
         $user_gender = $request->user_gender;
         $user_yob = $request->user_yob;

         DB::table('tbuser')->insert([
             "user_role" =>'3',
             "username" =>$username,
             "user_pass" =>$user_pass,
             "user_email" =>$user_email,
             "user_gender" =>$user_gender,
             "user_yob" =>$user_yob
            
         ]);
         //tro ve trang admin.home
         //return redirect()->action([AccountController::class, 'home']);
         //return route("userlist");
         return redirect()->route("adminuserlist");
        }
     }
    //change account type from member to mod
    public function changeAccountType($user_id){
        $u = Nguoidang::find($user_id);//tim user có id la $user_id
        if($u->user_role==1 || $u->user_role==2){//neu user do co role la 1 va 2 thi in ra loi
            return redirect()->route("adminuserlist")->with('loi','Chỉ áp dụng cho thành viên thường!!!');
        }else{
            //nguoc lai nghia la role la 3 thi doi role thanh 2
        DB::table('tbuser')->where('user_id', $user_id)->where('user_role',3)->where('comment','>','10')
        ->update(["user_role" => '2']);
        return redirect()->route("adminuserlist")->with('loi','Chỉ áp dụng đối với thành viên có số lượng bình luận trên 10');}
    }

/* ================================================================================ */
     //xem thong tin profile cua user khi biet id
     public function details_member($user_id)                
     {                                                                  
         $user = Nguoidang::find($user_id);
         return view("pages.user.member", compact('user'));
     }
     public function details_mod($user_id)
     {
         $user = Nguoidang::find($user_id);
         return view("pages.user.mod", compact('user'));
     }
/* ================================================================================ */
    //mo trang login
    public function login()
    {
        return view("pages.login");
    }
    //kiem tra tai khoan dang nhap
    public function checklogin(Request $request)
    {
        if($request->session()->has('user')){
            $request->session()->forget('user');
        }
        $username = $request->username;
        $user_pass = $request->user_pass;

        $user = DB::table('tbuser')->where("username", $username)->first();
        if ($user != null && $user->user_pass== $user_pass) {
            //tao bien session de luu thong tin tk dang nhap thanh cong
            $request->session()->put('user', $user); //push() luu bien mang
            if ($user->user_role == 1) {
                return redirect('admin/home');
                //return redirect()->route("adminuserlist");
            } else if ($user->user_role ==2){
                return redirect('pages/home');
            } else {
                return redirect('pages/home');
            }   
        } else {
            return redirect("pages/login")->with("message", "Lỗi đăng nhập, vui lòng thử lại!");
        }
    }

    //logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        //xoa session user
        //$request->session()->forget('user');
        return redirect('pages/home');
    }

    public function postEdit(Request $request, $user_id){
        $user_role = $request->user_role;
        $username = $request->username;
        $user_pass = $request->user_pass;
        $user_email = $request->user_email;
        $user_gender = $request->user_gender;
        $user_yob = $request->user_yob;

        Nguoidang::find($user_id)->update(['user_role'=>$user_role, 
        'username'=>$username,
        'user_pass'=>$user_pass, 'user_email'=>$user_email,'user_gender'=>$user_gender,
        'user_yob'=>$user_yob]);

        return redirect()->route('adminuserlist');
    }   
//xóa tài khoản user
 public function delete($user_id){
        //DB::table('tbuser')->delete($user_id);
        //Nguoidang::find($user_id)->delete();
        $user = Nguoidang::find($user_id);
        $comment = Comment::where('user_id', $user_id);//tìm các comment của user muốn xóa
        $comment->delete();//xóa các comment của user muốn xóa
        $user->delete();//xóa user
        return redirect()->route('adminuserlist');
    }

}
