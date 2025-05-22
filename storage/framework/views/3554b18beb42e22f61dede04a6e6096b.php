<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/cards/index.blade.php -->


<?php $__env->startSection('content'); ?>
<h1>Мои карточки</h1>

<a href="<?php echo e(route('cards.create')); ?>">Создать новую карточку</a>

<h2>Активные карточки</h2>
<?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <hr>
    <div>
        <h3><?php echo e($card->title); ?></h3>
        <p>Автор: <?php echo e($card->author); ?></p>
        <p>Тип: <?php echo e($card->type === 'give' ? 'Готов поделиться' : 'Хочу в библиотеку'); ?></p>
    
        
        <form action="<?php echo e(route('cards.destroy', $card)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit">Удалить</button>
        </form>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<h2>Архивные карточки</h2>
<?php $__currentLoopData = $archived; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <hr>
    <div>
        <h3><?php echo e($card->title); ?></h3>
        <p>Автор: <?php echo e($card->author); ?></p>
        <p>Причина: <?php echo e($card->rejection_reason ?? 'Удалено пользователем'); ?></p>
    </div>
    <hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?> 
</body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\bookoezhka\resources\views/cards/index.blade.php ENDPATH**/ ?>