@extends('web-layout.layout')
<link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
@section('title', 'member')
@section('main-section')
<div class="row" style="margin: 10px;">
    <div class="col-md-5" style="margin: auto;">
        <!-- general form elements -->
        <div class="card card-info">
            <div class="card-header">
                <h4 style="text-align: center;">THÀNH VIÊN</h4>
            </div>
            <!-- /.card-header -->
            <form role="form">
                <div class="card-body"> 
                <div class="form-group">
                    <label>Tên thành viên</label>
                    <input class="form-control" type="text" name="username" id="username" readonly
                    value="{{$user->username}}">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="text" name="user_pass" id="user_pass" readonly class="form-control"
                    value="{{$user->user_pass}}">
                    <a style="text-decoration: underline; font-size:medium" href="{{url('pages/changePassword')}}">Đổi mật khẩu</a>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="user_email" id="user_email" readonly class="form-control"
                    value="{{$user->user_email}}">
                </div>
                <div class="form-group">
                    <label>Giới tính</label>
                    <input type="text" name="user_gender" id="user_gender" readonly class="form-control"
                    value="{{$user->user_gender?"Nam":"Nữ"}}">
                </div>
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
@endsection