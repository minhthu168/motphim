<aside class="main-sidebar sidebar-dark-primary elevation-4">
 <!-- Brand Logo -->
 <a href="#" class="brand-link">
  <img src="{{asset("images/logo.png")}}" class="logo">
</a>
<style>
 .logo{
 margin-left:10%;
 width: 75%;
}
</style>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Session::get('user')->username}}
        </a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-film"></i>
                <p>
                  Phim
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/admin/film/index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách phim</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/film/approved')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Duyệt phim</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/film/category')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thể loại</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/film/nation')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Quốc gia</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/celeb/index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Đạo diễn - Diễn viên
                </p>
              </a>            
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/topic/')}}" class="nav-link">
                <i class="nav-icon fa fa-comment"></i>
                <p>
                  Chủ đề phim - Bình luận
                </p>
              </a>            
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/news/index')}}" class="nav-link">
                <i class="nav-icon fa fa-newspaper" aria-hidden="true"></i>
                <p>
                  Tin tức - Sự kiện
                </p>
              </a>            
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/users')}}" class="nav-link">
                <i class="nav-icon fa fa-user" aria-hidden="true"></i>
                <p>
                  Người dùng
                </p>
              </a>            
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/carousel/index')}}" class="nav-link">
                <i class="nav-icon fa fa-image" aria-hidden="true"></i>
                <p>
                  Ảnh Carousel
                </p>
              </a>            
            </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>