
<?php $__env->startSection('title', 'film'); ?>
<?php $__env->startSection('main-section'); ?>
<div class="container">
    <div class="row">
        <div class='col-xs-12 col-sm-8 col-md-8 col-lg-9'> 
            
                <div  style='width: 100%;padding:0;border:#ccc 1px ridge;color:black;background:rgb(237, 216, 100);'>
                        <h4 style="margin: 1%;">
                            <b >Phim mới cập nhật</b>
                            <span style="float:right;"><a href="<?php echo e(asset("pages/film/film")); ?>" title="" >Toàn bộ</a> /<a href="<?php echo e(asset("pages/film/0")); ?>" title="" >Phim bộ</a>/<a href="<?php echo e(asset("pages/film/1")); ?>" title="" > Phim lẻ</a></span>
                        </h4>
                </div>
                
                <div style="clear: both;"></div>
                <div id="list-phim">                  
                    <div class='row'>
                        <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class='col-xs-6 col-sm-4 col-md-3 col-lg-3' style="padding: 10px;">
                            <a href="<?php echo e(asset("pages/film/film_detail/$item->film_id")); ?>" title="" >                           
                                <img src="<?php echo e(asset("images/phim/$item->film_poster")); ?>" width="100%" class="avatar_phim">
                                <div class="name">
                                    <p class='name-vi' style="font-size:110%"><?php echo e($item->film_title); ?></p>
                                    <p class='time-film' style="font-size:110%"><?php echo e($item->film_release_year); ?></p>
                                </div>
                            </a>  
                        </div>                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </div>
                    <div style="float:right;font-weight:bold;">
                        <p style="font-size:150%;"> <?php echo $ds->links(); ?></p>
                      </div>
                </div>
            
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4 col-lg-3">
            <div class="miniCat">
                <div style="background: lightgray">
                    <div  style='width: 100%;padding:0;border:#ccc 1px ridge;color:black;background:rgb(237, 216, 100);'>
                        <h4 style="margin: 5%;">
                            <b >Thể loại</b>
                        </h4>
                    </div>
                    <br>
                    <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a style="padding:10%;font-size:120%;" href="<?php echo e(asset("pages/film/the-loai/$item->cat_name")); ?>"><span><?php echo e($item->cat_name); ?></span></a><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <br>
                </div>
                <div style="margin-top: 4%;background: lightgray">
                    <div  style='width: 100%;padding:0;border:#ccc 1px ridge;color:black;background:rgb(237, 216, 100);'>
                        <h4 style="margin: 5%;">
                            <b >Quốc gia</b>
                        </h4>
                    </div>
                    <br>
                    <?php $__currentLoopData = $nation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a style="padding:8%;font-size:120%;" href="<?php echo e(asset("pages/film/quoc-gia/$item->nation_name")); ?>"><span><?php echo e($item->nation_name); ?></span></a><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <br>
                </div>
            </div>
            <div  style='width: 100%;margin-top:3%;margin-bottom:0px;padding:0;border:#ccc 1px ridge;color:black;background:rgb(237, 216, 100);'>
                <h4 style="margin: 5%;">
                    <b >Chủ đề phim mới</b>
                </h4>
            </div>
            <div class="pc" style="margin-top:0;padding:8%;background: lightgray">
                <?php $__currentLoopData = $t; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p style="font-size: 15px;">
                    <a href="<?php echo e(url('pages/topic/detail/'.$item->topic_id)); ?> ">
                        <p style="font-weight:bold;font-size:110%;"><?php echo e($item->topic_title); ?></p>
                        <img style="width: 60%; height:70px; " src="<?php echo e(url('images/topic/'.$item->topic_poster)); ?>">
                    </a>
                </p>
                <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(asset("pages/topic/pagination")); ?>"><span style="float:right; color:lightseagreen;font-weight:bold;font-size:1.5rem;">  >>Xem thêm</span></a>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\motphim\resources\views/pages/film/film.blade.php ENDPATH**/ ?>