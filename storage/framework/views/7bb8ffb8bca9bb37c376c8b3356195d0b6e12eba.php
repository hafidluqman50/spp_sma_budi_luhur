<?php echo $__env->make('Kepsek.layout-app.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('Kepsek.layout-app.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('js'); ?><?php /**PATH /var/www/web_keuangan/resources/views/Kepsek/layout-app/layout.blade.php ENDPATH**/ ?>