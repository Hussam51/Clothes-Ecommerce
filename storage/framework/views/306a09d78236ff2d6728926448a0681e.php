<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('layouts.front.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="animsition">

    <!-- Header -->

    <?php echo $__env->make('layouts.front.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Sidebar -->
    <?php echo $__env->make('layouts.front.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Cart -->
  <?php if (isset($component)) { $__componentOriginal7373547d63e9d9e39c784a6ce0e43e45 = $component; } ?>
<?php $component = App\View\Components\CartMenu::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cart-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\CartMenu::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7373547d63e9d9e39c784a6ce0e43e45)): ?>
<?php $component = $__componentOriginal7373547d63e9d9e39c784a6ce0e43e45; ?>
<?php unset($__componentOriginal7373547d63e9d9e39c784a6ce0e43e45); ?>
<?php endif; ?>




    <!-- Slider -->
   <?php echo $__env->make('layouts.front.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Banner -->
    <div class="sec-banner bg0 p-t-95 p-b-55">
        <div class="container">

                <?php echo e($slot); ?>


        </div>
    </div>





    <!-- Footer -->
    <?php echo $__env->make('layouts.front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->




    <?php echo $__env->make('layouts.front.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    
</body>

</html>
<?php /**PATH C:\xampp\htdocs\clothesEcommerce\resources\views/layouts/front/index.blade.php ENDPATH**/ ?>