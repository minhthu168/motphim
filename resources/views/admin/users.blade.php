@extends('admin-layout.layout')
@section('title', 'admin-users')
@section('main-content')
    <div class="container-fluid">
        <table class="table table-hover table-striped" id="nguoidung">
            <br>
            <h2 style="color: goldenrod; font-weight: bold">DANH SÁCH NGƯỜI DÙNG</h2><br>
            @if ($message = Session::get('loi'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
            </div>
            @endif

            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Vai trò</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Năm sinh</th>
                    <th>Giới tính</th>
                    <th>Số bình luận</th>
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
                        <td>{{ $user->user_email }}</td>
                        <td>{{ $user->user_pass }}</td>
                        <td>{{ $user->user_yob }}</td>
                        <td>{{ $user->user_gender == 1 ? 'Nam' : 'Nữ' }}</td>
                        <td>{{ $user->comment }}</td>
                        <td>
                            <a class="btn btn-info" href="{{url('admin/changeaccounttype/'.$user->user_id)}}"><i class="fas fa-pencil-alt"></i>Thay đổi loại tài khoản</a>
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

@section('script-section')
<script>
    $(function(){
        $('#nguoidung').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>
@endsection