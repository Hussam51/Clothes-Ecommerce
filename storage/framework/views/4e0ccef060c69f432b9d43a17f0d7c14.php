<?php if (isset($component)) { $__componentOriginal9d41032d5dde91ab243771384dacb5df = $component; } ?>
<?php $component = App\View\Components\FrontLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Subtotal</th>
                                    <th class="column-5"></th>
                                </tr>
                                <?php $__currentLoopData = $cart->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="table_row " id="<?php echo e($item->id); ?>">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="<?php echo e(Storage::url($item->product->image)); ?>" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2"><?php echo e($item->quantity); ?></td>
                                        <td class="column-3"><?php echo e($item->product->price); ?></td>
                                        <td class="column-4">
                                            <input class="mtext-104 cl3 txt-center item-quantity" type="number"
                                                name="num-product1" data-id="<?php echo e($item->id); ?>"
                                                value="<?php echo e(old('quantity', $item->quantity)); ?>">
                                            
                                        </td>

                                        <td class="column-5"><?php echo e($item->product->price * $item->quantity); ?></td>
                                        <td class="column-6">
                                            <a class="item-remove" data-id="<?php echo e($item->id); ?>" href="#"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                    name="coupon" placeholder="Coupon Code">

                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>

                            <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Update Cart
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    <?php echo e($cart->total()); ?>

                                </span>
                            </div>
                        </div>

                        

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    <?php echo e($cart->total()); ?>

                                </span>
                            </div>
                        </div>

                        <a href="<?php echo e(route('checkout')); ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php $__env->startPush('scripts'); ?>
        <script>
            const csrf_token = "<?php echo e(csrf_token()); ?>";
        </script>

        <script src="<?php echo e(asset('cart.js')); ?>"></script>
    <?php $__env->stopPush(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d41032d5dde91ab243771384dacb5df)): ?>
<?php $component = $__componentOriginal9d41032d5dde91ab243771384dacb5df; ?>
<?php unset($__componentOriginal9d41032d5dde91ab243771384dacb5df); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\clothesEcommerce\resources\views/front/cart.blade.php ENDPATH**/ ?>