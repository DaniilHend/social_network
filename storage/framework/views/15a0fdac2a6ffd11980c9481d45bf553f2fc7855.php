<?php $__env->startSection('title'); ?>Профиль<?php $__env->stopSection(); ?>
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
                <div id="comments">
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
                                        <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($response->message_id == $message->id): ?>
                                                <div class="card-footer d-flex flex-column">
                                                    <p class="d-flex justify-content-between">
                                                        <span class="h5"><?php echo e($response->title); ?></span>
                                                        <span class="text-black-50"><?php echo e($response->user_id); ?></span>
                                                    </p>
                                                    <div class="align-self-start"><?php echo e($response->message); ?></div>
                                                    <br>
                                                    <form action="<?php echo e(route('deleteComment')); ?>" method="POST"
                                                          class="text-left">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="number" class="d-none" name="commentId"
                                                               id="task<?php echo e($response->id); ?>"
                                                               value="<?php echo e($response->id); ?>">
                                                        <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                                        </button>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                Ответить
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
                                        <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($response->message_id == $message->id): ?>
                                                <div class="card-footer d-flex flex-column">
                                                    <p class="d-flex justify-content-between">
                                                        <span class="h5"><?php echo e($response->title); ?></span>
                                                        <span class="text-black-50"><?php echo e($response->user_id); ?></span>
                                                    </p>
                                                    <div class="align-self-start"><?php echo e($response->message); ?></div>
                                                    <?php if($response->user_id == $sessionUserId && $sessionUserId): ?>
                                                        <br>
                                                        <form action="<?php echo e(route('deleteComment')); ?>" method="POST"
                                                              class="text-left">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="number" class="d-none" name="commentId"
                                                                   id="task<?php echo e($response->id); ?>"
                                                                   value="<?php echo e($response->id); ?>">
                                                            <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                Ответить
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
                                    <br>
                                    <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($response->message_id == $message->id): ?>
                                            <div class="card-footer d-flex flex-column">
                                                <p class="d-flex justify-content-between">
                                                    <span class="h5"><?php echo e($response->title); ?></span>
                                                    <span class="text-black-50"><?php echo e($response->user_id); ?></span>
                                                </p>
                                                <div class="align-self-start"><?php echo e($response->message); ?></div>
                                                <?php if($response->user_id == $sessionUserId && $sessionUserId): ?>
                                                    <br>
                                                    <form action="<?php echo e(route('deleteComment')); ?>" method="POST"
                                                          class="text-left">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="number" class="d-none" name="commentId"
                                                               id="task<?php echo e($response->id); ?>"
                                                               value="<?php echo e($response->id); ?>">
                                                        <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sessionUserId): ?>
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
                                                Ответить
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                    <button type="button" id="loadComments" data-loading-text="Loading..." class="btn btn-outline-info m-4"
                            onclick="getMessage()">Все комментарии...
                    </button>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        function getMessage() {
            var data = {};
            data['userId'] = <?php echo $userId ?>;
            data['_token'] = $('meta[name="csrf-token"]').attr('content');
            data['flag'] = false;
            $.ajax({
                type: 'POST',
                url: '/ajax/comments',
                data: data,
                beforeSend: function() {
                    $('#loadComments').replaceWith('');
                },
                success: function (data) {
                    $('#comments').append(data);
                },
                error: function (result) {
                    console.log(result);
                }
            });
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/profile.blade.php ENDPATH**/ ?>