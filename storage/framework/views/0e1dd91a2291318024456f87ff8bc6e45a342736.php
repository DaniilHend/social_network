<?php $__env->startSection('title'); ?>Профиль<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="align-self-baseline container mt-5">
        <div class="row">
            <div class="card col d-flex flex-column px-0">
                <?php if($profiles ?? ''): ?>
                    <div class="h2 text-black-50 my-5">
                        Все профили
                    </div>
                    <?php $__currentLoopData = $profiles->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/profile/<?php echo e($profile->id); ?>">
                            <div class="card-footer">
                                <h5><?php echo e($profile->login); ?></h5>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if($comments ?? ''): ?>
                    <div class="h2 text-black-50 my-5">
                        Ваши комментарии
                    </div>
                    <?php $__currentLoopData = $comments->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/profile/<?php echo e($comment->profile_id); ?>">
                            <div class="card-footer">
                                <h5><?php echo e($comment->title); ?></h5>
                                <?php echo e($comment->message); ?>

                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/list.blade.php ENDPATH**/ ?>