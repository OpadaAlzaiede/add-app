<?php $__env->startSection('title', 'Welcome'); ?>



<?php $__env->startSection('content'); ?>

    <div class="mx-auto">
        <form method="POST" action="/register">
            <?php echo csrf_field(); ?>

            <div class="form-outline mb-4">
                <?php if($errors->has('name')): ?>
                    <div class="text-danger"><?php echo e($errors->first('name')); ?></div>
                <?php endif; ?>
                <label class="form-label" for="name">Name</label>
                <input value= "<?php echo e(old('name')); ?>" type="name" id="name" name="name" class="form-control" required/>
            </div>

            <div class="form-outline mb-4">
                <?php if($errors->has('name')): ?>
                    <div class="text-danger"><?php echo e($errors->first('name')); ?></div>
                <?php endif; ?>
                <label class="form-label" for="email">Email address</label>
                <input value= "<?php echo e(old('email')); ?>" type="email" id="email" name="email" class="form-control" required/>
            </div>

            <div class="form-outline mb-4">
                <?php if($errors->has('password')): ?>
                    <div class="text-danger"><?php echo e($errors->first('password')); ?></div>
                <?php endif; ?>
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required/>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="password_confirmation">Password Confirmation</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required/>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\obada alzidi\Desktop\Projects\laravel\adds-app\resources\views/auth/register.blade.php ENDPATH**/ ?>