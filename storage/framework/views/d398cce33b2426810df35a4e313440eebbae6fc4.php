
<?php $__env->startSection('title', 'frontend-topic'); ?>
<?php $__env->startSection('main-content'); ?>
  <div class="container">
    <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row">
        <h1 style="font-size: 25px; line-height: 20px">
        <a style="font-weight: bold" href="#"><?php echo e($i->topic_title); ?></a>
        </h1>
      <div style="color:blueviolet"><?php echo e($i->topic_date); ?></div><br>
      <div class='col-md-3' style="padding: 10px">
        <a href="#">
          <img loading="lazy" class="img-mb" style="width: 100%; border-radius: 5px; float: left;" src="<?php echo e(url('images/'.$i->topic_poster)); ?>" width="50%" height='50%'>
        </a>
      </div>
      <div class='col-md-9 list-tin-tom-tat'>
        <p class="tomtat-mb decription-text">1 vài dòng nội dung</p>
      </div>
      </div>
      <hr style='margin-top: 0px'>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/topic/topicdetail.blade.php ENDPATH**/ ?>