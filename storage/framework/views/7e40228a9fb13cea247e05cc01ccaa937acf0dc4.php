
<?php $__env->startSection('title', 'mod'); ?>
<?php $__env->startSection('main-section'); ?>
    <div class="row" style="margin: 10px;">
        <div class="col-md-5" style="margin: auto;">
            <!-- general form elements -->
            <div class="card card-warning">
                <div class="card-header">
                    <h4 style="text-align: center;">THÀNH VIÊN</h4>
                </div>
                <!-- /.card-header -->
                <form role="form">
                    <div class="card-body"> 
                    <div class="form-group">
                        <label>Tên thành viên</label>
                        <input class="form-control" type="text" name="username" id="username" readonly
                        value="<?php echo e($user->username); ?>">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="text" name="user_pass" id="user_pass" readonly class="form-control"
                        value="<?php echo e($user->user_pass); ?>">
                        <a style="text-decoration: underline; font-size:medium" href="<?php echo e(url('pages/changePassword')); ?>">Đổi mật khẩu</a>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="user_email" id="user_email" readonly class="form-control"
                        value="<?php echo e($user->user_email); ?>">
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <input type="text" name="user_gender" id="user_gender" readonly class="form-control"
                        value="<?php echo e($user->user_gender?"Nam":"Nữ"); ?>">
                    </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/pages/user/mod.blade.php ENDPATH**/ ?>