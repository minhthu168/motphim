<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@extends('web-layout.layout')
@section('title', 'topic-detail')
@section('main-section')

@if(session('alert'))
    <section class="alert alert-success" style="text-align:center; margin:auto">{{session('alert')}}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </section>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8" style="background:lightgray;">
            <h3 style="font-weight: bold; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; ">{{$detail->topic_title}}</h3>
            <p><span class="glyphicon glyphicon-user"></span> Đăng bởi {{$detail->nguoidang->username}} <span class="glyphicon glyphicon-calendar"></span> {{$detail->topic_date}}  
            <span class="glyphicon glyphicon-film"></span> Phim {{$detail->tenphim->film_title}} <span class="glyphicon glyphicon-eye-open"></span> {{$detail->topic_view}} lượt xem</p>
            <img style="width:100%; display:block; margin-left:auto; margin-right:auto" src="{{asset("images/topic/$detail->topic_poster")}}">
            <br><br>
            <div style="overflow: auto;font-size:110%">
                {{$detail->topic_content}}
            </div>
            <br>
            <div style="background-color: lightblue; padding: 3% 2%">
            <label style="font-size: large"> Bình luận</label>
            <form action="{{url('pages/topic/createComment')}}" method="POST"> @csrf
                <textarea class="form-control" style="background-color: ghostwhite; display:block; margin-left:auto; margin-right:auto" name="comment_content" id="comment_content" cols="50" rows="5" >Cảm nghĩ của bạn...</textarea>
                <br>
                <input type="hidden" name="topic_id" id="topic_id" value="{{$detail->topic_id}}">
                <button type="submit" class="btn btn-success" style="float:right">Gửi</button>
            </form>
           </div><br>
            @foreach($detail->binhluan as $cm)
            <div class="row">
                <div class="col-md-2" style="text-align: right">
                    <img width="70%" src="{{asset("images/iconuser.png")}}" >
                </div>
                <div class="col-md-10">
                    <p style="font-size: large; font-weight:bold">{{$cm->nguoidang->username}} <small>{{$cm->comment_date}}</small></p>       
                    <p style="font-size: medium">{{$cm->comment_content}}</p>
                    <br>        
                </div>
            </div>
            @endforeach
        </div>
        {{-- khung nho ben phai --}}
        <div class="col-md-4" style="background:rgb(217, 218, 203)">
            <div style="padding: 5px" >
                <h3><b>Chủ đề mới</b></h3>
                <hr>
                @foreach ($t as $item)
                <p style="font-size: 15px;">
                    <a href="{{asset("pages/topic/detail/$item->topic_id")}}">
                        <p style="color:blue;font-weight:bold">{{$item->topic_title}}</p>
                        <img style="width: 80%" src="{{asset("images/topic/$item->topic_poster")}}">
                    </a>
                </p>
                <hr>
                @endforeach 
                <a href="{{asset("pages/topic")}}"><span style="float:right; color:lightseagreen;font-weight:bold;font-size:1.5rem;">  >>Xem thêm</span></a>             
            </div>
        </div>
    </div>  
</div>
@endsection