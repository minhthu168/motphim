
<?php $__env->startSection('title', 'admin-comment'); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container">
        <table class="table table-hover table-striped">
            <br>
            <h2 style="color: goldenrod; font-weight: bold">DANH SÁCH BÌNH LUẬN</h2><br>
            

            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Vai trò</th>
                    <th>Tên</th>
                    <th>Số bình luận</th>
                    <th>Chi tiết</th>
                    <th colspan="2">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->user_id); ?></td>
                        <td>
                            <?php if($user->user_role === 1): ?>
                                Admin
                            <?php elseif(($user->user_role)===2): ?>
                                Mod
                            <?php else: ?>
                                Member 
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($user->username); ?></td>
                        <td><?php echo e($user->comment); ?></td>
                        
                        <td>
                            <a class="btn btn-danger" href="<?php echo e(url('admin/delete/'.$user->user_id)); ?>"
                            onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa tài khoản này ?')"><i class="fas fa-trash"></i>
                            Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/comment.blade.php ENDPATH**/ ?>