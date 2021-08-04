<!-- lưu tại /resources/views/product/create.blade.php -->

<?php $__env->startSection('title','celeb-edit'); ?>
<?php $__env->startSection('main-content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật thông tin người nổi tiếng: <?php echo e($c->celeb_name); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo e(url('admin/celeb/editPost/'.$c->celeb_id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="card-body">
                            <div class="form-group">
                                <label >ID </label>
                                <input type="text" class="form-control" id="celeb_id" name="celeb_id" value="<?php echo e($c->celeb_id); ?>" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Nghề nghiệp:</label>
                                <div class="custom-control custom-radio"> 
                                    <input name="celeb_type" type="radio" value="0" <?php if(($c->celeb_type)=='0'): ?> checked
                                    <?php endif; ?>>Đạo diễn <br>
                                    <input name="celeb_type"  type="radio" value="1" <?php if(($c->celeb_type)=='1'): ?> checked
                                    <?php endif; ?>/>Diễn viên nam <br>
                                    <input name="celeb_type"  type="radio" value="2" <?php if(($c->celeb_type)=='2'): ?> checked
                                    <?php endif; ?>/>Diễn viên nữ
                                    </div>

                                <div class="form-group">
                                    <label>Tên </label>
                                    <input type="text" class="form-control" id="celeb_name" name="celeb_name"
                                    value="<?php echo e($c->celeb_name); ?>">
                                </div>

                                <div class="form-group">
                                    <label>Năm sinh :</label> <br>
                                    <input type="number" name="celeb_yob" id="celeb_yob" required class="form-control"
                                    value="<?php echo e($c->celeb_yob); ?>">
                                </div>

                                <div class="form-group">
                                    <p><label for="">Ảnh </label><p>
                                    <img class="img-fluid" width="300px" src="<?php echo e(url("images/celeb/$c->celeb_image")); ?>"/><br><br>
                                     <div class="input-group">
                                         <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="celeb_image" name="celeb_image">
                                            <label class="custom-file-label" for=""><?php echo e($c->celeb_image); ?></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Thông tin </label>
                                    <textarea class="form-control" rows="6" name="profile"
                                    ><?php echo e($c->profile); ?></textarea>
                                </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="javascript:history.back()" class="btn btn-info">Quay lại</a>
                            <button type="submit" class="btn btn-danger">Cập nhật</button>
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
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/celeb/edit.blade.php ENDPATH**/ ?>