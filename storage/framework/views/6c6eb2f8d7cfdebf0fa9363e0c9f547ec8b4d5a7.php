
<?php $__env->startSection('title', 'login'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>">
<?php $__env->startSection('main-section'); ?>
<div class="row" style="margin: 10px;">
    <div class="col-md-4" style="margin: auto;">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h4 style="text-align: center;">Đăng nhập</h4>
            </div>
            <h3 style="color: red;">
                <?php if(session('message')): ?>
                <?php echo e(session('message')); ?>

                <?php endif; ?>
            </h3>
            <!-- /.card-header -->
            <form role="form" action="<?php echo e(url('pages/checklogin')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <div class="form-group">
                        <label>Nhập tên: </label>
                        <input class="form-control" type="text" name="username" id="username" required value="Phuc">
                    </div>

                    <div class="form-group">
                        <label>Mật khẩu: </label>
                        <input type="password" name="user_pass" id="user_pass" class="form-control" required value="123">
                    </div>                                          
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning" value="btok">Đăng nhập</button>
                    <button type="reset" class="btn btn-info">Thiết lập lại</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>      
</div>
<?php $__env->stopSection(); ?>
<style>
      .footer {
        width: 100%;
        text-align: center;
        position: fixed;
        bottom: 0%;
        margin-top: 50%;
    }
</style>    
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\motphim\resources\views/pages/login.blade.php ENDPATH**/ ?>