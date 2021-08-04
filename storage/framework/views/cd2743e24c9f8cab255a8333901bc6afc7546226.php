
<?php $__env->startSection('title','film-index'); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid" style="padding: 40px;">
    <div class="row">
    <div class=col-md-5>
        <form action="<?php echo e(url('admin/film/category/createCat')); ?>" method="post" style="border:gray ridge 1px; padding:30px;margin:40px;">
            <?php echo e(csrf_field()); ?>

            <h3 style="text-align:center;color:blue;">Thêm thể loại mới</h3>
                    <?php if($message = Session::get('loi')): ?>
                    <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php endif; ?>
            <div class="form-group">
                <label >ID </label>
                <input type="text" class="form-control" id="cat_id" name="cat_id">
            </div>
            <div class="form-group">
                <label>Tên thể loại mới</label>
                <input type="text" class="form-control" id="cat_name" name="cat_name">
            </div>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
        <form action="<?php echo e(url('admin/film/category/editCat')); ?>" method="post" style="border:gray ridge 1px; padding:30px;margin:40px;">
            <?php echo e(csrf_field()); ?>

            <h3 style="text-align:center;color:blue;">Sửa tên thể loại</h3>
                <?php if($message = Session::get('Loi')): ?>
                <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo e($message); ?></strong>
                </div>
                <?php endif; ?>
            <div class="form-group">
                <label>Chọn tên thể loại cần sửa</label>                        
                    <select class="form-control select" style="width: 100%;" id="cat_id" name="cat_id" required>
                      <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($item->cat_id); ?>"><?php echo e($item->cat_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
            </div>
            <div class="form-group">
                <label>Tên mới thể loại</label>
                <input type="text" class="form-control" id="cat_name" name="cat_name">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    <div class=col-md-5 style="padding-left:100px;">
<table class="table table-hover table-bordered">
    <h2 style="color:blue;">TẤT CẢ THỂ LOẠI PHIM</h2>
    <thead class="table-warning">
        <tr class="text-center">
            
            <th>ID</th>
            <th>Tên thể loại</th>
            <th >Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td> <?php echo e($item->cat_id); ?></td>
                <td> <?php echo e($item->cat_name); ?></td> 
                <td class="text-center">
                    <a class="btn btn-warning btn-sm" href="<?php echo e(url("admin/film/category/{$item->cat_id}")); ?>" onclick="javascript:return confirm('Lưu ý: Phim thuộc thể loại này cũng sẽ bị xóa theo. Bạn có chắc muốn xóa không?')">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
    </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/film/category.blade.php ENDPATH**/ ?>