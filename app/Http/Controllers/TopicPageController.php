<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Topic;
use App\Models\Comment;

class TopicPageController extends Controller
{
    public function index(){
        $t = Topic::orderByDesc('topic_date')->Paginate(20);
        return view('pages.topic.index_pagination', compact('t'));
    }

    // function fetch(Request $request){
    //     if ($request->ajax()){
    //         $t = Topic::orderByDesc('topic_date')->Paginate(30);
    //         return view('pages.topic.index.pagination', compact('t'))->render();
    //     }
    // }
    //xem chi tiết topic
    function chude($topic_id){
        DB:: update( 'update tbtopic set topic_view = topic_view +1 where topic_id = ?' ,[$topic_id]);//đếm lượt view
        $detail = Topic::find($topic_id);   
        $t = Topic::orderByDesc('topic_date')->Paginate(7); 
        return view('pages.topic.detail', compact('detail','t'));
    }
    //tao comment tu frontend
    public function createComment(Request $request){
        $user=$request->session()->get('user');
        if ($user != null) {   
            $r = $request->all();
            $comment=new Comment($r);
            $comment->user_id = $user->user_id;
            //dd($comment);
            $comment->save();
            return redirect()->back();           
        }
        else{
            return redirect()->back()->with('alert','Bạn cần đăng nhập trước khi bình luận');
        }
    }
}
