<?php $__env->startSection('message'); ?>
    <div class="card-footer d-flex flex-column">
        <p class="d-flex justify-content-between"><span class="h5"><?php echo e($message->title); ?></span>
            <span class="text-black-50"><?php echo e($message->user_id); ?></span></p>
        <div class="align-self-start"><?php echo e($message->message); ?></div>
        <?php if($message->user_id): ?>
        <?php endif; ?>
        <br>
        <input type="checkbox" name="commentId[]" id="task<?php echo e($message->id); ?>"
               value="<?php echo e($message->id); ?>">
    </div>
<?php $__env->stopSection(); ?>
<?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/includes/message.blade.php ENDPATH**/ ?>