
<?php $__env->startSection('title','film-index'); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid" style="padding: 40px;">
    <div class="row">
    <div class=col-md-5>
        <form action="<?php echo e(url('admin/film/nation/createNation')); ?>" method="post" style="border:gray ridge 1px; padding:30px;margin:40px;">
            <?php echo e(csrf_field()); ?>

            <h3 style="text-align:center;color:blue;">Thêm quốc gia mới</h3>
            <div class="form-group">
                <label >ID </label>
                <input type="text" class="form-control" id="nation_id" name="nation_id">
            </div>
            <div class="form-group">
                <label>Tên quốc gia mới</label>
                <input type="text" class="form-control" id="nation_name" name="nation_name">
            </div>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
        <form action="<?php echo e(url('admin/film/nation/editNation')); ?>" method="post" style="border:gray ridge 1px; padding:30px;margin:40px;">
            <?php echo e(csrf_field()); ?>

            <h3 style="text-align:center;color:blue;">Sửa tên quốc gia</h3>
            <div class="form-group">
                <label>Chọn tên quốc gia cần sửa</label>                        
                    <select class="form-control select" style="width: 100%;" id="nation_id" name="nation_id" required>
                      <?php $__currentLoopData = $n; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($item->nation_id); ?>"><?php echo e($item->nation_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
            </div>
            <div class="form-group">
                <label>Tên mới quốc gia</label>
                <input type="text" class="form-control" id="nation_name" name="nation_name">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    <div class=col-md-5 style="padding-left:100px;">
<table class="table table-hover table-bordered">
    <h2 style="color:blue;">TẤT CẢ CÁC QUỐC GIA</h2>
    <thead class="table-warning">
        <tr class="text-center">
            
            <th>ID</th>
            <th>Tên quốc gia</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $n; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td> <?php echo e($item->nation_id); ?></td>
                <td> <?php echo e($item->nation_name); ?></td> 
                <td><a class="btn btn-warning btn-sm" href="<?php echo e(url("admin/film/nation/{$item->nation_id}")); ?>" onclick="javascript:return confirm('Lưu ý: Phim thuộc quốc gia này cũng sẽ bị xóa theo. Bạn có chắc muốn xóa không?')">
                    <i class="fas fa-trash"></i> Xóa
                </a></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
    </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/film/nation.blade.php ENDPATH**/ ?>