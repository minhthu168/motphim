<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php $__env->startSection('title', 'news-detail'); ?>
<?php $__env->startSection('main-section'); ?>
<div class="container" style="overflow: hidden;">
    <div class="row">
        <div class='col-xs-12 col-sm-8 col-md-8 col-lg-9' style="padding:10px;background:rgb(241, 240, 240);">
           <h2 style="color:black;font-weight:bold"><?php echo e($news->news_subject); ?></h2> 
           <p>Ngày đăng: <?php echo e($news->news_date); ?></p>
           <img src="<?php echo e(asset("images/news-event/$news->news_image")); ?>" width="90%">
           <br>
           <p style="font-family: 'Times New Roman', Times, serif; font-size:120%;padding:4% 0;"><?php echo e($news->news_content); ?></p>            
        </div>
       
        <!-- khung nhỏ ben phai -->
        <div class="col-sm-4 col-md-4 col-lg-3" style="background:rgb(217, 218, 203); ">
            <div class="pc" style="padding: 5px;" >
                <h3 style="margin-top: 0px; margin-bottom: 0px"><b>Tin hot</b></h3>
                <hr>
                <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p style="font-size: 15px;">
                    <a href="<?php echo e(asset("pages/news/detail/$item->news_id")); ?>">
                        <p style="color:blue;font-weight:bold"><?php echo e($item->news_subject); ?></p>
                        <img style="width: 60%; height:70px; " src="<?php echo e(asset("images/news-event/$item->news_image")); ?>">
                    </a>
                </p>
                <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <a href="<?php echo e(asset("pages/news")); ?>"><span style="float:right; color:lightseagreen;font-weight:bold;font-size:1.5rem;">  >>Xem thêm</span></a>             
            </div>

        </div>
    
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/pages/news/detail.blade.php ENDPATH**/ ?>