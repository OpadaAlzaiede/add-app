<?php $__env->startSection('title', 'Welcome'); ?>


<?php $__env->startSection('content'); ?>

    <?php if(session()->has('register_success')): ?>
        <p class="text-info"><?php echo e(session()->get('register_success')); ?></p>
    <?php endif; ?>

    <div class="text-center">
        Add App
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\obada alzidi\Desktop\Projects\laravel\adds-app\resources\views/welcome.blade.php ENDPATH**/ ?>