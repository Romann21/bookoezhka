<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Буквоежка</title>
    
</head>
<body>
    <nav>
        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('home')); ?>">Главная</a>
            <a href="<?php echo e(route('cards.index')); ?>">Мои карточки</a>
            <a href="<?php echo e(route('cards.create')); ?>">Добавить карточку</a>
            <?php if(auth()->user()->login === 'admin'): ?>
                <a href="<?php echo e(route('admin.dashboard')); ?>">Панель админа</a>
            <?php endif; ?>
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit">Выйти</button>
            </form>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>">Войти</a>
            <a href="<?php echo e(route('register')); ?>">Регистрация</a>
        <?php endif; ?>
    </nav>
    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html><?php /**PATH D:\OSPanel\bookoezhka\resources\views/layouts/app.blade.php ENDPATH**/ ?>