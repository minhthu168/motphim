<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Film;
use App\Models\Cat;
use App\Models\Nation;
use App\Models\Rate;
use App\Models\Topic;
use App\Models\Celeb;
use App\Models\News;
use App\Models\Comment;
use App\Models\Nguoidang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function home(){
        $ds = Film::where('approved','1')->paginate(12)->sortByDesc('film_release_year');
        $c =Carousel::all();
        $t = Topic::where('topic_approved','1')->orderByDesc('topic_date')->
        take(10)->get();
        return view('pages.home',compact('ds','c','t'));
    }
    public function film(){
        $ds = Film::Paginate(24);
        $cat = Cat::all();
        $nation =Nation::all();
        $t = Topic::where('topic_approved','1')->orderByDesc('topic_date')->
        take(5)->get();
        return view('pages.film.film',compact('ds','nation','cat','t'));
    }
    public function detailphim($id){
        $f = Film::find($id);
        $cat = Cat::all();
        $nation =Nation::all();
        $count = Rate::where('film_id',$id)->count('user_id');
        $t = Topic::where('topic_approved','1')->orderByDesc('topic_date')->
        take(5)->get();
        return view("pages.film.film_detail",compact('f','count','nation','cat','t'));
    }
    //phan loai tim kiem theo the loai va quoc gia
    public function category($cat){
        $ds = Film::orderByDesc('film_release_year')->where('film_cat','like',"%$cat%")->where('approved','1')->Paginate(24);
        $cat = Cat::all();
        $nation =Nation::all();
        $t = Topic::where('topic_approved','1')->orderByDesc('topic_date')->
        take(5)->get();
        return view('pages.film.film',compact('ds','nation','cat','t'));
    }
    public function phimbole($ht){
        $ds = Film::orderByDesc('film_release_year')->where('film_form',"$ht")->where('approved','1')->Paginate(24);
        $cat = Cat::all();
        $nation =Nation::all();
        $t = Topic::where('topic_approved','1')->orderByDesc('topic_date')->
        take(5)->get();
        return view('pages.film.film',compact('ds','nation','cat','t'));
    }
    public function nation($qg){
        $ds = Film::orderByDesc('film_release_year')->where('film_nation','like',"%$qg%")->where('approved','1')->Paginate(24);
        $cat = Cat::all();
        $nation =Nation::all();
        $t = Topic::where('topic_approved','1')->orderByDesc('topic_date')->
        take(5)->get();
        return view('pages.film.film',compact('ds','nation','cat','t'));
    }
    //tim kiem theo ten
    public function searchByName(Request $request){
        $r=$request->all();
        $name = $r['search'];
        $f = Film::where('film_title','like',"%$name%")->where('approved','1')->get();
        // $celeb = Celeb::where('celeb_name','like',"%$name%")->get();
        return view('pages.search',compact('f'));
    }
    public function createRating(Request $request){
        $user=$request->session()->get('user');
        if ($user != null) {   
            $r = $request->all();
            $rate=new Rate($r);
            $rate->user_id = $user->user_id;

            $film_id =$rate->film_id;            
            $check = Rate::where('film_id',$film_id)->where('user_id',$user->user_id)->get();
            if(count($check)==1){
                return redirect()->back()->with('Loi','Bạn đã đánh giá phim này rồi');
            }else{      
                $rate->save();         
                $f = Film::find($film_id);
                $rate = Rate::where('film_id',$film_id)->avg('rate');
                $f->rate = $rate;
                $f->save();
                return redirect()->back();                  
            }
        }else if($user==null){
            return view('pages.login');
        }
    }

    /*=======================================================================================================*/
    //mod tạo film từ frontend
    public function createfilm(){
        $cat = Cat::all();
        $nation = Nation::all();
        return view('pages.film.create',compact('cat','nation'));
    }
    public function createPostMod(Request $request){
        $r = $request->all();
        if($r['film_form']==1 && $r['film_episode']!=1){
            return redirect()->back()->with('loi','Đây là phim chiếu rạp! Vui lòng nhập 1 tập');
        }
        $title = Film::where('film_title','like',$r['film_title'])->get();
        if(count($title)>=1){
            foreach($title as $item){
                $year =Film::where('film_release_year','like',$item->film_release_year)->get(); 
                if(count($year)>=1){
                    return redirect()->back()->with('loi','Phim này đã có rồi! Vui Lòng nhập phim khác!');
                }              
            }           
        }
        $user=$request->session()->get('user');
        $category= implode(', ',$r['film_cat']);//ham chuyen mang thanh chuoi cach nhau boi dau ,
        $imgName = null;
        if($request->hasFile('film_poster')){
            $file=$request->file('film_poster');
            $extension =  Str::lower($file->getClientOriginalExtension());
            
            if($extension !='jpg' && $extension != 'png' && $extension !='jpeg')
            {
                return redirect('admin/film/create')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imgName = $file->getClientOriginalExtension();
            $file->move('images/phim',$imgName);
        }
        $f = new Film($r);
        $f->film_poster = $imgName;
         $f->film_cat = $category;      
        $f->user_id = $user->user_id;
        $f->approved=0;
        $f->save(); //insert $f vo bang
        return redirect()->action([PagesController::class,'home']);
        
    }
    /*=======================================================================================================*/ 
    // mod tạo topic từ frontend
    //xu ly button tao topic cua mod o trang film_detail 
    public function btCreateTopic (Request $request){  
    $user = $request->session()->get('user');//lay ra bien session user(tk dang nhap thanh cong)
    if($user != null){
        if($user->user_role ==3){
            return redirect()->back()->with('alert','Bạn chưa được cấp quyền thêm chủ đề phim mới');
        }
        else 
        {
            $film_id = $request->film_id;//lay ra film_id trong button tao topic
            return view('pages.film.mod_createTopic', compact('film_id'));//mo trang, truyen film_id
        }
    }
    else{
        return view('pages.login');
    }
}

//xu ly nut submit form create topic o trang mod_createTopic
    public function modCreateTopic(Request $request){
        $user = $request->session()->get('user');//lay ra bien session user(tk dang nhap thanh cong)
        $r = $request->all();//nhan tat ca tham so vao tbtopic
        $imageName = null;
        //xu ly upload hinh vao thu muc
        if($request->hasFile('topic_poster')){
            $file = $request->file('topic_poster');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg'){
                return redirect('pages/film/mod_createTopic')->with('alert','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
                }
            $imageName = $file->getClientOriginalName();
            $file->move("images/topic",$imageName);
        }                                      
        $t = new Topic($r);
        $t->topic_poster = $imageName;
        $t->user_id = $user->user_id;//gán user_id của biến t (tạo chủ đề mới) = user_id của tk login thành công
        $t->topic_approved=0;
        $t->save();
        return redirect()->action([PagesController::class, 'home']);                                             
    }
    /*=======================================================================================================*/    
    public function celeb($cl){
        $c =Celeb::where('celeb_name','like',$cl)->get();           
        return view('pages.film.film_celeb',compact('c'));
    }

    public function news(){
        $ds = News::orderByDesc('news_date')->Paginate(14);
        return view('pages.news.news-event',compact('ds'));
    }
    public function detailnews($id){
        $news = News::find($id);
        $ds = News::orderByDesc('news_date')->Paginate(7);
        return view("pages.news.detail",compact('news','ds'));
    }

    //xu ly trang chu admin/home
    public function admin(){
        $film = Film::count('film_id');
        $topic = Topic::count('topic_id');
        $celeb = Celeb::count('celeb_id');
        $user = Nguoidang::count('user_id');
        $bl = Comment::count('comment_id');
        $news = News::count('news_id');
        return view('admin.home',compact('film','topic','celeb','user','bl','news'));
    }

    /*==========================================================*/
    public function filmMod($id){
        $f = Film::where('user_id',$id)->get();
        return view('pages.film.filmMod',compact('f'));
    }
    public function topicMod($id){
        $t = Topic::where('user_id',$id)->get();
        return view('pages.topic.topicMod',compact('t'));
    }
}
