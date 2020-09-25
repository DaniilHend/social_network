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
<?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/includes/message.blade.php ENDPATH**/ ?>