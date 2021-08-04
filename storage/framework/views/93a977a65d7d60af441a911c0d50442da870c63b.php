
<?php $__env->startSection('title','film-index'); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid">
<br>
<h2 style="color: goldenrod; font-weight: bold">DANH SÁCH PHIM </h2>
<a href="<?php echo e(url('admin/film/create')); ?>"><button type="submit" class="btn btn-success">Tạo Phim Mới</button></a>
<a href="<?php echo e(url('admin/film/approved')); ?>"><button type="submit" class="btn btn-primary">Duyệt Phim</button></a>
<br><br>
<table class="table table-hover table-striped " id="film">
    <thead class="table-success">
        <tr class="text-center">
            <th> ID Phim</th>
            <th>Poster</th>
            <th>Tên Phim</th>
            <th>Năm</th>
            <th>Quốc gia</th>           
            <th>Thể loại</th>
            <th>Thời lượng</th>
            <th>Số tập</th>
            <th >Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td> <?php echo e($item->film_id); ?> </td>
                <td> <img src="<?php echo e(asset("images/phim/$item->film_poster")); ?>" width="50%" > </td>
                <td> <?php echo e($item->film_title); ?></td>
                <td> <?php echo e($item->film_release_year); ?></td> 
                <td> <?php echo e($item->film_nation); ?></td>             
                <td> <?php echo e($item->film_cat); ?></td>
                <td> <?php echo e($item->film_runtime); ?></td>
                <td> <?php echo e($item->film_episode); ?></td>
                <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/film/detail/'.$item->film_id)); ?>">
                        <i class="fas fa-eye"></i> Xem
                    </a>
                    <a class="btn btn-info btn-sm" href="<?php echo e(url('admin/film/edit/'.$item->film_id)); ?>">
                        <i class="fas fa-pencil-alt"></i> Sửa
                    </a>
                    <a class="btn btn-danger btn-sm" href="<?php echo e(url("admin/film/index/{$item->film_id}")); ?>" onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa không ?')">
                        <i class="fas fa-trash"></i> Xóa
                    </a><br>
                    <a class="btn btn-warning btn-sm" href="<?php echo e(url('admin/topic/create/'.$item->film_id)); ?>">
                        <i class="fas fa-folder"></i> Thêm chủ đề phim mới
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
        $('#film').DataTable({
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
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/film/index.blade.php ENDPATH**/ ?>