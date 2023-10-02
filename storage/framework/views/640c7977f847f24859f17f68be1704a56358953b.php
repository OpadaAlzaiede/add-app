<?php $__env->startSection('title', 'Welcome'); ?>



<?php $__env->startSection('content'); ?>
    <div class="mx-auto">
        <form method="POST" action="<?php echo e(route('adds.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-outline mb-4">
                <?php if($errors->has('title')): ?>
                    <div class="text-danger"><?php echo e($errors->first('title')); ?></div>
                <?php endif; ?>
                <label class="form-label" for="title">Title</label>
                <input value= "<?php echo e(old('title')); ?>" type="title" id="title" name="title" class="form-control" required/>
            </div>

            <div class="form-outline mb-4">
                <?php if($errors->has('description')): ?>
                    <div class="text-danger"><?php echo e($errors->first('description')); ?></div>
                <?php endif; ?>
                <label class="form-label" for="email">Description</label>
                    <textarea type="description" id="description" name="description" class="form-control" required>
                        <?php echo e(old('description')); ?>

                    </textarea>
            </div>

            <div class="form-outline mb-4">
                <?php if($errors->has('price')): ?>
                    <div class="text-danger"><?php echo e($errors->first('price')); ?></div>
                <?php endif; ?>
                <label class="form-label" for="price">Price</label>
                <input type="price" id="price" name="price" class="form-control" required/>
            </div>

            <div class="form-outline mb-4">
                <?php if($errors->has('image')): ?>
                    <div class="text-danger"><?php echo e($errors->first('image')); ?></div>
                <?php endif; ?>
                <label class="form-label" for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control" required/>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">create</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\obada alzidi\Desktop\Projects\laravel\adds-app\resources\views/adds/create.blade.php ENDPATH**/ ?>