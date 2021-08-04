@extends('web-layout.layout')
@section('title', 'film')
@section('main-section')
<div class="container">
    <div class="row">
        <div class='col-xs-12 col-sm-8 col-md-8 col-lg-9'> 
            {{-- class='col-xs-12 col-sm-8 col-md-8 col-lg-9'          --}}
                <div  style='width: 100%;padding:0;border:#ccc 1px ridge;color:black;background:rgb(237, 216, 100);'>
                        <h4 style="margin: 1%;">
                            <b >Phim mới cập nhật</b>
                            <span style="float:right;"><a href="{{asset("pages/film/film")}}" title="" >Toàn bộ</a> /<a href="{{asset("pages/film/0")}}" title="" >Phim bộ</a>/<a href="{{asset("pages/film/1")}}" title="" > Phim lẻ</a></span>
                        </h4>
                </div>
                
                <div style="clear: both;"></div>
                <div id="list-phim">                  
                    <div class='row'>
                        @foreach ($ds as $item )
                        <div class='col-xs-6 col-sm-4 col-md-3 col-lg-3' style="padding: 10px;">
                            <a href="{{asset("pages/film/film_detail/$item->film_id")}}" title="" >                           
                                <img src="{{asset("images/phim/$item->film_poster")}}" width="100%" class="avatar_phim">
                                <div class="name">
                                    <p class='name-vi' style="font-size:110%">{{$item->film_title}}</p>
                                    <p class='time-film' style="font-size:110%">{{$item->film_release_year}}</p>
                                </div>
                            </a>  
                        </div>                        
                        @endforeach  
                    </div>
                    <div style="float:right;font-weight:bold;">
                        <p style="font-size:150%;"> {!! $ds->links() !!}</p>
                      </div>
                </div>
            
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4 col-lg-3">
            <div class="miniCat">
                <div style="background: lightgray">
                    <div  style='width: 100%;padding:0;border:#ccc 1px ridge;color:black;background:rgb(237, 216, 100);'>
                        <h4 style="margin: 5%;">
                            <b >Thể loại</b>
                        </h4>
                    </div>
                    <br>
                    @foreach ($cat as $item)
                    <a style="padding:10%;font-size:120%;" href="{{asset("pages/film/the-loai/$item->cat_name")}}"><span>{{$item->cat_name}}</span></a><br>
                    @endforeach
                    <br>
                </div>
                <div style="margin-top: 4%;background: lightgray">
                    <div  style='width: 100%;padding:0;border:#ccc 1px ridge;color:black;background:rgb(237, 216, 100);'>
                        <h4 style="margin: 5%;">
                            <b >Quốc gia</b>
                        </h4>
                    </div>
                    <br>
                    @foreach ($nation as $item)
                    <a style="padding:8%;font-size:120%;" href="{{asset("pages/film/quoc-gia/$item->nation_name")}}"><span>{{$item->nation_name}}</span></a><br>
                    @endforeach
                    <br>
                </div>
            </div>
            <div  style='width: 100%;margin-top:3%;margin-bottom:0px;padding:0;border:#ccc 1px ridge;color:black;background:rgb(237, 216, 100);'>
                <h4 style="margin: 5%;">
                    <b >Chủ đề phim mới</b>
                </h4>
            </div>
            <div class="pc" style="margin-top:0;padding:8%;background: lightgray">
                @foreach ($t as $item)
                <p style="font-size: 15px;">
                    <a href="{{url('pages/topic/detail/'.$item->topic_id)}} ">
                        <p style="font-weight:bold;font-size:110%;">{{$item->topic_title}}</p>
                        <img style="width: 60%; height:70px; " src="{{url('images/topic/'.$item->topic_poster)}}">
                    </a>
                </p>
                <hr>
                @endforeach
                <a href="{{asset("pages/topic/pagination")}}"><span style="float:right; color:lightseagreen;font-weight:bold;font-size:1.5rem;">  >>Xem thêm</span></a>
            </div>

        </div>
    </div>
</div>
@endsection