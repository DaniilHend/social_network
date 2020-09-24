<?php $__env->startSection('title'); ?>Профиль<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="align-self-baseline container">
        <div class="row">
            <div class="card col d-flex flex-column px-0">
                <div class="h2 text-black-50 my-5">
                    Все профили
                </div>
                <?php if($profiles ?? ''): ?>
                    <?php $__currentLoopData = $profiles->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/profile/<?php echo e($profile->id); ?>">
                            <div class="card-footer">
                                <?php echo e($profile->login); ?>

                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/list.blade.php ENDPATH**/ ?>
