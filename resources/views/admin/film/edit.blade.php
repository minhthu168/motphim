<!-- lưu tại /resources/views/product/create.blade.php -->
@extends('admin-layout.layout')
@section('title','film-edit')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật phim {{ $f->film_title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('admin/film/editPost/'.$f->film_id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label >ID Phim</label>
                                <input type="text" class="form-control" id="film_id" name="film_id" value="{{$f->film_id}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tên Phim</label>
                                <input type="text" class="form-control" id="film_title" name="film_title"
                                value="{{$f->film_title}}">
                            </div>
                            <div class="form-group">
                                <p><label for="image">Poster Phim</label><p>
                                <img class="img-fluid" width="300px" src="{{url("images/phim/$f->film_poster") }}"/><br><br>
                                 <div class="input-group">
                                     <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="film_poster" name="film_poster">
                                        <label class="custom-file-label" for="image">{{$f->film_poster}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Thể loại:</label>
                                <div class="custom-control custom-checkbox">
                                    {{-- preg_match('/{{$item->cat_name}}/', $f->film_cat)==true --}}
                                @foreach ($cat as $item)                          
                                <input type="checkbox" name="film_cat[]" 
                                @php $pos = stripos(strtolower($f->film_cat), strtolower($item->cat_name));
                                if ($pos !== false) {
                                    echo "checked";
                                    } else {
                                    echo "";}
                                @endphp 
                                value="{{$item->cat_name}}" >{{$item->cat_name}}<br>
                                @endforeach
                                </div> 
                            </div>
                            <div class="form-group">
                                <label>Là :</label>
                                <div class="custom-control custom-radio"> 
                                    <input name="film_form" type="radio" value="0" @if(($f->film_form)=='0') checked
                                    @endif>Phim truyền hình <br>
                                    <input name="film_form"  type="radio" value="1" @if (($f->film_form)=='1') checked
                                    @endif/>Phim chiếu rạp 
                                    </div>                  
                            </div>
                            
                            <div class="form-group">
                                <label>Đạo diễn Phim</label>
                                <input type="text" class="form-control" id="film_director" name="film_director"
                                value="{{$f->film_director}}">
                            </div>
                            <div class="form-group">
                                <label>Nam diễn viên chính</label>
                                <input type="text" class="form-control" id="film_actor" name="film_actor"
                                value="{{$f->film_actor}}">
                            </div>
                            <div class="form-group">
                                <label>Nữ diễn viên chính</label>
                                <input type="text" class="form-control" id="film_actress" name="film_actress"
                                value="{{$f->film_actress}}">
                            </div>
                            <div class="form-group">
                                <label >Số tập</label>
                                <input type="text" class="form-control" id="film_episode" name="film_episode" value="{{$f->film_episode}}">
                            </div>
                            <div class="form-group">
                                <label >Thời Lượng</label>
                                <input type="text" class="form-control" id="film_runtime" name="film_runtime" value="{{$f->film_runtime}}">
                            </div>
                            <div class="form-group">
                                <label>Năm phát hành</label>
                                <input type="number" class="form-control" id="film_release_year" name="film_release_year"
                                value="{{$f->film_release_year}}">
                            </div>
                            <div class="form-group">
                                <label>Quốc gia</label>                        
                                    <select class="form-control select2" style="width: 100%;" id="film_nation" name="film_nation" required>
                                        @foreach ($nation as $item)
                                        <option @if(($f->film_nation)==$item->nation_name) selected @endif >{{$item->nation_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea class="form-control" rows="6" name="film_synopsis">{{$f->film_synopsis}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Link Trailer:</label>
                                <input type="text" class="form-control" id="film_trailer" name="film_trailer"
                                value="{{$f->film_trailer}}"><br>
                                <iframe width="100%" height="430" src="https://www.youtube.com/embed/{{$f->film_trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen enctype="multipart/form-data"></iframe>
                            </div>                           
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
@section('script-section')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
@endsection