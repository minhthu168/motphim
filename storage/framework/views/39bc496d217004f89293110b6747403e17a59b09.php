
<?php $__env->startSection('title','film-index'); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid" style="padding: 40px;">
<table class="table table-hover table-bordered">
    <h2 style="color:blue;">ẢNH CAROUSEL</h2>
    <thead class="table-warning">
        <tr class="text-center">
            <th>Tên</th>
            <th>Hình</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td> <?php echo e($item->carousel_name); ?></td>
                <td> <img src="<?php echo e(asset("images/carousel/$item->carousel_image")); ?>" alt=""  width="30%"> </td>
                <td><a class="btn btn-warning btn-sm" href="<?php echo e(url("admin/carousel/edit/{$item->carousel_id}")); ?>">
                    <i class="fas fa-pencil-alt"></i> Đổi ảnh
                </a></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/carousel/index.blade.php ENDPATH**/ ?>