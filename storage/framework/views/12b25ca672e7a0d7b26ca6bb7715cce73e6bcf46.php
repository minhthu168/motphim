
<?php $__env->startSection('title', 'home'); ?>
<?php $__env->startSection('main-section'); ?>
<div class="container">
    <h2 style="font-weight:bold; text-align:center; color:goldenrod">DANH SACH CHỦ ĐỀ BẠN ĐÃ TẠO</h2>
    <hr style="width:16%; text-align:center; color:gray; height: 0px; background-color: gray;">
    <div class="row" >
      <?php $__currentLoopData = $t; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-6" style="margin-bottom:20px;">
        <div class="col-xs-5 col-sm-6 col-md-6"><img src="<?php echo e(url('images/topic/'.$item->topic_poster)); ?>" width="100%" height="200px" ></div>
        <div class="col-xs-7 col-sm-6 col-md-6">
        <a style="font-weight: bold;font-size:150%;" href=""><?php echo e($item->topic_title); ?></a>
        <p style="color: #888888"><?php echo e($item->topic_date); ?></p>
        <button class="btn btn-warning"><?php echo e(($item->approved==1)?'Đã duyệt':'Đang chờ duyệt'); ?></button>
        </div> 
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/pages/topic/topicMod.blade.php ENDPATH**/ ?>