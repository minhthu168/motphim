@extends('admin-layout.layout')
@section('title','film-index')
@section('main-content')
<div class="container-fluid">
<br>
<h2 style="color: goldenrod; font-weight: bold">DANH SÁCH PHIM </h2>
<a href="{{url('admin/film/create')}}"><button type="submit" class="btn btn-success">Tạo Phim Mới</button></a>
<a href="{{url('admin/film/approved')}}"><button type="submit" class="btn btn-primary">Duyệt Phim</button></a>
<br><br>
@if ($count = Session::get('count'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Phim này có {{$count}} chủ đề .Bạn không thể xóa!</strong>
            </div>
@endif
<table class="table table-hover table-striped " id="film">
    <thead class="table-success">
        <tr class="text-center">
            <th> ID Phim</th>
            <th>Poster</th>
            <th>Tên Phim</th>
            <th>Năm</th>
            <th>Quốc gia</th>           
            <th>Thể loại</th>
            <th>Thời lượng</th>
            <th>Số tập</th>
            <th >Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ds as $item )
            <tr class="text-center">
                <td> {{$item->film_id}} </td>
                <td> <img src="{{asset("images/phim/$item->film_poster")}}" width="35%" > </td>
                <td> {{$item->film_title}}</td>
                <td> {{$item->film_release_year}}</td> 
                <td> {{$item->film_nation}}</td>             
                <td> {{$item->film_cat}}</td>
                <td> {{$item->film_runtime}}</td>
                <td> {{$item->film_episode}}</td>
                <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="{{url('admin/film/detail/'.$item->film_id)}}">
                        <i class="fas fa-eye"></i> Xem
                    </a>
                    <a class="btn btn-info btn-sm" href="{{url('admin/film/edit/'.$item->film_id)}}">
                        <i class="fas fa-pencil-alt"></i> Sửa
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{url("admin/film/index/{$item->film_id}")}}" onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa không ?')">
                        <i class="fas fa-trash"></i> Xóa
                    </a><br>
                    <a class="btn btn-warning btn-sm" href="{{url('admin/topic/create/'.$item->film_id)}}">
                        <i class="fas fa-folder"></i> Thêm chủ đề phim mới
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
        $('#film').DataTable({
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