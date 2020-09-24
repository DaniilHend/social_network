<?php $__env->startSection('title'); ?>Профиль<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="align-self-baseline container my-5">
        <div class="row">
            <div class="card col d-flex flex-column px-0">
                <div class="h2 text-black-50 my-5">
                    Профиль пользователя
                    <?php echo e($name); ?>

                </div>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger mt-2 mx-4 text-left">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if($sessionUserId): ?>
                    <div class="px-4 pt-4">
                        <form action="<?php echo e(route('createComment')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input name="profile_id" type="number" class="d-none" value="<?php echo e($userId); ?>">
                            <input name="title" type="text" class="form-control mb-2"
                                   placeholder="Заголовок комментария">
                            <textarea name="message" class="form-control mb-2"
                                      placeholder="Текст комментария"></textarea>
                            <button name="send" class="btn btn-primary btn-block mb-2" type="submit">Отправить</button>
                        </form>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('deleteComment')); ?>" method="POST">
                    <?php if($sessionUserId): ?>
                        <?php echo csrf_field(); ?>
                        <div class="px-4 pb-4">
                            <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить</button>
                        </div>
                    <?php endif; ?>
                    <?php if($comments ?? ''): ?>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($userId == $sessionUserId): ?>
                                <div class="card-footer d-flex flex-column">
                                    <p class="d-flex justify-content-between">
                                        <span class="h5"><?php echo e($message->title); ?></span>
                                        <span class="text-black-50"><?php echo e($message->user_id); ?></span>
                                    </p>
                                    <div class="align-self-start"><?php echo e($message->message); ?></div>
                                    <br>
                                    <input type="checkbox" name="commentId[]" id="task<?php echo e($message->id); ?>"
                                           value="<?php echo e($message->id); ?>">
                                </div>
                            <?php elseif($message->user_id == $sessionUserId && $sessionUserId): ?>
                                <div class="card-footer d-flex flex-column">
                                    <p class="d-flex justify-content-between">
                                        <span class="h5"><?php echo e($message->title); ?></span>
                                        <span class="text-black-50"><?php echo e($message->user_id); ?></span>
                                    </p>
                                    <div class="align-self-start"><?php echo e($message->message); ?></div>
                                    <br>
                                    <input type="checkbox" name="commentId[]" id="task<?php echo e($message->id); ?>"
                                           value="<?php echo e($message->id); ?>">
                                </div>
                            <?php else: ?>
                                <div class="card-footer d-flex flex-column">
                                    <p class="d-flex justify-content-between">
                                        <span class="h5"><?php echo e($message->title); ?></span>
                                        <span class="text-black-50"><?php echo e($message->user_id); ?></span>
                                    </p>
                                    <div class="align-self-start"><?php echo e($message->message); ?></div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/profile.blade.php ENDPATH**/ ?>