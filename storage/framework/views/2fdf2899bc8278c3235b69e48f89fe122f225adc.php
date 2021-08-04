
<?php $__env->startSection('title','user profile'); ?>
<?php $__env->startSection('main-section'); ?>   
    <div class="container">
        <h2>User Profile</h2>
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="form-group">
                        <label>username</label>
                        <input type="text" name="username" id="username" required value="<?php echo e($user->username); ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <input type="text" name="pass" id="pass" class="form-control" value="<?php echo e($user->password); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo e($user->email); ?>" readonly>
                    </div>
                    <a href="<?php echo e(url('user/index')); ?>" class="btn btn-info">View Book</a>

                    <a href="<?php echo e(url('logout')); ?>" class="btn btn-info">Logout</a>    
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('script-section'); ?>
<script src="<?php echo e(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>">
</script>
<script type="text/javascript">
   $(document).ready(function(){
   bsCustomFileInput.init();
   });
</script>
<?php $__env->stopSection(); ?>    

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\d03\resources\views/user/profile.blade.php ENDPATH**/ ?>