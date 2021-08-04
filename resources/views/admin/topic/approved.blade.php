@extends('admin-layout.layout')
@section('title','topic-approved')
@section('main-content')
<div class="container-fluid">
    <br>
    <h2 style="color: goldenrod; font-weight: bold">DANH SÁCH CHỦ ĐỀ PHIM CHỜ DUYỆT</h2>
    <a href="{{url('admin/topic')}}"><button type="submit" class="btn btn-warning">Về trang chủ đề phim</button></a>
    <br><br>
    <table class="table table-hover table-striped " id="topic" style="padding:10px">
        <thead class="table-success">
            <tr class="text-center">
                <th>ID</th>
                <th style="width:30%">Tiêu đề</th>
                <th>Hình ảnh</th>
                <th>Ngày đăng</th>           
                {{-- <th>Người đăng</th> --}}
                <th>Tên phim</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($ds as $item )
            <tr class="text-center">
                <td> {{$item->topic_id}} </td>
                <td> {{$item->topic_title}}</td>
                <td> <img src="{{asset("images/topic/$item->topic_poster")}}" width="100%"> </td>
                <td width="15%"> {{$item->topic_date}}</td>
                <td width="20%">{{$item->tenphim->film_title}}</td>
                <td width="20%">
                    <a class="btn btn-primary btn-sm" href="{{url('admin/topic/view/'.$item->topic_id)}}">
                        <i class="fas fa-eye"></i> Xem
                    </a>
                    <a class="btn btn-primary btn-sm" href="{{url('admin/topic/approved/'.$item->topic_id) }}">
                        <i class="fas fa-folder"></i> Duyệt
                    </a>
                    <a class="btn btn-info btn-sm" href="{{url('admin/topic/edit/'.$item->topic_id) }}">
                        <i class="fas fa-pencil-alt"></i> Sửa
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{url("admin/topic/approved/{$item->topic_id}") }}" onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa không ?')">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script-section')
<script>
    $(function () {
        $('#topic').DataTable({
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