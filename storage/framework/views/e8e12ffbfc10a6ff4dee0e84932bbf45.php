<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Orders</h2>
            </div>

        </div>
    </div>


    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
            <th>change status</th>
            <th>options</th>

        </tr>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

                <td><?php echo e($order->number); ?></td>
                <td><?php echo e($order->address->first_name ?? ''); ?><?php echo e($order->address->lasst_name ?? ''); ?></td>
                <td><?php echo e($order->address->phone_number ?? ' '); ?></td>
                <td><?php echo e($order->address->country ?? ''); ?>.''.<?php echo e($order->address->city ?? ''); ?>

                    <?php echo e($order->address->street_address ?? ''); ?></td>
                <td id="<?php echo e($order->id); ?>"><?php echo e($order->status); ?> </td>
                <td><select name="status" data-id="<?php echo e($order->id); ?>" class="status">
                        <option value=""><--status--></option>
                        <option value="pendding">pendding</option>
                        <option value="delivering">delivering</option>
                        <option value="processing">processing</option>
                        <option value="refunded">refunded</option>
                        <option value="canceled">canceled</option>

                    </select>
                </td>

                <td>



                    <a class="btn btn-primary sm" href="<?php echo e(route('admin.orders.show', $order->id)); ?>">Show</a>

                    <form style="display: inline-block" action="<?php echo e(route('admin.orders.destroy', $order->id)); ?>"
                        method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>

                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>
    <div class="col-4">
        <?php echo e($orders->links()); ?>

    </div>

    <?php $__env->startPush('scripts'); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            const csrf_token = "<?php echo e(csrf_token()); ?>";
        </script>

        <script>
            $('.status').on('change', function(e) {

                let id = $(this).data('id');

                $.ajax({
                    url: "/orders/" + id,
                    method: "put",
                    data: {
                        status: $(this).val(),
                        _token: csrf_token
                    },
                    success: function(dataResult) {
                        dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode) {
                            window.location = "/orders";
                        } else {
                            alert("Internal Server Error");
                        }
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\clothesEcommerce\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>