<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Topic;
use App\Models\Cat;
use App\Models\Nation;
use Illuminate\Support\Str;
class FilmController extends Controller
{
    //xu ly cho admin film
    public function get(){  
        $ds = Film::where('approved','1')->get()->sortByDesc('film_id');
        return view('admin.film.index',compact('ds'));
        
    }
    public function getApproved(){
        $ds = Film::where('approved','0')->get();
        return view('admin.film.approved',compact('ds'));
    }
    public function Approved($id){
        $f = Film::find($id);
        $f->approved = 1;
        $f->save();
        return redirect()->action([FilmController::class,'getApproved']);
    }
    public function create(){
        $cat = Cat::all();
        $nation = Nation::all();
        return view('admin.film.create',compact('cat','nation'));
    }
    public function createPost(Request $request){
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
            //dd($imgName);
            $file->move('images/phim',$imgName);
        }
        $f = new Film($r);
        $f->film_poster = $imgName;
         $f->film_cat = $category;      
        $f->user_id = $user->user_id;
        $f->approved=1;
        $f->save(); //insert $f vo bang
        return redirect()->action([FilmController::class,'get']);
        
    }
    public function edit($id) {
        $f = Film::find($id);
        $cat = Cat::all();
        $nation = Nation::all();
        return view('admin.film.edit', compact('f','cat','nation'));
    }
    public function editPost(Request $request, $id){
        $r = $request->all();
        if($request->has('film_cat')){
            $category= implode(', ',$r['film_cat']);
        }else { 
            $f = Film::find($id);  
            $category = $f->film_cat;
        }
        $imgName = null;
        // xử lý upload hình vào thư mục
        if($request->hasFile('film_poster')){
            $file=$request->file('film_poster');
            $extension =  Str::lower($file->getClientOriginalExtension());
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg'){
                return redirect('admin/film/edit')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move("images/phim",$imgName);
        } else { 
            $f = Film::find($id);  
            $imgName = $f->film_poster;
        }
        $f=new Film($r);
        $f->film_poster = $imgName;
        $f->film_cat = $category;
        $f->exists = true; 
        $f->save(); 
        return redirect()->action([FilmController::class,'get']);
    }
    public function delete($id) {
        $f = Film::find($id);
        $t = Topic::where('film_id',$id)->get(); 
        if(count($t)>=1){
            return redirect()->back()->with('count',count($t));
        }
        $f->delete();
        return redirect()->action([FilmController::class,'get']);
    }
    public function detail($id){
        $f = Film::find($id);
        return view("admin.film.detail", compact('f'));
    }

    //xu ly cho admin Category
    public function createCat(Request $request){
        $r = $request->all();
        $name = $r['cat_name'];
        $c = Cat::where('cat_name','like',"%$name%")->get(); 
        if(count($c)==1){
            return redirect()->back()->with('loi','Thể loại này có rồi');
        }else{
            $cat = new Cat($r);
        $cat->save(); 
        return redirect()->action([FilmController::class,'getCat']);
        }      
    }
    public function getCat(){
        $cat = Cat::get();
        return view('admin.film.category',compact('cat'));
    }
    public function deleteCat($id) {
        $cat = Cat::find($id);
        $c = $cat->cat_name;
        $f = Film::where('film_cat','like',"%$c%")->get(); 
        if(count($f)>=1){
            return redirect()->back()->with('count',count($f));
        }else{
        $cat->delete();
        return redirect()->action([FilmController::class,'getCat']);}
    }
    public function editCat(Request $request){
        $r = $request->all();
        $ten_moi = $r['cat_name'];
        $id =$r['cat_id'];
        $c = Cat::find($id);
        $ten_cu =$c->cat_name;
        $f = Film::where('film_cat','like',"%$ten_cu%")->get(); 
        if($f){
            foreach($f as $item){
                $tr = str_replace("$ten_cu","$ten_moi","$item->film_cat");
                $item->film_cat=$tr;
                $item->save();
            } 
        }
        $c->cat_name = $ten_moi;
        $c->save();
        return redirect()->back();
    }

    //xu ly cho admin nation
    public function createNation(Request $request){
        $r = $request->all();
        $name = $r['nation_name'];
        $n = Nation::where('nation_name','like',"%$name%")->get(); 
        if(count($n)==1){
            return redirect()->back()->with('Loi','Quốc gia này có rồi');
        }else{
            $n = new Nation($r);
            $n->save(); 
            return redirect()->action([FilmController::class,'getNation']);
        }              
    }
    public function getNation(){
        $n = Nation::get();
        return view('admin.film.nation',compact('n'));
    }
    public function deleteNation($id) {
        $n = Nation::find($id);
        $qg = $n->nation_name;
        $f = Film::where('film_nation','like',"%$qg%")->get(); 
        if(count($f)>=1){
            return redirect()->back()->with('count',count($f));
        }
        $n->delete();
        return redirect()->action([FilmController::class,'getNation']);
    }
    public function editNation(Request $request){
        $r = $request->all();
        $ten_moi = $r['nation_name'];
        $id = $r['nation_id'];
        $n = Nation::find($id);
        $ten_cu = $n->nation_name;
        $f = Film::where('film_nation','like',"%$ten_cu%")->get(); 
        if($f){
            foreach($f as $item){
                $tr = str_replace("$ten_cu","$ten_moi","$ten_cu");
                $item->film_nation=$tr;
                $item->save();
            } 
        }
        $n->nation_name=$ten_moi;
        $n->save();
        return redirect()->back();
    }
    
}