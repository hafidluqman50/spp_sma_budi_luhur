<?php $__env->startSection('css'); ?>
    <link href= "<?php echo e(asset('assets/plugins/custombox/css/custombox.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="wrapper">
        <div class="container">

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.layout-app.layout-rab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/dashboard-rab.blade.php ENDPATH**/ ?>