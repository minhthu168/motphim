
<?php $__env->startSection('title','book - phia user'); ?>
<?php $__env->startSection('main-section'); ?>
<h2 style="color: goldenrod; font-weight: bold">LIST OF BOOKS</h2>
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
            <td><?php echo e($item->id); ?></td>
            <td><?php echo e($item->title); ?></td>
            <td><?php echo e($item->author); ?></td>
            <td><img src="<?php echo e(asset("images/$item->picture")); ?>" class="pic-in-list"></td>
            <td><a href="<?php echo e(url('admin/book/view/'.$item->id)); ?>">View</a></td>
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
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/user/index.blade.php ENDPATH**/ ?>