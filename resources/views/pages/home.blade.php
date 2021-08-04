<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@extends('web-layout.layout')
@section('title', 'home')
@section('main-section')
<div class="md-col-12">
    <div id="myCarousel" class="carousel slide"><br>
        <style>
            /* Make the image fully responsive */
            #myCarousel{
                width:100%;
                margin:auto;
            }
            .carousel-inner img {
              width: 100%;
              height: 50%;
            }
            .carousel-inner{
                width:100%;
            }
            .carousel-control-prev,.carousel-control-next{
                margin: auto;
            }
            .carousel-caption{
              color:black;
              font-size:2rem;
            }
            </style>
        <!-- The slideshow -->
        <div class="carousel-inner">
          @foreach ($c as $item)         
            <div class="carousel-item  @if($item->carousel_id==1) active @endif ">
              <img src="{{asset("images/carousel/$item->carousel_image")}}" >
              <div class="carousel-caption">
                <h3>{{$item->carousel_name}}</h3>
              </div>
            </div>
          @endforeach
        </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
      </div>
      
      <script>
      $(document).ready(function(){
        // Activate Carousel
        $("#myCarousel").carousel();
        // Enable Carousel Controls
        $(".carousel-control-prev").click(function(){
          $("#myCarousel").carousel("prev");
        });
        $(".carousel-control-next").click(function(){
          $("#myCarousel").carousel("next");
        });
      });
      </script>
    </div>
</div>

    <br>
    <div class="container-fluid">
      <div class="container">
          <h2 style="font-weight:bold; text-align:center; color:white">PHIM MỚI CẬP NHẬT</h2>
          <hr style="width:10%; text-align:center; color:gray; height: 0px; background-color: gray;">
          <div class="row" style="background-color:lightgray;">
              @foreach ($ds as $item)
              <div class="col-xs-6 col-sm-6 col-md-3" style="padding:10px;">
                <a href="{{asset("pages/film/film_detail/$item->film_id")}}" title="" >
                <img src="{{asset("images/phim/$item->film_poster")}}" width="100%">
                  <div class="name">
                    <p class='name-vi' style="font-size:120%">{{$item->film_title}}</p>
                    <p class='time-film' style="font-size:120%">{{$item->film_release_year}}</p>
                </div>
              </a>
              </div>        
              @endforeach
            <a href="{{asset("pages/film/film")}}"><span style="float:right; color:lightseagreen;font-weight:bold;font-size:1.5rem;">  >>Xem thêm</span></a>
          </div>
      </div>
      <br><br>
      <div class="container-fluid">
          <h2 style="font-weight:bold; text-align:center; color:white">CHỦ ĐỀ MỚI</h2>
          <hr style="width:16%; text-align:center; color:gray; height: 0px; background-color: gray;">
          <div class="row" style="background-color:lightgray;padding:10px;" >
            @foreach ($t as $item)
            <div class="col-md-6" style="margin-bottom:20px;">
              <div class="col-xs-5 col-sm-5 col-md-4"><img src="{{url('images/topic/'.$item->topic_poster)}}" width="100%" height="120px" ></div>
              <div class="col-xs-7 col-sm-7 col-md-8">
              <a style="font-weight: bold;font-size:150%;" href="">{{$item->topic_title}}</a>
              <p style="color: #576069">{{$item->topic_date}}</p>
              </div> 
            </div>
            @endforeach       
        </div>
      </div>
      <br>
    </div>
  @endsection  