@extends('web-layout.layout')
@section('title', 'film-detail')
@section('main-section')
<div class="container" style="overflow: hidden;">
    <div class="row">
        <div class='col-xs-12 col-sm-8 col-md-8 col-lg-9' style="padding:10px;background:lightgray">
            <div class="row" style="margin: 10px;">
                
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="position: relative; padding: 10px">                   
                    <img src="{{asset("images/phim/$f->film_poster")}}" alt="" width="90%"> 
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" style="font-size: 120%">
                    <h2 style="margin-top: 10px;font-weight:bold;">
                        {{$f->film_title}} ({{$f->film_release_year}})
                    </h2>
                    <p><b> Hình thức:</b>
                        <span>{{$f->film_form==0?'Phim truyền hình':'Phim chiếu rạp'}}</span>
                    </p>
                    <p><b>Loại phim:</b>
                        <span >{{$f->film_cat}}</span>
                    </p>                 
                    <p><b>Quốc gia:</b>
                        <span>{{$f->film_nation}}</span>
                    </p>
                    <p><b>Thời lượng:</b>
                        <span >{{$f->film_runtime}}</span>
                    </p>
                    <p><b>Số tập:</b>
                        <span>{{$f->film_episode}}</span>
                    </p>
                    <p><b>Đạo diễn :</b>
                        <span><a href="{{asset("pages/film/celeb/$f->film_director")}}">{{$f->film_director?"$f->film_director":"Chưa cập nhật"}}</a></span>
                    </p>
                    <p><b> Diễn viên chính:</b>
                        <span ><a href="{{asset("pages/film/celeb/$f->film_actor")}}">{{$f->film_actor}}</a>,
                             <a href="{{asset("pages/film/celeb/$f->film_actress")}}">{{$f->film_actress}}</a><br></span>
                    </p>
                    <hr>
                    <!-- danh gia rate -->
                    <div class="stars" style="font-size: 90%">
                        <form action="{{url("pages/film/createRating")}}" method="post" enctype="multipart/form-data">
                            @csrf                           
                            <p id="vote-desc">Mời bạn cho điểm :</p>
                            @if ($message = Session::get('Loi'))
                                <div class="alert alert-info alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <input type="hidden" name="film_id" value="{{$f->film_id}}">
                            <input class="star star-5" id="star-5" type="radio" name="rate"  @if ((round($f->rate))=='5') checked @endif value="5"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="rate" @if ((round($f->rate))=='4') checked @endif value="4" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="rate" @if ((round($f->rate))=='3') checked @endif value="3"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="rate" @if ((round($f->rate))=='2') checked @endif value="2"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="rate" @if ((round($f->rate))=='1') checked @endif value="1"/>
                            <label class="star star-1" for="star-1"></label> <br>
                            <button type="submit" class="btn btn-info">Gửi đánh giá của bạn</button>                               
                        </form> 
                    </div>            
                        <p>(Đánh giá <b>{{round($f->rate,1)}}/5</b> từ <b>{{$count}}</b> thành viên)</p>
                                              
                </div>
            
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3 style='font-weight: bold;'>Tóm tắt</h3>
                    <br>
                    <p style="font-size: 125%">{{$f->film_synopsis}}</p><hr>
                    <h3 style='margin-bottom: 10px; font-weight: bold;'>Trailer</h3>
                    <iframe width="100%" height="500px" src="https://www.youtube.com/embed/{{$f->film_trailer}}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 10px 6px">
                    <h3 style='margin-top: 5%; font-weight: bold;text-align:center;'>Chủ đề phim</h3>
                    @if ($message = Session::get('alert'))
                    <div class="alert alert-info alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <form action="{{url('pages/film/mod_createTopic')}}" method="POST">@csrf
                        <input type="hidden" name="film_id" id="film_id" value="{{$f->film_id}}">
                        <button type="submit" class="btn btn-danger" style="margin-left:2rem" >Tạo chủ đề mới</button>
                    </form>
                    <hr>
                    @foreach ($f->topicApproved as $item)
                    <a href="{{url('pages/topic/detail/'.$item->topic_id)}}" title="">
                        <div class='col-xs-6 col-sm-4 col-md-4 col-lg-4'>
                            <img style="width: 100%; height:160px; " src="{{url('images/topic/'.$item->topic_poster)}}">
                            <b>{{$item->topic_title}}</b>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

        
        </div>
        </div>
        <!-- khung nhỏ ben phai -->
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