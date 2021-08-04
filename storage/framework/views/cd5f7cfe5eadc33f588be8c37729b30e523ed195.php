<!-- lưu tại /resources/views/product/create.blade.php -->

<?php $__env->startSection('title', 'celeb-detail'); ?>
<?php $__env->startSection('main-content'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-2 col-md-7">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="text-center"><?php echo e($c->celeb_name); ?>(<?php echo e($c->celeb_yob); ?>)</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?php echo e(url('admin/celeb/detail/' . $c->celeb_id)); ?>" method="post"
                            enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="card-body">
                                <div class=row>
                                    <div class="col-md-12">
                                        <img src="<?php echo e(asset("images/celeb/$c->celeb_image")); ?>" width="100%" height="500px">
                                    </div>   
                                    <div class="col-md-12">
                                        <b>ID:</b> <?php echo e($c->celeb_id); ?><br>
                                        <b>Tên:</b> <?php echo e($c->celeb_name); ?><br>
                                        <b>Năm sinh:</b> <?php echo e($c->celeb_yob); ?><br>
                                        <b>Nghề nghiệp:</b>
                                        <?php if($c->celeb_type === 0): ?>
                                            Đạo diễn
                                        <?php elseif(($item->celeb_type)=== 1): ?>
                                            Diễn viên nam
                                        <?php else: ?>
                                            Diễn viên nữ
                                        <?php endif; ?>
                                    <br>
                                        <b>Thông tin:</b> <?php echo e($c->profile); ?><br>
                                        <br><br>
                                    </div>
                                </div>
                            </div><br>
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
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/celeb/detail.blade.php ENDPATH**/ ?>