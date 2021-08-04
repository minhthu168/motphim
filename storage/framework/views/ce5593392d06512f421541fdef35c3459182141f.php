
<?php $__env->startSection('title','admin'); ?>
<?php $__env->startSection('main-content'); ?>
    <h2>TRANG ADMIN</h2>
    <div class="container">
        <h2 style="color: goldenrod; font-weight: bold">LIST OF USERS</h2>
        <div class="login">  
            <a href="<?php echo e(url("admin/create-user")); ?>">Create New User</a>    
            <a  href="<?php echo e(url('logout')); ?>" class="btn btn-info" >Logout</a>            
        </div>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>role</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->username); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->role); ?></td>
                    <td><?php echo e($user->active?"active":"inactive"); ?></td>
                    <td><a href="<?php echo e(url("admin/resetpass/$user->id")); ?>">reset password</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\d03\resources\views/admin/home.blade.php ENDPATH**/ ?>