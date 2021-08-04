

<?php $__env->startSection('title', 'book-homepage'); ?>

<?php $__env->startSection('main-section'); ?>
    <div class="login">
    <a href="<?php echo e(url('login')); ?>" class="btn btn-danger">Login</a>
    </div>

    <!-- in ra cac quyen sach: hinh anh, tua va don gia -->
    <div class="row">
    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="col-sm-6 col-md-4 ">
            <img src="<?php echo e(asset("images/$item->picture")); ?>" alt="<?php echo e($item->title); ?>">
            <p><?php echo e($item->title); ?> <br> <?php echo e($item->price); ?></p>
         </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
   
    


    
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\d03\resources\views/book-homepage.blade.php ENDPATH**/ ?>