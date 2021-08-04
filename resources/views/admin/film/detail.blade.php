<!-- lưu tại /resources/views/product/create.blade.php -->
@extends('admin-layout.layout')
@section('title','film-create new')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-2 col-md-7">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="text-center" >{{ $f->film_title }}({{ $f->film_release_year}})</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('admin/film/detail/'.$f->film_id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class=row>
                                <div class="col-md-4">
                                    <img src="{{asset("images/phim/$f->film_poster")}}" alt="" width="100%"> 
                                </div>
                                <div class='col-md-6' style="padding-left:80px;">
                                    <span><b>ID Phim:</b> {{ $f->film_id }}</span><br>
                                    <span><b>Tên Phim:</b> {{ ($f->film_title) }}</span><br>
                                    <span><b>Năm phát hành:</b> {{ $f->film_release_year}}</span><br>
                                    <span><b>Quốc gia:</b> {{ $f->film_nation}}</span><br>
                                    <span><b>Thể loại:</b> {{$f->film_form==0?'Phim truyền hình':'Phim chiếu rạp'}}, {{$f->film_cat}}</span><br>
                                    <span><b>Đạo diễn Phim:</b> {{$f->film_director}}</span><br>
                                    <span><b>Nam diễn viên chính:</b> {{$f->film_actor?$f->film_actor:"Chưa cập nhật"}}</span><br>
                                    <span><b>Nữ diễn viên chính:</b> {{$f->film_actress?$f->film_actress:"Chưa cập nhật"}}</span><br>
                                    <span><b>Số tập:</b> {{$f->film_episode}}</span><br>
                                    <span><b>Thời Lượng:</b> {{$f->film_runtime}}</span><br>
                                    <span><b>Đánh giá :</b> {{$f->rate}}/5</span><br>
                                </div>
                            </div>
                            <div style="margin: 3%;">
                                <b>Tóm tắt:</b>
                                <p>{{$f->film_synopsis}}<p>
                                <p><b>Trailer:</b></p>
                               <iframe width="100%" height="430" src="https://www.youtube.com/embed/{{$f->film_trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen enctype="multipart/form-data"></iframe>
                            </div><br>
                            
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="javascript:history.back()" class="btn btn-info">Quay lại</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
@section('script-section')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
@endsection