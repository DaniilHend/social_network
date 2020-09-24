 
 <?php $__env->startSection('title'); ?>Профиль<?php $__env->stopSection(); ?>
 <?php $__env->startSection('content'); ?>
        <div class="align-self-baseline container">
            <div class="row">
                <div class="card col d-flex flex-column px-0">
                    <div class="h2 text-black-50 my-5">
                        Профиль пользователя
                        <?php echo e($name); ?>

                    </div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger mt-2">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="p-4">
                        <form action="<?php echo e(route('comment')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input name="title" type="text" class="form-control mb-2" placeholder="Заголовок комментария">
                            <textarea name="message" class="form-control mb-2" placeholder="Текст комментария"></textarea>
                            <button class="btn btn-primary btn-block" type="submit">Отправить</button>
                        </form>
                    </div>
                    <?php if($comments ?? ''): ?>
                        <?php $__currentLoopData = $comments->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-footer">
                            <h6><?php echo e($message->title); ?></h6>
                            <?php echo e($message->message); ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/profile.blade.php ENDPATH**/ ?>