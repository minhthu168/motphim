<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Nguoidang;

class CommentController extends Controller
{
    public function deleteComment($comment_id,$topic_id)
    {
        $cm = Comment::find($comment_id);
        $cm->delete();//xoa comment backend
        return redirect('admin/topic/edit/'.$topic_id);//quay ve trang topic/edit
    }

    // //tra ve view listing danh sach users
    // public function index()
    // {
    //     $ds = Nguoidang::all();
    //     foreach($ds as $item){
    //        $binhluan = Comment::all()
    //        ->where('user_id',$item->user_id)->where('comment_content',$item->user_id);//tìm bình luận của từng user
    //     //    ->count('comment_id');//đếm tất cả bình luận của từng user

    //     //    Nguoidang::all()->where('user_id', $item->user_id)
    //     //    ->update(["comment" => $binhluan]);//save
    //     }

    //     return view("admin.comment", compact('ds','binhluan')); 
    // }

}
