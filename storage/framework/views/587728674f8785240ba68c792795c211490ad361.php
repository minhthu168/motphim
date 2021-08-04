

<?php $__env->startSection('title', 'book-create'); ?>
<?php $__env->startSection('main-content'); ?>

    <div class="row">
        <div class="offset-md-3 col-md-6">
            
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create  New Book</h3>
                </div>
                
                <?php if($message = Session::get('loi')): ?>
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php echo e($message); ?></strong>
                </div>
                <?php endif; ?>
               
                <form role="form" action="<?php echo e(url('admin/book/createPost')); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?> 
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Book ID</label>
                        <input type="number" class="form-control" name="id" id="id" readonly>
                        </div>
                    <div class="form-group">
                        <label for=""> Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Nhap tua sach" required>
                    </div>
                    <div class="form-group">
                        <label for=""> Author</label>
                        <input type="text" class="form-control" name="author" id="author" placeholder="Nhap ten tac gia" required>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Nhap don gia" min="0" max="10000" required>
                    </div>
                    <div class="form-group">
                        <label for=""> Edition</label>
                        <input type="number" class="form-control" name="edition" id="edition" placeholder="Nhap lan xb" min="1" max="100" required>
                    </div>
                    <div class="form-group">
                        <label for="picture">Image file input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file"  id="picture" name="picture" class="custom-file-input" multiple accept="image/*">
                                <label for="picture" class="custom-file-label">Choose Picture</label>
                            </div>
                        </div>
                    </div>
                </div> 
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/book/create.blade.php ENDPATH**/ ?>