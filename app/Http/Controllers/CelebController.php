<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celeb;
class CelebController extends Controller
{

    //lay het du lieu trong bang ,goi cho view celeb.index
    public function getCeleb(){
        $ds = Celeb::all();//->orderBy('film_release_year','desc');
        return view('admin.celeb.index',compact('ds'));
    }
    //ham tra ve trang tao 1 celeb moi
    public function create(){
        // $ds = Cat::all(); 
        return view('admin.celeb.create');
    }
    
    public function createPost(Request $request){ 
        $r = $request->all();
        
        $imgName = null;
        if($request->hasFile('celeb_image')){
            $file=$request->file('celeb_image');
            $extension = $file->getClientOriginalExtension();
            if($extension !='jpg' && $extension != 'png' && $extension !='jpeg')
            {
                return redirect('admin/celeb/create')->with('loi','Ban chi duoc chon file co duoi jpg,png,jpeg');
            }
            $imgName = $file->getClientOriginalExtension();
            $file->move('images/celeb',$imgName);
        }

        $c = new Celeb($r);
        $c->celeb_image = $imgName;
/*         $c->celeb_name = $celebName; */
        $c->save(); //insert $c vo bang
        return redirect()->action([CelebController::class,'getCeleb']);
    }

    public function edit($id) {
        $c = Celeb::find($id);
        return view('admin.celeb.edit', compact('c'));
    }
    public function editPost(Request $request, $id){
        $r = $request->all();

        $imgName = null;
        // xử lý upload hình vào thư mục
        if($request->hasFile('celeb_image')){
            $file=$request->file('celeb_image');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg'){
                return redirect('admin/celeb/edit')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move("images/celeb",$imgName);
        } else { // không upload hình mới => giữ lại hình cũ
            $c = Celeb::find($id);  
            $imgName = $c->celeb_image;
        }
        $c=new Celeb($r);
        $c->celeb_image = $imgName;
     /*    $f->film_category = $category; */
        $c->exists = true; //save() se hoat dong nhu lenh update thay vi insert
        $c->save(); //update $f vo bang 
        return redirect()->action([CelebController::class,'getCeleb']);
    }

    public function delete($id) {
        $f = Celeb::find($id);
        $f->delete();
        return redirect()->action([CelebController::class,'getCeleb']);
    }

    public function detail($id){
        $c = Celeb::find($id);
        return view("admin.celeb.detail", compact('c'));
    }
}
