
<?php $__env->startSection('title', 'film-detail'); ?>
<?php $__env->startSection('main-section'); ?>
<div class="container" style="overflow: hidden;">
    <div class="row">
        <div class='col-xs-12 col-sm-8 col-md-8 col-lg-9' style="padding:10px;background:lightgray">
            <div class="row" style="margin: 10px;">
                
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="position: relative; padding: 10px">                   
                    <img src="<?php echo e(asset("images/phim/$f->film_poster")); ?>" alt="" width="90%"> 
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" style="font-size: 120%">
                    <h2 style="margin-top: 10px;font-weight:bold;">
                        <?php echo e($f->film_title); ?> (<?php echo e($f->film_release_year); ?>)
                    </h2>
                    <p><b> Hình thức:</b>
                        <span><?php echo e($f->film_form==0?'Phim truyền hình':'Phim chiếu rạp'); ?></span>
                    </p>
                    <p><b>Loại phim:</b>
                        <span ><?php echo e($f->film_cat); ?></span>
                    </p>                 
                    <p><b>Quốc gia:</b>
                        <span><?php echo e($f->film_nation); ?></span>
                    </p>
                    <p><b>Thời lượng:</b>
                        <span ><?php echo e($f->film_runtime); ?></span>
                    </p>
                    <p><b>Số tập:</b>
                        <span><?php echo e($f->film_episode); ?></span>
                    </p>
                    <p><b>Đạo diễn :</b>
                        <span><a href="<?php echo e(asset("pages/film/celeb/$f->film_director")); ?>"><?php echo e($f->film_director?"$f->film_director":"Chưa cập nhật"); ?></a></span>
                    </p>
                    <p><b> Diễn viên chính:</b>
                        <span ><a href="<?php echo e(asset("pages/film/celeb/$f->film_actor")); ?>"><?php echo e($f->film_actor); ?></a>,
                             <a href="<?php echo e(asset("pages/film/celeb/$f->film_actress")); ?>"><?php echo e($f->film_actress); ?></a><br></span>
                    </p>
                    <hr>
                    <!-- danh gia rate -->
                    <div class="stars" style="font-size: 90%">
                        <form action="<?php echo e(url("pages/film/createRating")); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>                           
                            <p id="vote-desc">Mời bạn cho điểm :</p>
                            <?php if($message = Session::get('Loi')): ?>
                                <div class="alert alert-info alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><?php echo e($message); ?></strong>
                                </div>
                            <?php endif; ?>
                            <input type="hidden" name="film_id" value="<?php echo e($f->film_id); ?>">
                            <input class="star star-5" id="star-5" type="radio" name="rate"  <?php if((round($f->rate))=='5'): ?> checked <?php endif; ?> value="5"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="rate" <?php if((round($f->rate))=='4'): ?> checked <?php endif; ?> value="4" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="rate" <?php if((round($f->rate))=='3'): ?> checked <?php endif; ?> value="3"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="rate" <?php if((round($f->rate))=='2'): ?> checked <?php endif; ?> value="2"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="rate" <?php if((round($f->rate))=='1'): ?> checked <?php endif; ?> value="1"/>
                            <label class="star star-1" for="star-1"></label> <br>
                            <button type="submit" class="btn btn-info">Gửi đánh giá của bạn</button>                               
                        </form> 
                    </div>            
                        <p>(Đánh giá <b><?php echo e(round($f->rate,1)); ?>/5</b> từ <b><?php echo e($count); ?></b> thành viên)</p>
                                              
                </div>
            
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3 style='font-weight: bold;'>Tóm tắt</h3>
                    <br>
                    <p style="font-size: 125%"><?php echo e($f->film_synopsis); ?></p><hr>
                    <h3 style='margin-bottom: 10px; font-weight: bold;'>Trailer</h3>
                    <iframe width="100%" height="500px" src="https://www.youtube.com/embed/<?php echo e($f->film_trailer); ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 10px 6px">
                    <h3 style='margin-top: 5%; font-weight: bold;text-align:center;'>Chủ đề phim</h3>
                    <?php if($message = Session::get('alert')): ?>
                    <div class="alert alert-info alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php endif; ?>
                    <form action="<?php echo e(url('pages/film/mod_createTopic')); ?>" method="POST"><?php echo csrf_field(); ?>
                        <input type="hidden" name="film_id" id="film_id" value="<?php echo e($f->film_id); ?>">
                        <button type="submit" class="btn btn-danger" style="margin-left:2rem" >Tạo chủ đề mới</button>
                    </form>
                    <hr>
                    <?php $__currentLoopData = $f->topicApproved; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('pages/topic/detail/'.$item->topic_id)); ?>" title="">
                        <div class='col-xs-6 col-sm-4 col-md-4 col-lg-4'>
                            <img style="width: 100%; height:160px; " src="<?php echo e(url('images/topic/'.$item->topic_poster)); ?>">
                            <b><?php echo e($item->topic_title); ?></b>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        
        </div>
        </div>
        <!-- khung nhỏ ben phai -->
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
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\motphim\resources\views/pages/film/film_detail.blade.php ENDPATH**/ ?>