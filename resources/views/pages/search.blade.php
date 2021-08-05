@extends('web-layout.layout')
@section('title', 'home')
@section('main-section')
<div class="container">
  <h2>Có {{count($f)}} kết quả được tìm thấy</h2>
    <div class="row">     
        @foreach ($f as $item)
        <div class="col-xs-6 col-sm-6 col-md-3 col-md-3" style="padding:10px;">
          <a href="{{asset("pages/film/film_detail/$item->film_id")}}" title="" >
          <img src="{{asset("images/phim/$item->film_poster")}}" width="100%">
            <div class="name">
              <p class='name-vi'>{{$item->film_title}}</p>
              <p class='time-film'>{{$item->film_release_year}}</p>
          </div>
        </a>
        </div>        
        @endforeach
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 10px 6px">
            <hr>
            @foreach ($f as $item)
            @foreach ($item->topicApproved as $i)
            <div class="col-md-6" style="margin-bottom:20px;">
              <div class="col-xs-5 col-sm-5 col-md-4"><img src="{{url('images/topic/'.$i->topic_poster)}}" width="100%" height="120px" ></div>
              <div class="col-xs-7 col-sm-7 col-md-8">
              <a style="font-weight: bold;font-size:150%;" href="{{url('pages/topic/detail/'.$i->topic_id)}}">{{$i->topic_title}}</a>
              <p style="color: #888888">{{$i->topic_date}}</p>
              </div> 
            </div>
            @endforeach  
            @endforeach  
        </div>
    </div>
</div>
@endsection
