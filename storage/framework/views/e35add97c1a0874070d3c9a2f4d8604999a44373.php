

<?php $__env->startSection('title', 'login'); ?>

<?php $__env->startSection('main-section'); ?>
<div class="container">
    <h2>Login</h2>
    <div>
        <!-- khoi bao loi dang nhap ko hop le -->
        <h3 style="color:red">
            <?php if(session ('message')): ?>
            <?php echo e(session('message')); ?>

            <?php endif; ?>
        </h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo e(url("/checklogin")); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>username</label>
                    <input type="text" name="username" id="username" required value="admin" class="form-control">
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="password" name="user_pass" id="user_pass" required value="111" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-danger" value="btok">Submit</button>
                    <button type="reset" class="btn btn-info">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/login.blade.php ENDPATH**/ ?>