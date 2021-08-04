
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php $__env->startSection('title', 'home'); ?>
<?php $__env->startSection('main-section'); ?>
<div class="container" style="background-color: rgb(241, 240, 240);">
    <h2 style="font-weight:bold; text-align:center; color:goldenrod ">TIN HOT</h2>
    <div class="row" style="padding:10px;">  
        <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6" style="padding: 2%">
            <div class="col-xs-5 col-sm-5 col-md-5"><img src="<?php echo e(asset("images/news-event/$item->news_image")); ?>" width="100%" height="130px;"></div>
            <div class="col-xs-7 col-sm-7 col-md-7">
            <a style="font-weight: bold;font-size:150%;" href="<?php echo e(asset("pages/news/detail/$item->news_id")); ?>"><?php echo e($item->news_subject); ?></a>
            <p style="color: #888888"><?php echo e($item->news_date); ?></p>
            </div> 
        </div>
        <hr>      
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
    </div>
</div>
<div style="text-align:right;margin-right:13%;font-weight:bold;font-size:large">
    <p> <?php echo $ds->links(); ?></p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/pages/news/news-event.blade.php ENDPATH**/ ?>