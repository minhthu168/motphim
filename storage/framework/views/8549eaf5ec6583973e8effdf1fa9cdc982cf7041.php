
<?php $__env->startSection('title','news-edit'); ?>
<?php $__env->startSection('main-content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật</h3>
                    </div>
                    
                    <?php if($message = Session::get('loi')): ?>
                        <div class="alert alert-info alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><?php echo e($message); ?></strong>
                        </div>
                    <?php endif; ?>
                    
                    <form role="form" action="<?php echo e(url('admin/news/editPost/'.$n->news_id)); ?>" method="post" enctype="multipart/form-data" >
                    <?php echo e(csrf_field()); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="number" name="news_id" id="news_id" class="form-control" value="<?php echo e($n->news_id); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="news_subject" id="news_subject" class="form-control" value="<?php echo e($n->news_subject); ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea class="form-control" name="news_content" id="news_content" cols="70" rows="10" ><?php echo e($n->news_content); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <img width="320px" height="350px" src="<?php echo e(url('images/news-event/'.$n->news_image)); ?>" class="img-fluid" id="uploadForm">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="news_image" id="news_image" class="custom-file-input">
                                <label for="" class="custom-file-label">Chọn </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                   
                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-info">Quay lại</a>
                    <button type="submit" class="btn btn-danger">Đồng ý</button>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-section'); ?>
<script src="<?php echo e(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>">
</script>
<script type="text/javascript">
$(document).ready(function(){
    bsCustomFileInput.init();
});
</script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js">
</script>
<script type="text/javascript">
    $('#summernote').summernote({
        height:300
    });
</script>

<script>
    function filePreview(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#uploadForm + img').remove();
                $('#uploadForm').replaceWith('<img src="'+e.target.result+'"/>');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#news_image").change(function(){
        filePreview(this);
    });
</script>
<?php $__env->stopSection(); ?>


 

<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/news/edit.blade.php ENDPATH**/ ?>