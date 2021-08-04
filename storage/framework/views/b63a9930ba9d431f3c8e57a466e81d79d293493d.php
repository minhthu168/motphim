
<?php $__env->startSection('title','signup'); ?>
<?php $__env->startSection('main-section'); ?>
    <div class="container">
        <h2>Sign up</h2>
        <br>
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
                        <input type="password" name="user_pass" id="user_pass" required value="abc" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="user_email" id="user_email" required class="form-control" value="tam@gmail.com">
                    </div>

                    <div class="form-group">
                        <label>gender</label>
                        <input type="radio" name="user_gender" id="user_gender" value="0" checked>nu 
                        <input type="radio" name="user_gender" id="user_gender" value="1">nam
                    </div>

                    <div class="form-group">
                        <label>year of birth</label>
                        <input type="number" name="user_yob" id="user_yob" required class="form-control" value="2005">
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

<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/signup.blade.php ENDPATH**/ ?>