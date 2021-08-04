
<?php $__env->startSection('title','film-index'); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid" style="padding: 40px;">
<h2 style="color:goldenrod; font-weight:bold">DANH SÁCH PHIM CHỜ DUYỆT</h2>
<a href="<?php echo e(url('admin/film/index')); ?>"><button type="submit" class="btn btn-warning">Về trang phim</button></a>
<br><br>
<table class="table table-hover table-striped " id="film" style="padding:10px;">
    <thead class="table-success">
        <tr class="text-center">
            <th> ID Phim</th>
            <th>Poster</th>
            <th>Tên Phim</th>
            <th>Năm</th>           
            <th>Thể loại</th>
            <th >Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td> <?php echo e($item->film_id); ?> </td>
                <td style="width:30%"> <img src="<?php echo e(asset("images/phim/$item->film_poster")); ?>" width="30%"> </td>
                <td> <?php echo e($item->film_title); ?></td>
                <td> <?php echo e($item->film_release_year); ?></td>               
                <td> <?php echo e($item->film_cat); ?></td>
                <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/film/approved/'.$item->film_id)); ?>">
                        <i class="fas fa-folder"></i> Duyệt
                    </a>
                    <a class="btn btn-info btn-sm" href="<?php echo e(url('admin/film/edit/'.$item->film_id)); ?>">
                        <i class="fas fa-pencil-alt"></i> Sửa
                    </a>
                    <a class="btn btn-danger btn-sm" href="<?php echo e(url("admin/film/approved/{$item->film_id}")); ?>" onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa không ?')">
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
        $('#film').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/film/approved.blade.php ENDPATH**/ ?>