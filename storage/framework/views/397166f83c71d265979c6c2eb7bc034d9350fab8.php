<?php $__env->startSection('title', 'Welcome'); ?>


<?php $__env->startSection('content'); ?>
    <?php if(session()->has('add_deletion_success')): ?>
        <p class="text-info"><?php echo e(session()->get('add_deletion_success')); ?></p>
    <?php endif; ?>

    <?php if(count($adds)): ?>
        <div>
            <div class="d-flex flex-wrap justify-content-between">
                <?php $__currentLoopData = $adds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-2">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="<?php echo e(asset('storage/'.$add->image_url)); ?>" alt="Card image cap">
                            <div class="d-flex justify-content-between card-header bg-transparent border-success">
                                <small class="text-muted">
                                    <p class="card-text">by: <?php echo e($add->user->name); ?></p>
                                </small>
                                <?php if(auth()->user()->hasRole(\App\Models\Role::getAdminRole())): ?>
                                    <small class="text-muted">
                                        <p class="card-text"><?php echo e($add->isPublished() ? 'published' : 'not published'); ?></p>
                                    </small>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($add->title); ?></h5>
                                <footer class="">
                                    <small class="text-muted">
                                        <p class="card-text">price: <?php echo e($add->price); ?>$</p>
                                    </small>
                                </footer> <br>
                                <small>
                                    <p>comments:<?php echo e($add->comments_count); ?></p>
                                </small>
                                <div class="d-flex flex-wrap p-2 justify-content-between">
                                    <?php if(auth()->user()->hasRole(\App\Models\Role::getAdminRole())): ?>
                                        <form method="POST" action="<?php echo e(route('adds.delete')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <input type="hidden" name="add_id" value="<?php echo e($add->id); ?>">
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                    <?php if(auth()->user()->hasRole(\App\Models\Role::getAdminRole())): ?>
                                            <a href="<?php echo e(route('admin.adds.view', $add->id)); ?>" class="link-primary text-primary">view more</a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('adds.view', $add->id)); ?>" class="link-primary text-primary">view more</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
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