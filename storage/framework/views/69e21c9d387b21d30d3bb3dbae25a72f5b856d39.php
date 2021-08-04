
<?php $__env->startSection('title','topic-approved'); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid">
    <br>
    <h2 style="color: goldenrod; font-weight: bold">DANH SÁCH CHỦ ĐỀ PHIM CHỜ DUYỆT</h2>
    <a href="<?php echo e(url('admin/topic')); ?>"><button type="submit" class="btn btn-warning">Về trang chủ đề phim</button></a>
    <br><br>
    <table class="table table-hover table-striped " id="topic" style="padding:10px">
        <thead class="table-success">
            <tr class="text-center">
                <th>ID</th>
                <th style="width:30%">Tiêu đề</th>
                <th>Hình ảnh</th>
                <th>Ngày đăng</th>           
                
                <th>Tên phim</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td> <?php echo e($item->topic_id); ?> </td>
                <td> <?php echo e($item->topic_title); ?></td>
                <td> <img src="<?php echo e(asset("images/topic/$item->topic_poster")); ?>" width="100%"> </td>
                <td width="15%"> <?php echo e($item->topic_date); ?></td>
                <td width="20%"><?php echo e($item->tenphim->film_title); ?></td>
                <td width="20%">
                    <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/topic/view/'.$item->topic_id)); ?>">
                        <i class="fas fa-eye"></i> Xem
                    </a>
                    <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/topic/approved/'.$item->topic_id)); ?>">
                        <i class="fas fa-folder"></i> Duyệt
                    </a>
                    <a class="btn btn-info btn-sm" href="<?php echo e(url('admin/topic/edit/'.$item->topic_id)); ?>">
                        <i class="fas fa-pencil-alt"></i> Sửa
                    </a>
                    <a class="btn btn-danger btn-sm" href="<?php echo e(url("admin/topic/approved/{$item->topic_id}")); ?>" onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa không ?')">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-section'); ?>
<script>
    $(function () {
        $('#topic').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/topic/approved.blade.php ENDPATH**/ ?>