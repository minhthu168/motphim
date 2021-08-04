
<?php $__env->startSection('title','news-index'); ?>
<?php $__env->startSection('main-content'); ?>
<br>
<h2 style="color: goldenrod; font-weight: bold">DANH SÁCH TIN TỨC - SỰ KIỆN</h2>
<div>
    <a href="<?php echo e(url('admin/news/create')); ?>"><button type="submit" class="btn btn-primary">Thêm tin tức- sự kiện</button></a>
</div>
<br><br>
<table class="table table-hover table-striped" id="news">
    <thead class="table-success">
        <tr>
            <th>ID</th>
            <th>Ngày đăng</th>
            <th style="text-align: center">Tiêu đề</th>
            <th style="text-align: center">Nội dung</th>
            <th style="text-align: center">Hình ảnh</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->news_id); ?></td>
            <td width="9%"><?php echo e($item->news_date); ?></td>
            <td width="20%"><?php echo e($item->news_subject); ?></td>
            <td><?php echo e(substr($item->news_content,0,400)); ?></td>
            <td><img src="<?php echo e(asset("images/news-event/$item->news_image")); ?>" width="80%"></td>
            <td width="5%">
                <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/news/detail/'.$item->news_id)); ?>">
                    <i class="fas fa-eye">
                    </i>
                Xem   
                </a>
                <a class="btn btn-info btn-sm" href="<?php echo e(url('admin/news/edit/'.$item->news_id)); ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                Sửa    
                </a>
                <a class="btn btn-danger btn-sm" href="<?php echo e(url('admin/news/index/'.$item->news_id)); ?>" onclick="javascript:return confirm('Bạn có chắc chắn muốn xóa không ?')">
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
        $('#news').DataTable({
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
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/news/index.blade.php ENDPATH**/ ?>