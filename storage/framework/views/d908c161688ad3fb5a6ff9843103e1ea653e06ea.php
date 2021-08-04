<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/mycss.css')); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>">
</head>
<body>
    <?php echo $__env->make('web-layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('main-section'); ?> 

    <?php echo $__env->make('web-layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
    <style>
    .navbar-nav li{
        padding-left: 1rem;
        padding-right: 1rem;  
        font-weight: bold;     
    } 
    a:hover, a:visited, a:link, a:active
    {
        text-decoration: none;
    }
    a:hover{
        color:coral;
    }
    a{
        color:black;
    }

    </style>
</html><?php /**PATH E:\xampp\htdocs\d03\resources\views/web-layout/layout.blade.php ENDPATH**/ ?>