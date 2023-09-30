<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="<?php echo e(Storage::url($item->product->image)); ?>" alt="IMG" width="80px"/>
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                              <?php echo e($item->product->name); ?>

                            </a>

                            <span class="header-cart-item-info">
                               <?php echo e($item->quantity); ?>x-<?php echo e($item->product->price); ?>$
                            </span>
                        </div>
                    </li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                   <?php echo e($total); ?>

                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="<?php echo e(route('cart.index')); ?>"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.html"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php /**PATH C:\xampp\htdocs\clothesEcommerce\resources\views/components/cart-menu.blade.php ENDPATH**/ ?>