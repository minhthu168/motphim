
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php $__env->startSection('title', 'topic'); ?>
<?php $__env->startSection('main-section'); ?>
<br>
<div class="container"  style="background-color: rgb(241, 240, 240);">
  <div class="row">
    <?php $__currentLoopData = $t; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-6">
      <h4 style="text-align: left; font-weight: bold; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"><a href="<?php echo e(url('pages/topic/detail/'.$item->topic_id)); ?>"><?php echo e($item->topic_title); ?></a></h4>
      <div class="col-xs-5 col-sm-5 col-md-5" style="text-align: right">
        <img src="<?php echo e(url('images/topic/'.$item->topic_poster)); ?>" style="width:100%; height:70%; border-radius:2%" >
      </div>
      <div class="col-xs-7 col-sm-7 col-md-7">
        <br>     
        <p><span class="glyphicon glyphicon-film"></span> Phim <?php echo e($item->tenphim->film_title); ?></p>
        <p><span class="glyphicon glyphicon-user"></span> Đăng bởi <?php echo e($item->nguoidang->username); ?></p>
        <p><span class="glyphicon glyphicon-calendar"></span> <?php echo e($item->topic_date); ?></p> 
        <p><span class="glyphicon glyphicon-eye-open"></span> <?php echo e($item->topic_view); ?> lượt xem</p>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>
<div style="text-align:right; margin-right:13%">
  <p> <?php echo $t->links(); ?></p>
</div>



<a class="on_top" href="#top" style="display: block;"><i class="fas fa-arrow-alt-circle-up"></i></a>
<style>
  a.on_top { opacity:0.6; display: none;}
  a.on_top:hover{
    background-color: #007bb6;
    color: #fff;
    border: 1px solid #007bb6;
    opacity:1;
  }
  a.on_top i{ font-size: x-large;}
  a.on_top {
    border-radius: 50%;
    background-color: mediumslateblue;
    padding: 10px 10px;
    white-space: nowrap; color: #fff;
    position: fixed;
    bottom: 75px;
    right: 30px;
    height: 44px;
  }
</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script>
$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#on_top').fadeIn(); 
        } else { 
            $('#on_top').fadeOut(); 
        } 
    }); 
    $('#on_top').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/pages/topic/index_pagination.blade.php ENDPATH**/ ?>