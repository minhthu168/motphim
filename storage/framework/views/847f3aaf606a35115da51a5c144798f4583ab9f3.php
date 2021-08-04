
<?php $__env->startSection('title','book-view'); ?>
<?php $__env->startSection('main-content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detail <?php echo e($book->title); ?> </h3>
                    </div>
                    
                    
                    <form role="form" action="<?php echo e(url('admin/book/view')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Book ID</label>
                            <input type="number" name="id" id="id" class="form-control" value="<?php echo e($book->id); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?php echo e($book->title); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" name="author" id="author" class="form-control" value="<?php echo e($book->author); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" id="price" min="0" max="100" class="form-control" value="<?php echo e($book->price); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Edition</label>
                            <input type="number" name="edition" id="edition" class="form-control" value="<?php echo e($book->edition); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <img src="<?php echo e(url('images/'.$book->picture)); ?>" class="img-fluid">
                        </div>
                    </div>
                </div>
                
                   
                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-info">Back</a>
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

<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/book/view.blade.php ENDPATH**/ ?>