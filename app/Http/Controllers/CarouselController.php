<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Str;
class CarouselController extends Controller
{
    public function get(){  
        $ds = Carousel::all();
        return view('admin.carousel.index',compact('ds'));
        
    }
    public function edit($id) {
        $c = Carousel::find($id);
        return view('admin.carousel.edit', compact('c'));
    }
    public function editPost(Request $request, $id){
        $r = $request->all();
        $imgName = null;
        // xử lý upload hình vào thư mục
        if($request->hasFile('carousel_image')){
            $file=$request->file('carousel_image');
            $extension =  Str::lower($file->getClientOriginalExtension());
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg'){
                return redirect('admin/carousel/edit')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move("images/carousel",$imgName);
        } else { 
            $c = Carousel::find($id);  
            $imgName = $c->carousel_image;
        }
        $c = Carousel::find($id);
        $c->carousel_image = $imgName;
        $c->carousel_name = $r['carousel_name'];
        $c->save(); 
        return redirect()->action([CarouselController::class,'get']);
    }
}