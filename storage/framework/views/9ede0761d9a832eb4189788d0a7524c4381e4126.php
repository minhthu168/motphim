
<?php $__env->startSection('title', 'film-detail'); ?>
<?php $__env->startSection('main-section'); ?>
<div class="container" style="background-color:rgb(241, 240, 240);padding:10px;">
    <div class="row" style="margin: 10px;">
        <?php $__currentLoopData = $c; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="position: relative; padding: 10px">                   
                <img src="<?php echo e(asset("images/celeb/$item->celeb_image")); ?>" alt="" width="70%"> 
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" >
                <h1 style="margin-top: 10px;font-size: 2.5rem;font-weight:bold;"><?php echo e($item->celeb_name); ?></h1>
                <p><b>Sinh năm:</b>
                    <span ><?php echo e($item->celeb_yob); ?></span>
                </p>                 
                <p><b>Nghề Ngiệp:</b>
                    <span><?php if($item->celeb_type === 0): ?>
                        Đạo diễn
                        <?php elseif(($item->celeb_type)=== 1): ?>
                        Diễn viên nam
                        <?php else: ?>
                        Diễn viên nữ
                        <?php endif; ?>
                    </span>
                </p>
                <p><b>Hồ sơ cá nhân:</b>
                    <span><?php echo e($item->profile); ?></span>
                </p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/pages/film/film_celeb.blade.php ENDPATH**/ ?>