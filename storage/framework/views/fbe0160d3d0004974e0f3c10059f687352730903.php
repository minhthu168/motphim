

<?php $__env->startSection('title','topic-edit'); ?>
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
                    
                    <form role="form" action="<?php echo e(url('admin/topic/editTopicPost/'.$t->topic_id)); ?>" method="post" enctype="multipart/form-data" >
                    <?php echo e(csrf_field()); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="number" name="topic_id" id="topic_id" class="form-control" value="<?php echo e($t->topic_id); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="topic_title" id="topic_title" class="form-control" value="<?php echo e($t->topic_title); ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày đăng</label>
                            <input type="date" name="topic_date" id="topic_date" class="form-control" value="<?php echo e($t->topic_date); ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea class="form-control" name="topic_content" id="summernote" cols="70" rows="10" ><?php echo e($t->topic_content); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Poster</label>
                            <img width="320px" height="350px" src="<?php echo e(url('images/topic/'.$t->topic_poster)); ?>" class="img-fluid" id="uploadForm">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="topic_poster" id="topic_poster" class="custom-file-input">
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

        <h2 style="color: goldenrod; font-weight: bold">BÌNH LUẬN</h2>
<table class="table table-hover" id="comment">
    <thead>
        <tr>
            <th>ID</th>
            <th>Người đăng</th>
            <th>Ngày đăng</th>
            <th>Nội dung</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $t->binhluan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($cm->comment_id); ?></td>
            <td><?php echo e($cm->nguoidang->username); ?></td>
            <td><?php echo e($cm->comment_date); ?></td>
            <td><?php echo e($cm->comment_content); ?></td>
            <td>
                <a class="btn btn-danger btn-sm" href="<?php echo e(url('admin/binhluan/delete/'.$cm->comment_id.'/'.$t->topic_id)); ?>" onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa không ?')">
                    <i class="fas fa-trash">
                    </i>
                    
                </a>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
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
    $("#topic_poster").change(function(){
        filePreview(this);
    });
</script>
<?php $__env->stopSection(); ?>


 

<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/topic/edit.blade.php ENDPATH**/ ?>