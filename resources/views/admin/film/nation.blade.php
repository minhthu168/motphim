@extends('admin-layout.layout')
@section('title','film-index')
@section('main-content')
<div class="container-fluid" style="padding: 40px;">
    <div class="row">
    <div class=col-md-5>
    @if ($message = Session::get('Loi'))
                    <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                    </div>
                @endif
        <form action="{{ url('admin/film/nation/createNation') }}" method="post" style="border:gray ridge 1px; padding:30px;margin:40px;">
            {{ csrf_field() }}
            <h3 style="text-align:center;color:blue;">Thêm quốc gia mới</h3>
   
            <div class="form-group">
                <label>Tên quốc gia mới</label>
                <input type="text" class="form-control" id="nation_name" name="nation_name">
            </div>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
        <form action="{{ url('admin/film/nation/editNation') }}" method="post" style="border:gray ridge 1px; padding:30px;margin:40px;">
            {{ csrf_field() }}
            <h3 style="text-align:center;color:blue;">Sửa tên quốc gia</h3>
            <div class="form-group">
                <label>Chọn tên quốc gia cần sửa</label>                        
                    <select class="form-control select" style="width: 100%;" id="nation_id" name="nation_id" required>
                      @foreach ($n as $item)
                      <option value="{{$item->nation_id}}">{{$item->nation_name}}</option>
                      @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label>Tên mới quốc gia</label>
                <input type="text" class="form-control" id="nation_name" name="nation_name">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    <div class=col-md-5 style="padding-left:100px;">
<table class="table table-hover table-bordered">
    <h2 style="color:blue;">TẤT CẢ CÁC QUỐC GIA</h2>
    <thead class="table-warning">
        <tr class="text-center">
            {{-- <th> ID Phim</th> --}}
            <th>ID</th>
            <th>Tên quốc gia</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($n as $item )
            <tr class="text-center">
                <td> {{$item->nation_id}}</td>
                <td> {{$item->nation_name}}</td> 
                <td><a class="btn btn-warning btn-sm" href="{{ url("admin/film/nation/{$item->nation_id}") }}"             onclick="javascript:return confirm( 'Bạn có chắc muốn xóa không?')">
                <i class="fas fa-trash"></i> Xóa
                </a></td>
            </tr>
        @endforeach
        @if ($count = Session::get('count'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Quốc gia này có {{$count}} phim .Bạn không thể xóa!</strong>
            </div>
        @endif
    </tbody>

</table>
    </div>
    </div>
</div>


@endsection
