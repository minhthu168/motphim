<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php $__env->startSection('title', 'mod-createTopic'); ?>
<?php $__env->startSection('main-section'); ?>
    <div class="row">
        <div class="offset-md-3 col-md-6">
            
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm chủ đề mới</h3>
                </div>
                
                <?php if($message = Session::get('loi')): ?>
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php echo e($message); ?></strong>
                </div>
                <?php endif; ?>
               
                <form role="form" action="<?php echo e(url('pages/mod_createTopic/createTopicPost')); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?> 
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tên phim</label>
                        <input type="text" class="form-control" name="film_id" id="film_id" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" name="topic_title" id="topic_title" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea class="form-control" name="topic_content" id="" cols="80" rows="10" style="overflow: scroll"></textarea>
                    </div>
                    <div class="form-group" >
                        <label for="">Hình ảnh</label>
                        <input type="file" name="topic_poster" id="topic_poster">
                    </div>
                </div> 
                
                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-primary">Quay lại</a>
                    <button type="submit" class="btn btn-danger">Đồng ý</button>
                </div>
                </form>
            </div>
            
        </div>
    </div>
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
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/pages/mod_createTopic.blade.php ENDPATH**/ ?>