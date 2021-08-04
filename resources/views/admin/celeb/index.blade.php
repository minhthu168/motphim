@extends('admin-layout.layout')
@section('title', 'celeb-index')
@section('main-content')
    <br>
    <h2 style="color: goldenrod; font-weight:bold">DANH SÁCH NGƯỜI NỔI TIẾNG</h2>
    <div>
        <a href="{{ url('admin/celeb/create') }}"><button type="submit" class="btn btn-primary">Thêm người nổi tiếng</button></a>
    </div>
    <br>
    <table class="table table-hover table-striped " id="celeb">
        <thead class="table-success">
            <tr>
                <th>ID </th>
                <th>Nghề nghiệp </th>
                <th style="text-align:center">Tên </th>
                <th>Năm sinh</th>
                <th style="text-align:center">Thông tin</th>
                <th style="text-align:center">Hình ảnh</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ds as $item)
                <tr>
                    <td> {{ $item->celeb_id }} </td>
                    <td>
                        @if ($item->celeb_type === 0)
                            Đạo diễn
                        @elseif (($item->celeb_type)=== 1)
                            Diễn viên nam
                        @else
                            Diễn viên nữ
                        @endif
                    </td>
                    <td style="width:15%"> {{ $item->celeb_name }}</td>
                    <td> {{ $item->celeb_yob }}</td>
                    <td style="width:50%"> {{substr($item->profile,0,900)}}</td>
                    <td> <img src="{{ asset("images/celeb/$item->celeb_image") }}" width="100%" height="150px"> </td>

                    <td style="width:5%">
                        <a class="btn btn-primary btn-sm" href="{{ url('admin/celeb/detail/' . $item->celeb_id) }}">
                            <i class="fas fa-folder"></i> Xem
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ url('admin/celeb/edit/' . $item->celeb_id) }}">
                            <i class="fas fa-pencil-alt"></i> Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{ url("admin/celeb/index/{$item->celeb_id}") }}"
                            onclick="javascript:return confirm('Bạn chắc chắn muốn xóa {{$item->celeb_name}} ?')">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>


@endsection

@section('script-section')
    <script>
        $(function() {
            $('#celeb').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

@endsection
