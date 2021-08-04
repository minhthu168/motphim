<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create-user</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .login{
            text-align: right;
        }
        .login a{
            padding: .2rem .5rem;
        }
    </style>

</head>

<body>
    <div class="container">
        <h2>User Profile </h2>
        <hr>
        <div class="login">
            <a href="<?php echo e(url('logout')); ?>" class="btn btn-info">Logout</a>
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
                        <label>password</label>
                        <input type="text" name="pass" id="pass" readonly class="form-control"
                        value="<?php echo e($user->user_pass); ?>">
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" id="email" readonly class="form-control"
                        value="<?php echo e($user->user_email); ?>">
                    </div>

                    <div>
                        <a href="javascript:history.back()" class="btn btn-info">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH E:\xampp\htdocs\d03\resources\views/user/profile.blade.php ENDPATH**/ ?>