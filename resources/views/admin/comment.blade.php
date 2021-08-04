@extends('admin-layout.layout')
@section('title', 'admin-comment')
@section('main-content')
    <div class="container">
        <table class="table table-hover table-striped">
            <br>
            <h2 style="color: goldenrod; font-weight: bold">DANH SÁCH BÌNH LUẬN</h2><br>
            {{-- @if ($message = Session::get('loi'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
            </div>
            @endif --}}

            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Vai trò</th>
                    <th>Tên</th>
                    <th>Số bình luận</th>
                    <th>Chi tiết</th>
                    <th colspan="2">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ds as $user)
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>
                            @if ($user->user_role === 1)
                                Admin
                            @elseif (($user->user_role)===2)
                                Mod
                            @else
                                Member 
                            @endif
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->comment }}</td>
                        {{-- <td>{{$user->binhluan->comment_content}}</td> --}}
                        <td>
                            <a class="btn btn-danger" href="{{url('admin/delete/'.$user->user_id)}}"
                            onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa tài khoản này ?')"><i class="fas fa-trash"></i>
                            Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection