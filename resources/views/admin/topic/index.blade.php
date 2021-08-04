@extends('admin-layout.layout')
@section('title','topic-index')
@section('main-content')
<br>
<h2 style="color: goldenrod; font-weight: bold;text-align:center;">DANH SÁCH CHỦ ĐỀ PHIM</h2>
<a href="{{url('admin/topic/approved')}}"><button type="submit" class="btn btn-primary">Duyệt chủ đề phim</button></a>
<br><br>
<table class="table table-hover table-striped" id="topic">
    <thead class="table-success">
        <tr>
            <th>ID</th>
            <th style="text-align: center">Tiêu đề</th>
            <th>Hình ảnh</th>
            <th style="width:10%">Ngày đăng</th>
            <th>Tên phim</th>
            <th style="text-align: center">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ds as $item)
        <tr>
            <td>{{$item->topic_id}}</td>
            <td style="width:40%">{{$item->topic_title}}</td>
            <td><img src="{{asset("images/topic/$item->topic_poster")}}" class="pic-in-list"></td>
            <td>{{$item->topic_date}}</td>
            <td>{{$item->tenphim->film_title}}</td>
            <td style="width:20%">
                <a class="btn btn-primary btn-sm" href="{{url('admin/topic/view/'.$item->topic_id)}}">
                    <i class="fas fa-eye">
                    </i>
                Xem   
                </a>
                <a class="btn btn-info btn-sm" href="{{url('admin/topic/edit/'.$item->topic_id)}}">
                    <i class="fas fa-pencil-alt">
                    </i>
                Sửa    
                </a>
                <a class="btn btn-danger btn-sm" href="{{url('admin/topic/delete/'.$item->topic_id)}}" onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa không ?')">
                    <i class="fas fa-trash">
                    </i>
                Xóa    
                </a>  
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('script-section')
<script>
    $(function(){
        $('#topic').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
        });
    });
</script>
@endsection
