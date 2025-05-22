<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/cards/create.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Создать новую карточку книги</h1>
    
    <form method="POST" action="<?php echo e(route('cards.store')); ?>">
        <?php echo csrf_field(); ?>
        
        <div class="form-group">
            <label for="author">Автор книги</label>
            <input type="text" class="form-control <?php $__errorArgs = ['author'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                   id="author" name="author" value="<?php echo e(old('author')); ?>" required>
            <?php $__errorArgs = ['author'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        <div class="form-group">
            <label for="title">Название книги</label>
            <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                   id="title" name="title" value="<?php echo e(old('title')); ?>" required>
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        <div class="form-group">
            <label>Тип карточки</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" 
                       id="type_give" value="give" checked>
                <label class="form-check-label" for="type_give">
                    Готов поделиться
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" 
                       id="type_take" value="take">
                <label class="form-check-label" for="type_take">
                    Хочу в свою библиотеку
                </label>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Отправить на модерацию</button>
        <a href="<?php echo e(route('cards.index')); ?>" class="btn btn-secondary">Отмена</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
</body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\bookoezhka\resources\views/cards/create.blade.php ENDPATH**/ ?>