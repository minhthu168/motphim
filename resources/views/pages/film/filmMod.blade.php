@extends('web-layout.layout')
@section('title', 'home')
@section('main-section')
<div class="container">
  <h2 style="font-weight:bold; text-align:center; color:rgb(241, 239, 234) ">DANH SÁCH PHIM BẠN ĐÃ TẠO</h2>
    <div class="row">
        @foreach ($f as $item)
        <div class="col-xs-6 col-sm-6 col-md-2 col-md-2" style="padding:10px;">
          <a href="{{asset("pages/film/film_detail/$item->film_id")}}" title="" >
          <img src="{{asset("images/phim/$item->film_poster")}}" width="100%">
            <div class="name">
              <p class='name-vi'>{{$item->film_title}}</p>
              <p class='time-film'>{{($item->approved==1)?'Đã duyệt':'Đang chờ duyệt'}}</p>
          </div>
        </a>
        </div>        
        @endforeach
    </div>
</div>
@endsection