<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewsController extends Controller
{
    //lay het du lieu trong bang ,goi cho view admin.news.index
    public function getNews(){
        $ds = News::all();
        return view('admin.news.index',compact('ds'));
    }
    //ham tra ve trang tao 1 news moi
    public function createNews(){
        return view('admin.news.create');
    }
    
    public function createPost(Request $request){ 
        $r = $request->all();
        $imgName = null;
        if($request->hasFile('news_image')){
            $file=$request->file('news_image');
            $extension = $file->getClientOriginalExtension();
            //dd($file,$extension);
            if($extension !='jpg' && $extension != 'png' && $extension !='jpeg')
            {
                return redirect('admin/news/create')->with('loi','Ban chi duoc chon file co duoi jpg,png,jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move('images/news-event',$imgName);
        }

        $n = new News($r);
        $n->news_image = $imgName;
        $n->save(); //insert $n vo bang
        return redirect()->action([NewsController::class,'getNews']);
    }

    public function edit($news_id) {
        $n = News::find($news_id);
        return view('admin.news.edit', compact('n'));
    }
    public function editPost(Request $request, $news_id){
        $r = $request->all();
        $imgName = null;
        // xử lý upload hình vào thư mục
        if($request->hasFile('news_image')){
            $file=$request->file('news_image');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg'){
                return redirect('admin/news/edit')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move("images/news-event",$imgName);
        } else { // không upload hình mới => giữ lại hình cũ
            $n = News::find($news_id);  
            $imgName = $n->news_image;
        }
        $n = new News($r);
        $n->news_image = $imgName;
        $n->exists = true; //save() se hoat dong nhu lenh update thay vi insert
        $n->save(); //update $n vo bang 
        return redirect()->action([NewsController::class,'getNews']);
    }

    public function delete($news_id) {
        $n = News::find($news_id);
        $n->delete();
        return redirect()->action([NewsController::class,'getNews']);
    }

    public function detail($news_id){
        $n = News::find($news_id);
        return view("admin.news.detail", compact('n'));
    }
}
