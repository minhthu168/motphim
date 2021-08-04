@extends('web-layout.layout')
@section('title','signup')
@section('main-section')
<div class="row" style="margin: 10px;">
    <div class="col-md-4" style="margin: auto;">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h4 style="text-align: center;">Đăng Ký</h4>
            </div>
            <h3 style="color: red;">
                @if (session('message'))
                {{ session('message') }}
                @endif
            </h3>
            <!-- /.card-header -->
            <form role="form" action="{{url("pages/post")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label>Tên thành viên</label>
                    <input type="text" name="username" id="username" required value="tam" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="user_pass" id="user_pass" required value="abc" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="user_email" id="user_email" required class="form-control" value="tam@gmail.com">
                </div>

                <div class="form-group">
                    <label>Giới tính</label><br>
                    <div style="padding-left:8%">
                    <input type="radio" name="user_gender" id="user_gender" value="0" checked>nữ <br>
                    <input type="radio" name="user_gender" id="user_gender" value="1">nam
                    </div>
                </div>

                <div class="form-group">
                    <label>Năm sinh</label>
                    <input type="number" name="user_yob" id="user_yob" required class="form-control" value="2005">
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger" value="btok">Đồng ý</button>
                    <button type="reset" class="btn btn-info">Thiết lập lại</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>      
</div>
@endsection    