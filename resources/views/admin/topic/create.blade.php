{{-- luu tai /resources/views/topic/create.blade.php --}}
@extends('admin-layout.layout')
@section('title', 'film-createTopic')
@section('main-content')
    <div class="row">
        <div class="offset-md-3 col-md-6">
            {{-- general form elements --}}
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm chủ đề mới</h3>
                </div>
                {{-- /.card-header --}}
                @if ($message = Session::get('loi'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
               {{-- form start --}}
                <form role="form" action="{{url('admin/topic/createTopicPost')}}" method="POST" enctype="multipart/form-data">@csrf 
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="film_id" id="film_id" value="{{$film_id}}">
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" name="topic_title" id="topic_title" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea class="form-control" name="topic_content" id="summernote" cols="80" rows="10" style="overflow: scroll"></textarea>
                    </div>
                    <div class="form-group" >
                        <label for="">Poster</label>
                        <div>
                            <img id='uploadForm'/>
                        </div>
                       
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file"  id="topic
                                _poster" name="topic_poster" class="custom-file-input" multiple accept="image/*" >
                                <label for="" class="custom-file-label">Chọn </label>
                            </div>
                        </div>
                    </div>
                </div> 
                {{-- /.card-body --}}
                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-primary">Quay lại</a>
                    <button type="submit" class="btn btn-danger">Đồng ý</button>
                </div>
                </form>
            </div>
            {{-- /.card --}}
        </div>
    </div>
@endsection

@section('script-section')
   <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}">
   </script>
   <script type="text/javascript">
   $(document).ready(function(){
       bsCustomFileInput.init();
   });
   </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
    $('#summernote').summernote({
        height:300
    });
    </script>
@endsection    