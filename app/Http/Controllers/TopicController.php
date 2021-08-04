<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;


class TopicController extends Controller
{  
    //lấy ra ds các chủ đề phim đã duyệt
    public function getTopic(){
        $ds = Topic::where('topic_approved', '1')->get()->sortByDesc('topic_date');
        return view('admin.topic.index', compact('ds'));
    }
    //lấy ra ds các chủ đề phim cần duyệt
    public function getTopicApproved(){
        $ds = Topic::where('topic_approved', '0')->get();
        return view('admin.topic.approved', compact('ds'));
    }
    //tìm và chuyển đổi chủ đề phim chưa duyệt -> đã duyệt
    public function topicApproved($topic_id){
        $t = Topic::find($topic_id);
        $t->topic_approved = 1;
        $t->save();
        return redirect()->action([TopicController::class,'getTopicApproved']);
    }

    //ham tra ve trang admin tao 1 topic moi
    public function createTopic($film_id){
        return view('admin.topic.create', compact('film_id'));
    }

    public function createTopicPost(Request $request){
        $r = $request->all();
        $user = $request->session()->get('user');
        $imgName = null;
        if($request->hasFile('topic_poster')){
            $file = $request->file('topic_poster');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg')
            {
                return redirect('admin/topic/create')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move('images/topic', $imgName);
        }
        $t = new Topic($r);
        $t->topic_poster = $imgName;
        $t->user_id = $user->user_id;
        $t->topic_approved = 1;
        $t->save();
        return redirect()->action ([TopicController::class, 'getTopic']);

    }

    //ham tra ve trang edit topic voi tham so truyen cho view la doi tuong topic co ma so muon thay doi thong tin
    public function editTopic($topic_id)
    {
        $t = Topic::find($topic_id);
        return view('admin.topic.edit', compact('t'));
    }

    //ham cap nhat lai thong tin topic muon thay doi noi dung
    public function editTopicPost(Request $request, $topic_id)
    {
        //nhan tat ca tham so vao mang topic
        $r = $request->all();
        $imageName = '';
        //xu ly upload hinh vao thu muc
        if ($request->hasFile('topic_poster')) {
            $file = $request->file('topic_poster');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/topic/edit')->with('loi', 'Ban chi duoc chon file co duoi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
        } else { //khong upload hinh moi => giu lai hinh cu
            $t = Topic::find($topic_id);
            $imageName = $t->topic_poster;
        }
        $t = new Topic($r);
        $t->topic_poster = $imageName;
        $t->exists = true;//save() se hoat dong nhu lenh update thay vi insert
        $t->save();//insert $t vo bang tbtopic

        return redirect('/admin/topic');//quay ve trang topic/index
    }
    public function deleteTopic($topic_id)
    {
        $t = Topic::find($topic_id);
        $t->delete();
        return redirect('/admin/topic');//quay ve trang topic/index
    }

    //xem thong tin details cua topic khi biet id
    public function infoTopic($topic_id)
    {
        $t = Topic::find($topic_id);
        return view("admin.topic.view", compact('t'));
    }
}
