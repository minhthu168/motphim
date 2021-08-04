<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php $__env->startSection('title', 'topic'); ?>
<?php $__env->startSection('main-section'); ?>
<div class="container" id="table_data">
  <h1 style="text-align: center">TOPIC</h1>  
  <?php $__currentLoopData = $t; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <h3 style="color: red; margin-left: 10rem; font-weight: bold; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"><?php echo e($item->topic_title); ?></h3>
  <div class="row">
    <div class="col-md-5">
      <img src="<?php echo e(url('images/'.$item->topic_poster)); ?>" style="width:300px; height:140px; margin-left:10rem; border-radius:2%" >
    </div>
    <div class="col-md-7">
      <p><span class="glyphicon glyphicon-user"></span> <?php echo e($item->nguoidang->username); ?></p>
      <p><span class="glyphicon glyphicon-calendar"></span> <?php echo e($item->topic_date); ?></p> 
      <p><span class="glyphicon glyphicon-eye-open"></span> so luot xem</p>
    </div>
  </div>
  <hr width="82%">
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>


<p> <?php echo $t->links(); ?></p>

<script>
  $(document).ready(function () {
      $(document).on('click', '.page-link', function (event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
      });
      function fetch_data(page) {
          var _token = $("input[name=_token]").val();
          $.ajax({
              url: "<?php echo e(route('pagination.fetch')); ?>",
              method: "POST",
              data: { _token: _token, page: page },
              success: function (t) {
                  $('#table_data').html(t);
              }
          });
      }
  });
</script>

<?php echo $__env->make('web-layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\d03\resources\views/pages/topic.blade.php ENDPATH**/ ?>