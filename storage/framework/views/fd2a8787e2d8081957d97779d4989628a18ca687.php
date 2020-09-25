<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($userId == $sessionUserId): ?>
        <div class="card-footer d-flex flex-column">
            <p class="d-flex justify-content-between">
                <span class="h5"><?php echo e($message->title); ?></span>
                <span class="text-black-50"><?php echo e($message->user_id); ?></span>
            </p>
            <div class="align-self-start"><?php echo e($message->message); ?></div>
            <br>
            <div>
                <form action="<?php echo e(route('deleteComment')); ?>" method="POST"
                      class="text-left">
                    <?php echo csrf_field(); ?>
                    <input type="number" class="d-none" name="commentId"
                           id="task<?php echo e($message->id); ?>"
                           value="<?php echo e($message->id); ?>">
                    <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                    </button>
                </form>
                <form action="<?php echo e(route('createComment')); ?>" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <input type="number" class="d-none" name="commentId"
                           id="task<?php echo e($message->id); ?>"
                           value="<?php echo e($message->id); ?>">
                    <input name="profile_id" type="number" class="d-none" value="<?php echo e($userId); ?>">
                    <input name="title" type="text" class="form-control mb-2"
                           placeholder="Заголовок комментария">
                    <textarea name="message" class="form-control mb-2"
                              placeholder="Текст комментария"></textarea>
                    <button name="send" class="btn btn-primary btn-block mb-2" type="submit">
                        Отправить
                    </button>
                </form>
            </div>

        </div>
    <?php elseif($message->user_id == $sessionUserId && $sessionUserId): ?>
        <div class="card-footer d-flex flex-column">
            <p class="d-flex justify-content-between">
                <span class="h5"><?php echo e($message->title); ?></span>
                <span class="text-black-50"><?php echo e($message->user_id); ?></span>
            </p>
            <div class="align-self-start"><?php echo e($message->message); ?></div>
            <br>
            <div>
                <form action="<?php echo e(route('deleteComment')); ?>" method="POST" id="comments"
                      class="text-left">
                    <?php echo csrf_field(); ?>
                    <input type="number" class="d-none" name="commentId"
                           id="task<?php echo e($message->id); ?>"
                           value="<?php echo e($message->id); ?>">
                    <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                    </button>
                </form>
                <form action="<?php echo e(route('createComment')); ?>" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <input type="number" class="d-none" name="commentId"
                           id="task<?php echo e($message->id); ?>"
                           value="<?php echo e($message->id); ?>">
                    <input name="profile_id" type="number" class="d-none" value="<?php echo e($userId); ?>">
                    <input name="title" type="text" class="form-control mb-2"
                           placeholder="Заголовок комментария">
                    <textarea name="message" class="form-control mb-2"
                              placeholder="Текст комментария"></textarea>
                    <button name="send" class="btn btn-primary btn-block mb-2" type="submit">
                        Отправить
                    </button>
                </form>
            </div>

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
<?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/includes/message.blade.php ENDPATH**/ ?>