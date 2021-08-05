@extends('admin-layout.layout')
@section('title','film-index')
@section('main-content')
<div class="container-fluid" style="padding: 40px;">
<table class="table table-hover table-bordered">
    <h2 style="color:blue;">ẢNH CAROUSEL</h2>
    <thead class="table-warning">
        <tr class="text-center">
            <th>Mô tả ảnh</th>
            <th>Hình</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ds as $item )
            <tr class="text-center">
                <td> {{$item->carousel_name}}</td>
                <td> <img src="{{asset("images/carousel/$item->carousel_image")}}" alt=""  width="30%"> </td>
                <td><a class="btn btn-warning btn-sm" href="{{ url("admin/carousel/edit/{$item->carousel_id}") }}">
                    <i class="fas fa-pencil-alt"></i> Đổi ảnh
                </a></td>
            </tr>
        @endforeach
    </tbody>

</table>
</div>


@endsection
