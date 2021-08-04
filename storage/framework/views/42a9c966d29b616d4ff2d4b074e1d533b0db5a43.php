
<?php $__env->startSection('title','home-admin'); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid">
    <div class="row" style="margin:5%;">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h4>Phim</h4>

              <p><?php echo e($film); ?> phim</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-film"></i>
            </div>
            <a href="<?php echo e(url('/admin/film/index')); ?>" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h4>Đạo diễn-diễn viên</h4>

              <p><?php echo e($celeb); ?> người</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="<?php echo e(url('/admin/celeb/index')); ?>" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h4>Chủ đề phim - Bình luận</h4>

              <p><?php echo e($topic); ?> chủ đề - <?php echo e($bl); ?> bình luận</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatbubbles"></i>
            </div>
            <a href="<?php echo e(url('/admin/topic')); ?>" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h4>Người dùng</h4>

              <p><?php echo e($user); ?> người</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo e(url('/admin/users')); ?>" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h4>Tin tức - Sự kiện</h4>
  
                <p><?php echo e($news); ?> tin</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-paper"></i>
              </div>
              <a href="<?php echo e(url('/admin/news/index')); ?>" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
        <!-- ./col -->
      </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/home.blade.php ENDPATH**/ ?>