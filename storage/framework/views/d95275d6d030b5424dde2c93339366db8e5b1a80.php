<nav class="navbar navbar-expand-sm" style="background-color:rgb(107, 245, 238);">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="<?php echo e(asset("images/logo.png")); ?>" alt="" class="logo"/></div>
  
    <style>
      li{
        font-weight: 200;
        font-size: 150%;
        font-family:Helvetica; 
        color:darkslateblue;
      }
      .logo{
        margin-left:15%;
        width: 75%;
      }
    </style>
    <ul class="nav navbar-nav navbar-left">
      <li class="nav"><a href="<?php echo e(url('pages/home')); ?>">Trang chủ</a></li>
      <li class="nav"><a href="<?php echo e(url('pages/film/film')); ?>">Phim</a></li>
      <li class="nav"><a href="<?php echo e(url('pages/topic/pagination')); ?>">Diễn đàn</a></li>
      <li class="nav"><a href="<?php echo e(url('pages/news')); ?>">Tin tức - Sự kiện</a></li>
      <li>
        <form action="<?php echo e(url('pages/search')); ?>" method="post" class="form-inline d-flex justify-content-center md-form form-sm active-pink-2 mt-2" role="search">
          <?php echo e(csrf_field()); ?>

            <div class="input-group">
                <!-- input-group-lg -->
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm ...">
                <div class="input-group-btn">
                  <button type="submit" class="btn"><i class="icon-search"></i></button>
                </div>
            </div>
        </form>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if($user = Session::get('user')): ?>
        <?php if($user->user_role==3): ?>
      <div class="dropdown">
        <button class="btn btn-sucess dropdown-toggle" type="button" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span> <?php echo e($user->username); ?>

          </button>
          <ul class="dropdown-menu">
            <li><a href="<?php echo e(url("pages/user/member/".$user->user_id)); ?>">Thông tin cá nhân</a></li>
            <li><a href="<?php echo e(url('pages/logout')); ?>">Đăng xuất</a></li>
          </ul>  
      </div>
        <?php elseif($user->user_role==2): ?>
        <div class="dropdown">
          <button class="btn btn-sucess dropdown-toggle" type="button" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span> <?php echo e($user->username); ?>

          </button>
          <ul class="dropdown-menu">
            <li><a href="<?php echo e(url('pages/user/mod/'.$user->user_id)); ?>">Thông tin cá nhân</a></li>
            <li><a href="<?php echo e(url('pages/film/create')); ?>">Tạo phim</a></li>
            <li><a href="<?php echo e(url('pages/film/filmModcreate/'.$user->user_id)); ?>">Phim của bạn</a></li>
            <li><a href="<?php echo e(url('pages/topicModcreate/'.$user->user_id)); ?>">Chủ đề của bạn</a></li>
            <li><a href="<?php echo e(url('pages/logout')); ?>">Đăng xuất</a></li>
          </ul>  
        </div>
        <?php endif; ?>
      <?php else: ?>
      <li><a href="<?php echo e(url('pages/signup')); ?>"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
      <li><a href="<?php echo e(url('pages/login')); ?>"><span class="glyphicon glyphicon-log-in"></span>Đăng nhập</a></li>      
      <?php endif; ?>
    </ul>
  </div>
</nav>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"><?php /**PATH E:\xampp\htdocs\d03\resources\views/web-layout/header.blade.php ENDPATH**/ ?>