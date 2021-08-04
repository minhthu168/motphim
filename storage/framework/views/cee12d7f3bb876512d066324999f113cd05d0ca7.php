<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php $__env->startSection('title', 'topic-detail'); ?>
<?php $__env->startSection('main-section'); ?>

<?php if(session('alert')): ?>
    <section class="alert alert-success" style="text-align:center; margin:auto"><?php echo e(session('alert')); ?>

        <button type="button" class="close" data-dismiss="alert">×</button>
    </section>
<?php endif; ?>
<div class="container">
    <div class="row">
        <div class="col-md-8" style="background:rgb(241, 240, 240)">
            <h3 style="font-weight: bold; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; "><?php echo e($detail->topic_title); ?></h3>
            <p><span class="glyphicon glyphicon-user"></span> Đăng bởi <?php echo e($detail->nguoidang->username); ?> <span class="glyphicon glyphicon-calendar"></span> <?php echo e($detail->topic_date); ?>  
            <span class="glyphicon glyphicon-film"></span> Phim <?php echo e($detail->tenphim->film_title); ?> <span class="glyphicon glyphicon-eye-open"></span> <?php echo e($detail->topic_view); ?> lượt xem</p>
            <img style="width:100%; display:block; margin-left:auto; margin-right:auto" src="<?php echo e(asset("images/topic/$detail->topic_poster")); ?>">
            <br><br>
            <div style="overflow: auto">
                <?php echo e($detail->topic_content); ?>

            </div>
            <br>
            <div style="background-color: lightblue; padding: 3% 2%">
            <label style="font-size: large"> Bình luận</label>
            <form action="<?php echo e(url('pages/topic/createComment')); ?>" method="POST"> <?php echo csrf_field(); ?>
                <textarea class="form-control" style="background-color: ghostwhite; display:block; margin-left:auto; margin-right:auto" name="comment_content" id="comment_content" cols="50" rows="5" >Cảm nghĩ của bạn...</textarea>
                <br>
                <input type="hidden" name="topic_id" id="topic_id" value="<?php echo e($detail->topic_id); ?>">
                <button type="submit" class="btn btn-success" style="float:right">Gửi</button>
            </form>
           </div><br>
            <?php $__currentLoopData = $detail->binhluan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2" style="text-align: right">
                    <img width="70%" src="<?php echo e(asset("images/iconuser.png")); ?>" >
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10">
                    <p style="font-size: large; font-weight:bold"><?php echo e($cm->nguoidang->username); ?> <small><?php echo e($cm->comment_date); ?></small></p>       
                    <p style="font-size: medium"><?php echo e($cm->comment_content); ?></p>
                    <br>        
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="col-md-4" style="background:rgb(217, 218, 203)">
            <div style="padding: 5px" >
                <h3><b>Chủ đề mới</b></h3>
                <hr>
                <?php $__currentLoopData = $t; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p style="font-size: 15px;">
                    <a href="<?php echo e(asset("pages/topic/detail/$item->topic_id")); ?>">
                        <p style="color:blue;font-weight:bold"><?php echo e($item->topic_title); ?></p>
                        <img style="width: 80%" src="<?php echo e(asset("images/topic/$item->topic_poster")); ?>">
                    </a>
                </p>
                <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <a href="<?php echo e(asset("pages/topic")); ?>"><span style="float:right; color:lightseagreen;font-weight:bold;font-size:1.5rem;">  >>Xem thêm</span></a>             
            </div>
        </div>
    </div>  
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/pages/topic/detail.blade.php ENDPATH**/ ?>