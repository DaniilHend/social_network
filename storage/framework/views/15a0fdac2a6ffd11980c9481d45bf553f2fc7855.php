<?php $__env->startSection('title'); ?>Профиль<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="align-self-baseline container mt-5">
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
                <div class="px-4 pt-4">
                    <form action="<?php echo e(route('createComment')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input name="title" type="text" class="form-control mb-2" placeholder="Заголовок комментария">
                        <textarea name="message" class="form-control mb-2" placeholder="Текст комментария"></textarea>
                        <button name="send" class="btn btn-primary btn-block mb-2" type="submit">Отправить</button>
                    </form>
                </div>
                <form action="<?php echo e(route('deleteComment')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="px-4 pb-4">
                        <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить</button>
                    </div>
                    <?php if($comments ?? ''): ?>
                        <?php $__currentLoopData = $comments->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card-footer">
                                <h5><?php echo e($message->title); ?></h5>
                                <?php echo e($message->message); ?>

                                <br>
                                <input type="checkbox" name="task_id[]" id="task<?php echo e($message->id); ?>"
                                       value="<?php echo e($message->id); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/profile.blade.php ENDPATH**/ ?>