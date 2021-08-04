@extends('web-layout.layout')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@section('title', 'home')
@section('main-section')
<div class="container" style="background-color: lightgray">
    <h2 style="font-weight:bold; text-align:center; color:rgb(212, 167, 61) ">TIN HOT</h2>
    <div class="row" style="padding:10px;">
        
        @foreach ($ds as $item)
        <div class="col-md-6" style="padding: 2%;font-family:Cambria;font-size:150%;">
            <div class="col-xs-5 col-sm-5 col-md-5"><img src="{{asset("images/news-event/$item->news_image")}}" width="100%"></div>
            <div class="col-xs-7 col-sm-7 col-md-7">
            <a style="font-weight: bold;" href="{{asset("pages/news/detail/$item->news_id")}}">{{$item->news_subject}}</a>
            <p style="color: #888888">{{$item->news_date}}</p>
            </div> 
        </div>
        <hr>      
        @endforeach     
        <div style="float:right;font-weight:bold;font-size:1.5rem;">
            <p> {!! $ds->links() !!}</p>
        </div>   
    </div>
</div>
@endsection