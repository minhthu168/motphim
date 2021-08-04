<!-- lưu tại /resources/views/product/create.blade.php -->
@extends('admin-layout.layout')
@section('title', 'celeb-create new')
@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 style="text-align: center;">THÊM MỚI </h4>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if ($message = Session::get('loi'))
                            <div class="alert alert-info alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <form role="form" action="{{ url('admin/celeb/createPost') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Nghề nghiệp:</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="celeb_type" id="celeb_type" value="0"> Đạo diễn
                                        <input type="radio" name="celeb_type" id="celeb_type" value="1"> Diễn viên nam
                                        <input type="radio" name="celeb_type" id="celeb_type" value="2"> Diễn viên nữ
                                    </div>

                                    <div class="form-group">
                                        <label>Tên </label>
                                        <input type="text" class="form-control" id="celeb_name" name="celeb_name"
                                            placeholder="Nhập tên">
                                    </div>

                                    <div class="form-group">
                                        <label>Năm sinh :</label> <br>
                                        <input type="number" name="celeb_yob" id="celeb_yob" required class="form-control"
                                            placeholder="Nhập năm sinh" min="1900" max="2100">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Ảnh </label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="celeb_image"
                                                    name="celeb_image" required>
                                                <label class="custom-file-label" for="image">Chọn ảnh </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Thông tin </label>
                                        <textarea class="form-control" rows="6" name="profile"
                                            placeholder="Nhập thông tin vào đây" ></textarea>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="javascript:history.back()" class="btn btn-primary">Quay lại</a>
                                    <button type="submit" class="btn btn-danger">Đồng ý</button>
                                </div>
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
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
