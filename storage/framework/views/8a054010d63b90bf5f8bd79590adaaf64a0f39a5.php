<?php $__env->startSection('title'); ?>Вход/Регистрация<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form class="form-signin" action="<?php echo e(route('sign')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <h1 class="h3 mb-3 font-weight-normal">Please sign in/up</h1>
    <label for="inputEmail" class="sr-only">Login</label>
    <input name="login" type="text" id="inputLogin" class="form-control" placeholder="Login">
    <label for="inputPassword" class="sr-only">Password</label>
    <input name="password" type="password" id="password" class="form-control" placeholder="Password">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in/up</button>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger mt-2">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\OSPanel\domains\php\resources\views/welcome.blade.php ENDPATH**/ ?>