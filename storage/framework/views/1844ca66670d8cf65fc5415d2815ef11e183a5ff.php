<?php $__env->startSection('title', 'Welcome'); ?>


<?php $__env->startSection('content'); ?>
    <div class="text-center">
        <?php if(session()->has('comment_success')): ?>
            <p class="text-primary"><?php echo e(session()->get('comment_success')); ?></p>
        <?php endif; ?>
        <?php if($errors->has('content')): ?>
            <div class="text-danger"><?php echo e($errors->first('content')); ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3" style="width: 300px; height: 200px;">
        <img src="<?php echo e(asset('storage/'.$add->image_url)); ?>" class="img-thumbnail rounded" alt="Responsive image">
    </div>

    <div class="d-flex justify-content-between">
        <div class="d-flex flex-column justify-content-between">
            <div class="d-flex flex-column">
                <label><strong>Title:</strong> &nbsp;</label> <p><?php echo e($add->title); ?></p>
            </div>
            <div class="d-flex flex-column">
                <label><strong>description:</strong> &nbsp;</label>
                <p style="word-wrap: break-word;"><?php echo e($add->description); ?></p>
            </div>
            <?php if($add->user_id !== \Illuminate\Support\Facades\Auth::id()): ?>
                <div class="d-flex flex-column">
                    <label><strong>owner:</strong> &nbsp;</label> <p><?php echo e($add->user->name); ?></p>
                </div>
            <?php endif; ?>
            <div class="d-flex flex-column">
                <label><strong>price:</strong> &nbsp;</label> <p><?php echo e($add->price); ?>$</p>
            </div>
        </div>
        <div>
            <?php if($add->user_id !== \Illuminate\Support\Facades\Auth::id()): ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#storeCommentModal">comment</button>
            <?php endif; ?>
            <?php if($add->user_id === \Illuminate\Support\Facades\Auth::id()): ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#updateAddModal">update</button>
            <?php endif; ?>
        </div>
    </div>

    <hr>
    <div class="text-center"><strong>comments</strong></div>

    <div class="d-flex mt-5 flex-wrap justify-content-between">
    <?php $__currentLoopData = $add->comments()->paginate(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="p-2">
            <div class="card" style="width: 18rem;">
                <div class="d-flex justify-content-between card-header bg-transparent border-success">
                    <small class="text-muted">
                        <p class="card-text">by:
                            <?php echo e($comment->user->id === \Illuminate\Support\Facades\Auth::id() ? "me" : $comment->user->name); ?>

                        </p>
                    </small>
                </div>
                <div class="card-body">
                    <p class="card-title"><?php echo e($comment->content); ?></p>
                </div>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mt-5 ml-2">
        <?php echo e($add->comments()->paginate(3)->links()); ?>

    </div>
<?php $__env->stopSection(); ?>


<div class="modal fade" id="storeCommentModal" tabindex="-1" role="dialog" aria-labelledby="storeCommentModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column justify-content-between">
                <form method="POST" action="/comments">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="add_id" value="<?php echo e($add->id); ?>">
                    <textarea name ="content" class="form-control"></textarea>
                    <br>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateAddModal" tabindex="-1" role="dialog" aria-labelledby="updateAddModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateAddModal">update Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column justify-content-between">
                <form method="POST" action="<?php echo e(route("adds.update")); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="add_id" value="<?php echo e($add->id); ?>">
                    <div class="form-outline mb-4">
                        <div class="mb-3" style="width: 200px; height: 100px;">
                            <img src="<?php echo e(asset('storage/'.$add->image_url)); ?>" class="img-thumbnail rounded" alt="Responsive image">
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="title">title</label>
                        <input value= "<?php echo e($add->title); ?>" type="title" id="title" name="title" class="form-control" required/>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="description">description</label>
                        <textarea type="description" id="description" name="description" class="form-control" required>
                            <?php echo e($add->description); ?>

                        </textarea>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="price">price</label>
                        <input value= "<?php echo e($add->price); ?>" type="price" id="price" name="price" class="form-control" required/>
                    </div>

                    <div class="form-outline mb-4">
                        <?php if($errors->has('image')): ?>
                            <div class="text-danger"><?php echo e($errors->first('image')); ?></div>
                        <?php endif; ?>
                        <label class="form-label" for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control"/>
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\obada alzidi\Desktop\Projects\laravel\adds-app\resources\views/adds/view.blade.php ENDPATH**/ ?>