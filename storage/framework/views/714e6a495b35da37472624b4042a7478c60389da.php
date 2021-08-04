
<?php $__env->startSection('title','book-view'); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container">
        <h2>Book Details</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <form role="form" action="<?php echo e(url('admin/book/view')); ?>" method="get" enctype="multipart/form-data"> <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>ID</label>
                        <input type="number" name="id" id="id" value="<?php echo e($book->id); ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo e($book->title); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" id="author" class="form-control" value="<?php echo e($book->author); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="<?php echo e($book->price); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Edition</label>
                        <input type="number" name="edition" id="edition" class="form-control" value="<?php echo e($book->edition); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Picture</label>
                        <img src="<?php echo e(url('images/'.$book->picture)); ?>" class="img-fluid">
                    </div>

                    <div>
                        <a href="javascript:history.back()" class="btn btn-info">Back</a>
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

<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\d03\resources\views/admin/book/view.blade.php ENDPATH**/ ?>