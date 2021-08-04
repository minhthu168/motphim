<!-- lưu tại /resources/views/product/create.blade.php -->
@extends('admin-layout.layout')
@section('title', 'celeb-detail')
@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-2 col-md-7">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="text-center">{{$c->celeb_name}}({{ $c->celeb_yob }})</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ url('admin/celeb/detail/' . $c->celeb_id) }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class=row>
                                    <div class="col-md-12">
                                        <img src="{{ asset("images/celeb/$c->celeb_image") }}" width="100%" height="500px">
                                    </div>   
                                    <div class="col-md-12">
                                        <b>ID:</b> {{ $c->celeb_id }}<br>
                                        <b>Tên:</b> {{ $c->celeb_name }}<br>
                                        <b>Năm sinh:</b> {{ $c->celeb_yob }}<br>
                                        <b>Nghề nghiệp:</b>
                                        @if ($c->celeb_type === 0)
                                            Đạo diễn
                                        @elseif (($item->celeb_type)=== 1)
                                            Diễn viên nam
                                        @else
                                            Diễn viên nữ
                                        @endif
                                    <br>
                                        <b>Thông tin:</b> {{ $c->profile }}<br>
                                        <br><br>
                                    </div>
                                </div>
                            </div><br>
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
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
