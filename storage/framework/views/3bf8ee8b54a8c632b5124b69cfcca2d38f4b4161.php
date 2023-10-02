<?php $__env->startSection('title', 'Welcome'); ?>



<?php $__env->startSection('content'); ?>

    <?php if(session()->has('login_fail')): ?>
        <p class="text-danger"><?php echo e(session()->get('login_fail')); ?></p>
    <?php endif; ?>

  <div class="mx-auto">
      <form method="POST" action="/login">
          <?php echo csrf_field(); ?>

          <div class="form-outline mb-4">
              <?php if($errors->has('email')): ?>
                  <div class="text-danger"><?php echo e($errors->first('email')); ?></div>
              <?php endif; ?>
              <label class="form-label" for="email">Email address</label>
              <input value= "<?php echo e(old('email')); ?>" type="email" id="email" name="email" class="form-control" required/>
          </div>

          <div class="form-outline mb-4">
              <?php if($errors->has('password')): ?>
                  <div class="text-danger"><?php echo e($errors->first('password')); ?></div>
              <?php endif; ?>
              <label class="form-label" for="password">Password</label>
              <input value="<?php echo e(old('password')); ?>" type="password" id="password" name="password" class="form-control" required/>
          </div>

          <button type="submit" class="btn btn-primary btn-block mb-4">Log in</button>
      </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\obada alzidi\Desktop\Projects\laravel\adds-app\resources\views/auth/login.blade.php ENDPATH**/ ?>