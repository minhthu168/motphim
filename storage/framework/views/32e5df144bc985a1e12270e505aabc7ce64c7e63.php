
<?php $__env->startSection('title', 'admin-index'); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container">
        <table class="table table-hover table-striped">
            <br>
            <h2 style="color: goldenrod; font-weight: bold">DANH SÁCH NGƯỜI DÙNG</h2><br>
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Vai trò</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Năm sinh</th>
                    <th>Giới tính</th>
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
                        <td><?php echo e($user->user_email); ?></td>
                        <td><?php echo e($user->user_pass); ?></td>
                        <td><?php echo e($user->user_yob); ?></td>
                        <td><?php echo e($user->user_gender == 1 ? 'Nam' : 'Nữ'); ?></td>
                        
                        <td>
                            <a class="btn btn-info" href="<?php echo e(url('admin/changeaccounttype/'.$user->user_id)); ?>"><i class="fas fa-pencil-alt"></i>Thay đổi loại tài khoản</a>
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
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/index.blade.php ENDPATH**/ ?>