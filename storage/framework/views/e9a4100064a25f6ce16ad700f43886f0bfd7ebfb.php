
<?php $__env->startSection('title', 'home'); ?>
<?php $__env->startSection('main-section'); ?>
<div class="container">
    <div class="row">
        <?php $__currentLoopData = $f; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xs-6 col-sm-6 col-md-3 col-md-3" style="padding:10px;">
          <a href="<?php echo e(asset("pages/film/film_detail/$item->film_id")); ?>" title="" >
          <img src="<?php echo e(asset("images/phim/$item->film_poster")); ?>" width="100%">
            <div class="name">
              <p class='name-vi'><?php echo e($item->film_title); ?></p>
              <p class='time-film'><?php echo e($item->film_release_year); ?></p>
          </div>
        </a>
        </div>        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 10px 6px">
            <hr>
            <?php $__currentLoopData = $f; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $item->topic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6" style="margin-bottom:20px;">
              <div class="col-xs-5 col-sm-5 col-md-4"><img src="<?php echo e(url('images/topic/'.$i->topic_poster)); ?>" width="100%" height="120px" ></div>
              <div class="col-xs-7 col-sm-7 col-md-8">
              <a style="font-weight: bold;font-size:150%;" href="<?php echo e(url('pages/topic/detail/'.$i->topic_id)); ?>"><?php echo e($i->topic_title); ?></a>
              <p style="color: #888888"><?php echo e($i->topic_date); ?></p>
              </div> 
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/pages/search.blade.php ENDPATH**/ ?>