<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>member</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .login{
        text-align: right;
    }
    .login a{
        padding: .2rem .5rem;
    }
</style> 
<body>
    <div class="container">
        <h2>Member</h2>
        <hr>
        <div class="login">
            <a href="<?php echo e(url('logout')); ?>" class="btn btn-infor">Logout</a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="form-group">
                        <label>username</label>
                        <input class="form-control" type="text" name="username" id="username" readonly
                        value="<?php echo e($user->username); ?>">
                    </div>


                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="user_email" id="user_email" readonly class="form-control"
                        value="<?php echo e($user->user_email); ?>">
                    </div>

                    <div class="form-group">
                        <label>Giới tính</label>
                        <input type="text" name="user_gender" id="user_gender" readonly class="form-control"
                        value="<?php echo e($user->user_gender?"Nam":"Nữ"); ?>">
                    </div>

                    <div>
                        <a href="javascript:history.back()" class="btn btn-info">Back</a> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH E:\xampp\htdocs\d03\resources\views/user/member.blade.php ENDPATH**/ ?>