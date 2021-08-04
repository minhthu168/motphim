<!-- lưu tại /resources/views/product/create.blade.php -->

<?php $__env->startSection('title','film-create new'); ?>
<?php $__env->startSection('main-content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-2 col-md-7">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="text-center" ><?php echo e($f->film_title); ?>(<?php echo e($f->film_release_year); ?>)</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo e(url('admin/film/detail/'.$f->film_id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="card-body">
                            <div class=row>
                                <div class="col-md-4">
                                    <img src="<?php echo e(asset("images/phim/$f->film_poster")); ?>" alt="" width="100%"> 
                                </div>
                                <div class='col-md-6' style="padding-left:80px;">
                                    <span><b>ID Phim:</b> <?php echo e($f->film_id); ?></span><br>
                                    <span><b>Tên Phim:</b> <?php echo e(($f->film_title)); ?></span><br>
                                    <span><b>Năm phát hành:</b> <?php echo e($f->film_release_year); ?></span><br>
                                    <span><b>Quốc gia:</b> <?php echo e($f->film_nation); ?></span><br>
                                    <span><b>Thể loại:</b> <?php echo e($f->film_form==0?'Phim truyền hình':'Phim chiếu rạp'); ?>, <?php echo e($f->film_cat); ?></span><br>
                                    <span><b>Đạo diễn Phim:</b> <?php echo e($f->film_director); ?></span><br>
                                    <span><b>Nam diễn viên chính:</b> <?php echo e($f->film_actor?$f->film_actor:"Chưa cập nhật"); ?></span><br>
                                    <span><b>Nữ diễn viên chính:</b> <?php echo e($f->film_actress?$f->film_actress:"Chưa cập nhật"); ?></span><br>
                                    <span><b>Số tập:</b> <?php echo e($f->film_episode); ?></span><br>
                                    <span><b>Thời Lượng:</b> <?php echo e($f->film_runtime); ?></span><br>
                                    <span><b>Đánh giá :</b> <?php echo e($f->rate); ?>/5</span><br>
                                </div>
                            </div>
                            <div style="margin: 3%;">
                                <b>Tóm tắt:</b>
                                <p><?php echo e($f->film_synopsis); ?><p>
                                <p><b>Trailer:</b></p>
                               <iframe width="100%" height="430" src="https://www.youtube.com/embed/<?php echo e($f->film_trailer); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen enctype="multipart/form-data"></iframe>
                            </div><br>
                            
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="javascript:history.back()" class="btn btn-info">Quay lại</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-section'); ?>
<script src="<?php echo e(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/film/detail.blade.php ENDPATH**/ ?>