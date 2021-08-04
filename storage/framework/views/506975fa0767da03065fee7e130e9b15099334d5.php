
<?php $__env->startSection('title', 'celeb-index'); ?>
<?php $__env->startSection('main-content'); ?>
    <br>
    <h2 style="color: goldenrod; font-weight:bold">DANH SÁCH NGƯỜI NỔI TIẾNG</h2>
    <div>
        <a href="<?php echo e(url('admin/celeb/create')); ?>"><button type="submit" class="btn btn-primary">Thêm người nổi tiếng</button></a>
    </div>
    <br>
    <table class="table table-hover table-striped " id="celeb">
        <thead class="table-success">
            <tr>
                <th>ID </th>
                <th>Nghề nghiệp </th>
                <th style="text-align:center">Tên </th>
                <th>Năm sinh</th>
                <th style="text-align:center">Thông tin</th>
                <th style="text-align:center">Hình ảnh</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <?php echo e($item->celeb_id); ?> </td>
                    <td>
                        <?php if($item->celeb_type === 0): ?>
                            Đạo diễn
                        <?php elseif(($item->celeb_type)=== 1): ?>
                            Diễn viên nam
                        <?php else: ?>
                            Diễn viên nữ
                        <?php endif; ?>
                    </td>
                    <td style="width:15%"> <?php echo e($item->celeb_name); ?></td>
                    <td> <?php echo e($item->celeb_yob); ?></td>
                    <td style="width:50%"> <?php echo e(substr($item->profile,0,900)); ?></td>
                    <td> <img src="<?php echo e(asset("images/celeb/$item->celeb_image")); ?>" width="100%" height="150px"> </td>

                    <td style="width:5%">
                        <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/celeb/detail/' . $item->celeb_id)); ?>">
                            <i class="fas fa-folder"></i> Xem
                        </a>
                        <a class="btn btn-info btn-sm" href="<?php echo e(url('admin/celeb/edit/' . $item->celeb_id)); ?>">
                            <i class="fas fa-pencil-alt"></i> Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?php echo e(url("admin/celeb/index/{$item->celeb_id}")); ?>"
                            onclick="javascript:return confirm('Bạn chắc chắn muốn xóa <?php echo e($item->celeb_name); ?> ?')">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-section'); ?>
    <script>
        $(function() {
            $('#celeb').DataTable({
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

<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\motphim\resources\views/admin/celeb/index.blade.php ENDPATH**/ ?>