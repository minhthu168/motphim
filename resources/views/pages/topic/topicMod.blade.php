@extends('web-layout.layout')
@section('title', 'home')
@section('main-section')
<div class="container">
    <h2 style="font-weight:bold; text-align:center; color:rgb(241, 239, 234)">DANH SÁCH CHỦ ĐỀ BẠN ĐÃ TẠO</h2>
    <hr style="width:16%; text-align:center; color:gray; height: 0px; background-color: gray;">
    <div class="row" >
      @foreach ($t as $item)
      <div class="col-md-6" style="margin-bottom:20px;">
        <div class="col-xs-5 col-sm-6 col-md-6"><img src="{{url('images/topic/'.$item->topic_poster)}}" width="100%" height="200px" ></div>
        <div class="col-xs-7 col-sm-6 col-md-6">
        <a style="font-weight: bold;font-size:150%;" href="">{{$item->topic_title}}</a>
        <p style="color: #ebdcdc">{{$item->topic_date}}</p>
        <button class="btn btn-warning">{{($item->approved==1)?'Đã duyệt':'Đang chờ duyệt'}}</button>
        </div> 
      </div>
      @endforeach       
  </div>
</div>
@endsection