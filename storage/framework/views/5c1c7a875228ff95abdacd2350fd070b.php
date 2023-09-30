<?php if (isset($component)) { $__componentOriginal9d41032d5dde91ab243771384dacb5df = $component; } ?>
<?php $component = App\View\Components\FrontLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    


    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <?php $__currentLoopData = $cart->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"> <?php echo e($item->product->name); ?></h6>
                            <small class="text-muted">$<?php echo e($item->product->price); ?> x <?php echo e($item->quantity); ?></small>
                        </div>
                        <span class="text-muted"><?php echo e($item->product->price * $item->quantity); ?></span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <span>Total (USD)</span>
            <strong><?php echo e($cart->total()); ?></strong>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form action="<?php echo e(route('checkout')); ?>" class="needs-validation was-validated" novalidate="" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('post'); ?>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" name="first_name" class="form-control" id="firstName" placeholder=""
                            value="" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" name="last_name" class="form-control" id="lastName" placeholder=""
                            value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>



                    <div class="col-md-6 mb-3">
                        <label for="email">Email </label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Phone Number </label>
                        <input type="number" name="phone_number" class="form-control" placeholder="099....">
                        <div class="invalid-feedback">
                            Please enter a valid phone for shipping updates.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" name="street_address" class="form-control" id="address" placeholder="1234 Main St"
                        required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <input type="text" name="country" class="form-control" id="country" placeholder="Syria">
                        
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">City</label>
                        <input type="text" name="city" class="form-control" id="state" placeholder="Damascus">
                        
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">Regin/State</label>
                        <input type="text" name="state" class="form-control" id="state"
                            placeholder="meddan">
                        
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" name="zip_code" class="form-control" id="zip"
                            placeholder="12345" required="">
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                
                <hr class="mb-4">

                
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d41032d5dde91ab243771384dacb5df)): ?>
<?php $component = $__componentOriginal9d41032d5dde91ab243771384dacb5df; ?>
<?php unset($__componentOriginal9d41032d5dde91ab243771384dacb5df); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\clothesEcommerce\resources\views/front/checkout.blade.php ENDPATH**/ ?>