
<?php $__env->startSection('title', 'home'); ?>
<?php $__env->startSection('main-section'); ?>
<div class="container">
  <h2 style="font-weight:bold; text-align:center; color:rgb(241, 239, 234) ">DANH SÁCH PHIM BẠN ĐÃ TẠO</h2>
    <div class="row">
        <?php $__currentLoopData = $f; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xs-6 col-sm-6 col-md-2 col-md-2" style="padding:10px;">
          <a href="<?php echo e(asset("pages/film/film_detail/$item->film_id")); ?>" title="" >
          <img src="<?php echo e(asset("images/phim/$item->film_poster")); ?>" width="100%">
            <div class="name">
              <p class='name-vi'><?php echo e($item->film_title); ?></p>
              <p class='time-film'><?php echo e(($item->approved==1)?'Đã duyệt':'Đang chờ duyệt'); ?></p>
          </div>
        </a>
        </div>        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\motphim\resources\views/pages/film/filmMod.blade.php ENDPATH**/ ?>