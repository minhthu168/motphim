@extends('admin-layout.layout')
@section('title','news-index')
@section('main-content')
<br>
<h2 style="color: goldenrod; font-weight: bold">DANH SÁCH TIN TỨC - SỰ KIỆN</h2>
<div>
    <a href="{{url('admin/news/create') }}"><button type="submit" class="btn btn-primary">Thêm tin tức- sự kiện</button></a>
</div>
<br><br>
<table class="table table-hover table-striped" id="news">
    <thead class="table-success">
        <tr>
            <th>ID</th>
            <th>Ngày đăng</th>
            <th style="text-align: center">Tiêu đề</th>
            <th style="text-align: center">Nội dung</th>
            <th style="text-align: center">Hình ảnh</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ds as $item)
        <tr>
            <td>{{$item->news_id}}</td>
            <td width="9%">{{$item->news_date}}</td>
            <td width="20%">{{$item->news_subject}}</td>
            <td>{{substr($item->news_content,0,400)}}</td>
            <td><img src="{{asset("images/news-event/$item->news_image")}}" width="80%"></td>
            <td width="5%">
                <a class="btn btn-primary btn-sm" href="{{url('admin/news/detail/'.$item->news_id)}}">
                    <i class="fas fa-eye">
                    </i>
                Xem   
                </a>
                <a class="btn btn-info btn-sm" href="{{url('admin/news/edit/'.$item->news_id)}}">
                    <i class="fas fa-pencil-alt">
                    </i>
                Sửa    
                </a>
                <a class="btn btn-danger btn-sm" href="{{url('admin/news/index/'.$item->news_id)}}" onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa không ?')">
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
        $('#news').DataTable({
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