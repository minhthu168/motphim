
<?php $__env->startSection('title','create-user'); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container">
        <h2>Create new user</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <form action="<?php echo e(url("admin/post")); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>username</label>
                        <input type="text" name="username" id="username" required value="tam" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" id="password" required value="abc" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" id="email" required class="form-control" value="abc">
                    </div>

                    <div class="form-group">
                        <label>role</label>
                        <input type="radio" name="role" id="role" value="0" checked>user -
                        <input type="radio" name="role" id="role" value="1">admin
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

<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\d03\resources\views/admin/create-user.blade.php ENDPATH**/ ?>