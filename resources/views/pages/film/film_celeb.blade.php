@extends('web-layout.layout')
@section('title', 'film-detail')
@section('main-section')
<div class="container" style="background-color:rgb(241, 240, 240);padding:10px;">
    <div class="row" style="margin: 10px;font-size:120%">
        @foreach ($c as $item)
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="position: relative; padding: 10px">                   
                <img src="{{asset("images/celeb/$item->celeb_image")}}" alt="" width="70%"> 
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" >
                <h1 style="margin-top: 10px;font-size: 2.5rem;font-weight:bold;">{{$item->celeb_name}}</h1>
                <p><b>Sinh năm:</b>
                    <span >{{$item->celeb_yob}}</span>
                </p>                 
                <p><b>Nghề Ngiệp:</b>
                    <span>@if ($item->celeb_type === 0)
                        Đạo diễn
                        @elseif (($item->celeb_type)=== 1)
                        Diễn viên nam
                        @else
                        Diễn viên nữ
                        @endif
                    </span>
                </p>
                <p><b>Hồ sơ cá nhân:</b>
                    <span>{{$item->profile}}</span>
                </p>
            </div>
            @endforeach
        <br>
    </div>
</div>
@endsection