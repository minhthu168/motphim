<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  
 
 <div class="container-fluid" style="font-size:x-large">
    <nav class="navbar navbar-expand">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="<?php echo e(asset("images/logo.png")); ?>" alt=""></a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="<?php echo e(url('pages/home')); ?>">Trang chủ</a></li>
            <li><a href="#">Phim</a></li>
            <li><a href="<?php echo e(url('pages/topic/pagination')); ?>">Diễn đàn</a></li>
            <li><a href="#">Tin tức - Sự kiện</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo e(url('pages/signup')); ?>"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
            <li><a href="<?php echo e(url('pages/login')); ?>"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
          </ul>
        </div>
      </nav>
 </div>
 

 
 <div class="jumbotron-fluid">
    <!-- carousel -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active"><img src="../public/images/carousel_hacanhnoianh.jpg" alt="" style="display:block; margin-left:auto; margin-right:auto; width:50%"></div>
            <div class="item "><img src="" alt=""></div>
            <div class="item"><img src="" alt=""></div>
            <div class="item"><img src="" alt=""></div>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<br>
<div class="container">
    <h1 style="text-align: center; color:darkslateblue">TOP PHIM HAY</h1>
    <hr style="width:6%; text-align:center; color:gray; height: 0.5px; background-color: gray;">
    <div class="row">
        <div class="col-md-2"><img src="../public/images/phim/luongthehoan.jpg" alt="" class="logo" width="100%"></div>
        <div class="col-md-2"><img src="../public/images/phim/quantrangthanyeu.jpg" alt="" class="logo"  width="100%"></div>
        <div class="col-md-2"><img src="../public/images/phim/penthouse.jpg" alt="" class="logo"  width="100%"></div>
        <div class="col-md-2"><img src="../public/images/phim/mottactuongtu.jpg" alt="" class="logo" width="100%"></div>
        <div class="col-md-2"><img src="../public/images/phim/monghoidaithanh.jpg" alt="" class="logo" width="100%"></div>
        <div class="col-md-2"><img src="../public/images/phim/thanhxuantutaovi.jpg" alt="" class="logo" width="100%"></div>
        <div class="col-md-2"><img src="../public/images/phim/nhuyphuongphi.jpg" alt="" class="logo" width="100%"> </div>
        <div class="col-md-2"><img src="../public/images/phim/lalaland.jpg" alt="" class="logo" width="100%"></div>
        <div class="col-md-2"><img src="../public/images/phim/bobokinhtam.jpg" alt="" class="logo" width="100%"></div>
        <div class="col-md-2"><img src="../public/images/phim/chieudieu.jpg" alt="" class="logo" width="100%"></div>
        <div class="col-md-2"><img src="../public/images/phim/thiencoquyettran.jpg" alt="" class="logo" width="100%"></div>
        <div class="col-md-2"><img src="../public/images/phim/hacanhnoianh.jpg" alt="" class="logo" width="100%"></div>
    </div>
</div>
<br><br>
<div class="container">
    <h1 style="text-align: center;  color:darkslateblue">PHIM MỚI CẬP NHẬT</h1>
    <hr style="width:16%; text-align:center; color:gray; height: 0.5px; background-color: gray;">
    <div class="row">
        <div class="col-md-3"><img src="../public/images/phim/thanhtridoanhluy.jpg" alt="" class="img-thumbnail" width="100%"></div>
        <div class="col-md-3"><img src="../public/images/phim/mulan.jpg" alt="" class="img-thumbnail" width="100%"></div>
        <div class="col-md-3"><img src="../public/images/phim/teoem.jpg" alt="" class="img-thumbnail" width="100%">
        </div>
        <div class="col-md-3"><img src="../public/images/phim/TruyCau.jpg" alt="" class="img-thumbnail" width="100%"></div>
        <div class="col-md-3"><img src="../public/images/phim/tuoitrecuathangnam.jpg" alt="" class="img-thumbnail" width="100%"></div>
        <div class="col-md-3"><img src="../public/images/phim/vaemseden.jpg" alt="" class="img-thumbnail" width="100%"></div>
        <div class="col-md-3"><img src="../public/images/phim/yeutinh.jpg" alt="" class="img-thumbnail" width="100%"></div>
        <div class="col-md-3"><img src="../public/images/phim/bantraitoilaholy.jpg" alt="" class="img-thumbnail" width="100%"></div>
    </div>
</div>
<hr>
<br>

  <div class="panel panel-success" style="text-align: center; font-size:medium">
    <div class="panel-heading">All Rights Reserved © by Mot Phim - Tháng 7, 2021</div>
    <div class="panel-body">Mọt Phim - Không gian dành cho các mọt phim</div>
  </div> 
</body>
</html><?php /**PATH E:\xampp\htdocs\d03\resources\views/screen.blade.php ENDPATH**/ ?>