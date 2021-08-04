<!-- lưu tại /resources/views/product/create.blade.php -->
@extends('admin-layout.layout')
@section('title','celeb-edit')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật thông tin người nổi tiếng: {{$c->celeb_name}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('admin/celeb/editPost/'.$c->celeb_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label >ID </label>
                                <input type="text" class="form-control" id="celeb_id" name="celeb_id" value="{{$c->celeb_id}}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Nghề nghiệp:</label>
                                <div class="custom-control custom-radio"> 
                                    <input name="celeb_type" type="radio" value="0" @if(($c->celeb_type)=='0') checked
                                    @endif>Đạo diễn <br>
                                    <input name="celeb_type"  type="radio" value="1" @if (($c->celeb_type)=='1') checked
                                    @endif/>Diễn viên nam <br>
                                    <input name="celeb_type"  type="radio" value="2" @if (($c->celeb_type)=='2') checked
                                    @endif/>Diễn viên nữ
                                    </div>

                                <div class="form-group">
                                    <label>Tên </label>
                                    <input type="text" class="form-control" id="celeb_name" name="celeb_name"
                                    value="{{$c->celeb_name}}">
                                </div>

                                <div class="form-group">
                                    <label>Năm sinh :</label> <br>
                                    <input type="number" name="celeb_yob" id="celeb_yob" required class="form-control"
                                    value="{{$c->celeb_yob}}">
                                </div>

                                <div class="form-group">
                                    <p><label for="">Ảnh </label><p>
                                    <img class="img-fluid" width="300px" src="{{url("images/celeb/$c->celeb_image")}}"/><br><br>
                                     <div class="input-group">
                                         <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="celeb_image" name="celeb_image">
                                            <label class="custom-file-label" for="">{{$c->celeb_image}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Thông tin </label>
                                    <textarea class="form-control" rows="6" name="profile"
                                    >{{$c->profile}}</textarea>
                                </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="javascript:history.back()" class="btn btn-info">Quay lại</a>
                            <button type="submit" class="btn btn-danger">Cập nhật</button>
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