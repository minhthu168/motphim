
<?php $__env->startSection('title','userlist'); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container">
        <h2 style="color: goldenrod; font-weight: bold">LIST OF USERS</h2>
        <div class="login">     
            <a  href="<?php echo e(url('logout')); ?>" class="btn btn-info" >Logout</a>            
        </div>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th> 
                    <th>role</th>                  
                    <th>username</th>
                    <th>password</th>
                    <th>email</th>
                    <th>gender</th>
                    <th>yob</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->user_id); ?></td>
                    <td><?php echo e($user->user_role); ?></td>
                    <td><?php echo e($user->username); ?></td>
                    <td><?php echo e($user->user_pass); ?></td>
                    <td><?php echo e($user->user_email); ?></td>
                    <td><?php echo e($user->user_gender?"nam":"nu"); ?></td>
                    <td><?php echo e($user->user_yob); ?></td>
                    <td><a href="<?php echo e(url("admin/resetpass/$user->user_id")); ?>">reset password</a> |
                        <a href="<?php echo e(url("admin/changeaccounttype/$user->user_id")); ?>">change account type</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/userlist.blade.php ENDPATH**/ ?>