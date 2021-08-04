<!-- lưu tại /resources/views/product/create.blade.php -->
@extends('admin-layout.layout')
@section('title','film-edit')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Đổi ảnh {{$c->carousel_name}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url("admin/carousel/editPost/$c->carousel_id")}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên Ảnh</label>
                                <input type="text" class="form-control" id="carousel_name" name="carousel_name"
                                value="{{$c->carousel_name}}">
                            </div>
                            <div class="form-group">
                                <p><label for="image">Ảnh</label><p>
                                <img class="img-fluid" width="100%" src="{{url("images/carousel/$c->carousel_image") }}"/><br><br>
                                 <div class="input-group">
                                     <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="carousel_image" name="carousel_image">
                                        <label class="custom-file-label" for="image">{{$c->carousel_image}}</label>
                                    </div>
                                </div>
                            </div>                  
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger">Đổi</button>
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