@extends('admin-layout.layout')
@section('title','news-detail')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                {{-- general form elements --}}
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Chi tiết</h3>
                    </div>
                    {{-- /.card-header --}}
                    {{-- form start --}}
                    <form role="form" action="{{url('admin/news/detail')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="number" name="news_id" id="news_id" class="form-control" value="{{$n->news_id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="news_subject" id="news_subject" class="form-control" value="{{$n->news_subject}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày đăng</label>
                            <input type="date" name="news_date" id="news_date" class="form-control" value="{{$n->news_date}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea class="form-control" name="news_content" id="news_content" cols="70" rows="10" readonly >{{$n->news_content}}</textarea>
                        </div>                       
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <img src="{{url('images/news-event/'.$n->news_image)}}" class="img-fluid">
                        </div>
                    </div>
                </div>
                {{-- /.card-body --}}
                   
                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-info">Quay lại</a>
                </div>
            </form>
            </div>
            {{-- /.card --}}
        </div>
    </div>
</div>
</section>
@endsection

@section('script-section')
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}">
</script>
<script type="text/javascript">
$(document).ready(function(){
    bsCustomFileInput.init();
});
</script>
@endsection
