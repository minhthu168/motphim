<nav class="navbar navbar-expand-sm" style="background-color:#b3e6a4">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="{{asset("images/logo.png")}}" alt="" class="logo"/></div>
  
    <style>
      li{
        font-weight: 300;
        font-size: 130%;
        font-family:Helvetica; 
        color:darkslateblue;
      }
      .logo{
        margin-left:15%;
        width: 75%;
      }
    </style>
    <ul class="nav navbar-nav navbar-left">
      <li class="nav"><a href="{{url('pages/home')}}">Trang chủ</a></li>
      <li class="nav"><a href="{{url('pages/film/film')}}">Phim</a></li>
      <li class="nav"><a href="{{url('pages/topic/pagination')}}">Diễn đàn</a></li>
      <li class="nav"><a href="{{url('pages/news')}}">Tin tức - Sự kiện</a></li>
      <li>
        <form action="{{ url('pages/search') }}" method="post" class="form-inline d-flex justify-content-center md-form form-sm active-pink-2 mt-2" role="search">
          {{ csrf_field() }}
            <div class="input-group">
                <!-- input-group-lg -->
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm ..." required>
                <div class="input-group-btn">
                  <button type="submit" class="btn"><i class="icon-search"></i></button>
                </div>
            </div>
        </form>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      @if ($user = Session::get('user'))
        @if($user->user_role==3)
      <div class="dropdown">
        <button class="btn btn-sucess dropdown-toggle" type="button" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span> {{$user->username}}
          </button>
          <ul class="dropdown-menu">
            <li><a href="{{url("pages/user/member/".$user->user_id)}}">Thông tin cá nhân</a></li>
            <li><a href="{{url('pages/logout')}}">Đăng xuất</a></li>
          </ul>  
      </div>
        @elseif($user->user_role==2)
        <div class="dropdown">
          <button class="btn btn-sucess dropdown-toggle" type="button" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span> {{$user->username}}
          </button>
          <ul class="dropdown-menu">
            <li><a href="{{url('pages/user/mod/'.$user->user_id)}}">Thông tin cá nhân</a></li>
            <li><a href="{{url('pages/film/create')}}">Tạo phim</a></li>
            <li><a href="{{url('pages/film/filmModcreate/'.$user->user_id)}}">Phim của bạn</a></li>
            <li><a href="{{url('pages/topicModcreate/'.$user->user_id)}}">Chủ đề của bạn</a></li>
            <li><a href="{{url('pages/logout')}}">Đăng xuất</a></li>
          </ul>  
        </div>
        @endif
      @else
      <li><a href="{{url('pages/signup')}}"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
      <li><a href="{{url('pages/login')}}"><span class="glyphicon glyphicon-log-in"></span>Đăng nhập</a></li>      
      @endif
    </ul>
  </div>
</nav>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">