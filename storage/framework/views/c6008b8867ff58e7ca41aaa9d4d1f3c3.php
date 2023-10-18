
<?php if (isset($component)) { $__componentOriginal9d41032d5dde91ab243771384dacb5df = $component; } ?>
<?php $component = App\View\Components\FrontLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div class="sec-banner bg0 p-t-95 p-b-55">
    <div class="container">
        <div class="row">
            <section class="bg0 p-t-23 p-b-130">
                <div class="container">
                    <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                        <!-- Block1 -->
                        <div class="block1 wrap-pic-w">

                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginalecfc721726b8b5798826c96d529d8b59 = $component; } ?>
<?php $component = App\View\Components\ProductCard::resolve(['product' => $product] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ProductCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecfc721726b8b5798826c96d529d8b59)): ?>
<?php $component = $__componentOriginalecfc721726b8b5798826c96d529d8b59; ?>
<?php unset($__componentOriginalecfc721726b8b5798826c96d529d8b59); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d41032d5dde91ab243771384dacb5df)): ?>
<?php $component = $__componentOriginal9d41032d5dde91ab243771384dacb5df; ?>
<?php unset($__componentOriginal9d41032d5dde91ab243771384dacb5df); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\clothesEcommerce\resources\views/front/categoryProducts.blade.php ENDPATH**/ ?>