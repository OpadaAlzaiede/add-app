<?php $__env->startSection('title', 'Welcome'); ?>


<?php $__env->startSection('content'); ?>
    <?php if(session()->has('add_added_success')): ?>
        <p class="text-primary"><?php echo e(session()->get('add_added_success')); ?></p>
    <?php endif; ?>

    <div class="text-center">
        <h5 class="text-highlight">My Adds</h5>
    </div>
    <div class="ml-3">
        <a href="/adds/create" class="link-primary text-primary">create</a>
    </div>
    <div class="d-flex mt-5 flex-wrap justify-content-between">
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
                            <small class="text-muted">
                                <p class="card-text">price: <?php echo e($add->price); ?>$</p>
                            </small>
                        <br>
                        <small>
                            <p>comments:<?php echo e($add->comments_count); ?></p>
                        </small>
                        <footer>
                            <div class="d-flex flex-wrap p-2 justify-content-between">
                                <?php if($add->isPublished()): ?>
                                    <form method="POST" action="<?php echo e(route('adds.unpublish')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($add->id); ?>" name="add_id">
                                        <button class="btn btn-danger" type="submit" >unpublish</button>
                                    </form>
                                <?php else: ?>
                                    <form method="POST" action="<?php echo e(route('adds.publish')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($add->id); ?>" name="add_id">
                                        <button class="btn btn-primary" type="submit" >publish</button>
                                    </form>
                                <?php endif; ?>
                                <a href="/adds/<?php echo e($add->id); ?>" class="link-primary text-primary">view more</a>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

   <div class="mt-5 ml-2">
       <?php echo e($adds->links()); ?>

   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\obada alzidi\Desktop\Projects\laravel\adds-app\resources\views/dashboard.blade.php ENDPATH**/ ?>