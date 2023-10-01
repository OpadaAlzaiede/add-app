<?php $__env->startSection('title', 'Welcome'); ?>


<?php $__env->startSection('content'); ?>
    <?php if(session()->has('user_activation_success')): ?>
        <p class="text-info"><?php echo e(session()->get('user_activation_success')); ?></p>
    <?php endif; ?>
    <?php if(session()->has('user_deactivation_success')): ?>
        <p class="text-danger"><?php echo e(session()->get('user_deactivation_success')); ?></p>
    <?php endif; ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                   <td><?php echo e($user->name); ?></td>
                   <td><?php echo e($user->email); ?></td>
                   <td>
                        <?php if($user->isActivated()): ?>
                           <form method="POST" action="<?php echo e(route('users.deactivate')); ?>">
                               <?php echo csrf_field(); ?>
                               <input type="hidden" value="<?php echo e($user->id); ?>" name="user_id">
                               <button type="submit" class="btn btn-sm btn-danger">Deactivate</button>
                           </form>
                        <?php else: ?>
                           <form method="POST" action="<?php echo e(route('users.activate')); ?>">
                               <?php echo csrf_field(); ?>
                               <input type="hidden" value="<?php echo e($user->id); ?>" name="user_id">
                               <button type="submit" class="btn btn-sm btn-primary">Activate</button>
                           </form>
                        <?php endif; ?>
                   </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="mt-5 ml-2">
        <?php echo e($users->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\obada alzidi\Desktop\Projects\laravel\adds-app\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>