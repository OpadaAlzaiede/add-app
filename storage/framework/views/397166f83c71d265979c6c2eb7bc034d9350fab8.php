<?php $__env->startSection('title', 'Welcome'); ?>


<?php $__env->startSection('content'); ?>
    <?php if(session()->has('add_deletion_success')): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo e(session()->get('add_deletion_success')); ?>

        </div>
    <?php endif; ?>

    <?php if(count($adds)): ?>
        <div>
            <div class="d-flex flex-wrap justify-content-between">
                <?php $__currentLoopData = $adds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-2">
                        <?php if (isset($component)) { $__componentOriginal0dd47e28ff72ae41d6f984b51dffe7961492fb43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Add\Card::class, ['add' => $add]); ?>
<?php $component->withName('add.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0dd47e28ff72ae41d6f984b51dffe7961492fb43)): ?>
<?php $component = $__componentOriginal0dd47e28ff72ae41d6f984b51dffe7961492fb43; ?>
<?php unset($__componentOriginal0dd47e28ff72ae41d6f984b51dffe7961492fb43); ?>
<?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-5 ml-2">
                <?php echo e($adds->links()); ?>

            </div>
        </div>
    <?php else: ?>
        <div class="text-center ">
            <h5 class="text-highlight">No Adds For Today...</h5>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\obada alzidi\Desktop\Projects\laravel\adds-app\resources\views/adds/index.blade.php ENDPATH**/ ?>