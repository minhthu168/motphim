
<?php $__env->startSection('title','topic-view'); ?>
<?php $__env->startSection('main-content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Chi tiết</h3>
                    </div>
                    
                    
                    <form role="form" action="<?php echo e(url('admin/topic/view')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="number" name="topic_id" id="topic_id" class="form-control" value="<?php echo e($t->topic_id); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" name="topic_title" id="topic_title" class="form-control" value="<?php echo e($t->topic_title); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày đăng</label>
                            <input type="date" name="topic_date" id="topic_date" class="form-control" value="<?php echo e($t->topic_date); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Lượt xem</label>
                            <input type="number" name="topic_view" id="topic_view" class="form-control" value="<?php echo e($t->topic_view); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea class="form-control" name="topic_content" id="topic_content" cols="70" rows="10" readonly ><?php echo e($t->topic_content); ?></textarea>
                        </div>                       
                        <div class="form-group">
                            <label for="">Poster</label>
                            <img src="<?php echo e(url('images/topic/'.$t->topic_poster)); ?>" class="img-fluid">
                        </div>
                    </div>
                </div>
                
                   
                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-info">Quay lại</a>
                </div>
            </form>
            </div>
            
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/topic/view.blade.php ENDPATH**/ ?>