
<?php $__env->startSection('title','book - phia admin'); ?>
<?php $__env->startSection('main-content'); ?>
<h2 style="color: goldenrod; font-weight: bold">LIST OF BOOKS</h2>
<div>
    <a href="<?php echo e(url('/admin/book/create')); ?>" style="float: right">Create New Book</a>
</div>
<table class="table table-hover" id="book">
    <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>author</th>
            <th>picture</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item ->id); ?></td>
            <td><?php echo e($item->title); ?></td>
            <td><?php echo e($item->author); ?></td>
            <td><img src="<?php echo e(asset("images/$item->picture")); ?>" class="pic-in-list"></td>
            <td>
                <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/book/view/'.$item->id)); ?>">
                    <i class="fas fa-eye">
                    </i>
                    View
                </a>
                <a class="btn btn-info btn-sm" href="<?php echo e(url('admin/book/edit/'.$item->id)); ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                </a>
                <a class="btn btn-danger btn-sm" href="<?php echo e(url('admin/book/delete/'.$item->id)); ?>" .onclick='return confirm(\"Are u sure ?\")'>
                    <i class="fas fa-trash">
                    </i>
                    Delete
                </a>
            
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-section'); ?>
<script>
    $(function(){
        $('#book').DataTable({
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
<?php echo $__env->make('admin-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/admin/book/index.blade.php ENDPATH**/ ?>