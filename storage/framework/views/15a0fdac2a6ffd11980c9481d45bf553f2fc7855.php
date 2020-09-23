 
 <?php $__env->startSection('title'); ?>Профиль<?php $__env->stopSection(); ?>
 <?php $__env->startSection('content'); ?>
        <div class="align-self-baseline container">
            <div class="row">
                <div class="col h2 text-black-50">
                    Профиль пользователя
                    <?php echo e($name ?? ''); ?>

                </div>
            </div>
        </div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/profile.blade.php ENDPATH**/ ?>