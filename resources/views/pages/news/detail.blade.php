<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@extends('web-layout.layout')
@section('title', 'news-detail')
@section('main-section')
<div class="container" style="overflow: hidden;background:lightgray;">
    <div class="row">
        <div class='col-xs-12 col-sm-8 col-md-8 col-lg-9' style="padding:10px;background:rgb(241, 240, 240);">
           <h1 style="color:black;font-weight:bold">{{$news->news_subject}}</h1> 
           <p style="font-size:150%">Ngày đăng: {{$news->news_date}}</p>
           <img src="{{asset("images/news-event/$news->news_image")}}" width="90%">
           <br>
           <p style="font-family:Cambria
           ; font-size:145%;padding:4% 0;">{{$news->news_content}}</p>            
        </div>
       
        <!-- khung nhỏ ben phai -->
        <div class="col-sm-4 col-md-4 col-lg-3" style="background:rgb(217, 218, 203); ">
            <div class="pc" style="padding: 5px;" >
                <h3 style="margin-top: 0px; margin-bottom: 0px"><b>Tin hot</b></h3>
                <hr>
                @foreach ($ds as $item)
                <p style="font-size: 15px;">
                    <a href="{{asset("pages/news/detail/$item->news_id")}}">
                        <p style="font-weight:bold;font-size:150%">{{$item->news_subject}}</p>
                        <img style="width: 60%; height:90px; " src="{{asset("images/news-event/$item->news_image")}}">
                    </a>
                </p>
                <hr>
                @endforeach 
                <a href="{{asset("pages/news")}}"><span style="float:right; color:lightseagreen;font-weight:bold;font-size:1.5rem;">  >>Xem thêm</span></a>             
            </div>

        </div>
    
    </div>
</div>
@endsection