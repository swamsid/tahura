<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UPT Tahura Raden Soerjo | Login</title>

    <link href="<?php echo e(asset('public/backend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/backend/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <!-- Input Mask -->
    <link href="<?php echo e(asset('public/backend/css/plugins/jasny/jasny-bootstrap.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('public/backend/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/backend/css/style.css')); ?>" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div class="center">
            <div>
                <!-- <h1 class="logo-name">IN+</h1> -->
            </div>
            <h3>SILAHKAN LOGIN</h3>
            <p>
            	<?php if(Session::has('message')): ?>
            		<?php echo e(Session::get('message')); ?>

            	<?php endif; ?>
            </p>
            <form class="m-t" role="form" method="post" action="<?php echo e(Route('wpadmin.login.authenticate')); ?>">
            	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" readonly>
                <input type="hidden" name="path" value="<?php echo e((Session::has('path')) ? Session::get('path') : ''); ?>" readonly>

                <?php
                    $crop = (Session::has('full')) ? explode('?', Session::get('full')) : [];
                    $params = (isset($crop[1])) ? $crop[1] : '';
                ?>

                <input type="hidden" name="params" value="<?php echo e($params); ?>" readonly>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="NIP" required="" name="nip" value="<?php echo e(old('nip')); ?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
 
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>

                <!-- <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
            </form>
            <p class="m-t"> <small>UPT Taman Hutan Raya Raden Soerjo &copy; <?php echo date("Y") ?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo e(asset('public/backend/js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backend/js/bootstrap.min.js')); ?>"></script>

    <!-- Input Mask-->
    <script src="<?php echo e(asset('public/backend/js/plugins/jasny/jasny-bootstrap.min.js')); ?>"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\project_lain\tahura\resources\views/backend/login/index.blade.php ENDPATH**/ ?>