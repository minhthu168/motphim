<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mod_createTopic</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
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
                <form role="form" action="{{url("pages/film/modCrTp")}}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        <input type="hidden" name="film_id" id="film_id" value="{{$film_id}}"> 
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" class="form-control" name="topic_title" id="topic_title" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea class="form-control" name="topic_content" id="topic_content" cols="80" rows="10" style="overflow: scroll"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="topic_poster" name="topic_poster" required>
                                    <label class="custom-file-label" for="">Chọn ảnh</label>
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
</body>
</html>
   <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}">
   </script>
   <script type="text/javascript">
   $(document).ready(function(){
       bsCustomFileInput.init();
   });
   </script>
    