<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>UPT Tahura Raden Soerjo</title>

    <?php echo $__env->make('backend._partials._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('extra_style'); ?>

</head>

<body>
    <div id="wrapper">
        
        	<?php echo $__env->make('backend._partials._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        	<?php echo $__env->make('backend._partials._nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <?php echo $__env->make('backend._partials._script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('extra_script'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\project_lain\tahura\resources\views/backend/main.blade.php ENDPATH**/ ?>