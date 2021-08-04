<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php $__env->startSection('title', 'home'); ?>
<?php $__env->startSection('main-section'); ?>
<div class="md-col-12">
    <div id="myCarousel" class="carousel slide"><br>
        <style>
            /* Make the image fully responsive */
            #myCarousel{
                width:100%;
                margin:auto;
            }
            .carousel-inner img {
              width: 100%;
              height: 50%;
            }
            .carousel-inner{
                width:100%;
            }
            .carousel-control-prev,.carousel-control-next{
                margin: auto;
            }
            .carousel-caption{
              color:black;
              font-size:2rem;
            }
            </style>
        <!-- The slideshow -->
        <div class="carousel-inner">
          <?php $__currentLoopData = $c; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>         
            <div class="carousel-item  <?php if($item->carousel_id==1): ?> active <?php endif; ?> ">
              <img src="<?php echo e(asset("images/carousel/$item->carousel_image")); ?>" >
              <div class="carousel-caption">
                <h3><?php echo e($item->carousel_name); ?></h3>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
      </div>
      
      <script>
      $(document).ready(function(){
        // Activate Carousel
        $("#myCarousel").carousel();
        // Enable Carousel Controls
        $(".carousel-control-prev").click(function(){
          $("#myCarousel").carousel("prev");
        });
        $(".carousel-control-next").click(function(){
          $("#myCarousel").carousel("next");
        });
      });
      </script>
    </div>
</div>

    <br>
    <div class="container-fluid">
      <div class="container">
          <h2 style="font-weight:bold; text-align:center; color:white">PHIM MỚI CẬP NHẬT</h2>
          <hr style="width:10%; text-align:center; color:gray; height: 0px; background-color: gray;">
          <div class="row" style="background-color:lightgray;">
              <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xs-6 col-sm-6 col-md-3" style="padding:10px;">
                <a href="<?php echo e(asset("pages/film/film_detail/$item->film_id")); ?>" title="" >
                <img src="<?php echo e(asset("images/phim/$item->film_poster")); ?>" width="100%">
                  <div class="name">
                    <p class='name-vi' style="font-size:120%"><?php echo e($item->film_title); ?></p>
                    <p class='time-film' style="font-size:120%"><?php echo e($item->film_release_year); ?></p>
                </div>
              </a>
              </div>        
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(asset("pages/film/film")); ?>"><span style="float:right; color:lightseagreen;font-weight:bold;font-size:1.5rem;">  >>Xem thêm</span></a>
          </div>
      </div>
      <br><br>
      <div class="container-fluid">
          <h2 style="font-weight:bold; text-align:center; color:white">CHỦ ĐỀ MỚI</h2>
          <hr style="width:16%; text-align:center; color:gray; height: 0px; background-color: gray;">
          <div class="row" style="background-color:lightgray;padding:10px;" >
            <?php $__currentLoopData = $t; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6" style="margin-bottom:20px;">
              <div class="col-xs-5 col-sm-5 col-md-4"><img src="<?php echo e(url('images/topic/'.$item->topic_poster)); ?>" width="100%" height="120px" ></div>
              <div class="col-xs-7 col-sm-7 col-md-8">
              <a style="font-weight: bold;font-size:150%;" href=""><?php echo e($item->topic_title); ?></a>
              <p style="color: #576069"><?php echo e($item->topic_date); ?></p>
              </div> 
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
        </div>
      </div>
      <br>
    </div>
  <?php $__env->stopSection(); ?>  
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\motphim\resources\views/pages/home.blade.php ENDPATH**/ ?>