

<?php $__env->startSection('title', 'my-homepage'); ?>

<?php $__env->startSection('main-section'); ?>
    <h3>My favorite flower...</h3>
    <img  alt="" src="<?php echo e(asset("images/dengwei.jpg")); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\d03\resources\views/home.blade.php ENDPATH**/ ?>