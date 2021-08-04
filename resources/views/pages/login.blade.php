@extends('web-layout.layout')
@section('title', 'login')
<link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
@section('main-section')
<div class="row" style="margin: 10px;">
    <div class="col-md-4" style="margin: auto;">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h4 style="text-align: center;">Đăng nhập</h4>
            </div>
            <h3 style="color: red;">
                @if (session('message'))
                {{ session('message') }}
                @endif
            </h3>
            <!-- /.card-header -->
            <form role="form" action="{{url('pages/checklogin')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Nhập tên: </label>
                        <input class="form-control" type="text" name="username" id="username" required value="Phuc">
                    </div>

                    <div class="form-group">
                        <label>Mật khẩu: </label>
                        <input type="password" name="user_pass" id="user_pass" class="form-control" required value="123">
                    </div>                                          
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning" value="btok">Đăng nhập</button>
                    <button type="reset" class="btn btn-info">Thiết lập lại</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>      
</div>
@endsection
<style>
      .footer {
        width: 100%;
        text-align: center;
        position: fixed;
        bottom: 0%;
        margin-top: 50%;
    }
</style>    