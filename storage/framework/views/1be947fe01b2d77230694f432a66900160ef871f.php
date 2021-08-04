
<?php $__env->startSection('title','topic-index'); ?>
<?php $__env->startSection('main-content'); ?>
<br>
<h2 style="color: goldenrod; font-weight: bold">DANH SÁCH CHỦ ĐỀ PHIM</h2>
<a href="<?php echo e(url('admin/topic/approved')); ?>"><button type="submit" class="btn btn-primary">Duyệt chủ đề phim</button></a>
<br><br>
<table class="table table-hover table-striped" id="topic">
    <thead class="table-success">
        <tr>
            <th>ID</th>
            <th style="text-align: center">Tiêu đề</th>
            <th>Hình ảnh</th>
            <th style="width:10%">Ngày đăng</th>
            <th>Tên phim</th>
            <th style="text-align: center">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->topic_id); ?></td>
            <td style="width:40%"><?php echo e($item->topic_title); ?></td>
            <td><img src="<?php echo e(asset("images/topic/$item->topic_poster")); ?>" class="pic-in-list"></td>
            <td><?php echo e($item->topic_date); ?></td>
            <td><?php echo e($item->tenphim->film_title); ?></td>
            <td style="width:20%">
                <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/topic/view/'.$item->topic_id)); ?>">
                    <i class="fas fa-eye">
                    </i>
                Xem   
                </a>
                <a class="btn btn-info btn-sm" href="<?php echo e(url('admin/topic/edit/'.$item->topic_id)); ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                Sửa    
                </a>
                <a class="btn btn-danger btn-sm" href="<?php echo e(url('admin/topic/delete/'.$item->topic_id)); ?>" onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa không ?')">
                    <i class="fas fa-trash">
                    </i>
                Xóa    
                </a>  
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-section'); ?>
<script>
    $(function(){
        $('#topic').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/topic/index.blade.php ENDPATH**/ ?>