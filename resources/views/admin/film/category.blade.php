@extends('admin-layout.layout')
@section('title','film-index')
@section('main-content')
<div class="container-fluid" style="padding: 40px;">
    <div class="row">
    <div class=col-md-5>
    @if ($message = Session::get('loi'))
                    <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                    </div>
                    @endif
        <form action="{{ url('admin/film/category/createCat') }}" method="post" style="border:gray ridge 1px; padding:30px;margin:40px;">
            {{ csrf_field() }}
            <h3 style="text-align:center;color:blue;">Thêm thể loại mới</h3>
                    
            <div class="form-group">
                <label>Tên thể loại mới</label>
                <input type="text" class="form-control" id="cat_name" name="cat_name">
            </div>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
        <form action="{{ url('admin/film/category/editCat') }}" method="post" style="border:gray ridge 1px; padding:30px;margin:40px;">
            {{ csrf_field() }}
            <h3 style="text-align:center;color:blue;">Sửa tên thể loại</h3>
                @if ($message = Session::get('Loi'))
                <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
                </div>
                @endif
            <div class="form-group">
                <label>Chọn tên thể loại cần sửa</label>                        
                    <select class="form-control select" style="width: 100%;" id="cat_id" name="cat_id" required>
                      @foreach ($cat as $item)
                      <option value="{{$item->cat_id}}">{{$item->cat_name}}</option>
                      @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label>Tên mới thể loại</label>
                <input type="text" class="form-control" id="cat_name" name="cat_name">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    <div class=col-md-5 style="padding-left:100px;">
<table class="table table-hover table-bordered">
    <h2 style="color:blue;">TẤT CẢ THỂ LOẠI PHIM</h2>
    <thead class="table-warning">
        <tr class="text-center">
            {{-- <th> ID Phim</th> --}}
            <th>ID</th>
            <th>Tên thể loại</th>
            <th >Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cat as $item )
            <tr class="text-center">
                <td> {{$item->cat_id}}</td>
                <td> {{$item->cat_name}}</td> 
                <td class="text-center">
                    <a class="btn btn-warning btn-sm" href="{{ url("admin/film/category/{$item->cat_id}") }}" 
                        onclick="javascript:return confirm(' Bạn có chắc muốn xóa không?')">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                </td>
            </tr>
        @endforeach
        @if ($count = Session::get('count'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Thể loại này có {{$count}} phim .Bạn không thể xóa!</strong>
            </div>
        @endif
    </tbody>

</table>
    </div>
    </div>
</div>


@endsection
